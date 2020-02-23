<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(App\User::class)
           ->create()
           ->each(function ($user) {
                $user->shippingaddress()->save(factory(App\Shipping::class)->make());
                $user->wallet()->save(factory(App\Wallet::class)->make());
            });
    }
}
