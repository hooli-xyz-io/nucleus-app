<?php

namespace App\Models;

use Core\Orm\Model;
use Core\Auth\Authenticable;
use Core\Auth\HasApiTokens;

class User extends Model
{
    use Authenticable, HasApiTokens;

    protected string $table = 'users';
    protected string $primaryKey = 'ID';

    public function getAuthIdentifierName(): string
    {
        return $this->primaryKey;
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->primaryKey} ?? $this->ID ?? $this->id ?? null;
    }

    public function passwordMatches(string $plainPassword): bool
    {
        $storedPassword = (string) ($this->password ?? '');
        if ($storedPassword === '') {
            return false;
        }

        $passwordInfo = password_get_info($storedPassword);
        $isHashedPassword = ($passwordInfo['algo'] ?? 0) !== 0;

        if ($isHashedPassword) {
            return password_verify($plainPassword, $storedPassword);
        }

        return hash_equals($storedPassword, $plainPassword);
    }

    public function usesLegacyPlainTextPassword(): bool
    {
        $storedPassword = (string) ($this->password ?? '');
        if ($storedPassword === '') {
            return false;
        }

        return (password_get_info($storedPassword)['algo'] ?? 0) === 0;
    }

    public function upgradePasswordHash(string $plainPassword): bool
    {
        $this->password = password_hash($plainPassword, PASSWORD_DEFAULT);
        return $this->save();
    }

}
