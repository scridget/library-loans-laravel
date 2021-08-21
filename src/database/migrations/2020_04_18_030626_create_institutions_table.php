<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contact_id')->nullable();
            $table->string('name', 100);
            $table->string('address1', 100)->nullable();
            $table->string('address2', 100)->nullable();
            $table->string('city', 60)->nullable();
            $table->string('state', 4)->nullable();
            $table->string('zip', 10)->nullable();
            $table->string('country',60)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('barcode')->unique()->nullable();
            $table->timestamps();
        });

        Schema::create('institution_user', function(Blueprint $table) {
            $table->integer('institution_id');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institutions');
        Schema::dropIfExists('institution_user');
    }
}
