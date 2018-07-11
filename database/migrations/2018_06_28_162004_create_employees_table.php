<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('position');
            $table->string('name');
            $table->date('start_day');
            $table->unsignedInteger('parent_id');
            $table->unsignedInteger('lb');
            $table->unsignedInteger('rb');
            $table->integer('salary');
            $table->string('photo')->default('default.jpg');
            $table->integer('depth');
            $table->timestamps();
            $table->index('lb','employees_x_lb');
            $table->index('rb','employees_x_rb');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
