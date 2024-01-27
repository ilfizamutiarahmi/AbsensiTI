<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // data faker indonesia
        $faker = Faker::create('id_ID');
 
        // membuat data dummy sebanyak 10 record
        for($x = 1; $x <= 10; $x++){
 
        	// insert data dummy pegawai dengan faker
        	Mahasiswa::create([
        		'id_kelas' => "2",
        		'nim' => $faker->unique()->numerify('######'),
                'nama_mhs' => $faker->name,
                'jenis_kelamin' => $faker->randomElement(['male', 'female']),
                'no_telp'=> $faker->phoneNumber,
                'alamat'=> $faker->address,
        	]);
 
        }
    }
}
