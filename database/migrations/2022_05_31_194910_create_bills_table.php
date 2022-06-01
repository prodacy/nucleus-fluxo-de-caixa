<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Bill;
use App\Models\Client;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new Bill())->getTable(), function (Blueprint $table) {
            $table->id();

            $table->tinyInteger('type_id');
            $table->date('due');
            $table->decimal('amount');

            $table->foreignIdFor(Client::class);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new Bill())->getTable());
    }
}
