<?php

use Illuminate\Database\Seeder;
use App\ExpenseCategory;
use App\CommunityCenter;
use App\User;
use Carbon\Carbon;
use Faker\Factory as Faker;
use App\Expense;

class ExpensesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Expense::truncate();

        $allExpCategoryIds = ExpenseCategory::select('id')->get();
        $expCategoryIds = $allExpCategoryIds->pluck('id')->toArray();
        $allUsersIds = User::select('id')->get();
        $userIds = $allUsersIds->pluck('id')->toArray();
        $allCommunityCenters = CommunityCenter::select('id')->get();
        $CommunityCentersIds = $allCommunityCenters->pluck('id')->toArray();

        $faker = Faker::create();

        $items = [];
        foreach (range(1, 15) as $index) {
            $date = $faker->dateTimeBetween('-60 days', 'now');
            $formattedDate = $date->format('Y-m-d');

            $items[] = [
                'date' => $formattedDate,
                'expense_category_id' => $faker->randomElement($expCategoryIds),
                'amount' => $faker->numberBetween($min = 100, $max = 100000),
                'logged_by' => $faker->randomElement($userIds),
                'community_center_id' => $faker->randomElement($CommunityCentersIds),
                'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d h:i:s')
            ];
        }

        Expense::insert($items);
    }
}
