<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idmm')->unsigned(); //ne moze da ide u minus
            $table->string('customer_name');
            $table->string('customer_address_street');
            $table->string('customer_address_number');
            $table->string('customer_address_location');
            $table->string('issue_code');
            $table->string('issue_type');
            $table->date('issued_on');
            $table->text('document');
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
        Schema::drop('documents');
    }
}
