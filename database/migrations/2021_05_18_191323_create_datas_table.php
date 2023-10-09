<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\Expr\Assign;

class CreateDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datas', function (Blueprint $table) {
            $table->id();
            $table->string('researchTitle')->nullable();
            $table->string('course')->nullable();
            $table->string('original_name')->default('')->nullable();
            $table->string('file_path')->default('')->nullable();
            $table->string('researcherName')->nullable();     
            $table->string('exampleInputEmail')->unique()->nullable();
            $table->string('contactNumber')->nullable();
            $table->date('DateofDefense')->nullable()->unique();
            $table->string('TimeOfDefense')->nullable();
            $table->string('ResearchPanel')->default("Not Assigned")->nullable();;
            $table->timestamps();
        });
    }

    /**
     * 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('datas');
    }
}
