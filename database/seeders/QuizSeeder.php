<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Choice;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizAssignment;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        Role::create([ 'name' => 'admin']);

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
                ]
            ],
            [
                'question_text' => 'Which of the following is a PHP variable?',
                'choices' => [
                    ['choice_text' => 'var name'],
                    ['choice_text' => '$name', 'is_correct' => true],
                    ['choice_text' => '&name'],
                    ['choice_text' => '#name'],
                ]
            ],
            [
                'question_text' => 'Which function is used to output text in PHP?',
                'choices' => [
                    ['choice_text' => 'echo()', 'is_correct' => true],
                    ['choice_text' => 'printf()'],
                    ['choice_text' => 'printText()'],
                    ['choice_text' => 'display()'],
                ]
            ],
        ];

        foreach ($questions as $q) {
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
            'password' => bcrypt('password')
        ]);

        QuizAssignment::create([
            'quiz_id' => $quiz->id,
            'user_id' => $user->id,
            'assigned_at' =>  now(),
        ]);
    }
}
