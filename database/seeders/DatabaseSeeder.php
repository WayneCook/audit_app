<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CustomResponseSeeder;
use Database\Seeders\CustomResponseGroupSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(DepartmentSeeder::class);
        $this->call(AuditSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DepartmentUserSeeder::class);
        $this->call(TemplateSeeder::class);
        $this->call(TemplateSectionSeeder::class);
        $this->call(TemplateQuestionSeeder::class);
        $this->call(ResponseTypeSeeder::class);
 
    }
}
