<?php

namespace App\Models\Admin;

use App\Models\ProductReview;
use App\Models\Location;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Sluggable;
    protected $fillable=[
        'Category_Id',
        'Brand_Id',
        'en_Product_Name',
        'en_Product_Slug',
        'fr_Product_Name',
        'fr_Product_Slug',
        'en_About',
        'fr_About',
        'ItemTag',
        'Bronze_Price',
        'Silver_Price',
        'Gold_Price',
        'Platinum_Price',
        'Price',
        'Discount',
        'Discount_Price',
        'Quantity',
        'Sold',
        'Primary_Image',
        'Image2',
        'Image3',
        'Image4',
        'Image5',
        'Featured_Product',
        'Best_Selling',
        'New_Arrival',
        'On_Sale',
        'Status',
        'en_Description',
        'fr_Description',
        'en_ShippingReturn',
        'fr_ShippingReturn',
        'en_AdditionalInformation',
        'fr_AdditionalInformation',
        'Voucher',
        'digital_type',
        'digital_file',
        'digital_link',
        'license_name',
        'license_key',
        'affiliate_link',
        'type',
        'Sub_Category_Id',
        'Manufacturer_Id',
        'Product_Type_Id',
        "Spec_Sheet",
        "Spec_Sheet2",
        "Spec_Sheet3",
        "Spec_Sheet4",
        "Size_New",
        "is_retail_price",
        "showing_home",
        "is_called",
        "meta_description",
        "meta_keywords",
        "meta_title",
    ];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'en_Product_Slug' => [
                'source' => 'en_Product_Name'
            ],
            'fr_Product_Slug' => [
                'source' => 'fr_Product_Name'
            ],
        ];
    }
    public function location(){
        return $this->hasMany(Location::class,'product_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'Category_Id');
    }

    public function subCategory(){
        return $this->belongsTo(Category::class,'Sub_Category_Id');
    }
        public function subFrontCategory(){
        return $this->belongsTo(Category::class,'parent_category');
    }

    public function productType(){
        return $this->belongsTo(ProductType::class,'Product_Type_Id');
    }

    public function manufacturer(){
        return $this->belongsTo(Manufacturer::class,'Manufacturer_Id');
    }

    public function brand(){
        return $this->belongsTo(Brand::class,'Brand_Id');
    }


    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product');
    }
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'size_product');
    }

    public function product_tags()
    {
        return $this->hasMany(ProductTag::class, 'product_id');
    }

    public function product_reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }
}
