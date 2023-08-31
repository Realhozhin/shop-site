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
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('brand')->nullable();
            $table->mediumText('smallDescription')->nullable();
            $table->longText('description')->nullable();

            $table->integer('originalPrice');
            $table->integer('sellingPrice');
            $table->integer('quantity');
            $table->tinyInteger('trending')->default('0')->comment('on=trending,null=not trendig');
            $table->tinyInteger('status')->default('0')->comment('on=visible,null=hidden');

            $table->string('metaTitle')->nullable();
            $table->mediumText('metaKeywords');
            $table->mediumText('metaDescription')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
