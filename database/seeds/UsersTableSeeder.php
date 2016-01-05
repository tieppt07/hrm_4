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
        factory(App\Models\User::class)->create([
            'name' => 'HRM Administrator',
            'email' => 'admin@hrm.com',
            'role' => 1,
        ]);
        $me = factory(App\Models\User::class)->create([
            'name' => 'Phung Xuan Tiep',
            'email' => 'xuantiep.pt2012@gmail.com',
            'role' => 1,
        ]);
        factory(App\Models\User::class, 2000)->create()->make();
    }
}
