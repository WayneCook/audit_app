<?php

namespace Database\Seeders;

use App\Models\CustomResponse;
use Illuminate\Database\Seeder;

class CustomResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $response = new CustomResponse();
        $response->custom_response_group_id = 1;
        $response->title = 'Pass';
        $response->color = '#00FFFF';
        $response->value = 1;
        $response->save();

        $response = new CustomResponse();
        $response->custom_response_group_id = 1;
        $response->title = 'Fail';
        $response->color = '#FF00FF';
        $response->value = 0;
        $response->save();

        $response = new CustomResponse();
        $response->custom_response_group_id = 1;
        $response->title = 'N/A';
        $response->color = '#808080';
        $response->value = 0;
        $response->save();

        //New group

        $response = new CustomResponse();
        $response->custom_response_group_id = 2;
        $response->title = 'Compliant';
        $response->color = '#00FF00';
        $response->value = 1;
        $response->save();

        $response = new CustomResponse();
        $response->custom_response_group_id = 2;
        $response->title = 'Non Compliant';
        $response->color = '#FF0000';
        $response->value = 0;
        $response->save();
    }
}
