<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefit_charges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('benefit_id')->constrained()->onDelete('cascade');
            $table->foreignId('charge_id')->constrained()->onDelete('cascade');

            // $table->foreign('benefit_id', 'bc_foreign_benefit')
            //         ->references('id')
            //         ->on('benefits');

            // $table->foreign('charge_id', 'bc_foreign_charges')
            //         ->references('id')
            //         ->on('charges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('benefit_charges', function (Blueprint $table) {
            $table->dropForeign('bc_foreign_benefit');
            $table->dropForeign('bc_foreign_charges');
        });
        Schema::dropIfExists('benefit_charges');
    }
}
