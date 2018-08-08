<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_models', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->nullable();
            $table->string('name')->nullable();  
            $table->integer('type')->nullable();
            $table->string('rent')->nullable();
            $table->string('frequency')->nullable();
            $table->integer('minimum_stock')->nullable();
            $table->integer('current_stock')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('asset_models');
    }
}
