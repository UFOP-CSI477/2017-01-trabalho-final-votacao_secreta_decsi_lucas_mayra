<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::unguard();

      // $this->call('UserTableSeeder');
      // $this->call(UsersTableSeeder::class);
      User::create([
      'name'=>'admin',
      'email'=>'admin@admin.com',
      'password'=>bcrypt('admin'),
      'type'=>'1']);
      User::reguard();
    }
}
