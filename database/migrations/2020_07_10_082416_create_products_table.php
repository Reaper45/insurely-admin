<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("description")->nullable();
            $table->boolean("is_active")->default(true);
            $table->boolean('has_ipf')->default(false);
            $table->foreignId('insurer_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id');
            $table->foreignId('insurance_class_id');
            $table->timestamps();

            // $table->foreign('insurer_id')->references('id')->on('insurers');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('insurance_class_id')->references('id')->on('insurance_classes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
