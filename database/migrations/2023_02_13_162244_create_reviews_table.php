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
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submitter_id');
            $table->foreignId('reviewer_id')->nullable();
            $table->foreignId('item_id');
            $table->string('item_type');
            $table->foreignId('replace_id')->nullable();
            $table->string('replace_type')->nullable();
            $table->string('status')->default('unassigned');
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
        Schema::dropIfExists('reviews');
    }
};
