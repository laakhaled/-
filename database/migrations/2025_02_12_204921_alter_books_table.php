<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            if (!Schema::hasColumn('books', 'author_id')) {
                $table->unsignedBigInteger('author_id')->nullable();
            }
        
            if (!DB::table('information_schema.TABLE_CONSTRAINTS')
                    ->where('TABLE_NAME', 'books')
                    ->where('CONSTRAINT_TYPE', 'FOREIGN KEY')
                    ->where('CONSTRAINT_NAME', 'books_author_id_foreign')
                    ->exists()) {
                $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            }
        });
        
            
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            //
        });
    }
};
