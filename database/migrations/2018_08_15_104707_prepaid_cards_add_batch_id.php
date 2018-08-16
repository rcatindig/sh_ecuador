<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrepaidCardsAddBatchId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('prepaid_cards', function (Blueprint $table) {
        $table->unsignedInteger('batch_id')->after('redemption_date_time')->nullable();
        $table->foreign('batch_id')->references('id')->on('batches');
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('prepaid_cards', function (Blueprint $table) {
        $table->dropForeign('prepaid_cards_batch_id_foreign');
        $table->dropColumn('batch_id');
      });
    }
}
