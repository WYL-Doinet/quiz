<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Choice;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizAssignment;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::create([
            'name' => 'Programming',
        ]);

        Role::create(['name' => 'admin']);

        $admin = User::create([
            'name' => 'example admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');

        $quiz = Quiz::create([
            'title' => 'Basic PHP Quiz',
            'category_id' => $category->id,
            'description' => 'Test your fundamental PHP knowledge.',
            'created_by' => $admin->id,
        ]);

        $questions = [
            [
                'question_text' => 'What does PHP stand for?',
                'choices' => [
                    ['choice_text' => 'Personal Home Page', 'is_correct' => true],
                    ['choice_text' => 'Private Hypertext Processor'],
                    ['choice_text' => 'Professional Home Program'],
                    ['choice_text' => 'Programmer Hosted Platform'],
                ],
            ],
            [
                'question_text' => 'Which of the following is a valid PHP variable?',
                'choices' => [
                    ['choice_text' => 'var name'],
                    ['choice_text' => '$name', 'is_correct' => true],
                    ['choice_text' => '&name'],
                    ['choice_text' => '#name'],
                ],
            ],
            [
                'question_text' => 'Which function is used to output text in PHP?',
                'choices' => [
                    ['choice_text' => 'echo()', 'is_correct' => true],
                    ['choice_text' => 'printf()'],
                    ['choice_text' => 'printText()'],
                    ['choice_text' => 'display()'],
                ],
            ],
            [
                'question_text' => 'How do you write a single-line comment in PHP?',
                'choices' => [
                    ['choice_text' => '// This is a comment', 'is_correct' => true],
                    ['choice_text' => '<!-- This is a comment -->'],
                    ['choice_text' => '/* This is a comment */'],
                    ['choice_text' => '-- This is a comment'],
                ],
            ],
            [
                'question_text' => 'What is the correct way to start a PHP block?',
                'choices' => [
                    ['choice_text' => '<?php', 'is_correct' => true],
                    ['choice_text' => '<php>'],
                    ['choice_text' => '<?'],
                    ['choice_text' => '<script php>'],
                ],
            ],
            [
                'question_text' => 'Which function is used to get the length of a string in PHP?',
                'choices' => [
                    ['choice_text' => 'strlen()', 'is_correct' => true],
                    ['choice_text' => 'count()'],
                    ['choice_text' => 'size()'],
                    ['choice_text' => 'length()'],
                ],
            ],
            [
                'question_text' => 'Which function is used to include the contents of one PHP file into another?',
                'choices' => [
                    ['choice_text' => 'include()', 'is_correct' => true],
                    ['choice_text' => 'import()'],
                    ['choice_text' => 'require_once()'],
                    ['choice_text' => 'load()'],
                ],
            ],
            [
                'question_text' => 'What does the `isset()` function do?',
                'choices' => [
                    ['choice_text' => 'Checks if a variable is set and is not NULL', 'is_correct' => true],
                    ['choice_text' => 'Checks if a variable is empty'],
                    ['choice_text' => 'Checks the variable type'],
                    ['choice_text' => 'Declares a new variable'],
                ],
            ],
            [
                'question_text' => 'How do you declare a constant in PHP?',
                'choices' => [
                    ['choice_text' => "define('NAME', 'value');", 'is_correct' => true],
                    ['choice_text' => "const NAME = 'value'();"],
                    ['choice_text' => "NAME := 'value'"],
                    ['choice_text' => "let NAME = 'value'"],
                ],
            ],
            [
                'question_text' => 'Which superglobal array holds form data submitted with the POST method?',
                'choices' => [
                    ['choice_text' => '$_POST', 'is_correct' => true],
                    ['choice_text' => '$_GET'],
                    ['choice_text' => '$_REQUEST'],
                    ['choice_text' => '$_FORM'],
                ],
            ],
            [
                'question_text' => 'What does PHP stand for? ()',
                'choices' => [
                    ['choice_text' => 'Personal Home Page', 'is_correct' => true],
                    ['choice_text' => 'Private Hypertext Processor'],
                    ['choice_text' => 'Professional Home Program'],
                    ['choice_text' => 'Programmer Hosted Platform'],
                ],
            ],
            [
                'question_text' => 'Which of the following is a valid PHP variable? ',
                'choices' => [
                    ['choice_text' => 'var name'],
                    ['choice_text' => '$name', 'is_correct' => true],
                    ['choice_text' => '&name'],
                    ['choice_text' => '#name'],
                ],
            ],
            [
                'question_text' => 'Which function is used to output text in PHP? ',
                'choices' => [
                    ['choice_text' => 'echo()', 'is_correct' => true],
                    ['choice_text' => 'printf()'],
                    ['choice_text' => 'printText()'],
                    ['choice_text' => 'display()'],
                ],
            ],
            [
                'question_text' => 'How do you write a single-line comment in PHP? ',
                'choices' => [
                    ['choice_text' => '// This is a comment', 'is_correct' => true],
                    ['choice_text' => '<!-- This is a comment -->'],
                    ['choice_text' => '/* This is a comment */'],
                    ['choice_text' => '-- This is a comment'],
                ],
            ],
            [
                'question_text' => 'What is the correct way to start a PHP block? ',
                'choices' => [
                    ['choice_text' => '<?php', 'is_correct' => true],
                    ['choice_text' => '<php>'],
                    ['choice_text' => '<?'],
                    ['choice_text' => '<script php>'],
                ],
            ],
            [
                'question_text' => 'Which function is used to get the length of a string in PHP? ',
                'choices' => [
                    ['choice_text' => 'strlen()', 'is_correct' => true],
                    ['choice_text' => 'count()'],
                    ['choice_text' => 'size()'],
                    ['choice_text' => 'length()'],
                ],
            ],
            [
                'question_text' => 'Which function is used to include the contents of one PHP file into another? ',
                'choices' => [
                    ['choice_text' => 'include()', 'is_correct' => true],
                    ['choice_text' => 'import()'],
                    ['choice_text' => 'require_once()'],
                    ['choice_text' => 'load()'],
                ],
            ],
            [
                'question_text' => 'What does the `isset()` function do? ',
                'choices' => [
                    ['choice_text' => 'Checks if a variable is set and is not NULL', 'is_correct' => true],
                    ['choice_text' => 'Checks if a variable is empty'],
                    ['choice_text' => 'Checks the variable type'],
                    ['choice_text' => 'Declares a new variable'],
                ],
            ],
            [
                'question_text' => 'How do you declare a constant in PHP? ',
                'choices' => [
                    ['choice_text' => "define('NAME', 'value');", 'is_correct' => true],
                    ['choice_text' => "const NAME = 'value'();"],
                    ['choice_text' => "NAME := 'value'"],
                    ['choice_text' => "let NAME = 'value'"],
                ],
            ],
            [
                'question_text' => 'Which superglobal array holds form data submitted with the POST method? ',
                'choices' => [
                    ['choice_text' => '$_POST', 'is_correct' => true],
                    ['choice_text' => '$_GET'],
                    ['choice_text' => '$_REQUEST'],
                    ['choice_text' => '$_FORM'],
                ],
            ],
            [
                'question_text' => 'What does PHP stand for? ',
                'choices' => [
                    ['choice_text' => 'Personal Home Page', 'is_correct' => true],
                    ['choice_text' => 'Private Hypertext Processor'],
                    ['choice_text' => 'Professional Home Program'],
                    ['choice_text' => 'Programmer Hosted Platform'],
                ],
            ],
            [
                'question_text' => 'Which of the following is a valid PHP variable? ',
                'choices' => [
                    ['choice_text' => 'var name'],
                    ['choice_text' => '$name', 'is_correct' => true],
                    ['choice_text' => '&name'],
                    ['choice_text' => '#name'],
                ],
            ],
            [
                'question_text' => 'Which function is used to output text in PHP? ',
                'choices' => [
                    ['choice_text' => 'echo()', 'is_correct' => true],
                    ['choice_text' => 'printf()'],
                    ['choice_text' => 'printText()'],
                    ['choice_text' => 'display()'],
                ],
            ],
            [
                'question_text' => 'How do you write a single-line comment in PHP? ',
                'choices' => [
                    ['choice_text' => '// This is a comment', 'is_correct' => true],
                    ['choice_text' => '<!-- This is a comment -->'],
                    ['choice_text' => '/* This is a comment */'],
                    ['choice_text' => '-- This is a comment'],
                ],
            ],
            [
                'question_text' => 'What is the correct way to start a PHP block? ',
                'choices' => [
                    ['choice_text' => '<?php', 'is_correct' => true],
                    ['choice_text' => '<php>'],
                    ['choice_text' => '<?'],
                    ['choice_text' => '<script php>'],
                ],
            ],
            [
                'question_text' => 'Which function is used to get the length of a string in PHP? ',
                'choices' => [
                    ['choice_text' => 'strlen()', 'is_correct' => true],
                    ['choice_text' => 'count()'],
                    ['choice_text' => 'size()'],
                    ['choice_text' => 'length()'],
                ],
            ],
            [
                'question_text' => 'Which function is used to include the contents of one PHP file into another? ',
                'choices' => [
                    ['choice_text' => 'include()', 'is_correct' => true],
                    ['choice_text' => 'import()'],
                    ['choice_text' => 'require_once()'],
                    ['choice_text' => 'load()'],
                ],
            ],
            [
                'question_text' => 'What does the `isset()` function do? ',
                'choices' => [
                    ['choice_text' => 'Checks if a variable is set and is not NULL', 'is_correct' => true],
                    ['choice_text' => 'Checks if a variable is empty'],
                    ['choice_text' => 'Checks the variable type'],
                    ['choice_text' => 'Declares a new variable'],
                ],
            ],
            [
                'question_text' => 'How do you declare a constant in PHP? ',
                'choices' => [
                    ['choice_text' => "define('NAME', 'value');", 'is_correct' => true],
                    ['choice_text' => "const NAME = 'value'();"],
                    ['choice_text' => "NAME := 'value'"],
                    ['choice_text' => "let NAME = 'value'"],
                ],
            ],
            [
                'question_text' => 'Which superglobal array holds form data submitted with the POST method? ',
                'choices' => [
                    ['choice_text' => '$_POST', 'is_correct' => true],
                    ['choice_text' => '$_GET'],
                    ['choice_text' => '$_REQUEST'],
                    ['choice_text' => '$_FORM'],
                ],
            ],
            [
                'question_text' => 'What does PHP stand for? ',
                'choices' => [
                    ['choice_text' => 'Personal Home Page', 'is_correct' => true],
                    ['choice_text' => 'Private Hypertext Processor'],
                    ['choice_text' => 'Professional Home Program'],
                    ['choice_text' => 'Programmer Hosted Platform'],
                ],
            ],
            [
                'question_text' => 'Which of the following is a valid PHP variable? ',
                'choices' => [
                    ['choice_text' => 'var name'],
                    ['choice_text' => '$name', 'is_correct' => true],
                    ['choice_text' => '&name'],
                    ['choice_text' => '#name'],
                ],
            ],
            [
                'question_text' => 'Which function is used to output text in PHP? ',
                'choices' => [
                    ['choice_text' => 'echo()', 'is_correct' => true],
                    ['choice_text' => 'printf()'],
                    ['choice_text' => 'printText()'],
                    ['choice_text' => 'display()'],
                ],
            ],
            [
                'question_text' => 'How do you write a single-line comment in PHP? ',
                'choices' => [
                    ['choice_text' => '// This is a comment', 'is_correct' => true],
                    ['choice_text' => '<!-- This is a comment -->'],
                    ['choice_text' => '/* This is a comment */'],
                    ['choice_text' => '-- This is a comment'],
                ],
            ],
            [
                'question_text' => 'What is the correct way to start a PHP block? ',
                'choices' => [
                    ['choice_text' => '<?php', 'is_correct' => true],
                    ['choice_text' => '<php>'],
                    ['choice_text' => '<?'],
                    ['choice_text' => '<script php>'],
                ],
            ],
            [
                'question_text' => 'Which function is used to get the length of a string in PHP? ',
                'choices' => [
                    ['choice_text' => 'strlen()', 'is_correct' => true],
                    ['choice_text' => 'count()'],
                    ['choice_text' => 'size()'],
                    ['choice_text' => 'length()'],
                ],
            ],
            [
                'question_text' => 'Which function is used to include the contents of one PHP file into another? ',
                'choices' => [
                    ['choice_text' => 'include()', 'is_correct' => true],
                    ['choice_text' => 'import()'],
                    ['choice_text' => 'require_once()'],
                    ['choice_text' => 'load()'],
                ],
            ],
            [
                'question_text' => 'What does the `isset()` function do? ',
                'choices' => [
                    ['choice_text' => 'Checks if a variable is set and is not NULL', 'is_correct' => true],
                    ['choice_text' => 'Checks if a variable is empty'],
                    ['choice_text' => 'Checks the variable type'],
                    ['choice_text' => 'Declares a new variable'],
                ],
            ],
            [
                'question_text' => 'How do you declare a constant in PHP? ',
                'choices' => [
                    ['choice_text' => "define('NAME', 'value');", 'is_correct' => true],
                    ['choice_text' => "const NAME = 'value'();"],
                    ['choice_text' => "NAME := 'value'"],
                    ['choice_text' => "let NAME = 'value'"],
                ],
            ],
            [
                'question_text' => 'Which superglobal array holds form data submitted with the POST method? ',
                'choices' => [
                    ['choice_text' => '$_POST', 'is_correct' => true],
                    ['choice_text' => '$_GET'],
                    ['choice_text' => '$_REQUEST'],
                    ['choice_text' => '$_FORM'],
                ],
            ],
            [
                'question_text' => 'What does PHP stand for? ',
                'choices' => [
                    ['choice_text' => 'Personal Home Page', 'is_correct' => true],
                    ['choice_text' => 'Private Hypertext Processor'],
                    ['choice_text' => 'Professional Home Program'],
                    ['choice_text' => 'Programmer Hosted Platform'],
                ],
            ],
            [
                'question_text' => 'Which of the following is a valid PHP variable? ',
                'choices' => [
                    ['choice_text' => 'var name'],
                    ['choice_text' => '$name', 'is_correct' => true],
                    ['choice_text' => '&name'],
                    ['choice_text' => '#name'],
                ],
            ],
            [
                'question_text' => 'Which function is used to output text in PHP? ',
                'choices' => [
                    ['choice_text' => 'echo()', 'is_correct' => true],
                    ['choice_text' => 'printf()'],
                    ['choice_text' => 'printText()'],
                    ['choice_text' => 'display()'],
                ],
            ],
            [
                'question_text' => 'How do you write a single-line comment in PHP? ',
                'choices' => [
                    ['choice_text' => '// This is a comment', 'is_correct' => true],
                    ['choice_text' => '<!-- This is a comment -->'],
                    ['choice_text' => '/* This is a comment */'],
                    ['choice_text' => '-- This is a comment'],
                ],
            ],
            [
                'question_text' => 'What is the correct way to start a PHP block? ',
                'choices' => [
                    ['choice_text' => '<?php', 'is_correct' => true],
                    ['choice_text' => '<php>'],
                    ['choice_text' => '<?'],
                    ['choice_text' => '<script php>'],
                ],
            ],
            [
                'question_text' => 'Which function is used to get the length of a string in PHP? ',
                'choices' => [
                    ['choice_text' => 'strlen()', 'is_correct' => true],
                    ['choice_text' => 'count()'],
                    ['choice_text' => 'size()'],
                    ['choice_text' => 'length()'],
                ],
            ],
            [
                'question_text' => 'Which function is used to include the contents of one PHP file into another? ',
                'choices' => [
                    ['choice_text' => 'include()', 'is_correct' => true],
                    ['choice_text' => 'import()'],
                    ['choice_text' => 'require_once()'],
                    ['choice_text' => 'load()'],
                ],
            ],
            [
                'question_text' => 'What does the `isset()` function do? ',
                'choices' => [
                    ['choice_text' => 'Checks if a variable is set and is not NULL', 'is_correct' => true],
                    ['choice_text' => 'Checks if a variable is empty'],
                    ['choice_text' => 'Checks the variable type'],
                    ['choice_text' => 'Declares a new variable'],
                ],
            ],
            [
                'question_text' => 'How do you declare a constant in PHP? ',
                'choices' => [
                    ['choice_text' => "define('NAME', 'value');", 'is_correct' => true],
                    ['choice_text' => "const NAME = 'value'();"],
                    ['choice_text' => "NAME := 'value'"],
                    ['choice_text' => "let NAME = 'value'"],
                ],
            ],
            [
                'question_text' => 'Which superglobal array holds form data submitted with the POST method? ',
                'choices' => [
                    ['choice_text' => '$_POST', 'is_correct' => true],
                    ['choice_text' => '$_GET'],
                    ['choice_text' => '$_REQUEST'],
                    ['choice_text' => '$_FORM'],
                ],
            ],
        ];

        foreach (array_slice($questions, 0, 10) as $q) {
            $question = Question::create([
                'quiz_id' => $quiz->id,
                'question_text' => $q['question_text'],
            ]);

            foreach ($q['choices'] as $choice) {
                Choice::create([
                    'question_id' => $question->id,
                    'choice_text' => $choice['choice_text'],
                    'is_correct' => $choice['is_correct'] ?? false,
                ]);
            }
        }

        $user = User::create([
            'name' => 'example user',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name' => 'Tashi Bana',
            'email' => 'mmotashibana@gmail.com',
            'password' => bcrypt('password'),
        ]);

        QuizAssignment::create([
            'quiz_id' => $quiz->id,
            'user_id' => $user->id,
            'assigned_at' => now(),
        ]);
    }
}
