<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->nullable();
            $table->integer('company_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('asset_type')->nullable();
            $table->integer('agent_id')->nullable();
            $table->string('serial')->nullable();
            $table->string('bmb')->nullable();
            $table->string('location')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('assets');
    }
}
