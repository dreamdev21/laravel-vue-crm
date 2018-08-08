<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('post_code')->nullable();
            $table->string('type')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('image')->nullable();
            $table->integer('is_parent')->unsigned()->nullable();
            $table->tinyInteger('is_enable')->default(1);
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('companies');
    }
}
