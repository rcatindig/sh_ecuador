<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrepaidCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prepaid_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voucher_code')->unique();
            $table->string('password');
            $table->dateTime('expiry_date');
            $table->decimal('value', 8, 2);
            $table->unsignedInteger('service_provider_id');
            $table->enum('redemption_status', ['redeemed', 'not yet redeem', 'suspended'])->default('not yet redeem');
            $table->dateTime('redemption_date_time')->nullable();
            $table->timestamps();

            // add foreign key from service provider table
            $table->foreign('service_provider_id')->references('id')->on('service_providers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prepaid_cards');
    }
}
