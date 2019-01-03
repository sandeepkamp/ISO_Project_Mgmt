<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cust_name'); 
            $table->string('cust_email');
            $table->string('cust_phone_number');
            $table->string('contact_person_name');
            $table->string('contact_person_number');
            $table->string('street_name');
            $table->string('city');
            $table->string('state');
            $table->string('pincode'); 
            $table->string('country'); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
