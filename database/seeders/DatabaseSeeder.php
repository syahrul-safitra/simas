<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::create([
            'name' => 'Kasubag',
            'status' => 'kasubag',
            'level' => 'master',
            'email' => 'kasubag@gmail.com',
            'password' => 'kasubag12'
        ]);

        \App\Models\User::create([
            'name' => 'Staff',
            'status' => 'staff',
            'level' => 'master',
            'email' => 'staff@gmail.com',
            'password' => 'staff12'
        ]);

        \App\Models\User::create([
            'name' => 'Dekan',
            'status' => 'dekan',
            'level' => 'pengguna',
            'email' => 'dekan@gmail.com',
            'password' => 'dekan12'
        ]);

        \App\Models\User::create([
            'name' => 'Wakil Dekan Bidang Akademik dan Kemahasiswaan',
            'status' => 'wd-1',
            'level' => 'pengguna',
            'email' => 'wdbak@gmail.com',
            'password' => 'wdbak12'
        ]);
        \App\Models\User::create([
            'name' => 'Wakil Dekan Bidang Keuangan dan Umum',
            'status' => 'wd-2',
            'level' => 'pengguna',
            'email' => 'wakildekan2@gmail.com',
            'password' => 'wdbku12'
        ]);
        \App\Models\User::create([
            'name' => 'Prodi Sistem Informasi',
            'status' => 'prodi-si',
            'level' => 'pengguna',
            'email' => 'prodisi@gmail.com',
            'password' => 'prodisi12'
        ]);
        \App\Models\User::create([
            'name' => 'Prodi Biologi',
            'status' => 'prodi-biologi',
            'level' => 'pengguna',
            'email' => 'prodibiologi@gmail.com',
            'password' => 'prodibiologi12'
        ]);
        \App\Models\User::create([
            'name' => 'Prodi Fisika',
            'status' => 'prodi-fisika',
            'level' => 'pengguna',
            'email' => 'prodifisika@gmail.com',
            'password' => 'prodifisika12'
        ]);
        \App\Models\User::create([
            'name' => 'Prodi Kimia',
            'status' => 'prodi-kimia',
            'level' => 'pengguna',
            'email' => 'prodikimia@gmail.com',
            'password' => 'prodikimia12'
        ]);
        \App\Models\User::create([
            'name' => 'Prodi Arsitekur',
            'status' => 'prodi-arsitektur',
            'level' => 'pengguna',
            'email' => 'prodiarsitektur@gmail.com',
            'password' => 'prodiarsitektur12'
        ]);
        \App\Models\User::create([
            'name' => 'Prodi Statistika',
            'status' => 'prodi-statistika',
            'level' => 'pengguna',
            'email' => 'prodistatistika@gmail.com',
            'password' => 'prodistatistika12'
        ]);
        \App\Models\User::create([
            'name' => 'Laboratorium',
            'status' => 'laboratorium',
            'level' => 'pengguna',
            'email' => 'laboratorium@gmail.com',
            'password' => 'laboratorium12'
        ]);
    }
}
