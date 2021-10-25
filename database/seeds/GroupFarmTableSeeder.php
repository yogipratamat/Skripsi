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
            'name' => 'Gapoktan',
            'phone' => '082349142532',
            'vision' => 'Lorem Ipsum',
            'mission' => 'Ipsum Lorem'
        ];

        $groupFarm = GroupFarm::create($dataFarm);

        $dataUser = [
            'email' => 'gapoktan@gmail.com',
            'name'  => 'Yogi Admin Indotani',
            'password' => bcrypt('123456')
        ];

        $user = User::create($dataUser);
        $user->assignRole('admin');

        $dataFarmer = [
            'name' => 'Yogi',
            'land_area' => '100',
            'phone' => '082349142533',
            'address' => 'Kapidi',
            'gender' => '1',
            'email' => 'yogi@gmail.com',
            // 'user_id' => $user->id_user,
            'id_user' => $user->id_user,
            // 'group_farm_id' => $groupFarm->id_group_farm,
            'id_group_farm' => $groupFarm->id_group_farm,
        ];

        $farmer = Farmer::create($dataFarmer);
    }
}
