<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void
{
    Schema::create('leads_data', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->string('mobile');
        $table->string('image');
        $table->string('message');
        $table->unsignedBigInteger('category_file_id');
        $table->foreign('category_file_id')
              ->references('id')
              ->on('category_files');

        // $table->unsignedBigInteger('category_id');
        $table->timestamps();
        
        // $table->foreign('category_id')
        //       ->references('id')
        //       ->on('category_files');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads_data');
    }
};
