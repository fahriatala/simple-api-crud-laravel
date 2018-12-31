<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_review')->insert([
            'barang_id' => 1,
            'user_id' => 1,
            'rating' => 4,
            'review' => "Great"
        ]);
    }
}
