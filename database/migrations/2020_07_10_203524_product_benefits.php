<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductBenefits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_benefits', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('benefit_id')->unsigned();

            $table->foreign('product_id', 'pb_foreign_product')
                    ->references('id')
                    ->on('products')
                    ->onDelete('cascade');

            $table->foreign('benefit_id', 'pb_foreign_benefit')
                    ->references('id')
                    ->on('benefits')
                    ->onDelete('cascade');

            $table->unique(['product_id', 'benefit_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('product_benefits', function (Blueprint $table) {
            $table->dropForeign('pb_foreign_product');
            $table->dropForeign('pb_foreign_benefit');
        });
        Schema::dropIfExists('product_benefits');
    }
}
