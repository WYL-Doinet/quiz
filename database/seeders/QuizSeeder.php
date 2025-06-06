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

        Role::create(['name' => 'admin']);

        $user = User::create([
            'name' => 'example user',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);

        $userTwo = User::create([
            'name' => 'Tashi Bana',
            'email' => 'mmotashibana@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $admin = User::create([
            'name' => 'example admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');

        $categories = Category::insert([
            [
                'name' => 'Programming',
            ],
            [
                'name' => 'Maths',
            ],
            [
                'name' => 'Science',
            ],
            [
                'name' => 'Language',
            ],
        ]);

        $categories = Category::all();

        $questions = [
            'Programming' => [
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
            ],
            'Science' => [
                [
                    'question_text' => 'What is the chemical symbol for water?',
                    'choices' => [
                        ['choice_text' => 'H2O', 'is_correct' => true],
                        ['choice_text' => 'O2'],
                        ['choice_text' => 'CO2'],
                        ['choice_text' => 'HO2'],
                    ],
                ],
                [
                    'question_text' => 'What planet is known as the Red Planet?',
                    'choices' => [
                        ['choice_text' => 'Mars', 'is_correct' => true],
                        ['choice_text' => 'Venus'],
                        ['choice_text' => 'Jupiter'],
                        ['choice_text' => 'Saturn'],
                    ],
                ],
                [
                    'question_text' => 'Which part of the plant conducts photosynthesis?',
                    'choices' => [
                        ['choice_text' => 'Leaf', 'is_correct' => true],
                        ['choice_text' => 'Root'],
                        ['choice_text' => 'Stem'],
                        ['choice_text' => 'Flower'],
                    ],
                ],
                [
                    'question_text' => 'What gas do plants absorb from the atmosphere?',
                    'choices' => [
                        ['choice_text' => 'Carbon Dioxide', 'is_correct' => true],
                        ['choice_text' => 'Oxygen'],
                        ['choice_text' => 'Nitrogen'],
                        ['choice_text' => 'Hydrogen'],
                    ],
                ],
                [
                    'question_text' => 'How many planets are in the Solar System?',
                    'choices' => [
                        ['choice_text' => '8', 'is_correct' => true],
                        ['choice_text' => '9'],
                        ['choice_text' => '7'],
                        ['choice_text' => '10'],
                    ],
                ],
                [
                    'question_text' => 'What force keeps us on the ground?',
                    'choices' => [
                        ['choice_text' => 'Gravity', 'is_correct' => true],
                        ['choice_text' => 'Magnetism'],
                        ['choice_text' => 'Friction'],
                        ['choice_text' => 'Electricity'],
                    ],
                ],
                [
                    'question_text' => 'What organ pumps blood throughout the body?',
                    'choices' => [
                        ['choice_text' => 'Heart', 'is_correct' => true],
                        ['choice_text' => 'Lungs'],
                        ['choice_text' => 'Liver'],
                        ['choice_text' => 'Kidney'],
                    ],
                ],
                [
                    'question_text' => 'Which gas is essential for human respiration?',
                    'choices' => [
                        ['choice_text' => 'Oxygen', 'is_correct' => true],
                        ['choice_text' => 'Carbon Dioxide'],
                        ['choice_text' => 'Hydrogen'],
                        ['choice_text' => 'Nitrogen'],
                    ],
                ],
                [
                    'question_text' => 'What is the boiling point of water at sea level?',
                    'choices' => [
                        ['choice_text' => '100°C', 'is_correct' => true],
                        ['choice_text' => '90°C'],
                        ['choice_text' => '80°C'],
                        ['choice_text' => '120°C'],
                    ],
                ],
                [
                    'question_text' => 'Which organ is responsible for filtering blood?',
                    'choices' => [
                        ['choice_text' => 'Kidney', 'is_correct' => true],
                        ['choice_text' => 'Lungs'],
                        ['choice_text' => 'Heart'],
                        ['choice_text' => 'Stomach'],
                    ],
                ],
            ],
            'Language' => [
                [
                    'question_text' => 'Which of the following is a synonym for "happy"?',
                    'choices' => [
                        ['choice_text' => 'Joyful', 'is_correct' => true],
                        ['choice_text' => 'Sad'],
                        ['choice_text' => 'Angry'],
                        ['choice_text' => 'Tired'],
                    ],
                ],
                [
                    'question_text' => 'Which word is a noun?',
                    'choices' => [
                        ['choice_text' => 'Apple', 'is_correct' => true],
                        ['choice_text' => 'Run'],
                        ['choice_text' => 'Quickly'],
                        ['choice_text' => 'Blue'],
                    ],
                ],
                [
                    'question_text' => 'Choose the correct past tense of "go":',
                    'choices' => [
                        ['choice_text' => 'Went', 'is_correct' => true],
                        ['choice_text' => 'Goes'],
                        ['choice_text' => 'Gone'],
                        ['choice_text' => 'Going'],
                    ],
                ],
                [
                    'question_text' => 'What is the plural of "child"?',
                    'choices' => [
                        ['choice_text' => 'Children', 'is_correct' => true],
                        ['choice_text' => 'Childs'],
                        ['choice_text' => 'Childes'],
                        ['choice_text' => 'Childer'],
                    ],
                ],
                [
                    'question_text' => 'Which sentence is punctuated correctly?',
                    'choices' => [
                        ['choice_text' => 'She said, "I am happy."', 'is_correct' => true],
                        ['choice_text' => 'She said "I am happy".'],
                        ['choice_text' => 'She said I am happy.'],
                        ['choice_text' => 'She, said "I am happy".'],
                    ],
                ],
                [
                    'question_text' => 'What is an antonym of "strong"?',
                    'choices' => [
                        ['choice_text' => 'Weak', 'is_correct' => true],
                        ['choice_text' => 'Tall'],
                        ['choice_text' => 'Heavy'],
                        ['choice_text' => 'Brave'],
                    ],
                ],
                [
                    'question_text' => 'Which word is an adjective?',
                    'choices' => [
                        ['choice_text' => 'Beautiful', 'is_correct' => true],
                        ['choice_text' => 'Run'],
                        ['choice_text' => 'Happily'],
                        ['choice_text' => 'Silence'],
                    ],
                ],
                [
                    'question_text' => 'Which sentence is in the future tense?',
                    'choices' => [
                        ['choice_text' => 'I will go to school tomorrow.', 'is_correct' => true],
                        ['choice_text' => 'I went to school.'],
                        ['choice_text' => 'I am going to school.'],
                        ['choice_text' => 'I go to school.'],
                    ],
                ],
                [
                    'question_text' => 'What is the correct spelling?',
                    'choices' => [
                        ['choice_text' => 'Necessary', 'is_correct' => true],
                        ['choice_text' => 'Necesary'],
                        ['choice_text' => 'Necassary'],
                        ['choice_text' => 'Nessesary'],
                    ],
                ],
                [
                    'question_text' => 'Identify the verb in this sentence: "He runs fast."',
                    'choices' => [
                        ['choice_text' => 'Runs', 'is_correct' => true],
                        ['choice_text' => 'Fast'],
                        ['choice_text' => 'He'],
                        ['choice_text' => 'None'],
                    ],
                ],

            ],
            'Maths' => [
                [
                    'question_text' => 'What is 5 + 3?',
                    'choices' => [
                        ['choice_text' => '8', 'is_correct' => true],
                        ['choice_text' => '7'],
                        ['choice_text' => '6'],
                        ['choice_text' => '9'],
                    ],
                ],
                [
                    'question_text' => 'What is the square root of 81?',
                    'choices' => [
                        ['choice_text' => '9', 'is_correct' => true],
                        ['choice_text' => '8'],
                        ['choice_text' => '7'],
                        ['choice_text' => '6'],
                    ],
                ],
                [
                    'question_text' => 'What is 12 × 6?',
                    'choices' => [
                        ['choice_text' => '72', 'is_correct' => true],
                        ['choice_text' => '62'],
                        ['choice_text' => '68'],
                        ['choice_text' => '70'],
                    ],
                ],
                [
                    'question_text' => 'What is 100 divided by 10?',
                    'choices' => [
                        ['choice_text' => '10', 'is_correct' => true],
                        ['choice_text' => '5'],
                        ['choice_text' => '20'],
                        ['choice_text' => '15'],
                    ],
                ],
                [
                    'question_text' => 'What is the value of π (pi) to two decimal places?',
                    'choices' => [
                        ['choice_text' => '3.14', 'is_correct' => true],
                        ['choice_text' => '3.41'],
                        ['choice_text' => '2.14'],
                        ['choice_text' => '3.13'],
                    ],
                ],
                [
                    'question_text' => 'What is 15% of 200?',
                    'choices' => [
                        ['choice_text' => '30', 'is_correct' => true],
                        ['choice_text' => '20'],
                        ['choice_text' => '15'],
                        ['choice_text' => '25'],
                    ],
                ],
                [
                    'question_text' => 'What is the next prime number after 7?',
                    'choices' => [
                        ['choice_text' => '11', 'is_correct' => true],
                        ['choice_text' => '9'],
                        ['choice_text' => '10'],
                        ['choice_text' => '12'],
                    ],
                ],
                [
                    'question_text' => 'What is the perimeter of a square with side 4 cm?',
                    'choices' => [
                        ['choice_text' => '16 cm', 'is_correct' => true],
                        ['choice_text' => '8 cm'],
                        ['choice_text' => '12 cm'],
                        ['choice_text' => '20 cm'],
                    ],
                ],
                [
                    'question_text' => 'How many degrees are in a right angle?',
                    'choices' => [
                        ['choice_text' => '90', 'is_correct' => true],
                        ['choice_text' => '180'],
                        ['choice_text' => '45'],
                        ['choice_text' => '60'],
                    ],
                ],
                [
                    'question_text' => 'What is 7²?',
                    'choices' => [
                        ['choice_text' => '49', 'is_correct' => true],
                        ['choice_text' => '42'],
                        ['choice_text' => '56'],
                        ['choice_text' => '36'],
                    ],
                ],

            ],
        ];

        $quizzes = [
            'Programming' => [
                'title' => 'Basic PHP Quiz',
                'description' => 'Test your fundamental PHP knowledge.',
                'created_by' => $admin->id,
            ],
            'Maths' => [
                'title' => 'Essential Maths Quiz',
                'description' => 'Challenge your basic arithmetic and geometry skills.',
                'created_by' => $admin->id,
            ],
            'Science' => [
                'title' => 'General Science Quiz',
                'description' => 'Explore basic concepts in biology, physics, and chemistry.',
                'created_by' => $admin->id,
            ],
            'Language' => [
                'title' => 'English Language Skills Quiz',
                'description' => 'Test your grammar, vocabulary, and sentence structure.',
                'created_by' => $admin->id,
            ],
        ];

        foreach ($categories as $category) {
            $quiz = Quiz::create([...$quizzes[$category->name], 'category_id' => $category->id]);

            QuizAssignment::create([
                'quiz_id' => $quiz->id,
                'user_id' => $user->id,
                'assigned_at' => now(),
            ]);

            foreach (array_slice($questions[$category->name], 0, 10) as $q) {

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
        }
    }
}
