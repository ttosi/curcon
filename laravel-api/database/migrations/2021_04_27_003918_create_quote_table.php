<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('conversion_id')->index('fk_quote_base_idx');
            $table->decimal('rate', 12, 6);
            $table->char('currency', 3);
            $table->char('country', 2)->nullable();
            $table->timestamp('quote_date')->useCurrent();
            $table->timestamp('created')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote');
    }
}
