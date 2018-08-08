<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSparesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->nullable();
            $table->integer('company_id')->nullable();
            $table->string('agent_id')->nullable();
            $table->integer('asset_id')->nullable();
            $table->integer('spare_type')->nullable();
            $table->string('name')->nullable();
            $table->string('serial')->nullable();
            $table->string('cost')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('spares');
    }
}
