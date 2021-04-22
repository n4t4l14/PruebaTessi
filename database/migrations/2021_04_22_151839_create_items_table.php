<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateItemsTable
 */
class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->string('register_number');
            $table->string('name');
            $table->integer('quantity');
            $table->unsignedBigInteger('category_id');

            // Creación de FK
            $table->foreign('category_id')->on('categories')->references('id');

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
        Schema::table('items', function (Blueprint $table) {
            // Eliminación de FK
            $table->dropForeign(['category_id']);
        });

        Schema::dropIfExists('items');
    }
}
