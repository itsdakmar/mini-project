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
            $table->unsignedBigInteger('unique_key');
            $table->string('product_title');
            $table->text('product_description');
            $table->string('style#');
            $table->string('available_sizes');
            $table->string('brand_logo_image');
            $table->string('thumbnail_image');
            $table->string('color_swatch_image');
            $table->string('product_image');
            $table->string('spec_sheet');
            $table->string('price_text');
            $table->string('suggested_price');
            $table->string('category_name');
            $table->string('subcategory_name');
            $table->string('color_name');
            $table->string('color_square_image');
            $table->string('color_product_image');
            $table->string('color_product_image_thumbnail');
            $table->string('size');
            $table->unsignedInteger('qty');
            $table->decimal('piece_weight');
            $table->decimal('piece_price');
            $table->decimal('dozens_price');
            $table->decimal('case_price');
            $table->string('price_group');
            $table->string('case_size');
            $table->unsignedInteger('inventory_key');
            $table->unsignedInteger('size_index');
            $table->string('sanmar_mainframe_color');
            $table->string('mill');
            $table->string('product_status');
            $table->string('companion_styles');
            $table->string('msrp');
            $table->string('map_pricing');
            $table->string('front_model_image_url');
            $table->string('back_model_image');
            $table->string('front_flat_image');
            $table->string('back_flat_image');
            $table->string('product_measurements');
            $table->string('pms_color');
            $table->string('gtin');
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
