<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staffRoles = [
            ['name_en' => 'Coach', 'name_ru' => 'Тренер'],
            ['name_en' => 'Manager', 'name_ru' => 'Менеджер'],
        ];

        foreach ($staffRoles as $staffRole)
        {
            $staffRole['created_at'] = Carbon::now();
            $staffRole['updated_at'] = Carbon::now();

            DB::table('staff_roles')->insert($staffRole);
        }
    }
}
