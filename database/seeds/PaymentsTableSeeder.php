<?php

use Illuminate\Database\Seeder;
use App\Payment;
use App\Booking;
use App\User;
use Faker\Factory as Faker;
use Carbon\Carbon;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::truncate();

        $allBookings = Booking::all();
        $bookingIds = $allBookings->pluck('id')->toArray();

        $allUserIds = User::all();
        $userIds = $allUserIds->pluck('id')->toArray();
        $faker = Faker::create();
        $items = [];

        foreach ($allBookings as $allBooking) {

              $maxRange = $allBooking->total_amount / 3;

                $items[] = [
                    'booking_id' => $allBooking->id,
                    'received_by' => $faker->randomElement($userIds),
                    'paid_amount' => $faker->numberBetween($min = 0, $maxRange),
                    'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d h:i:s')
                ];

                $items[] = [
                    'booking_id' => $allBooking->id,
                    'received_by' => $faker->randomElement($userIds),
                    'paid_amount' => $faker->numberBetween($min = 0, $maxRange),
                    'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d h:i:s')
                ];

                $items[] = [
                    'booking_id' =>$allBooking->id,
                    'received_by' => $faker->randomElement($userIds),
                    'paid_amount' => $faker->numberBetween($min = 0, $maxRange),
                    'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d h:i:s')
                ];

        }
        Payment::insert($items);
    }
}
// 6000
// 0/1/2/3 payments
// 6000 / (0/1/2/3) = 2000
// 0, 2000
// 0, 2000
// 0, 2000
