<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $unique_key
 * @property string $product_title
 * @property string $product_description
 * @property string $style#
 * @property string $available_sizes
 * @property string $brand_logo_image
 * @property string $thumbnail_image
 * @property string $color_swatch_image
 * @property string $product_image
 * @property string $spec_sheet
 * @property string $price_text
 * @property string $suggested_price
 * @property string $category_name
 * @property string $subcategory_name
 * @property string $color_name
 * @property string $color_square_image
 * @property string $color_product_image
 * @property string $color_product_image_thumbnail
 * @property string $size
 * @property int $qty
 * @property float $piece_weight
 * @property float $piece_price
 * @property float $dozens_price
 * @property float $case_price
 * @property string $price_group
 * @property string $case_size
 * @property int $inventory_key
 * @property int $size_index
 * @property string $sanmar_mainframe_color
 * @property string $mill
 * @property string $product_status
 * @property string $companion_styles
 * @property string $msrp
 * @property string $map_pricing
 * @property string $front_model_image_url
 * @property string $back_model_image
 * @property string $front_flat_image
 * @property string $back_flat_image
 * @property string $product_measurements
 * @property string $pms_color
 * @property string $gtin
 */
class Product extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['unique_key', 'product_title', 'product_description', 'style#', 'available_sizes', 'brand_logo_image', 'thumbnail_image', 'color_swatch_image', 'product_image', 'spec_sheet', 'price_text', 'suggested_price', 'category_name', 'subcategory_name', 'color_name', 'color_square_image', 'color_product_image', 'color_product_image_thumbnail', 'size', 'qty', 'piece_weight', 'piece_price', 'dozens_price', 'case_price', 'price_group', 'case_size', 'inventory_key', 'size_index', 'sanmar_mainframe_color', 'mill', 'product_status', 'companion_styles', 'msrp', 'map_pricing', 'front_model_image_url', 'back_model_image', 'front_flat_image', 'back_flat_image', 'product_measurements', 'pms_color', 'gtin'];
}
