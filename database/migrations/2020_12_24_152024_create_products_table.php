<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('slug');
			$table->longText('description');
			$table->enum('type', ['men', 'women', 'kids']);
			$table->enum('category', ['jackets&coats']);
			$table->set('sizes', ['XS', 'S', 'M', 'L', 'XL', 'XXL']);
			$table->string('img_path');
			$table->decimal('price');
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
}
