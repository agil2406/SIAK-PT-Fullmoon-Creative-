<?php

namespace Database\Seeders;

use App\Models\Master;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Agil trieanto',
            'email' => 'agil@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => Carbon::now(),
            'level' => 'admin',
        ]);
        User::create([
            'name' => 'Noor Alamsyah',
            'email' => 'noor@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => Carbon::now(),
            'level' => 'supervisor',
        ]);
        User::create([
            'name' => 'Haidar Rahman',
            'email' => 'curry@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => Carbon::now(),
            'level' => 'direksi',
        ]);
        User::create([
            'name' => 'Lalu Farid',
            'email' => 'farid@gmail.com',
            'password' => Hash::make('12345678'),
            'email_verified_at' => Carbon::now(),
            'level' => 'lapangan',
        ]);
        Master::create([
            'barang' => 'penerimaan',
            'kode_barang' => 'PE/001',
            'jenisKas' => 'penerimaan',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
