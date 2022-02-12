<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patron_id');
            $table->integer('institution_id');
            $table->integer('nre_id')->unique();
            $table->string('title');
            $table->string('internal_barcode');
            $table->string('external_barcode');
            $table->tinyInteger('format');
            $table->tinyInteger('status');
            $table->tinyInteger('binder_pocket');
            $table->datetime('requested_at')->nullable();
            $table->datetime('ordered_at')->nullable();
            $table->datetime('received_at')->nullable();
            $table->datetime('returned_at')->nullable();
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
        Schema::dropIfExists('loans');
    }
}
