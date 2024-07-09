<?php

use App\Models\Product;
use App\Models\Property;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();

            $table->string('title')
                ->comment('Название свойства');

            $table->timestamps();
        });

        Schema::create('product_property', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Product::class)
                ->comment('К какому продукту принадлежит свойство')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignIdFor(Property::class)
                ->comment('Конкретное свойство')
                ->constrained()
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('value')
                ->comment('Значение свойства');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (app()->isLocal() === false) {
            return;
        }

        Schema::dropIfExists('product_property');
        Schema::dropIfExists('properties');
    }

};
