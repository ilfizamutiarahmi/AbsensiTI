<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($x = 1; $x <= 3; $x++){
 
        	// insert data dummy pegawai dengan faker
        	Prodi::create([
        		'nama_prodi' => "Teknologi Rekayasa Perangkat Lunak",
        		'kaprodi' => "Defni",
        	]);
 
        }
    }
}
