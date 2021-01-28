<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("servant_id")->unsigned();
            $table->integer("quentity");
            $table->decimal("totale_price")->default(0);
            $table->decimal("totale_reseved")->default(0);
            $table->decimal("change")->default(0);
            $table->string("type_payement")->default("cash");
            $table->string("payement_statu")->default("paied");
            $table->foreign('servant_id')
            ->references("id")->on('servants')->onDelete("cascade");


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
        Schema::dropIfExists('sales');
    }
}
