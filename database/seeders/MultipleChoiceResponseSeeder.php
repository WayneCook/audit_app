<?php

namespace Database\Seeders;

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
        $response = new MultipleChoiceResponse();
        $response->multiple_choice_response_group_id = 1;
        $response->title = 'Pass';
        $response->color = '#008000';
        $response->value = 1;
        $response->save();

        $response = new MultipleChoiceResponse();
        $response->multiple_choice_response_group_id = 1;
        $response->title = 'Fail';
        $response->color = '#FF0000';
        $response->value = 0;
        $response->save();

        $response = new MultipleChoiceResponse();
        $response->multiple_choice_response_group_id = 1;
        $response->title = 'N/A';
        $response->color = '#808080';
        $response->value = 0;
        $response->save();

        //New group

        $response = new MultipleChoiceResponse();
        $response->multiple_choice_response_group_id = 2;
        $response->title = 'Compliant';
        $response->color = '#008000';
        $response->value = 1;
        $response->save();

        $response = new MultipleChoiceResponse();
        $response->multiple_choice_response_group_id = 2;
        $response->title = 'Non Compliant';
        $response->color = '#FF0000';
        $response->value = 0;
        $response->save();

        // New group

        $response = new MultipleChoiceResponse();
        $response->multiple_choice_response_group_id = 3;
        $response->title = 'Pass-cust';
        $response->color = '#008000';
        $response->value = 1;
        $response->save();

        $response = new MultipleChoiceResponse();
        $response->multiple_choice_response_group_id = 3;
        $response->title = 'Fail-cust';
        $response->color = '#FF0000';
        $response->value = 0;
        $response->save();

        $response = new MultipleChoiceResponse();
        $response->multiple_choice_response_group_id = 3;
        $response->title = 'N/A-cust';
        $response->color = '#808080';
        $response->value = 0;
        $response->save();

    }
}
