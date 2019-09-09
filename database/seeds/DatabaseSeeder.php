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
        // $this->call(UsersTableSeeder::class);
        $this->call('UserTableSeeder');

        $this->command->info('User table seeded!');
    }

}

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('mc-catrgory')->insert(array(
            array(
              'id' => '1',
              'name' => 'Thriller',
            ),
            array(
                'id' => '2',
                'name' => 'Action',
            ),
            array(
                'id' => '3',
                'name' => 'Comedy',
            ),
            array(
                'id' => '4',
                'name' => 'Scifi',
            ),
            array(
                'id' => '5',
                'name' => 'Horror',
            ),
          ));

    }

}
