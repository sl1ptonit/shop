<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned();

            $table->string('slug')->unique();
            $table->string('title');

            $table->text('excerpt')->nullable();
            $table->text('description');
            $table->decimal('price');

            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('category_id')->references('id')
                ->on('shop_categories');
            $table->index('is_published');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_items');
    }
}
