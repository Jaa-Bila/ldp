<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PartcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id');
        for ($i=1; $i<5; $i++){
            DB::table('partcs')->insert([
                'name' => $faker->name,
                'id_batch' => '1',
                'batch_name' => '09121201',
                'ttl' => $faker->date('d-m-y', 'now'),
                'nik' => $faker->randomNumber(9, true),
                'pddk' => 'D3',
                'id_itn' => '13',
                'itn_name' => 'PT. Kartika Jaya',
                'notel' => $faker->randomNumber(9, true),
                'email' => $faker->email(),
                'size' => 'S',
                'addr' => $faker->address()
            ]);
        }
    }
}
