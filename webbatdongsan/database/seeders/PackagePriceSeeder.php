<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PackagePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('package_price')->updateOrInsert(
            ['id' => 1],  // Điều kiện để tìm hàng cần cập nhật, ở đây là hàng có id = 1
            [
                'price' => 10,           // Giá trị mới cho cột 'price'
                'price_vip' => 15,       // Giá trị mới cho cột 'price_vip'
                'time_vip' => 86400,     // Giá trị mới cho cột 'time_vip'
                'price_project' => 120   // Giá trị mới cho cột 'price_project'
            ]
        );
    }
}
