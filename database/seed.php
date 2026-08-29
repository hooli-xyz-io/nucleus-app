<?php
/**
 * Simple database seeder for the Boost mobile API.
 *
 * It loads the application bootstrap (environment + DB connection) and
 * creates a minimal data set that exercises every endpoint defined in
 * `api.txt`.
 */
require __DIR__ . '/../bootstrap/app.php'; // loads env and DB

use App\Models\{User, Language, Subject, Module, Lesson, Slide, Quiz, MythFact, DifficultyQuestion, Screening};

// ---------------------------------------------------------------------
// Users (phone‑based login)
// ---------------------------------------------------------------------

if (!User::where('phone_number', '5551234567')->first()) {
    User::create([
        'phone_number' => '5551234567',
        'password' => password_hash('secret', PASSWORD_BCRYPT),
        'first_name' => 'Demo',
        'last_name' => 'User',
    ]);
}

// Language
$langEn = Language::where('code', 'en')->first();
if (!$langEn) {
    $langEn = Language::create([
        'code' => 'en',
        'title' => 'English',
        'active' => true,
    ]);
}

$langSh = Language::where('code', 'sh')->first();
if (!$langSh) {
    $langSh = Language::create([
        'code' => 'sh',
        'title' => 'Shona',
        'active' => true,
    ]);
}

$langNd = Language::where('code', 'nd')->first();
if (!$langNd) {
    $langNd = Language::create([
        'code' => 'nd',
        'title' => 'Ndebele',
        'active' => true,
    ]);
}

// Subject
$subjectMath = Subject::where('code', 'math')->first();
if (!$subjectMath) {
    $subjectMath = Subject::create([
        'code' => 'math',
        'title' => 'Mathematics',
        'image_url' => null,
        'active' => true,
        'language_id' => $langEn->id,
    ]);
}

// Module
$module = Module::where('code','algebra')->first();
if (!$module) {
    $module = Module::create([
        'code' => 'algebra',
        'title' => 'Algebra Basics',
        'image_url' => null,
        'active' => true,
        'subject_id' => $subjectMath->id,
    ]);
}

// Lesson
$lesson = Lesson::where('module_id', $module->id)->first();
if (!$lesson) {
    $lesson = Lesson::create([
        'module_id' => $module->id,
    ]);
}

// Slides (3 example slides)
for ($i = 1; $i <= 3; $i++) {
    $slide = Slide::where('lesson_id', $lesson->id)->where('position', $i)->first();
    if (!$slide) {  
        Slide::create([
            'lesson_id' => $lesson->id,
            'description' => "Slide $i description",
            'image_url' => null,
            'position' => $i,
            'active' => true,
        ]);
    }
}

// Quiz
$quiz = Quiz::where('lesson_id', $lesson->id)->first();
    if (!$quiz) {
        $quiz = Quiz::create([
        'lesson_id' => $lesson->id,
        'question' => 'Is 2+2=4?',
        'image_url' => null,
        'answer_yes_text' => 'Yes',
        'answer_no_text' => 'No',
        'correct_answer' => 'YES',
        'explanation' => 'Basic arithmetic',
        'active' => true,
    ]);
}

// MythFact
$mythFact = MythFact::where('lesson_id', $lesson->id)->first();
if (!$mythFact) {
        $mythFact = MythFact::create([
        'lesson_id' => $lesson->id,
        'myth' => 'Math is only for geniuses',
        'fact' => 'Anyone can learn math with practice',
        'image_url' => null,
        'active' => true,
    ]);
}

// DifficultyQuestion
$difficultyQuestion = DifficultyQuestion::where('lesson_id', $lesson->id)->first();
if (!$difficultyQuestion) {
    $difficultyQuestion = DifficultyQuestion::create([
        'lesson_id' => $lesson->id,
        'question' => 'How comfortable are you with variables?',
        'answer' => '',
        'difficulty_level' => 'MEDIUM',
        'image_url' => null,
        'active' => true,
    ]);
}
echo "✅ Seed data inserted.\n";
?>  