<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       DB::table('admin')->insert([
        'admin_username'=>'superadmin',
        'password'=>Hash::make('superadmin'),
        'admin_email'=>'superadmin@gmail.com',
        'admin_phone'=>'0395342134',
        'admin_image'=>'avt_default.png',
        'admin_type'=>1,
        'is_active'=>1,
        'is_deleted'=>0,
         'created_at'=>time(),
       ]);
        DB::table('admin_location')->insert([
            'admin_id'=>1,
            'admin_address'=>'33 Xô viết nghệ tĩnh',
        ]);
    }
}
