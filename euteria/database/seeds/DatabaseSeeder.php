<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(LaratrustSeeder::class);
        // $this->call(CategorySeeder::class);
        $this->call(MenuSeeder::class);
        // $this->call(DefaultSeeder::class);
        // $this->call(PollingSeeder::class);
        $this->call(ProvinsiSeeder::class);
        $this->call(KotaSeeder::class);
        $this->call(SettingSeeder::class);

    }
}
