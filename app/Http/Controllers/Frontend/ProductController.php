<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Color;
use App\Models\Admin\Product;
use App\Models\Admin\ProductTag;
use App\Models\Admin\Size;
use App\Models\Admin\Manufacturer;
use App\Models\Admin\ProductType;
use App\Models\SeoSetting;
use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function singleProduct($slug){

        $project = Product::where('en_Product_Slug', $slug)->with('category')->first();
        if(!empty($project)) {
            $cat_id = $project->category->id;

            $data['similar_product'] =  Product::with('brand','category','colors','sizes','product_tags')
                ->where('Category_Id',$cat_id)
                ->where('id', '!=', $project->id)
                ->latest()->take(4)->get();

            $products = Product::where('id',$project->id)->with('brand','category','colors','sizes','product_tags', 'product_reviews', 'product_reviews.user','location')->latest()->first();
           $data['products'] = $products;
            $data['title'] = $products->meta_title;
            $data['description'] = $products->meta_description;
            $data['keywords'] = $products->meta_keywords;

            return view('front.pages.product.single_product',$data);
        }
        return redirect()->back()->with('toast_error', __('Product Not Found!'));

    }
    public function allProduct(){
        $data['tags'] = ProductTag::with('product')->latest()->get();
         $data['colors'] = Color::with('products')->latest()->get();
         $data['sizes'] = Size::with('products')->latest()->get();
         $data['category'] =Category::with('products')->whereNull('parent_category')->get();
         $data['brands'] = Brand::with('products')->get();
        $products =Product::with('brand','category','colors','sizes','product_tags')->where('Status',1)->latest()->paginate(20);
        $data['products'] = $products;
        $seo = SeoSetting::where('slug', 'all-products')->first();
        $data['title'] = $seo->title;
        $data['description'] = $seo->description;
        $data['keywords'] = $seo->keywords;
        if($products->count() == 0) {
            return view('front.pages.product.empty-product', $data);
        }
        return view('front.pages.product.all_product', $data);
    }
    public function productListLeftSidebar(){
        $data['tags'] = ProductTag::with('product')->get();
        $data['colors'] = Color::with('products')->latest()->get();
        $data['sizes'] = Size::with('products')->latest()->get();
        $data['category'] = Category::with('products')->whereNull('parent_category')->get();
        $data['brands'] = Brand::with('products')->get();
        $products = Product::with('brand','category','colors','sizes','product_tags')->where('Status',1)->latest()->paginate(8);
        $data['products'] = $products;
        $seo = SeoSetting::where('slug', 'all-products')->first();
        $data['title'] = $seo->title;
        $data['description'] = $seo->description;
        $data['keywords'] = $seo->keywords;
        if($products->count() == 0) {
            return view('front.pages.product.empty-product', $data);
        }
        return view('front.pages.product.left_sidebar', $data);
    }

    public function productSorting(Request $request){
        if ($request->ajax()){
            $value= $request->filter;
            if($value =='Categories'){
                $filters = Product::where('Category_Id','!=' ,null)->where('Status',1)->get();
                if($filters){
                    return view('front.pages.product.filter_product', compact('filters'));
                }
            }
            elseif ($value =='Brands'){
                $filters = Product::where('Brand_Id','!=' ,null)->where('Status',1)->get();
                if($filters){
                    return view('front.pages.product.filter_product', compact('filters'));
                }
            }
            elseif ($value =='Products'){
                $filters = Product::get();
                if($filters){
                    return view('front.pages.product.filter_product', compact('filters'));
                }
            }
        }
        return 'something wrong';
    }

    public function productFiltering(Request $request){

        if($request->ajax()){
            if($request->checkProductType){
                $filters=Product::with('productType')->where('Status',1)->whereHas('productType',function ($query) use ($request){
                    $query->whereIn('name', $request->checkProductType);
                })->get();
            }
            elseif($request->checkManufacturer){
                $filters=Product::with('Manufacturer')->where('Status',1)->whereHas('Manufacturer',function ($query) use ($request){
                    $query->whereIn('name', $request->checkManufacturer);
                })->get();
            }
            elseif($request->checkSubCat){
                $filters=Product::with('subCategory')->where('Status',1)->whereHas('subCategory',function ($query) use ($request){
                    $query->whereIn('en_Category_Name',$request->checkSubCat);
                })->get();
            }elseif ($request->checkBrand){
                $filters=Product::with('brand')->where('Status',1)->whereHas('brand',function ($query) use ($request){
                    $query->whereIn('en_BrandName',$request->checkBrand);
                })->get();
            }elseif ($request->checkColor){
                $filters=Product::with('colors')->where('Status',1)->whereHas('colors',function ($query) use ($request){
                    $query->whereIn('Name',$request->checkColor);
                })->get();
            }elseif ($request->checkSize){
                $filters=Product::with('sizes')->where('Status',1)->whereHas('sizes',function ($query) use ($request){
                    $query->whereIn('Size',$request->checkSize);
                })->get();
            }elseif ($request->search){
                $filters = Product::where('en_Product_Name', 'LIKE', "%{$request->search}%")->where('Status',1)->get();
            }elseif ($request->min && $request->max){
                $filters = Product::whereBetween('Discount_Price', [$request->min, $request->max])->where('Status',1)->get();
            }
            else{
                $filters = Product::get();
            }
        }
        return view('front.pages.product.filter_product', compact('filters'));
    }

    public function  productSortingLeftSide(Request $request){
        if ($request->ajax()){
            $value= $request->filter;
            if($value =='Categories'){
                $filters = Product::where('Category_Id','!=' ,null)->where('Status',1)->get();
                if($filters){
                    return view('front.pages.product.filter_product', compact('filters'));
                }
            }
            elseif ($value =='Brands'){
                $filters = Product::where('Brand_Id','!=' ,null)->where('Status',1)->get();
                if($filters){
                    return view('front.pages.product.filter_product', compact('filters'));
                }
            }
            elseif ($value =='Products'){
                $filters = Product::where('Status',1)->get();
                if($filters){
                    return view('front.pages.product.filter_leftsidebar', compact('filters'));
                }
            }
        }
        return 'something wrong';
    }

    public function  productFilteringLeftSide(Request $request){
        if($request->ajax()){
            if($request->checkCat){
                $filters=Product::with('category')->where('Status',1)->whereHas('category',function ($query) use ($request){
                    $query->whereIn('en_Category_Name',$request->checkCat);
                })->get();
            }elseif ($request->checkBrand){
                $filters=Product::with('brand')->where('Status',1)->whereHas('brand',function ($query) use ($request){
                    $query->whereIn('en_BrandName',$request->checkBrand);
                })->get();
            }elseif ($request->checkColor){
                $filters=Product::with('colors')->where('Status',1)->whereHas('colors',function ($query) use ($request){
                    $query->whereIn('Name',$request->checkColor);
                })->get();
            }elseif ($request->checkSize){
                $filters=Product::with('sizes')->where('Status',1)->whereHas('sizes',function ($query) use ($request){
                    $query->whereIn('Size',$request->checkSize);
                })->get();
            }elseif ($request->search){
                $filters = Product::where('en_Product_Name', 'LIKE', "%{$request->search}%")->where('Status',1)->get();
            }elseif ($request->min && $request->max){
                $filters = Product::whereBetween('Discount_Price', [$request->min, $request->max])->where('Status',1)->get();
            }
            else{
                $filters = Product::get();
            }
        }
        return view('front.pages.product.filter_leftsidebar', compact('filters'));
    }

    public function CategoryWiseProduct($slug){   
        
        $data['category_m'] = Category::where('en_Category_Slug' , $slug)->first();
        
        // dd($data);


        $data['category_sub_all'] = Category::where('parent_category' ,$data['category_m']->id)->get();
        
        // dd($data);
        //print "<pre>";
        //print_r($data['category_sub_all'][0]->id); die();

        $data['tags']=ProductTag::with('product')->latest()->get();
        $data['colors']=Color::with('products')->latest()->get();
        $data['sizes']=Size::with('products')->latest()->get();
        $data['category']=Category::with('products')->whereNull('parent_category')->get();
        $data['brands']=Brand::with('products')->get();
        
        $idsArray = [$data['category_m']->id];
        $subCats = Category::where('parent_category',$data['category_m']->id)->get();
        
        if (count($subCats) > 0) {
            foreach ($subCats as $subCategory) {
                array_push($idsArray, $subCategory->id);
            }
        }
        
        $products=Product::with('brand','category','subFrontCategory','colors','sizes','product_tags')->where('Status',1)->whereIn('Category_Id', $idsArray)->latest()->paginate(8);

        // $products=Product::with('brand','category','subFrontCategory','colors','sizes','product_tags')->where('Status',1)->where('Category_Id', $data['category_m']->id)->orWhere('parent_category', $data['category_sub_all'][0]->id)->latest()->paginate(8);


        $data['products'] = $products;
        $seo = SeoSetting::where('slug', 'all-products')->first();
 
        $data['title'] =  $data['category_m']->meta_title;
        $data['description'] =  $data['category_m']->meta_description;
        $data['keywords'] = $data['category_m']->meta_keywords;
        if($products->count() == 0) {
            return view('front.pages.product.empty-product', $data);
        }
        return view('front.pages.product.category_wise_product', $data);
    }
    public function CategoryWiseProductLeft($slug){
        $data['category_m'] = Category::where('en_Category_Slug' , $slug)->first();
        $data['tags']=ProductTag::with('product')->latest()->get();
        $data['colors']=Color::with('products')->latest()->get();
        $data['sizes']=Size::with('products')->latest()->get();
        $data['category']=Category::with('products')->whereNull('parent_category')->get();
        $data['brands']=Brand::with('products')->get();
        $products=Product::with('brand','category','colors','sizes','product_tags')->where('Category_Id', $data['category_m']->id)->where('Status',1)->latest()->paginate(8);
        $data['products'] = $products;
        $seo = SeoSetting::where('slug', 'all-products')->first();
        $data['title'] = $seo->title;
        $data['description'] = $seo->description;
        $data['keywords'] = $seo->keywords;
        if($products->count() == 0) {
            return view('front.pages.product.empty-product', $data);
        }
        return view('front.pages.product.category_wise_product_left', $data);
    }
    public function BrandWiseProduct($slug){
        $data['category_m'] = Brand::where('en_BrandSlug', $slug)->first();
        $data['tags']=ProductTag::with('product')->latest()->get();
        $data['colors']=Color::with('products')->latest()->get();
        $data['sizes']=Size::with('products')->latest()->get();
        $data['category']=Category::with('products')->whereNull('parent_category')->get();
        $data['brands']=Brand::with('products')->get();
        $products=Product::with('brand','category','colors','sizes','product_tags')->where('Brand_Id', $data['category_m']->id)->where('Status',1)->latest()->paginate(8);
        $data['products'] = $products;
        $seo = SeoSetting::where('slug', 'all-products')->first();
       /* $data['title'] = $seo->title;
        $data['description'] = $seo->description;
        $data['keywords'] = $seo->keywords;*/

         $data['title'] =  $data['category_m']->meta_title;
        $data['description'] =  $data['category_m']->meta_description;
        $data['keywords'] = $data['category_m']->meta_keywords;

        
        if($products->count() == 0) {
            return view('front.pages.product.empty-product', $data);
        }
        return view('front.pages.product.brand_wise_product', $data);
    }
    public function BrandWiseProductLeft($slug){
        $data['category_m'] = Brand::where('en_BrandSlug', $slug)->first();
        $data['tags']=ProductTag::with('product')->latest()->get();
        $data['colors']=Color::with('products')->latest()->get();
        $data['sizes']=Size::with('products')->latest()->get();
        $data['category']=Category::with('products')->whereNull('parent_category')->get();
        $data['brands']=Brand::with('products')->get();
        $products=Product::with('brand','category','colors','sizes','product_tags')->where('Brand_Id', $data['category_m']->id)->where('Status',1)->latest()->paginate(8);
        $data['products'] = $products;
        $seo = SeoSetting::where('slug', 'all-products')->first();
        $data['title'] = $seo->title;
        $data['description'] = $seo->description;
        $data['keywords'] = $seo->keywords;
        if($products->count() == 0) {
            return view('front.pages.product.empty-product', $data);
        }
        return view('front.pages.product.brand_wise_product_left', $data);
    }

    public function CategorySearchProduct(Request $request){
        $cat=$request->category;
        $search=$request->search;
        $tags=ProductTag::with('product')->latest()->get();
        $colors=Color::with('products')->latest()->get();
        $sizes=Size::with('products')->latest()->get();
        $productTypes=ProductType::where('status', 1)->get();
        $manufacturers=Manufacturer::where('status', 1)->get();
        $category=Category::with('products')->whereNull('parent_category')->get();
        $subCategory=Category::with('products')->whereNotNull('parent_category')->get();
        $brands=Brand::with('products')->get();
        $search_query = Product::with('brand','category','colors','sizes','product_tags')->where('Status',1)
            ->where('en_Product_Name', 'LIKE', "%{$search}%");
        if(!is_null($request->category)) {
            $products = $search_query->where('Category_Id',$cat)->latest()->paginate(8);
        }else {
            $products = $search_query->latest()->paginate(8);
        }
        if($products->count() == 0) {
            return view('front.pages.product.empty-product');
        }
        return view('front.pages.product.search-result',compact('products', 'manufacturers', 'category', 'subCategory', 'colors','sizes','brands', 'productTypes'));
    }
}
