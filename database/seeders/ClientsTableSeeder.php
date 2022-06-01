<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $table = (new Client())->getTable();

        DB::table($table)->insert([

            ['name' => 'Victor Santos', 'nu_document' => '866.295.140-68', ],
            ['name' => 'Igor Oliveira', 'nu_document' => '26.216.728/0001-49', ]

        ]);

    }
}
