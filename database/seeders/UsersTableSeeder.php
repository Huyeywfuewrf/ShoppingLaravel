<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        $adminRole = Roles::where('name', 'admin')->first();
        $authorRole = Roles::where('name', 'author')->first();
        $userRole = Roles::where('name', 'user')->first();

        $admin =   Admin::create([
            'admin_name' => 'huyadmin',
            'admin_email' => 'huyadmin1@gmail.com',
            'Phone' => '12345678',
            'admin_password' => md5('12345678')
        ]);
        $author =   Admin::create([
            'admin_name' => 'huyauthor',
            'admin_email' => 'huyauthor@gmail.com',
            'Phone' => '12345678',
            'admin_password' => md5('12345678')
        ]);
        $user =   Admin::create([
            'admin_name' => 'huyuser',
            'admin_email' => 'huyuser@gmail.com',
            'Phone' => '12345678',
            'admin_password' => md5('12345678')
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);


    }
}
