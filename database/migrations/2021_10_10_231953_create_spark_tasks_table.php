<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparkTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spark_tasks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('app_name');
            $table->string('entry_class');
            $table->integer('core_count');
            $table->text('master_url');
            $table->binary('app_file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spark_tasks');
    }
}
