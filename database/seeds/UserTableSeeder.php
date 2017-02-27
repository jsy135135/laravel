<?php

use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //为user表填充数据
        DB::table('user')->insert([
            'username' => 'admin',
            'password' => bcrypt('root'),
            'created_at' => date('Y-m-d H:i:s', time()),
            'updated_at' => date('Y-m-d H:i:s', time()),
        ]);
    }
}
