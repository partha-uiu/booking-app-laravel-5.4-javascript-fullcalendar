<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(CommunityCentersTableSeeder::class);
        $this->call(EventTypesTableSeeder::class);
        $this->call(ExpenseCategoriesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(BookingsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(ExpensesTableSeeder::class);
    }
}
