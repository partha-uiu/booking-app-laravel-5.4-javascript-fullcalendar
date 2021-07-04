<?php

use App\CommunityCenter;
use Illuminate\Database\Seeder;
use App\Client;
use App\EventType;
use App\User;
use App\Booking;
use Faker\Factory as Faker;
use Carbon\Carbon;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Booking::truncate();

        $allEventTypeIds = EventType::all();
        $eventTypeIds = $allEventTypeIds->pluck('id')->toArray();

        $allUserIds = User::all();
        $userIds = $allUserIds->pluck('id')->toArray();

		$allCommunityCenterIds = CommunityCenter::all();
		$communityCenterIds = $allCommunityCenterIds->pluck('id')->toArray();

        $faker = Faker::create();

        $items = [];

        foreach (range(1, 25) as $index) {

            $date = $faker->unique()->dateTimeBetween('-40 days', '+60 days');
            $formattedDate = $date->format('Y-m-d');
            $subtotal = $faker->numberBetween(5000, 500000);
            $discount = $faker->numberBetween(0, $subtotal);

            $total = $subtotal - $discount;

            $items[] = [
                'date' => $formattedDate,
                'duration' => $faker->randomElement(['day', 'night']),
                'community_center_id' => $faker->randomElement($communityCenterIds),
                'event_type_id' => $faker->randomElement($eventTypeIds),
                'guest_count' => $faker->numberBetween($min = 50, $max = 2000),
                'notes' => $faker->text,
                'subtotal_amount' => $subtotal,
                'discount'=>$discount,
                'total_amount' => $total,
                'logged_by' => $faker->randomElement($userIds),
                'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d h:i:s')
            ];
        }

        foreach (range(1, 25) as $index) {
            $date = $faker->unique()->dateTimeBetween('+61 days', '+170 days');
            $formattedDate = $date->format('Y-m-d');
            $subtotal = $faker->numberBetween(5000, 500000);
            $discount = $faker->numberBetween(0, $subtotal);

            $total = $subtotal - $discount;

            $items[] = [
                'date' => $formattedDate,
                'duration' => 'fullday',
				'community_center_id' => $faker->randomElement($communityCenterIds),
                'event_type_id' => $faker->randomElement($eventTypeIds),
                'guest_count' => $faker->numberBetween($min = 50, $max = 2000),
                'notes' => $faker->text,
                'subtotal_amount' => $subtotal,
                'discount'=>$discount,
                'total_amount' => $total,
                'logged_by' => $faker->randomElement($userIds),
                'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d h:i:s')
            ];
        }

        Booking::insert($items);
    }
}
