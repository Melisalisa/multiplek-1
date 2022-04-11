<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create('id_ID');

        for ($i=0; $i < 10; $i++) {
            DB::table('laporan')->insert([
                'user_id' => $faker->randomElement([2,10]),
                'kategori_id' => $faker->randomElement([1,3]),
                'jumlah_pendapatan' => $faker->numerify('######'),
                'tanggal' => $faker->date(),
            ]);
        }
    }
}
