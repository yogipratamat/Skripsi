<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataPenyuluh = [
            'email' => 'penyuluh@gmail.com',
            'name'  =>  'yogi',
            'password' => bcrypt('123456')
        ];

        $penyuluh = User::create($dataPenyuluh);
        $penyuluh->assignRole('penyuluh');
    }
}
