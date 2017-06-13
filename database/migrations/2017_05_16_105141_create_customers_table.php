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
            $table->increments('id')->primary();
            $table->string('name_en');
            $table->string('name_cn');
            $table->integer('assigned_to_id');
            $table->boolean('has_vat');
            $table->string('vat_number');
            $table->string('business_address');
            $table->string('postal_address');
            $table->string('postal_code');
            $table->string('phone');
            $table->integer('country_id');
            $table->string('fax');
            $table->string('email');
            $table->integer('bank_id');
            $table->string('bank_number');
            $table->boolean('is_active');
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
        Schema::dropIfExists('customers');
    }
}
