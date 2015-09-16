<?php namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class OffersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('offers')->insert([
			'name' => str_random(10),
			'body' => str_random(100),
			'img_ext' => 'png',
		]);
		DB::table('offers')->insert([
			'name' => str_random(10),
			'body' => str_random(100),
			'img_ext' => 'png',
		]);
		DB::table('offers')->insert([
			'name' => str_random(10),
			'body' => str_random(100),
			'img_ext' => 'png',
		]);
	}

}