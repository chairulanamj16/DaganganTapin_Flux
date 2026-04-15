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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('category_id')->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('shop_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('title');
            $table->longText('desc')->nullable();
            $table->double('price')->default(0);
            $table->double('discount')->default(0);
            $table->integer('stock')->default(0);
            $table->text('gambar');
            $table->text('thumb')->nullable();
            $table->enum('status', ['active', 'non_active']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
