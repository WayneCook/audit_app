<?php

namespace Database\Seeders;

use App\Models\TemplateSection;
use Illuminate\Database\Seeder;
use App\Models\TemplateQuestion;


class TemplateSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        $section = new TemplateSection();
        $section->title = 'Template Title';
        $section->template_id = 1;
        $section->save();

        

        $section = new TemplateSection();
        $section->title = 'Backrooms';
        $section->template_id = 1;
        $section->save();

        $section = new TemplateSection();
        $section->title = 'Cash Room';
        $section->template_id = 1;
        $section->save();
        $section->questions()->save(new TemplateQuestion());

        

        $section = new TemplateSection();
        $section->title = 'Recieving area';
        $section->template_id = 1;
        $section->save();
        $section->questions()->save(new TemplateQuestion());
    }
}
