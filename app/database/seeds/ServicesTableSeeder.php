<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Services')->insert([
            'title' => "test",
            'amount' => 1000,
            'comment' => "コメント欄",
            'del_flg' => 0,
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
