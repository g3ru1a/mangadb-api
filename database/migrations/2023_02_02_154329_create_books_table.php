<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('summary');
            $table->float('number');
            $table->string('isbn_10');
            $table->string('isbn_13');
            $table->integer('page_count');
            $table->date('release_date');

            $table->foreignId('series_type_id');
            $table->foreignId('publisher_id');
            $table->foreignId('language_id');
            $table->foreignId('binding_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
