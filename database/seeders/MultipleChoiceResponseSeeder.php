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



        //New group

        // $response = new MultipleChoiceResponse();
        // $response->multiple_choice_response_group_id = 2;
        // $response->title = 'Compliant';
        // $response->color = '#008000';
        // $response->value = 1;
        // $response->save();

        // $response = new MultipleChoiceResponse();
        // $response->multiple_choice_response_group_id = 2;
        // $response->title = 'Non Compliant';
        // $response->color = '#FF0000';
        // $response->value = 0;
        // $response->save();

        // New group

        // $response = new MultipleChoiceResponse();
        // $response->multiple_choice_response_group_id = 3;
        // $response->title = 'Pass-cust';
        // $response->color = '#008000';
        // $response->value = 1;
        // $response->save();

        // $response = new MultipleChoiceResponse();
        // $response->multiple_choice_response_group_id = 3;
        // $response->title = 'Fail-cust';
        // $response->color = '#FF0000';
        // $response->value = 0;
        // $response->save();

        // $response = new MultipleChoiceResponse();
        // $response->multiple_choice_response_group_id = 3;
        // $response->title = 'N/A-cust';
        // $response->color = '#808080';
        // $response->value = 0;
        // $response->save();

    }
}
