<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{

    public function run()
    {
        $user = new User();
        $user->name = 'wayne';
        $user->email = 'waynedemetra@gmail.com';
        $user->password = Hash::make('wayne1980');
        $user->department_id = 1;
        $user->is_admin = 1;
        $user->save();
    }
}
