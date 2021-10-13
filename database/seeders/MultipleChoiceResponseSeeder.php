<?php

namespace Database\Seeders;

use App\Models\ResponseType;
use Illuminate\Database\Seeder;
use App\Models\MultipleChoiceResponse;

class MultipleChoiceResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $type = new ResponseType();
      $type->type = 'multiple_choice';
      $type->description = 'multiple choice response';
      $type->template_id = 1;
      $type->save();

        
        $response = new MultipleChoiceResponse();
        $response->title = 'Pass';
        $response->color = '#008000';
        $response->value = 1;
        $response->responseType()->associate($type)->save();

        $response = new MultipleChoiceResponse();
        $response->title = 'Fail';
        $response->color = '#FF0000';
        $response->value = 0;
        $response->responseType()->associate($type)->save();

        $response = new MultipleChoiceResponse();
        $response->title = 'N/A';
        $response->color = '#808080';
        $response->value = 0;
        $response->responseType()->associate($type)->save();

        $type = new ResponseType();
        $type->type = 'multiple_choice';
        $type->description = 'multiple choice response';
        $type->template_id = 1;
        $type->save();

        $response = new MultipleChoiceResponse();
        $response->title = 'compliant';
        $response->color = '#008000';
        $response->value = 1;
        $response->responseType()->associate($type)->save();

        $response = new MultipleChoiceResponse();
        $response->title = 'non-compliant';
        $response->color = '#FF0000';
        $response->value = 0;
        $response->responseType()->associate($type)->save();

        $response = new MultipleChoiceResponse();
        $response->title = 'not-available';
        $response->color = '#808080';
        $response->value = 0;
        $response->responseType()->associate($type)->save();

        //New group

    

    }
}
