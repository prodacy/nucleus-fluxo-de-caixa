<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

     $table = (new User())->getTable();

     DB::table($table)->insert([

        [
           'name' => 'Admin',
           'last_name' => 'Teste',
           'email' => 'admin@admin.com',
           'password' => bcrypt('123'),
           'email_verified_at' => date('Y-m-d H:i:s'),
        ]

     ]);
  }
}
