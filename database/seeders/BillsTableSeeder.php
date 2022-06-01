<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Bill;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $inserts = [];
        $total = 200;

        $types = [1,2];
        $dues = [
            date('Y-m-d',strtotime(date('Y-m-d'). ' - 2 month ')),
            date('Y-m-d',strtotime(date('Y-m-d'). ' - 1 month ')),
            date('Y-m-d',strtotime(date('Y-m-d'). ' - 2 day ')),
            date('Y-m-d',strtotime(date('Y-m-d'). ' - 1 day ')),
            date('Y-m-d'),
            date('Y-m-d',strtotime(date('Y-m-d'). ' + 1 day ')),
            date('Y-m-d',strtotime(date('Y-m-d'). ' + 2 day ')),
            date('Y-m-d',strtotime(date('Y-m-d'). ' + 1 month ')),
            date('Y-m-d',strtotime(date('Y-m-d'). ' + 3 month ')),
        ];

        $client_ids = [1,2];

        for ($i=1; $i <= $total; $i++) { 

            $type_id = $this->rand($types);
            $due = $this->rand($dues);
            $amount = (rand(0,2000) + (rand(0,100)/100));
            $client_id = $this->rand($client_ids);

            $inserts[] = [
                'type_id' => $type_id,
                'due' => $due,
                'amount' => $amount,
                'client_id' => $client_id,
            ];

        }


        $table = (new Bill())->getTable();

        DB::table($table)->insert($inserts);

    }

    private function rand($array)
    {
        return $array[array_rand($array)];
    }

}
