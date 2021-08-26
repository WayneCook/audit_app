<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\TemplateQuestion;

class TemplateQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = new TemplateQuestion();
        $question->question = 'Conducted by?';
        $question->template_section_id = 1;
        $question->save();

        $question = new TemplateQuestion();
        $question->question = 'date?';
        $question->template_section_id = 1;
        $question->save();

        $question = new TemplateQuestion();
        $question->question = 'Location';
        $question->template_section_id = 1;
        $question->save();

        //seed another section

        $question = new TemplateQuestion();
        $question->question = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        $question->template_section_id = 2;
        $question->save();

        $question = new TemplateQuestion();
        $question->question = 'trash empty?';
        $question->template_section_id = 2;
        $question->save();

        $question = new TemplateQuestion();
        $question->question = 'Water shut off?';
        $question->template_section_id = 2;
        $question->save();


    }
}
