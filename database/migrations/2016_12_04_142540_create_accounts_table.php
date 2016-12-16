<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); // Temporary
            $table->string('name');
            $table->string('card_number')->nullable();
            $table->integer('type')->unsigned();
            $table->decimal('balance', 10, 2)->default(0);
            $table->integer('limit')->nullable();
            $table->timestamp('limit_approved_until')->nullable();
            $table->integer('fallback_account')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')
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
        Schema::dropIfExists('accounts');
    }
}
