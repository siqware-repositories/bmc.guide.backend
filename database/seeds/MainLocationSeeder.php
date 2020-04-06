<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('main_locations')->insert([
            'name' => 'Talk2',
            'location' => '13.5856128,102.9519886',
            'location_url' => 'https://www.google.com/maps/place/%E1%9E%9F%E1%9F%92%E1%9E%90%E1%9E%B6%E1%9E%93%E1%9E%B8%E1%9E%99%E1%9F%8D%E2%80%8B%E1%9E%94%E1%9F%92%E1%9E%9A%E1%9F%81%E1%9E%84%E2%80%8B%E1%9E%A5%E1%9E%93%E1%9F%92%E1%9E%91%E1%9F%88%E2%80%8B%E1%9E%8F%E1%9F%81%E1%9E%9B%E1%9E%B6/@13.5856128,102.9519886,15z/data=!4m5!3m4!1s0x311ae77a0c5e1179:0xe3231e1c5e6d35ad!8m2!3d13.585352!4d102.9365569',
        ]);
    }
}
