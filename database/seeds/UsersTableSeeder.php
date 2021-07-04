<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use App\Role;
use App\CommunityCenter;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = Faker::create();

        $roleIdAdmin = Role::where('name', '=', 'admin')
            ->select('id')->first();

        $roleIdManager = Role::where('name', '=', 'manager')
            ->select('id')->first();

        $communityCenterIds = CommunityCenter::all()->pluck('id')->toArray();

        $items = [];
        foreach ($communityCenterIds as $communityCenterId) {
            $items[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('admin123'),
                'role_id' => $roleIdAdmin->id,
                'community_center_id' => $communityCenterId,
                'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d h:i:s'),
            ];
            $items[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('admin123'),
                'role_id' => $roleIdManager->id,
                'community_center_id' => $communityCenterId,
                'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d h:i:s'),
            ];
            $items[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('admin123'),
                'role_id' => $roleIdManager->id,
                'community_center_id' => $communityCenterId,
                'created_at' => Carbon::now()->format('Y-m-d h:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d h:i:s'),
            ];
        }

        User::insert($items);
    }
}
