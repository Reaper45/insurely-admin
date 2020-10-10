<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsuranceClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_classes', function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
            $table->string("value");
            $table->foreignId("parent_id")->nullable();

            $table->foreign('parent_id')
                    ->references('id')
                    ->on('insurance_classes');
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
        Schema::dropIfExists('insurance_classes');
    }
}
