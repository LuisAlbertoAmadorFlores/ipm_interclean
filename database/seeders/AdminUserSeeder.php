<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Soporte & TI',
            'email' => 'soporte@nxg.com.mx',
            'password' => '$2y$10$YJT2x2dWCKP/HgRnn/rDdeko6w7WRFeFxZOg4/J1t4f1HPRKn9FtS',
            'status' => '0',
            'rol' => 'Sistemas',
            'update_password' => '1'
        ]);
    }
}
