<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DepartmentUser;

class DepartmentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departmentUser = new DepartmentUser();
        $departmentUser->user_id = 1;
        $departmentUser->department_id = 1;
        $departmentUser->save();
    }
}
