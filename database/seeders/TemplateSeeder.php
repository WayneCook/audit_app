<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template;

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
    }
}
