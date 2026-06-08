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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); 
            $table->string('name');
            $table->string('slug')->unique(); 
            $table->string('image')->nullable();
            $table->decimal('price', 12, 2);
            $table->integer('quantity')->default(0); // Stok
            $table->boolean('is_active')->default(true); 
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

            $table->string('sku')->unique()->nullable();
            $table->string('series')->nullable();
            $table->decimal('weight', 8, 2)->nullable();

            $table->text('description')->nullable();
            $table->text('lore')->nullable();       
            $table->string('material')->nullable();
            $table->string('size')->nullable();
            $table->string('age_recommendation')->nullable();
            $table->string('origin')->nullable();
            $table->text('extra_info')->nullable();
            $table->decimal('probability', 5, 2)->nullable(); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
