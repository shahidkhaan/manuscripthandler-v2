<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMhJournalsTable extends Migration
{
	public function up()
	{
		Schema::create('mh_journals', function (Blueprint $table) {

			$table->id();
			$table->string('name');
			$table->string('seo');
			$table->string('journalHomePage');
			$table->text('shortDescription');
			$table->string('ithenticatestatus', 1)->default('A');
			$table->tinyInteger('journalDisplayStatus');
			$table->string('status', 1)->default('A');
			$table->string('leftimage');
			$table->string('detailimage');
			$table->string('bannerImage');
			$table->timestamp('entryDate');
		});
	}

	public function down()
	{
		Schema::dropIfExists('mh_journals');
	}
}
