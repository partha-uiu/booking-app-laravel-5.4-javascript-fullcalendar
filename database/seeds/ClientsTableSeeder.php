<?php

use Illuminate\Database\Seeder;
use App\Client;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ClientsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Client::truncate();

		$faker = Faker::create();
		$items = [];
		foreach(range(1, 50) as $index) {
			$items[] = [
				'name'                => $faker->name,
				'booking_id'          => rand(1, 50),
				'community_center_id' => rand(1, 5),
				'creator_id'          => rand(1, 15),
				'mobile'              => $faker->unique()->phoneNumber,
				'address'             => $faker->address,
				'email'               => $faker->unique()->email,
				'created_at'          => Carbon::now()->format('Y-m-d h:i:s'),
				'updated_at'          => Carbon::now()->format('Y-m-d h:i:s')
			];
		}
		Client::insert($items);
	}
}
