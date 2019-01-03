<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificationBodiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certification_bodies', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('iso_service_id');
            $table->string('accreditation');
            $table->string('certification_body_name');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('iso_service_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certification_bodies');
    }
}
