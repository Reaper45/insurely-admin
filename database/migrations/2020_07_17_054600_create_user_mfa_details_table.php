<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMFADetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_mfa_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string("mfa_type")->unique();
            $table->string("secret");
            $table->timestamp("expires_in");
            $table->timestamps();

            $table->foreign('user_id', 'pt_foreign_user')
                    ->references('id')
                    ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_mfa_details', function (Blueprint $table) {
            $table->dropForeign('pt_foreign_users');
        });        
        Schema::dropIfExists('user_mfa_details');
    }
}
