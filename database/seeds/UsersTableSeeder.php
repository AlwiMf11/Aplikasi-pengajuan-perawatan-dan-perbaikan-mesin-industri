<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \App\User::create([
            'kd'  => 'user-001',
            'username'  => 'user',
            'email' => 'user@gmail.com',
            'level' => 'user',
            'password'  => bcrypt('user'),
            'password_asli'  =>'user',
        ]);
        \App\User::create([
            'kd'  => 'teknisi-001',
            'username'  => 'teknisi',
            'email' => 'teknisi@gmail.com',
            'level' => 'teknisi',
            'password'  => bcrypt('teknisi'),
            'password_asli'  =>'teknisi',
        ]);
        \App\User::create([
            'kd'  => 'admin-001',
            'username'  => 'admin',
            'email' => 'admin@gmail.com',
            'level' => 'admin',
            'password'  => bcrypt('admin'),
            'password_asli'  =>'admin',
        ]);

        \App\model\Divisi::create([
            'nama'  => 'Workshop',
        ]);
        \App\model\Tahun::create([
            'tahun'  => '2020',
        ]);
        \App\model\Periode::create([
            'tahun'  => '2020',
        ]);

      

    }
}
