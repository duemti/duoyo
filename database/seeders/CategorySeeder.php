<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('categories')->insert([
			'name' => 'Jackets & Coats',
			'slug' => 'Jackets-&-Coats',
			'section' => 'men'
		]);
		
		DB::table('categories')->insert([
			'name' => 'Sweatshearts & Hoodies',
			'slug' => 'Sweatshearts-&-Hoodies',
			'section' => 'men'
		]);
    }
}
