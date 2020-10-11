<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBenefitTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefit_tariffs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('benefit_id')->constrained()->onDelete('cascade');
            $table->foreignId('tariff_id')->constrained()->onDelete('cascade');

            // $table->foreign('benefit_id', 'bt_foreign_benefit')
            //         ->references('id')
            //         ->on('benefits');

            // $table->foreign('tariff_id', 'bt_foreign_tariff')
            //         ->references('id')
            //         ->on('tariffs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('benefit_tariffs', function (Blueprint $table) {
            $table->dropForeign('bt_foreign_benefit');
            $table->dropForeign('bt_foreign_tariff');
        });
        Schema::dropIfExists('benefit_tariffs');
    }
}
