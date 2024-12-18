<?php

// database/migrations/2024_12_17_create_products_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2);  // Harga paket 7 hari
            $table->integer('calories');
            $table->boolean('is_available')->default(true);
            $table->integer('duration');  // Durasi paket dalam hari
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('products');
    }
}
