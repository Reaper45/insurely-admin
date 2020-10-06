<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_charges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('charge_id');

            // $table->foreign('product_id', 'pc_foreign_product')
            //         ->references('id')
            //         ->on('products');

            $table->foreign('charge_id', 'pc_foreign_charges')
                    ->references('id')
                    ->on('charges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_charges', function (Blueprint $table) {
            $table->dropForeign('pc_foreign_product');
            $table->dropForeign('pc_foreign_charges');
        });
        Schema::dropIfExists('product_charges');
    }
}
