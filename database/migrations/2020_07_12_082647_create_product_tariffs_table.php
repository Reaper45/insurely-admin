<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_tariffs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('tariff_id');

            // $table->foreign('product_id', 'pt_foreign_product')
            //         ->references('id')
            //         ->on('products');

            $table->foreign('tariff_id', 'pt_foreign_tariff')
                    ->references('id')
                    ->on('tariffs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_tariffs', function (Blueprint $table) {
            $table->dropForeign('pt_foreign_product');
            $table->dropForeign('pt_foreign_tariff');
        });
        Schema::dropIfExists('product_tariffs');
    }
}
