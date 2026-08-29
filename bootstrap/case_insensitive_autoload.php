<?php

$projectClassRoots = [
    'App\\' => __DIR__ . '/../app',
    'Api\\' => __DIR__ . '/../api',
    'Core\\' => __DIR__ . '/../core',
    'Cli\\' => __DIR__ . '/../core/cli',
];

$resolvePathSegment = static function (string $directory, string $target): ?string {
    $directPath = $directory . DIRECTORY_SEPARATOR . $target;

    if (file_exists($directPath)) {
        return $target;
    }

    if (!is_dir($directory)) {
        return null;
    }

    foreach (scandir($directory) ?: [] as $entry) {
        if (strcasecmp($entry, $target) === 0) {
            return $entry;
        }
    }

    return null;
};

spl_autoload_register(static function (string $class) use ($projectClassRoots, $resolvePathSegment): void {
    foreach ($projectClassRoots as $prefix => $baseDir) {
        if (!str_starts_with($class, $prefix)) {
            continue;
        }

        $relativeClass = substr($class, strlen($prefix));

        if ($relativeClass === '') {
            return;
        }

        $segments = explode('\\', $relativeClass);
        $resolvedPath = $baseDir;
        $lastIndex = count($segments) - 1;

        foreach ($segments as $index => $segment) {
            $target = $index === $lastIndex ? $segment . '.php' : $segment;
            $resolvedSegment = $resolvePathSegment($resolvedPath, $target);

            if ($resolvedSegment === null) {
                return;
            }

            $resolvedPath .= DIRECTORY_SEPARATOR . $resolvedSegment;
        }

        if (is_file($resolvedPath)) {
            require_once $resolvedPath;
        }

        return;
    }
});
