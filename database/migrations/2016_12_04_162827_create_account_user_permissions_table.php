<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_user_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('user_permission')->unsigned();
            $table->timestamps();

            $table->foreign('account_id')
                ->references('id')
                ->on('accounts');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->foreign('user_permission')
                ->references('id')
                ->on('permissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_user_permissions');
    }
}
