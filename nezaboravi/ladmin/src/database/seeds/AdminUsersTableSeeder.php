<?php
use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Nezaboravi\Ladmin\Admin::create([
            'first_name' => 'First',
            'last_name' => 'Admin',
            'id' => 101,
            'email'=> 'admin@ladmin.com',
            'password'=>  Hash::make('ladmin')
        ]);
    }
}
