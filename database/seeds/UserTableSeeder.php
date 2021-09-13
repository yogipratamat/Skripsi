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
            'password' => bcrypt('123456')
        ];

        $penyuluh = User::create($dataPenyuluh);
        $penyuluh->assignRole('penyuluh');

        // $dataAdmin = [
        //     'nama' => 'admin',
        //     'username' => 'admin',
        //     'no_hp' => '082349142532',
        //     'alamat' => 'surabi no7',
        //     'email' => 'admin@gmail.com',
        //     'jenis_kelamin' => 0,
        //     'password' => bcrypt('123456')
        // ];

        // $admin = User::create($dataAdmin);
        // $admin->assignRole('admin');

        // $dataPetani = [
        //     'nama' => 'petani',
        //     'username' => 'petani',
        //     'no_hp' => '082349142533',
        //     'alamat' => 'surabi kost',
        //     'email' => 'petani@gmail.com',
        //     'jenis_kelamin' => 1,
        //     'password' => bcrypt('123456')
        // ];

        // $petani = User::create($dataPetani);
        // $petani->assignRole('petani');
    }
}
