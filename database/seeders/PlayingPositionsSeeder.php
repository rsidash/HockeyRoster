<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayingPositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            ['name_en' => 'Goaltender', 'name_ru' => 'Вратарь'],
            ['name_en' => 'Defenseman', 'name_ru' => 'Защитник'],
            ['name_en' => 'Left winger', 'name_ru' => 'Левый нападающий'],
            ['name_en' => 'Right winger', 'name_ru' => 'Правый нападающий'],
            ['name_en' => 'Center forward', 'name_ru' => 'Центральны нападающий'],
        ];

        foreach ($positions as $position)
        {
            $position['created_at'] = Carbon::now();
            $position['updated_at'] = Carbon::now();

            DB::table('playing_positions')->insert($position);
        }
    }
}
