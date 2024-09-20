<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group')->insert([
            'group_name' => 'Tài nguyên',
            'group_url' => 'tai-nguyen',
            'parent_id' =>26,
            'group_type'=>3,
            'is_deleted'=>0,
        ]);
    }
}
