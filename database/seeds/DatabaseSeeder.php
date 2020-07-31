<?php

use Illuminate\Database\Seeder;
// use App\Project;

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
        App\User::create([
            'name' => 'Sistema',
            'email' => 'sistema2020@gmail.com',
            'password' => bcrypt('123')
        ]);

        factory(App\Project::class,4)->create();

        factory(App\Item::class,5)->create();
    }
}
