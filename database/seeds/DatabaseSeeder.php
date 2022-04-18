<?php

namespace Database\Seeders;

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
        $this->call([
            UserSeeder::class,
            ModelHasTypeSeeder::class
        ]);
        // $this->call(UsersTableSeeder::class);
        // factory(App\User::class,1)->create();
        // factory(App\ModelHasType::class,1)->create();

    }
}
