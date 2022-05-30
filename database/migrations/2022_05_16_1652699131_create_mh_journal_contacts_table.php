<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhJournalContactsTable extends Migration
{
    public function up()
    {
        Schema::create('mh_journal_contacts', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('journalID');
            $table->unsignedBigInteger('profileID');
            $table->datetime('entryDate');
           // $table->foreign('journalID')->references('id')->on('mh_journals')->onDelete('cascade');
           // $table->foreign('profileID')->references('id')->on('mh_esubmit_profiles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mh_journal_contacts');
    }
}
