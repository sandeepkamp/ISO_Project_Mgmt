<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuditManagementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('audit_managements', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('iso_service_id');
            $table->unsignedInteger('certification_body_id');
            $table->string('auditor_name');
            $table->date('audit_date');
            $table->string('audit_type');
            $table->string('audit_status')->nullable();
            $table->date('certification_date')->nullable(); 
            $table->string('certification_status')->nullable();
            $table->string('certification_price');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('iso_service_id')->references('id')->on('products');
            $table->foreign('certification_body_id')->references('id')->on('certification_bodies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('audit_managements');
    }
}
