<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Audit;

class AuditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $audit = new Audit();
        $audit->title = 'internal';
        $audit->save();
    }
}
