<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        
        for($i=1;$i<=50;$i++){

            DB::table('customers')->insert([
                'payement' => TRUE,
                'status' => 'Active',
                'c_id' => $i,
            ]);

        }
    }
}