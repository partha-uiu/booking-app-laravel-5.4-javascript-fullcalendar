<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;
use App\CommunityCenter;

class CommunityCentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        CommunityCenter::truncate();

        $faker = Faker::create();
        $items = [];
        foreach (range(1, 5) as $index) {
            $items[] = [
                'name' => $faker->unique()->company,
                'location' => $faker->unique()->address,
                'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d h:i:s')
            ];
        }
        CommunityCenter::insert($items);
    }
}
