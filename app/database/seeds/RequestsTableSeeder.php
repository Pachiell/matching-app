<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class RequestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Requests')->insert([
            'comment' => "コメント欄",
            'tel' => '09012345678',
            'e-mail' => "test@co.jp",
            'deadline' => Carbon::now()->toDateString(),
            'status' => 0,
            'user_id' => 1,
            'service_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
