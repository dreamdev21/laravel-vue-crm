<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id');
            $table->integer('company_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username')->nullable();
            $table->string('email')->unique();
	        $table->string('password')->nullable();
            $table->string('phone_number')->nullable();
            $table->integer('is_user')->nullable();
            $table->integer('key_contact')->default(0);
            $table->string('contact_type')->nullable();
            $table->string('image')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
