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
            'avatar' => '406.png'
        ]);

        $userTwo = User::create([
            'name' => 'waiyanlin',
            'email' => 'waiyanlin2991998@gmail.com',
            'password' => bcrypt('password'),
            'avatar' => '406.png'
        ]);

        $admin = User::create([
            'name' => 'example admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'avatar' => '406.png'
        ]);

        $admin->assignRole('admin');

        $categories = Category::insert([
            [
                'name' => 'プログラミング',
            ],
            [
                'name' => '数学',
            ],
            [
                'name' => '科学',
            ],
            [
                'name' => '言語',
            ],
        ]);

        $categories = Category::all();

        $questions = [
            'プログラミング' => [
                [
                    'question_text' => 'PHPは何の略ですか？',
                    'choices' => [
                        ['choice_text' => 'Personal Home Page', 'is_correct' => true],
                        ['choice_text' => 'Private Hypertext Processor'],
                        ['choice_text' => 'Professional Home Program'],
                        ['choice_text' => 'Programmer Hosted Platform'],
                    ],
                ],
                [
                    'question_text' => '次のうち、有効なPHP変数であるものはどれですか？',
                    'choices' => [
                        ['choice_text' => 'var name'],
                        ['choice_text' => '$name', 'is_correct' => true],
                        ['choice_text' => '&name'],
                        ['choice_text' => '#name'],
                    ],
                ],
                [
                    'question_text' => 'PHPでテキストを出力するために使用される関数は何ですか？',
                    'choices' => [
                        ['choice_text' => 'echo()', 'is_correct' => true],
                        ['choice_text' => 'printf()'],
                        ['choice_text' => 'printText()'],
                        ['choice_text' => 'display()'],
                    ],
                ],
                [
                    'question_text' => 'PHPで単一行コメントを書く方法を教えてください。',
                    'choices' => [
                        ['choice_text' => '// これはコメントです', 'is_correct' => true],
                        ['choice_text' => '# これはコメントです'],
                        ['choice_text' => '/* これはコメントです */'],
                        ['choice_text' => '-- これはコメントです'],
                    ],
                ],
                [
                    'question_text' => 'PHPブロックを開始する正しい方法は？',
                    'choices' => [
                        ['choice_text' => '<?php', 'is_correct' => true],
                        ['choice_text' => '<php>'],
                        ['choice_text' => '<?'],
                        ['choice_text' => '<script php>'],
                    ],
                ],
                [
                    'question_text' => 'PHPで文字列の長さを取得するために使用される関数は何ですか？',
                    'choices' => [
                        ['choice_text' => 'strlen()', 'is_correct' => true],
                        ['choice_text' => 'count()'],
                        ['choice_text' => 'size()'],
                        ['choice_text' => 'length()'],
                    ],
                ],
                [
                    'question_text' => 'あるPHPファイルの内容を別のファイルに含めるために使用される関数は何ですか？',
                    'choices' => [
                        ['choice_text' => 'include()', 'is_correct' => true],
                        ['choice_text' => 'import()'],
                        ['choice_text' => 'require_once()'],
                        ['choice_text' => 'load()'],
                    ],
                ],
                [
                    'question_text' => '`isset()`関数は何をしますか？',
                    'choices' => [
                        ['choice_text' => '変数が設定されており、NULLではないかチェックします', 'is_correct' => true],
                        ['choice_text' => '変数が空であるかチェックします'],
                        ['choice_text' => '変数の型をチェックします'],
                        ['choice_text' => '新しい変数を宣言します'],
                    ],
                ],
                [
                    'question_text' => 'PHPで定数を宣言する方法は？',
                    'choices' => [
                        ['choice_text' => "define('NAME', 'value');", 'is_correct' => true],
                        ['choice_text' => "const NAME = 'value'();"],
                        ['choice_text' => "NAME := 'value'"],
                        ['choice_text' => "let NAME = 'value'"],
                    ],
                ],
                [
                    'question_text' => 'POSTメソッドで送信されたフォームデータを保持するスーパーグローバル配列はどれですか？',
                    'choices' => [
                        ['choice_text' => '$_POST', 'is_correct' => true],
                        ['choice_text' => '$_GET'],
                        ['choice_text' => '$_REQUEST'],
                        ['choice_text' => '$_FORM'],
                    ],
                ],
                [
                    'question_text' => 'PHPは何の略ですか？ ()',
                    'choices' => [
                        ['choice_text' => 'Personal Home Page', 'is_correct' => true],
                        ['choice_text' => 'Private Hypertext Processor'],
                        ['choice_text' => 'Professional Home Program'],
                        ['choice_text' => 'Programmer Hosted Platform'],
                    ],
                ],
                [
                    'question_text' => '次のうち、有効なPHP変数であるものはどれですか？ ',
                    'choices' => [
                        ['choice_text' => 'var name'],
                        ['choice_text' => '$name', 'is_correct' => true],
                        ['choice_text' => '&name'],
                        ['choice_text' => '#name'],
                    ],
                ],
                [
                    'question_text' => 'PHPでテキストを出力するために使用される関数は何ですか？ ',
                    'choices' => [
                        ['choice_text' => 'echo()', 'is_correct' => true],
                        ['choice_text' => 'printf()'],
                        ['choice_text' => 'printText()'],
                        ['choice_text' => 'display()'],
                    ],
                ],
                [
                    'question_text' => 'PHPで単一行コメントを書く方法を教えてください。 ',
                    'choices' => [
                        ['choice_text' => '// これはコメントです', 'is_correct' => true],
                        ['choice_text' => ''],
                        ['choice_text' => '/* これはコメントです */'],
                        ['choice_text' => '-- これはコメントです'],
                    ],
                ],
                [
                    'question_text' => 'PHPブロックを開始する正しい方法は？ ',
                    'choices' => [
                        ['choice_text' => '<?php', 'is_correct' => true],
                        ['choice_text' => '<php>'],
                        ['choice_text' => '<?'],
                        ['choice_text' => '<script php>'],
                    ],
                ],
                [
                    'question_text' => 'PHPで文字列の長さを取得するために使用される関数は何ですか？ ',
                    'choices' => [
                        ['choice_text' => 'strlen()', 'is_correct' => true],
                        ['choice_text' => 'count()'],
                        ['choice_text' => 'size()'],
                        ['choice_text' => 'length()'],
                    ],
                ],
                [
                    'question_text' => 'あるPHPファイルの内容を別のファイルに含めるために使用される関数は何ですか？ ',
                    'choices' => [
                        ['choice_text' => 'include()', 'is_correct' => true],
                        ['choice_text' => 'import()'],
                        ['choice_text' => 'require_once()'],
                        ['choice_text' => 'load()'],
                    ],
                ],
                [
                    'question_text' => '`isset()`関数は何をしますか？ ',
                    'choices' => [
                        ['choice_text' => '変数が設定されており、NULLではないかチェックします', 'is_correct' => true],
                        ['choice_text' => '変数が空であるかチェックします'],
                        ['choice_text' => '変数の型をチェックします'],
                        ['choice_text' => '新しい変数を宣言します'],
                    ],
                ],
                [
                    'question_text' => 'PHPで定数を宣言する方法は？ ',
                    'choices' => [
                        ['choice_text' => "define('NAME', 'value');", 'is_correct' => true],
                        ['choice_text' => "const NAME = 'value'();"],
                        ['choice_text' => "NAME := 'value'"],
                        ['choice_text' => "let NAME = 'value'"],
                    ],
                ],
                [
                    'question_text' => 'POSTメソッドで送信されたフォームデータを保持するスーパーグローバル配列はどれですか？ ',
                    'choices' => [
                        ['choice_text' => '$_POST', 'is_correct' => true],
                        ['choice_text' => '$_GET'],
                        ['choice_text' => '$_REQUEST'],
                        ['choice_text' => '$_FORM'],
                    ],
                ],
                [
                    'question_text' => 'PHPは何の略ですか？ ',
                    'choices' => [
                        ['choice_text' => 'Personal Home Page', 'is_correct' => true],
                        ['choice_text' => 'Private Hypertext Processor'],
                        ['choice_text' => 'Professional Home Program'],
                        ['choice_text' => 'Programmer Hosted Platform'],
                    ],
                ],
                [
                    'question_text' => '次のうち、有効なPHP変数であるものはどれですか？ ',
                    'choices' => [
                        ['choice_text' => 'var name'],
                        ['choice_text' => '$name', 'is_correct' => true],
                        ['choice_text' => '&name'],
                        ['choice_text' => '#name'],
                    ],
                ],
                [
                    'question_text' => 'PHPでテキストを出力するために使用される関数は何ですか？ ',
                    'choices' => [
                        ['choice_text' => 'echo()', 'is_correct' => true],
                        ['choice_text' => 'printf()'],
                        ['choice_text' => 'printText()'],
                        ['choice_text' => 'display()'],
                    ],
                ],
                [
                    'question_text' => 'PHPで単一行コメントを書く方法を教えてください。 ',
                    'choices' => [
                        ['choice_text' => '// これはコメントです', 'is_correct' => true],
                        ['choice_text' => ''],
                        ['choice_text' => '/* これはコメントです */'],
                        ['choice_text' => '-- これはコメントです'],
                    ],
                ],
                [
                    'question_text' => 'PHPブロックを開始する正しい方法は？ ',
                    'choices' => [
                        ['choice_text' => '<?php', 'is_correct' => true],
                        ['choice_text' => '<php>'],
                        ['choice_text' => '<?'],
                        ['choice_text' => '<script php>'],
                    ],
                ],
                [
                    'question_text' => 'PHPで文字列の長さを取得するために使用される関数は何ですか？ ',
                    'choices' => [
                        ['choice_text' => 'strlen()', 'is_correct' => true],
                        ['choice_text' => 'count()'],
                        ['choice_text' => 'size()'],
                        ['choice_text' => 'length()'],
                    ],
                ],
                [
                    'question_text' => 'あるPHPファイルの内容を別のファイルに含めるために使用される関数は何ですか？ ',
                    'choices' => [
                        ['choice_text' => 'include()', 'is_correct' => true],
                        ['choice_text' => 'import()'],
                        ['choice_text' => 'require_once()'],
                        ['choice_text' => 'load()'],
                    ],
                ],
                [
                    'question_text' => '`isset()`関数は何をしますか？ ',
                    'choices' => [
                        ['choice_text' => '変数が設定されており、NULLではないかチェックします', 'is_correct' => true],
                        ['choice_text' => '変数が空であるかチェックします'],
                        ['choice_text' => '変数の型をチェックします'],
                        ['choice_text' => '新しい変数を宣言します'],
                    ],
                ],
                [
                    'question_text' => 'PHPで定数を宣言する方法は？ ',
                    'choices' => [
                        ['choice_text' => "define('NAME', 'value');", 'is_correct' => true],
                        ['choice_text' => "const NAME = 'value'();"],
                        ['choice_text' => "NAME := 'value'"],
                        ['choice_text' => "let NAME = 'value'"],
                    ],
                ],
                [
                    'question_text' => 'POSTメソッドで送信されたフォームデータを保持するスーパーグローバル配列はどれですか？ ',
                    'choices' => [
                        ['choice_text' => '$_POST', 'is_correct' => true],
                        ['choice_text' => '$_GET'],
                        ['choice_text' => '$_REQUEST'],
                        ['choice_text' => '$_FORM'],
                    ],
                ],
                [
                    'question_text' => 'PHPは何の略ですか？ ',
                    'choices' => [
                        ['choice_text' => 'Personal Home Page', 'is_correct' => true],
                        ['choice_text' => 'Private Hypertext Processor'],
                        ['choice_text' => 'Professional Home Program'],
                        ['choice_text' => 'Programmer Hosted Platform'],
                    ],
                ],
                [
                    'question_text' => '次のうち、有効なPHP変数であるものはどれですか？ ',
                    'choices' => [
                        ['choice_text' => 'var name'],
                        ['choice_text' => '$name', 'is_correct' => true],
                        ['choice_text' => '&name'],
                        ['choice_text' => '#name'],
                    ],
                ],
                [
                    'question_text' => 'PHPでテキストを出力するために使用される関数は何ですか？ ',
                    'choices' => [
                        ['choice_text' => 'echo()', 'is_correct' => true],
                        ['choice_text' => 'printf()'],
                        ['choice_text' => 'printText()'],
                        ['choice_text' => 'display()'],
                    ],
                ],
                [
                    'question_text' => 'PHPで単一行コメントを書く方法を教えてください。 ',
                    'choices' => [
                        ['choice_text' => '// これはコメントです', 'is_correct' => true],
                        ['choice_text' => ''],
                        ['choice_text' => '/* これはコメントです */'],
                        ['choice_text' => '-- これはコメントです'],
                    ],
                ],
                [
                    'question_text' => 'PHPブロックを開始する正しい方法は？ ',
                    'choices' => [
                        ['choice_text' => '<?php', 'is_correct' => true],
                        ['choice_text' => '<php>'],
                        ['choice_text' => '<?'],
                        ['choice_text' => '<script php>'],
                    ],
                ],
                [
                    'question_text' => 'PHPで文字列の長さを取得するために使用される関数は何ですか？ ',
                    'choices' => [
                        ['choice_text' => 'strlen()', 'is_correct' => true],
                        ['choice_text' => 'count()'],
                        ['choice_text' => 'size()'],
                        ['choice_text' => 'length()'],
                    ],
                ],
                [
                    'question_text' => 'あるPHPファイルの内容を別のファイルに含めるために使用される関数は何ですか？ ',
                    'choices' => [
                        ['choice_text' => 'include()', 'is_correct' => true],
                        ['choice_text' => 'import()'],
                        ['choice_text' => 'require_once()'],
                        ['choice_text' => 'load()'],
                    ],
                ],
                [
                    'question_text' => '`isset()`関数は何をしますか？ ',
                    'choices' => [
                        ['choice_text' => '変数が設定されており、NULLではないかチェックします', 'is_correct' => true],
                        ['choice_text' => '変数が空であるかチェックします'],
                        ['choice_text' => '変数の型をチェックします'],
                        ['choice_text' => '新しい変数を宣言します'],
                    ],
                ],
                [
                    'question_text' => 'PHPで定数を宣言する方法は？ ',
                    'choices' => [
                        ['choice_text' => "define('NAME', 'value');", 'is_correct' => true],
                        ['choice_text' => "const NAME = 'value'();"],
                        ['choice_text' => "NAME := 'value'"],
                        ['choice_text' => "let NAME = 'value'"],
                    ],
                ],
                [
                    'question_text' => 'POSTメソッドで送信されたフォームデータを保持するスーパーグローバル配列はどれですか？ ',
                    'choices' => [
                        ['choice_text' => '$_POST', 'is_correct' => true],
                        ['choice_text' => '$_GET'],
                        ['choice_text' => '$_REQUEST'],
                        ['choice_text' => '$_FORM'],
                    ],
                ],
            ],
            '科学' => [
                [
                    'question_text' => '水の化学記号は何ですか？',
                    'choices' => [
                        ['choice_text' => 'H2O', 'is_correct' => true],
                        ['choice_text' => 'O2'],
                        ['choice_text' => 'CO2'],
                        ['choice_text' => 'HO2'],
                    ],
                ],
                [
                    'question_text' => '「赤い惑星」として知られている惑星は何ですか？',
                    'choices' => [
                        ['choice_text' => '火星', 'is_correct' => true],
                        ['choice_text' => '金星'],
                        ['choice_text' => '木星'],
                        ['choice_text' => '土星'],
                    ],
                ],
                [
                    'question_text' => '植物のどの部分が光合成を行いますか？',
                    'choices' => [
                        ['choice_text' => '葉', 'is_correct' => true],
                        ['choice_text' => '根'],
                        ['choice_text' => '茎'],
                        ['choice_text' => '花'],
                    ],
                ],
                [
                    'question_text' => '植物が大気から吸収するガスは何ですか？',
                    'choices' => [
                        ['choice_text' => '二酸化炭素', 'is_correct' => true],
                        ['choice_text' => '酸素'],
                        ['choice_text' => '窒素'],
                        ['choice_text' => '水素'],
                    ],
                ],
                [
                    'question_text' => '太陽系にはいくつの惑星がありますか？',
                    'choices' => [
                        ['choice_text' => '8', 'is_correct' => true],
                        ['choice_text' => '9'],
                        ['choice_text' => '7'],
                        ['choice_text' => '10'],
                    ],
                ],
                [
                    'question_text' => '私たちを地面に引き留める力は何ですか？',
                    'choices' => [
                        ['choice_text' => '重力', 'is_correct' => true],
                        ['choice_text' => '磁力'],
                        ['choice_text' => '摩擦'],
                        ['choice_text' => '電気'],
                    ],
                ],
                [
                    'question_text' => '体中に血液を送り出す臓器は何ですか？',
                    'choices' => [
                        ['choice_text' => '心臓', 'is_correct' => true],
                        ['choice_text' => '肺'],
                        ['choice_text' => '肝臓'],
                        ['choice_text' => '腎臓'],
                    ],
                ],
                [
                    'question_text' => '人間の呼吸に不可欠なガスは何ですか？',
                    'choices' => [
                        ['choice_text' => '酸素', 'is_correct' => true],
                        ['choice_text' => '二酸化炭素'],
                        ['choice_text' => '水素'],
                        ['choice_text' => '窒素'],
                    ],
                ],
                [
                    'question_text' => '海面での水の沸点は何ですか？',
                    'choices' => [
                        ['choice_text' => '100°C', 'is_correct' => true],
                        ['choice_text' => '90°C'],
                        ['choice_text' => '80°C'],
                        ['choice_text' => '120°C'],
                    ],
                ],
                [
                    'question_text' => '血液をろ過する役割を果たす臓器は何ですか？',
                    'choices' => [
                        ['choice_text' => '腎臓', 'is_correct' => true],
                        ['choice_text' => '肺'],
                        ['choice_text' => '心臓'],
                        ['choice_text' => '胃'],
                    ],
                ],
            ],
            '言語' => [
                [
                    'question_text' => '"happy" の同義語は次のうちどれですか？',
                    'choices' => [
                        ['choice_text' => 'Joyful', 'is_correct' => true],
                        ['choice_text' => 'Sad'],
                        ['choice_text' => 'Angry'],
                        ['choice_text' => 'Tired'],
                    ],
                ],
                [
                    'question_text' => '名詞である単語はどれですか？',
                    'choices' => [
                        ['choice_text' => 'Apple', 'is_correct' => true],
                        ['choice_text' => 'Run'],
                        ['choice_text' => 'Quickly'],
                        ['choice_text' => 'Blue'],
                    ],
                ],
                [
                    'question_text' => '"go" の正しい過去形を選びなさい:',
                    'choices' => [
                        ['choice_text' => 'Went', 'is_correct' => true],
                        ['choice_text' => 'Goes'],
                        ['choice_text' => 'Gone'],
                        ['choice_text' => 'Going'],
                    ],
                ],
                [
                    'question_text' => '"child" の複数形は何ですか？',
                    'choices' => [
                        ['choice_text' => 'Children', 'is_correct' => true],
                        ['choice_text' => 'Childs'],
                        ['choice_text' => 'Childes'],
                        ['choice_text' => 'Childer'],
                    ],
                ],
                [
                    'question_text' => '次の文で句読点が正しく打たれているのはどれですか？',
                    'choices' => [
                        ['choice_text' => 'She said, "I am happy."', 'is_correct' => true],
                        ['choice_text' => 'She said "I am happy".'],
                        ['choice_text' => 'She said I am happy.'],
                        ['choice_text' => 'She, said "I am happy".'],
                    ],
                ],
                [
                    'question_text' => '"strong" の反義語は何ですか？',
                    'choices' => [
                        ['choice_text' => 'Weak', 'is_correct' => true],
                        ['choice_text' => 'Tall'],
                        ['choice_text' => 'Heavy'],
                        ['choice_text' => 'Brave'],
                    ],
                ],
                [
                    'question_text' => '形容詞である単語はどれですか？',
                    'choices' => [
                        ['choice_text' => 'Beautiful', 'is_correct' => true],
                        ['choice_text' => 'Run'],
                        ['choice_text' => 'Happily'],
                        ['choice_text' => 'Silence'],
                    ],
                ],
                [
                    'question_text' => '未来形の文はどれですか？',
                    'choices' => [
                        ['choice_text' => 'I will go to school tomorrow.', 'is_correct' => true],
                        ['choice_text' => 'I went to school.'],
                        ['choice_text' => 'I am going to school.'],
                        ['choice_text' => 'I go to school.'],
                    ],
                ],
                [
                    'question_text' => '正しいスペルはどれですか？',
                    'choices' => [
                        ['choice_text' => 'Necessary', 'is_correct' => true],
                        ['choice_text' => 'Necesary'],
                        ['choice_text' => 'Necassary'],
                        ['choice_text' => 'Nessesary'],
                    ],
                ],
                [
                    'question_text' => '次の文の動詞を特定しなさい: "He runs fast."',
                    'choices' => [
                        ['choice_text' => 'Runs', 'is_correct' => true],
                        ['choice_text' => 'Fast'],
                        ['choice_text' => 'He'],
                        ['choice_text' => 'None'],
                    ],
                ],
            ],
            '数学' => [
                [
                    'question_text' => '5 + 3 はいくつですか？',
                    'choices' => [
                        ['choice_text' => '8', 'is_correct' => true],
                        ['choice_text' => '7'],
                        ['choice_text' => '6'],
                        ['choice_text' => '9'],
                    ],
                ],
                [
                    'question_text' => '81の平方根は何ですか？',
                    'choices' => [
                        ['choice_text' => '9', 'is_correct' => true],
                        ['choice_text' => '8'],
                        ['choice_text' => '7'],
                        ['choice_text' => '6'],
                    ],
                ],
                [
                    'question_text' => '12 × 6 はいくつですか？',
                    'choices' => [
                        ['choice_text' => '72', 'is_correct' => true],
                        ['choice_text' => '62'],
                        ['choice_text' => '68'],
                        ['choice_text' => '70'],
                    ],
                ],
                [
                    'question_text' => '100を10で割るといくつですか？',
                    'choices' => [
                        ['choice_text' => '10', 'is_correct' => true],
                        ['choice_text' => '5'],
                        ['choice_text' => '20'],
                        ['choice_text' => '15'],
                    ],
                ],
                [
                    'question_text' => '円周率（π）の小数点以下2桁までの値は何ですか？',
                    'choices' => [
                        ['choice_text' => '3.14', 'is_correct' => true],
                        ['choice_text' => '3.41'],
                        ['choice_text' => '2.14'],
                        ['choice_text' => '3.13'],
                    ],
                ],
                [
                    'question_text' => '200の15%は何ですか？',
                    'choices' => [
                        ['choice_text' => '30', 'is_correct' => true],
                        ['choice_text' => '20'],
                        ['choice_text' => '15'],
                        ['choice_text' => '25'],
                    ],
                ],
                [
                    'question_text' => '7の次の素数は何ですか？',
                    'choices' => [
                        ['choice_text' => '11', 'is_correct' => true],
                        ['choice_text' => '9'],
                        ['choice_text' => '10'],
                        ['choice_text' => '12'],
                    ],
                ],
                [
                    'question_text' => '一辺が4cmの正方形の周囲は何ですか？',
                    'choices' => [
                        ['choice_text' => '16 cm', 'is_correct' => true],
                        ['choice_text' => '8 cm'],
                        ['choice_text' => '12 cm'],
                        ['choice_text' => '20 cm'],
                    ],
                ],
                [
                    'question_text' => '直角は何度の角度ですか？',
                    'choices' => [
                        ['choice_text' => '90', 'is_correct' => true],
                        ['choice_text' => '180'],
                        ['choice_text' => '45'],
                        ['choice_text' => '60'],
                    ],
                ],
                [
                    'question_text' => '7² はいくつですか？',
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
            'プログラミング' => [
                'title' => 'PHPの基礎クイズ',
                'description' => 'PHPの基本的な知識を試しましょう。',
                'created_by' => $admin->id,
            ],
            '数学' => [
                'title' => '必須数学クイズ',
                'description' => '基本的な算数と幾何学のスキルに挑戦しましょう。',
                'created_by' => $admin->id,
            ],
            '科学' => [
                'title' => '一般科学クイズ',
                'description' => '生物学、物理学、化学の基本的な概念を探求しましょう。',
                'created_by' => $admin->id,
            ],
            '言語' => [
                'title' => '英語スキルクイズ',
                'description' => '文法、語彙、文の構造をテストしましょう。',
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
