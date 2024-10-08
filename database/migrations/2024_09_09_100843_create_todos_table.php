<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    public function up(): void
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->integer('country_id')->primary();
            
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
}
