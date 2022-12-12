<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_users', function (Blueprint $table) {
            $table->id();
			$table->string('name')->nullable();
			$table->bigInteger('mobile')->unsigned();
			$table->tinyInteger('step_1')->default(0);
			$table->tinyInteger('step_2')->default(0);
			$table->tinyInteger('step_3')->default(0);
			$table->tinyInteger('step_4')->default(0);
			$table->tinyInteger('step_5')->default(0);
			$table->string('email')->nullable();
			$table->string('username')->nullable();
			$table->string('password')->nullable();
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
        Schema::dropIfExists('frontend_users');
    }
}
