<?php

namespace Database\Seeders;

use App\Models\Template;
use App\Models\TemplateSection;
use Illuminate\Database\Seeder;
use App\Models\TemplateQuestion;
use App\Models\MultipleChoiceResponse;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    
        $template = new Template();
        $template->title = 'LP Audit';
        $template->description = 'This is the loss prevention audit';
        $template->user_id = 1;
        $template->save();

    //     $availableResponse = new AvailableResponse();
    //     $availableResponse->template()->associate($template)->save();

    //     $multiGroup = new MultipleChoiceResponseGroup();
    //     $multiGroup->availableResponse()->associate($availableResponse)->save();
    //     $multiGroup->availableResponses()->save($availableResponse); 

    //     $multiGroup->responses()->createMany([
    //       ['title' => 'Pass', 'color' => '#008000', 'value' => 1],
    //       ['title' => 'Fail', 'color' => '#FF0000', 'value' => 0],
    //       ['title' => 'N/A', 'color' => '#808080', 'value' => 0],
    //     ]);

    //     $availableResponseTwo = new AvailableResponse();
    //     $availableResponseTwo->template()->associate($template)->save();

    //     $multiGroup = new MultipleChoiceResponseGroup();
    //     $multiGroup->availableResponse()->associate($availableResponseTwo)->save();
    //     $multiGroup->availableResponses()->save($availableResponseTwo); 

    //     $multiGroup->responses()->createMany([
    //       ['title' => 'compliant', 'color' => '#008000', 'value' => 1],
    //       ['title' => 'non compliant', 'color' => '#FF0000', 'value' => 0],
    //     ]);


        
    //     $section = new TemplateSection();
    //     $section->title = 'Template Title';
    //     $section->template()->associate($template)->save();
        
    //     $question = new TemplateQuestion();
    //     $question->question = 'Conducted by?';
    //     $question->templateSection()->associate($section);
    //     $question->availableResponse()->associate($availableResponse);
    //     $question->save();

    }
}
