<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;
use App\ExpenseCategory;

class ExpenseCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExpenseCategory::truncate();

        $faker = Faker::create();
        $items = [];
        foreach (range(1, 15) as $index) {
            $items[] = [
                'name' => $faker->unique()->word,
                'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d h:i:s')
            ];
        }

        ExpenseCategory::insert($items);
    }

}
