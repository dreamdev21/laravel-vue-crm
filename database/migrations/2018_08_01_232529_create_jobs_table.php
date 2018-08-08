<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->nullable();
            $table->integer('company_id')->nullable();
            $table->integer('contact_id')->nullable();
            $table->integer('asset_id')->nullable();
            $table->integer('type')->nullable();
            $table->integer('cost_labour')->nullable();
            $table->integer('material_labour')->nullable();
            $table->string('priority_id')->nullable();
            $table->integer('inspection_id')->nullable();
            $table->integer('hours')->nullable();
            $table->string('status_id')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
