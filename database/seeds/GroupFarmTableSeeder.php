<?php

use App\Models\Farmer;
use App\Models\GroupFarm;
use App\User;
use Illuminate\Database\Seeder;

class GroupFarmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataFarm = [
            'name' => 'Idotani',
            'phone' => '082349142532',
            'vision' => 'Lorem Ipsum',
            'mission' => 'Ipsum Lorem'
        ];

        $groupFarm = GroupFarm::create($dataFarm);

        $dataUser = [
            'email' => 'yogi@gmail.com',
            'name'  => 'yogi',
            'password' => bcrypt('123456')
        ];

        $user = User::create($dataUser);
        $user->assignRole('admin');

        $dataFarmer = [
            'name' => 'yogi',
            'land_area' => '100',
            'phone' => '082349142533',
            'address' => 'Kapidi',
            'gender' => '1',
            'email' => 'yogi@gmail.com',
            'user_id' => $user->id,
            'group_farm_id' => $groupFarm->id,
        ];

        $farmer = Farmer::create($dataFarmer);
    }
}
