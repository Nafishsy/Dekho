<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $arr=array("Active","Inactive","Banned");
        $bool=array(TRUE,FALSE);
        for($i=1;$i<=1000;$i++){

            DB::table('customers')->insert([
                'payement' => $bool[array_rand($bool,1)],
                'PayementDate' => date('Y-m-d H:i:s'),
                'status' => $arr[array_rand($arr,1)],
                'c_id' => $i,
            ]);

        }
    }
}
