<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhEsubmitFileDesignationTable extends Migration
{
    public function up()
    {
        Schema::create('mh_esubmit_file_designation', function (Blueprint $table) {

        $table->id();
		$table->unsignedBigInteger('journalID');
		$table->string('title');
		$table->datetime('entryDate');
		$table->tinyInteger('status');
        //$table->foreign('journalID')->references('id')->on('mh_journals')->onDelete('cascade');
        $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_esubmit_file_designation');
    }
}