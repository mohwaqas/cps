<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Admin\Category;
use App\Models\Admin\Color;
use App\Models\Admin\OrderDetails;
use App\Models\Admin\Product;
use App\Models\Admin\Manufacturer;
use App\Models\Admin\ProductTag;
use App\Models\Admin\Size;
use App\Models\Location;
use App\Models\ItemTag;
use App\Models\ProductTagList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function product(Request $request){  
        if ($request->ajax()) {
            $data = Product::with('category','brand')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $btn = '<div class="action__buttons">';
                    if($data->type == PRODUCT_PHYSICAL) {
                        $btn = $btn.'<a href="' . route('admin.product.edit', ['product_type' => 'physical', 'id' => $data->id]) . '" class="btn-action"><i class="fa-solid fa-pen-to-square"></i></a>';
                    }elseif($data->type == PRODUCT_DIGITAL) {
                        $btn = $btn.'<a href="' . route('admin.product.edit', ['product_type' => 'digital', 'id' => $data->id]) . '" class="btn-action"><i class="fa-solid fa-pen-to-square"></i></a>';
                    }elseif ($data->type == PRODUCT_LICENSE) {
                        $btn = $btn.'<a href="' . route('admin.product.edit', ['product_type' => 'license', 'id' => $data->id]) . '" class="btn-action"><i class="fa-solid fa-pen-to-square"></i></a>';
                    }else {
                        $btn = $btn.'<a href="' . route('admin.product.edit', ['product_type' => 'affiliate', 'id' => $data->id]) . '" class="btn-action"><i class="fa-solid fa-pen-to-square"></i></a>';
                    }

                    if($data->Status == 1){
                        $btn = $btn.'<a href="' . route('admin.product.inactive', $data->id) . '" class="btn-action"><i class="fas fa-arrow-down"></i></a>';
                    }else{
                        $btn = $btn.'<a href="' . route('admin.product.active', $data->id) . '" class="btn-action"><i class="fas fa-arrow-up"></i></a>';
                    }
                    $btn = $btn.'<a href="' . route('admin.product.delete', $data->id) . '" class="btn-action delete"><i class="fas fa-trash-alt"></i></a>';
                    $btn = $btn.'</div>';
                    return $btn;
                })
                ->editColumn('PrimaryImage', function ($data) {
                    $url = asset(ProductImage() . $data->Primary_Image);
                    return '<img src=' . $url . ' border="0" width="50" class="img-rounded" align="center" />';
                })
                ->editColumn('ProductName', function ($data) {
                    return $data->en_Product_Name;
                })
                 ->editColumn('Quantity', function ($data) {
                    return $data->Quantity;
                })
                ->editColumn('Category', function ($data) {
                    return $data->category->en_Category_Name;
                })
                ->editColumn('Brand', function ($data) {
                    return $data->brand->en_BrandName;
                })
                ->editColumn('BronzePrice', function ($data) {
                    return $data->Bronze_Price;
                })
                ->editColumn('SilverPrice', function ($data) {
                    return $data->Silver_Price;
                })
                ->editColumn('GoldPrice', function ($data) {
                    return $data->Gold_Price;
                })
                ->editColumn('PlatinumPrice', function ($data) {
                    return $data->Platinum_Price;
                })
                ->editColumn('Price', function ($data) {
                    $dp=$data->Discount_Price;
                    $p=$data->Price;
                    $btn = '<span class="badge admin-new-price text-success">'.$dp.'</span>';
                    $btn =$btn.'<span class="badge admin-old-price text-danger">'.$p.'</span>';
                    return $btn;
                })
                ->editColumn('Status', function ($data) {
                    if($data->Status==1){
                        $active="Active";
                        return '<span class="status active">'.$active.'</span>';
                    }else{
                        $active="IcActive";
                        return '<span class="status blocked">'.$active.'</span>';
                    }
                })
                ->editColumn('type', function($data) {
                    if($data->type == PRODUCT_PHYSICAL) {
                        return __('Physical');
                    }elseif($data->type == PRODUCT_DIGITAL) {
                        return __('Digital');
                    }elseif($data->type == PRODUCT_LICENSE) {
                        return __('License');
                    }elseif ($data->type == PRODUCT_AFFILIATE) {
                        return __('Affiliate');
                    }
                 })
                ->rawColumns(['action','PrimaryImage','Category','Price','Status'])
                ->make(true);
        }
        $data['title'] = __('Product List');
        return view('admin.pages.product.index', $data);
    }
    public function productCreate(){
        $data['title'] = __('Product Create');
        $data['product'] = Product::get();
        $data['category'] = Category::all();//whereNull('parent_category')->get();
        $data['tags'] = ProductTagList::get();
        $data['item_tags'] = ItemTag::get();
        return view('admin.pages.product.create', $data);
    }
    public function physicalProductCreate(){
        $data['title'] = __('Physical Product Create');
        $data['product'] = Product::get();
        $data['category'] = Category::all();//whereNull('parent_category')->get();
        $data['tags'] = ProductTagList::get();
        $data['item_tags'] = ItemTag::get();
        $data['manufacturer'] = Manufacturer::get();

        return view('admin.pages.product.physical', $data);
    }
    public function digitalProductCreate(){
        $data['title'] = __('Digital Product Create');
        $data['category'] = Category::whereNull('parent_category')->get();
        $data['tags'] = ProductTagList::get();
        $data['item_tags'] = ItemTag::get();
        return view('admin.pages.product.digital', $data);
    }
    public function licenseProductCreate(){
        $data['title'] = __('License Product Create');
        $data['product'] = Product::get();
        $data['category'] = Category::whereNull('parent_category')->get();
        $data['tags'] = ProductTagList::get();
        $data['item_tags'] = ItemTag::get();
        return view('admin.pages.product.license', $data);
    }
    public function affiliateProductCreate(){
        $data['title'] = __('Affiliate Product Create');
        $data['product'] = Product::get();
        $data['category'] = Category::whereNull('parent_category')->get();
        $data['tags'] = ProductTagList::get();
        $data['item_tags'] = ItemTag::get();
        return view('admin.pages.product.affiliate', $data);
    }

    public function productStore(ProductRequest $request){ 
        $data = $request->except([
            'primary_image', 
            'image_two',
            'image_three',
            'image_four',
            'image_five',
            'status',
            'feature',
            'best_sale',
            'on_sale',
            'on_arrival',
            'digital_file',
            'digital_link',
            'license_name',
            'license_key',
            'affiliate_link',
            /*  'manufacturer', 
             'size_new',
            'qty',
             'bronze_price',
             'silver_price',
             'gold_price',
             'platinum_price',
             'price', 
             'discount_price',
             'en_description',
             'en_about',
             'en_shippingreturn',
             'spec_sheet',*/




        ]);
        if (!empty($request->primary_image)) {
            $data['primary_image'] = fileUpload($request['primary_image'], ProductImage());
        } else {
            return redirect()->back()->with('toast_error', __('Image is  required'));
        }
         if (!empty($request->image_two)) {
            $data['img_two'] = fileUpload($request['image_two'], ProductImage());
        } else {
            //return redirect()->back()->with('toast_error', __('Image is  required'));
              $data['img_two'] = '';
        }

        if (!empty($request->image_three)) {
            $data['img_three'] = fileUpload($request['image_three'], ProductImage());
        } else {
            //return redirect()->back()->with('toast_error', __('Image is  required'));
            $data['img_three'] ='';
        }
        if (!empty($request->image_four)) {
            $data['img_four'] = fileUpload($request['image_four'], ProductImage());
        } else {
            //return redirect()->back()->with('toast_error', __('Image is  required'));
            $data['img_four'] ='';
        }
        if (!empty($request->image_five)) {
            $data['img_five'] = fileUpload($request['image_five'], ProductImage());
        } else {
            //return redirect()->back()->with('toast_error', __('Image is  required'));
            $data['img_five'] ='';
        } 

        $file_folder = 'spec_sheets';  
        if ($request->spec_sheet) {            
                        $file_name = Storage::putFile($file_folder, new File($request->spec_sheet));  //public_path().'\uploaded_files\spec_sheets\'
                        $data['Spec_Sheet'] = $file_name;

                        $fileName = time().'.'.$request->spec_sheet->extension();
                        @$request->spec_sheet->move(public_path('uploaded_files/spec_sheets'), $fileName);  
                       
                       $data['Spec_Sheet'] = $fileName;                      
            }
            else 
            {
                $data['Spec_Sheet'] = null;                
            }


          if ($request->spec_sheet2) { 
                        $file_name = Storage::putFile($file_folder, new File($request->spec_sheet2));  //public_path().'\uploaded_files\spec_sheets\'
                        $data['Spec_Sheet2'] = $file_name;

                        $fileName = time().'.'.$request->spec_sheet2->extension();
                        @$request->spec_sheet2->move(public_path('uploaded_files/spec_sheets'), $fileName);  
                       
                       $data['Spec_Sheet2'] = $fileName;                      
            }
            else 
            {
                $data['Spec_Sheet2'] = null;                
            }



             if ($request->spec_sheet3) {   
                        $file_name = Storage::putFile($file_folder, new File($request->spec_sheet3));  //public_path().'\uploaded_files\spec_sheets\'
                        $data['Spec_Sheet3'] = $file_name;

                        $fileName = time().'.'.$request->spec_sheet3->extension();
                        @$request->spec_sheet3->move(public_path('uploaded_files/spec_sheets'), $fileName);  
                       
                       $data['Spec_Sheet3'] = $fileName;                      
            }
            else 
            {
                $data['Spec_Sheet3'] = null;                
            }



             if ($request->spec_sheet4) { 
                        $file_name = Storage::putFile($file_folder, new File($request->spec_sheet4));  //public_path().'\uploaded_files\spec_sheets\'
                        $data['Spec_Sheet4'] = $file_name;

                        $fileName = time().'.'.$request->spec_sheet4->extension();
                        @$request->spec_sheet4->move(public_path('uploaded_files/spec_sheets'), $fileName);  
                       
                       $data['Spec_Sheet4'] = $fileName;                      
            }
            else 
            {
                $data['Spec_Sheet4'] = null;                
            }


 


        $data['status']=checkBoxValue($request->status);
        $data['feature']=checkBoxValue($request->feature);
        $data['best_sale']=checkBoxValue($request->best_sale);
        $data['on_sale']=checkBoxValue($request->on_sale);
        $data['on_arrival']=checkBoxValue($request->on_arrival); 
        $data['is_retail_price'] = $request->is_retail_price;
        $data['showing_home'] = $request->showing_home;


        //location assign
        $data['location1'] = $request->location1;
        $data['location2'] = $request->location2;
        $data['location3'] = $request->location3;
        $data['location4'] = $request->location4;
        $data['location5'] = $request->location5;
        $data['location_next1'] = $request->location_next1;
        $data['location_next2'] = $request->location_next2;
        $data['location_next3'] = $request->location_next3;
        $data['location_next4'] = $request->location_next4;
        $data['location_next5'] = $request->location_next5;
        $data['location_date1'] = $request->location_date1;
        $data['location_date1'] = $request->location_date2;


        if($request->product_type == PRODUCT_PHYSICAL) {
            $create_product = $this->physicalProductAdd($data);
        }elseif($request->product_type == PRODUCT_DIGITAL) {
            if($request->digital_type == 'file') {
                if (!empty($request->digital_file)) {
                    $data['digital_file'] = fileUpload($request['digital_file'], PRODUCT_DIGITAL_PRODUCT);
                    $data['digital_link'] = null;
                } else {
                    return redirect()->back()->with('toast_error', __('File is  required'));
                }
            }else {
                $data['digital_file'] = null;
                $data['digital_link'] = $request->digital_link;
            }
            $create_product = $this->digitalProductAdd($data);
        }elseif($request->product_type == PRODUCT_LICENSE) {
            $data['license_name'] = $request->license_name;
            $data['license_key'] = $request->license_key;
            if($request->digital_type == 'file') {
                if (!empty($request->digital_file)) {
                    $data['digital_file'] = fileUpload($request['digital_file'], PRODUCT_DIGITAL_PRODUCT);
                    $data['digital_link'] = null;
                } else {
                    return redirect()->back()->with('toast_error', __('File is  required'));
                }
            }else {
                $data['digital_file'] = null;
                $data['digital_link'] = $request->digital_link;
            }
            $create_product = $this->licenseProductAdd($data);
        }elseif($request->product_type == PRODUCT_AFFILIATE) {
            $data['affiliate_link'] = $request->affiliate_link;
            $create_product = $this->affiliateProductAdd($data);
        }

        if($create_product['success'] == true) {
            return redirect()->route('admin.product')->with('toast_success', __('Successfully Product Created!'));
        }
        return redirect()->route('admin.product')->with('toast_error', __('Something went wrong!'));

    }

    public function physicalProductAdd($data)
    {

        //print_r($data); die();
        $result  =['success' => false];
         //dd($data['discount']);

        if($data['discount']==0 || $data['discount']==''){
            $discount = 0;
        }
        else{
         $discount = $data['discount'];   
        }


        $product = Product::create([
            'en_Product_Name' => $data['en_product_name'],
            'en_Product_Slug' => $data['en_product_slug'],
            'Brand_Id' => $data['en_brand_name'],
            'Category_Id' => $data['en_category_name'],
            'Bronze_Price' => $data['bronze_price'],
            'Silver_Price' => $data['silver_price'],
            'Gold_Price' => $data['gold_price'],
            'Platinum_Price' => $data['platinum_price'],
            'Price' => $data['price'],
            'Discount' => $discount,
            'Discount_Price' => $data['discount_price'],
            'en_About' => $data['en_about'],
            'en_Description' => $data['en_description'],
            'en_ShippingReturn' => $data['en_shippingreturn'],
            'en_AdditionalInformation' => $data['en_additionalinformation'],
            'Size_New'=>$data['size_new'],
         /*   'fr_Product_Name' => $data['fr_product_name'],
            'fr_Product_Slug' => $data['fr_product_slug'],
            'fr_About' => $data['fr_about'],
            'fr_Description' => $data['fr_description'],
            'fr_ShippingReturn' => $data['fr_shippingreturn'],
            'fr_AdditionalInformation' => $data['fr_additionalinformation'],*/
            'Quantity' => $data['qty'],
            'ItemTag' => $data['item_teg'],
            'Primary_Image' => $data['primary_image'],
            'Image2' => $data['img_two'],
            'Image3' => $data['img_three'],
            'Image4' => $data['img_four'],
            'Image5' => $data['img_five'],

            'Status' => $data['status'],
            'Featured_Product' => $data['feature'],
            'Best_Selling' => $data['best_sale'],
            'On_Sale' => $data['on_sale'],
            'New_Arrival' => $data['on_arrival'],
            'Voucher' => $this->generateRandomString(6),
            'Spec_Sheet'=>$data['Spec_Sheet'], 
            'Spec_Sheet2'=>$data['Spec_Sheet2'], 
            'Spec_Sheet3'=>$data['Spec_Sheet3'], 
            'Spec_Sheet4'=>$data['Spec_Sheet4'], 
            'is_retail_price' => $data['is_retail_price'],
            'showing_home' => $data['showing_home'],
        ]);
        //print_r( $product); die();
        if(!empty($product)){
            foreach($data['product_tag'] as $rpt) {
                ProductTag::create([
                    'tag' => $rpt,
                    'product_id' => $product->id,
                ]);
            }
            $colorsid = $data['color'];
            $sizeid = $data['size_new'];
            $product->colors()->sync($colorsid);
            //$product->sizes()->sync($sizeid);

            //add locations
            Location::create([
                'location1'=>$data['location1'],
                'location2'=>$data['location2'],
                'location3'=>$data['location3'],
                'location4'=>$data['location4'],
                'location5'=>$data['location5'],
                'location_next1'=>$data['location_next1'],
                'location_next2'=>$data['location_next2'],
                'location_next3'=>$data['location_next3'],
                'location_next4'=>$data['location_next4'],
                'location_next5'=>$data['location_next5'],
                'location_date1'=>$data['location_date1'],
                'location_date2'=>$data['location_date2'],
                 'product_id' => $product->id,
            ]);
               

            $result['success'] = true;
        }
        return $result;
    }

    public function digitalProductAdd($data)
    {
        $result  =['success' => false];
        $product = Product::create([
            'en_Product_Name' => $data['en_product_name'],
            'en_Product_Slug' => $data['en_product_slug'],
            'Brand_Id' => $data['en_brand_name'],
            'Category_Id' => $data['en_category_name'],
            'Bronze_Price' => $data['bronze_price'],
            'Silver_Price' => $data['silver_price'],
            'Gold_Price' => $data['gold_price'],
            'Platinum_Price' => $data['platinum_price'],
            'Price' => $data['price'],
            'Discount' => $data['discount'],
            'Discount_Price' => $data['discount_price'],
            'en_About' => $data['en_about'],
            'en_Description' => $data['en_description'],
            'en_ShippingReturn' => $data['en_shippingreturn'],
            'en_AdditionalInformation' => $data['en_additionalinformation'],
            'fr_Product_Name' => $data['fr_product_name'],
            'fr_Product_Slug' => $data['fr_product_slug'],
            'fr_About' => $data['fr_about'],
            'fr_Description' => $data['fr_description'],
            'fr_ShippingReturn' => $data['fr_shippingreturn'],
            'fr_AdditionalInformation' => $data['fr_additionalinformation'],
            'Quantity' => $data['qty'],
            'ItemTag' => $data['item_teg'],
            'Primary_Image' => $data['primary_image'],
            'Image2' => $data['img_two'],
            'Image3' => $data['img_three'],
            'Image4' => $data['img_four'],
            'Image5' => $data['img_five'],

            'Status' => $data['status'],
            'Featured_Product' => $data['feature'],
            'Best_Selling' => $data['best_sale'],
            'On_Sale' => $data['on_sale'],
            'New_Arrival' => $data['on_arrival'],
            'Voucher' => $this->generateRandomString(6),
            'digital_type' => $data['digital_type'],
            'digital_file' => $data['digital_file'],
            'digital_link' => $data['digital_link'],
            'type' => PRODUCT_DIGITAL,
        ]);
        if(!empty($product)){
            foreach($data['product_tag'] as $rpt) {
                ProductTag::create([
                    'tag' => $rpt,
                    'product_id' => $product->id,
                ]);
            }

            $result['success'] = true;
        }
        return $result;
    }

    public function licenseProductAdd($data)
    {
        $result  =['success' => false];
        $product = Product::create([
            'en_Product_Name' => $data['en_product_name'],
            'en_Product_Slug' => $data['en_product_slug'],
            'Brand_Id' => $data['en_brand_name'],
            'Category_Id' => $data['en_category_name'],
            'Bronze_Price' => $data['bronze_price'],
            'Silver_Price' => $data['silver_price'],
            'Gold_Price' => $data['gold_price'],
            'Platinum_Price' => $data['platinum_price'],
            'Price' => $data['price'],
            'Discount' => $data['discount'],
            'Discount_Price' => $data['discount_price'],
            'en_About' => $data['en_about'],
            'en_Description' => $data['en_description'],
            'en_ShippingReturn' => $data['en_shippingreturn'],
            'en_AdditionalInformation' => $data['en_additionalinformation'],
            'fr_Product_Name' => $data['fr_product_name'],
            'fr_Product_Slug' => $data['fr_product_slug'],
            'fr_About' => $data['fr_about'],
            'fr_Description' => $data['fr_description'],
            'fr_ShippingReturn' => $data['fr_shippingreturn'],
            'fr_AdditionalInformation' => $data['fr_additionalinformation'],
            'Quantity' => $data['qty'],
            'ItemTag' => $data['item_teg'],
            'Primary_Image' => $data['primary_image'],
            'Image2' => $data['img_two'],
            'Image3' => $data['img_three'],
            'Image4' => $data['img_four'],
            'Image5' => $data['img_five'],

            'Status' => $data['status'],
            'Featured_Product' => $data['feature'],
            'Best_Selling' => $data['best_sale'],
            'On_Sale' => $data['on_sale'],
            'New_Arrival' => $data['on_arrival'],
            'Voucher' => $this->generateRandomString(6),
            'digital_type' => $data['digital_type'],
            'digital_file' => $data['digital_file'],
            'digital_link' => $data['digital_link'],
            'license_name' => $data['license_name'],
            'license_key' => $data['license_key'],
            'type' => PRODUCT_LICENSE,
        ]);
        if(!empty($product)){
            foreach($data['product_tag'] as $rpt) {
                ProductTag::create([
                    'tag' => $rpt,
                    'product_id' => $product->id,
                ]);
            }

            $result['success'] = true;
        }
        return $result;
    }

    public function affiliateProductAdd($data)
    {
        $result  =['success' => false];
        $product = Product::create([
            'en_Product_Name' => $data['en_product_name'],
            'en_Product_Slug' => $data['en_product_slug'],
            'Brand_Id' => $data['en_brand_name'],
            'Category_Id' => $data['en_category_name'],
            'Bronze_Price' => $data['bronze_price'],
            'Silver_Price' => $data['silver_price'],
            'Gold_Price' => $data['gold_price'],
            'Platinum_Price' => $data['platinum_price'],
            'Price' => $data['price'],
            'Discount' => $data['discount'],
            'Discount_Price' => $data['discount_price'],
            'en_About' => $data['en_about'],
            'en_Description' => $data['en_description'],
            'en_ShippingReturn' => $data['en_shippingreturn'],
            'en_AdditionalInformation' => $data['en_additionalinformation'],
            'fr_Product_Name' => $data['fr_product_name'],
            'fr_Product_Slug' => $data['fr_product_slug'],
            'fr_About' => $data['fr_about'],
            'fr_Description' => $data['fr_description'],
            'fr_ShippingReturn' => $data['fr_shippingreturn'],
            'fr_AdditionalInformation' => $data['fr_additionalinformation'],
            'Quantity' => $data['qty'],
            'ItemTag' => $data['item_teg'],
            'Primary_Image' => $data['primary_image'],
            'Image2' => $data['img_two'],
            'Image3' => $data['img_three'],
            'Image4' => $data['img_four'],
            'Image5' => $data['img_five'],

            'Status' => $data['status'],
            'Featured_Product' => $data['feature'],
            'Best_Selling' => $data['best_sale'],
            'On_Sale' => $data['on_sale'],
            'New_Arrival' => $data['on_arrival'],
            'Voucher' => $this->generateRandomString(6),
            'affiliate_link' => $data['affiliate_link'],
            'type' => PRODUCT_AFFILIATE,
        ]);
        if(!empty($product)){
            foreach($data['product_tag'] as $rpt) {
                ProductTag::create([
                    'tag' => $rpt,
                    'product_id' => $product->id,
                ]);
            }

            $result['success'] = true;
        }
        return $result;
    }

    public function productDelete($id){
        $order_count = OrderDetails::where('Product_Id', $id)->count();
        if($order_count != 0) {
            return redirect()->route('admin.product')->with('toast_error', __('This product is already order by some one! First delete those.'));
        }
        $delete = Product::Where('id', $id);
        if ($delete) {
            $delete->delete();
            return redirect()->route('admin.product')->with('toast_success', __('Successfully Deleted !'));
        }
        return redirect()->route('admin.product')->with('toast_error', __('Does Not Delete!'));
    }
    public function productActive($id){
        $inactive=Product::find($id)->update(['Status'=>1]);
        if($inactive){
            return redirect()->route('admin.product')->with('toast_success', __('Successfully Active !'));
        }
        return redirect()->route('admin.product')->with('toast_success', __('Does not Updated !'));
    }
    public function productInactive($id){
        $inactive=Product::find($id)->update(['Status'=>0]);
        if($inactive){
            return redirect()->route('admin.product')->with('toast_success', __('Successfully Inactive !'));
        }
        return redirect()->route('admin.product')->with('toast_success', __('Does not Updated !'));
    }

    public function productEdit($product_type, $id){
        $data['title'] = __('Product Edit');
        $data['product'] = Product::with('brand','category','colors','sizes', 'product_tags','location')->where('id', $id)->first();
        $data['colors'] = Color::latest()->get();
        $data['sizes'] = Size::latest()->get();
        $data['tags'] = ProductTagList::get();
        $data['item_tags'] = ItemTag::get();
           $data['category'] = Category::all();
        //print_r($data['product']->location[0]['location1']);
        //die();
        /*$product_detail = Location::where('product_id', $id)->first();
        if($product_detail){
            $data['location'] = $product_detail;
        }*/
        //print_r($data['location']); die();

        if($product_type == 'physical') {
            return $this->physicalProductEditView($data);
        }elseif($product_type == 'digital') {
            return $this->digitalProductEditView($data);
        }elseif ($product_type == 'license') {
            return $this->licenseProductEditView($data);
        }else {
            return $this->affiliateProductEditView($data);
        }
    }

    public function physicalProductEditView($data)
    {  
        return view('admin.pages.product.edit.physical', $data);
    }

    public function digitalProductEditView($data)
    {
        return view('admin.pages.product.edit.digital', $data);
    }

    public function licenseProductEditView($data)
    {
        return view('admin.pages.product.edit.license', $data);
    }

    public function affiliateProductEditView($data)
    {
        return view('admin.pages.product.edit.affiliate', $data);
    }

    public function productUpdate(Request $request){
        $id=$request->id;
        $product = Product::where('id',$id)->first();
        $data = $request->except([
            'primary_image',
            'image_two',
            'image_three',
            'image_four',
            'image_five',
            'status',
            'feature',
            'best_sale',
            'on_sale',
            'on_arrival',
            'digital_file',
            'digital_link',
            'license_name',
            'license_key',
            'affiliate_link',
        ]);
        if (!empty($request->primary_image)) {
            $data['primary_image'] = fileUpload($request['primary_image'], ProductImage());
        } else {
            $data['primary_image'] = $product->Primary_Image;
        }
        if (!empty($request->image_two)) {
            $data['img_two'] = fileUpload($request['image_two'], ProductImage());
        } else {
            $data['img_two'] = $product->Image2;
        }

        if (!empty($request->image_three)) {
            $data['img_three'] = fileUpload($request['image_three'], ProductImage());
        } else {
            $data['img_three'] = $product->Image3;
        }
        if (!empty($request->image_four)) {
            $data['img_four'] = fileUpload($request['image_four'], ProductImage());
        } else {
            $data['img_four'] = $product->Image4;
        }
        if (!empty($request->image_five)) {
            $data['img_five'] = fileUpload($request['image_five'], ProductImage());
        } else {
            $data['img_five'] = $product->Image5;
        }


          if ($request->spec_sheet) {

            $file_folder = 'spec_sheets';   
                        $file_name = Storage::putFile($file_folder, new File($request->spec_sheet));  //public_path().'\uploaded_files\spec_sheets\'
                        $data['Spec_Sheet'] = $file_name;

                        $fileName = time().'.'.$request->spec_sheet->extension();
                        @$request->spec_sheet->move(public_path('uploaded_files/spec_sheets'), $fileName);  
                       
                       $data['Spec_Sheet'] = $fileName;                      
            }
            else 
            {
                $data['Spec_Sheet'] = $product->Spec_Sheet;                
            }




          if ($request->spec_sheet2) {

            $file_folder = 'spec_sheets';   
                        $file_name = Storage::putFile($file_folder, new File($request->spec_sheet2));  //public_path().'\uploaded_files\spec_sheets\'
                        $data['Spec_Sheet2'] = $file_name;

                        $fileName = time().'.'.$request->spec_sheet2->extension();
                        @$request->spec_sheet2->move(public_path('uploaded_files/spec_sheets'), $fileName);  
                       
                       $data['Spec_Sheet2'] = $fileName;                      
            }
            else 
            {
                $data['Spec_Sheet2'] = $product->Spec_Sheet2;                
            }




          if ($request->spec_sheet3) {

            $file_folder = 'spec_sheets';   
                        $file_name = Storage::putFile($file_folder, new File($request->spec_sheet3));  //public_path().'\uploaded_files\spec_sheets\'
                        $data['Spec_Sheet3'] = $file_name;

                        $fileName = time().'.'.$request->spec_sheet3->extension();
                        @$request->spec_sheet->move(public_path('uploaded_files/spec_sheets'), $fileName);  
                       
                       $data['Spec_Sheet3'] = $fileName;                      
            }
            else 
            {
                $data['Spec_Sheet3'] = $product->Spec_Sheet;                
            }




          if ($request->spec_sheet4) {

            $file_folder = 'spec_sheets';   
                        $file_name = Storage::putFile($file_folder, new File($request->spec_sheet4));  //public_path().'\uploaded_files\spec_sheets\'
                        $data['Spec_Sheet4'] = $file_name;

                        $fileName = time().'.'.$request->spec_sheet4->extension();
                        @$request->spec_sheet->move(public_path('uploaded_files/spec_sheets'), $fileName);  
                       
                       $data['Spec_Sheet4'] = $fileName;                      
            }
            else 
            {
                $data['Spec_Sheet4'] = $product->Spec_Sheet;                
            }

 


        $data['status'] = checkBoxValue($request->status);
        $data['feature'] = checkBoxValue($request->feature);
        $data['best_sale'] = checkBoxValue($request->best_sale);
        $data['on_sale'] = checkBoxValue($request->on_sale);
        $data['on_arrival'] = checkBoxValue($request->on_arrival);
        $data['is_retail_price']=$request->is_retail_price;
        $data['showing_home']=$request->showing_home;

        //location assign
        $data['location1'] = $request->location1;
        $data['location2'] = $request->location2;
        $data['location3'] = $request->location3;
        $data['location4'] = $request->location4;
        $data['location5'] = $request->location5;
        $data['location_next1'] = $request->location_next1;
        $data['location_next2'] = $request->location_next2;
        $data['location_next3'] = $request->location_next3;
        $data['location_next4'] = $request->location_next4;
        $data['location_next5'] = $request->location_next5;
        $data['location_date1'] = $request->location_date1;
        $data['location_date2'] = $request->location_date2;


        if($product->type == PRODUCT_PHYSICAL) {
            $update = $this->physicalProductUpdate($data, $product);
        }elseif($product->type == PRODUCT_DIGITAL) {
            if($product->digital_type == 'file') {
                if (!empty($request->digital_file)) {
                    $data['digital_file'] = fileUpload($request['digital_file'], PRODUCT_DIGITAL_PRODUCT);
                    $data['digital_link'] = null;
                } else {
                    $data['digital_file'] = $product->digital_file;
                    $data['digital_link'] = null;
                }
            }else {
                $data['digital_file'] = null;
                $data['digital_link'] = is_null($request->digital_link) ? $product->digital_link : $request->digital_link;
            }
            $update = $this->digitalProductUpdate($data, $product);
        }elseif($product->type == PRODUCT_LICENSE) {
            $data['license_name'] = is_null($request->license_name) ? $product->license_name : $request->license_name;
            $data['license_key'] = is_null($request->license_key) ? $product->license_link : $request->license_key;
            if($product->digital_type == 'file') {
                if (!empty($request->digital_file)) {
                    $data['digital_file'] = fileUpload($request['digital_file'], PRODUCT_DIGITAL_PRODUCT);
                    $data['digital_link'] = null;
                } else {
                    $data['digital_file'] = $product->digital_file;
                    $data['digital_link'] = null;
                }
            }else {
                $data['digital_file'] = null;
                $data['digital_link'] = is_null($request->digital_link) ? $product->digital_link : $request->digital_link;
            }
            $update = $this->licenseProductUpdate($data, $product);
        }elseif($product->type == PRODUCT_AFFILIATE) {
            $data['affiliate_link'] = is_null($request->affiliate_link) ? $product->affiliate_link : $request->affiliate_link;
            $update = $this->affiliateProductUpdate($data, $product);
        }

        if($update['success'] == true) {
            return redirect()->route('admin.product')->with('toast_success', __('Successfully Updated!'));
        }
        return redirect()->back()->with('toast_error', __('Something went wrong!'));
    }

    public function physicalProductUpdate($data, $product)
    {
        $result = ['success' => false];

        $update = $product->update([
            'en_Product_Name' => is_null($data['en_product_name']) ? $product->en_Product_Name : $data['en_product_name'],
            'Brand_Id' => is_null($data['en_brand_name']) ? $product->Brand_Id : $data['en_brand_name'],
            'Category_Id' => is_null($data['en_category_name']) ? $product->Category_Id : $data['en_category_name'],
            'Bronze_Price' => is_null($data['bronze_price']) ? $product->Bronze_Price : $data['bronze_price'],
            'Silver_Price' => is_null($data['silver_price']) ? $product->Silver_Price : $data['silver_price'],
            'Gold_Price' => is_null($data['gold_price']) ? $product->Gold_Price : $data['gold_price'],
            'Platinum_Price' => is_null($data['platinum_price']) ? $product->Platinum_Price : $data['platinum_price'],
            'Price' => is_null($data['price']) ? $product->Price : $data['price'],
            'Discount' => is_null($data['discount']) ? $product->Discount : $data['discount'],
            'Discount_Price' => is_null($data['discount_price']) ? $product->Discount_Price : $data['discount_price'],
            'en_About' => is_null($data['en_about']) ? $product->en_About : $data['en_about'],
            'en_Description' => is_null($data['en_description']) ? $product->en_Description : $data['en_description'],
            'en_ShippingReturn' => is_null($data['en_shippingreturn']) ? $product->en_ShippingReturn : $data['en_shippingreturn'],
            'en_AdditionalInformation' => is_null($data['en_additionalinformation']) ? $product->en_AdditionalInformation : $data['en_additionalinformation'],
         /*   'fr_Product_Name' => is_null($data['fr_product_name']) ? $product->fr_Product_Name : $data['fr_product_name'],
            'fr_About' => is_null($data['fr_about']) ? $product->fr_About : $data['fr_about'],
            'fr_Description' => is_null($data['fr_description']) ? $product->fr_Description : $data['fr_description'],
            'fr_ShippingReturn' => is_null($data['fr_shippingreturn']) ? $product->fr_ShippingReturn : $data['fr_shippingreturn'],
            'fr_AdditionalInformation' => is_null($data['fr_additionalinformation']) ? $product->fr_AdditionalInformation : $data['fr_additionalinformation'],*/
             'Size_New'=>$data['size_new'],
            'Quantity' => is_null($data['qty']) ? $product->Quantity : $data['qty'],
            'ItemTag' => is_null($data['item_teg']) ? $product->ItemTag : $data['item_teg'],
            'Primary_Image' => $data['primary_image'],
            'Image2' => $data['img_two'],
            'Image3' => $data['img_three'],
            'Image4' => $data['img_four'],
            'Image5' => $data['img_five'],

            'Status' => $data['status'],
            'Featured_Product' => $data['feature'],
            'Best_Selling' => $data['best_sale'],
            'On_Sale' => $data['on_sale'],
            'New_Arrival' => $data['on_arrival'],  
            'New_Size'=>$data['size_new'],
            'Spec_Sheet'=>$data['Spec_Sheet'],
            'Spec_Sheet2'=>$data['Spec_Sheet2'],
            'Spec_Sheet3'=>$data['Spec_Sheet3'],
            'Spec_Sheet4'=>$data['Spec_Sheet4'],
            'is_retail_price'=>$data['is_retail_price'],
            'showing_home'=>$data['showing_home'],
        ]);
        if(!empty($update)){
            ProductTag::where('product_id', $product->id)->delete();
            foreach($data['product_tag'] as $rpt) {
                ProductTag::create([
                    'tag' => $rpt,
                    'product_id' => $product->id,
                ]);
            }
            DB::table('color_product')->where('Product_Id',$product->id)->delete();
            DB::table('size_product')->where('Product_Id',$product->id)->delete();
            $pr=Product::find($product->id);
            $colorsid = $data['color'];
            //$sizeid = $data['size'];
            $pr->colors()->syncWithoutDetaching($colorsid);
           // $pr->sizes()->syncWithoutDetaching($sizeid);


            if(Location::where('product_id',$product->id)->first() ){//update locations
                 Location::where('product_id',$product->id)->update([
                'location1'=>$data['location1'],
                'location2'=>$data['location2'],
                'location3'=>$data['location3'],
                'location4'=>$data['location4'],
                'location5'=>$data['location5'],
                'location_next1'=>$data['location_next1'],
                'location_next2'=>$data['location_next2'],
                'location_next3'=>$data['location_next3'],
                'location_next4'=>$data['location_next4'],
                'location_next5'=>$data['location_next5'], 
                'location_date1'=>$data['location_date1'], 
                'location_date2'=>$data['location_date2'], 
            ]);
            } 
            else{ //add location 
                     Location::create([
                'location1'=>$data['location1'],
                'location2'=>$data['location2'],
                'location3'=>$data['location3'],
                'location4'=>$data['location4'],
                'location5'=>$data['location5'],
                'location_next1'=>$data['location_next1'],
                'location_next2'=>$data['location_next2'],
                'location_next3'=>$data['location_next3'],
                'location_next4'=>$data['location_next4'],
                'location_next5'=>$data['location_next5'],
                'location_date1'=>$data['location_date1'], 
                'location_date2'=>$data['location_date2'], 
                 'product_id' => $product->id,
            ]);
               
           
        }
               

            $result['success'] = true;
        }
        return $result;
    }

    public function digitalProductUpdate($data, $product)
    {
        $result = ['success' => false];
        $update = $product->update([
            'en_Product_Name' => is_null($data['en_product_name']) ? $product->en_Product_Name : $data['en_product_name'],
            'Brand_Id' => is_null($data['en_brand_name']) ? $product->Brand_Id : $data['en_brand_name'],
            'Category_Id' => is_null($data['en_category_name']) ? $product->Category_Id : $data['en_category_name'],
            'Bronze_Price' => is_null($data['bronze_price']) ? $product->Bronze_Price : $data['bronze_price'],
            'Silver_Price' => is_null($data['silver_price']) ? $product->Silver_Price : $data['silver_price'],
            'Gold_Price' => is_null($data['gold_price']) ? $product->Gold_Price : $data['gold_price'],
            'Platinum_Price' => is_null($data['platinum_price']) ? $product->Platinum_Price : $data['platinum_price'],
            'Price' => is_null($data['price']) ? $product->Price : $data['price'],
            'Discount' => is_null($data['discount']) ? $product->Discount : $data['discount'],
            'Discount_Price' => is_null($data['discount_price']) ? $product->Discount_Price : $data['discount_price'],
            'en_About' => is_null($data['en_about']) ? $product->en_About : $data['en_about'],
            'en_Description' => is_null($data['en_description']) ? $product->en_Description : $data['en_description'],
            'en_ShippingReturn' => is_null($data['en_shippingreturn']) ? $product->en_ShippingReturn : $data['en_shippingreturn'],
            'en_AdditionalInformation' => is_null($data['en_additionalinformation']) ? $product->en_AdditionalInformation : $data['en_additionalinformation'],
            'fr_Product_Name' => is_null($data['fr_product_name']) ? $product->fr_Product_Name : $data['fr_product_name'],
            'fr_About' => is_null($data['fr_about']) ? $product->fr_About : $data['fr_about'],
            'fr_Description' => is_null($data['fr_description']) ? $product->fr_Description : $data['fr_description'],
            'fr_ShippingReturn' => is_null($data['fr_shippingreturn']) ? $product->fr_ShippingReturn : $data['fr_shippingreturn'],
            'fr_AdditionalInformation' => is_null($data['fr_additionalinformation']) ? $product->fr_AdditionalInformation : $data['fr_additionalinformation'],
            'Quantity' => is_null($data['qty']) ? $product->Quantity : $data['qty'],
            'ItemTag' => is_null($data['item_teg']) ? $product->ItemTag : $data['item_teg'],
            'Primary_Image' => $data['primary_image'],
            'Image2' => $data['img_two'],
            'Image3' => $data['img_three'],
            'Image4' => $data['img_four'],
            'Image5' => $data['img_five'],

            'Status' => $data['status'],
            'Featured_Product' => $data['feature'],
            'Best_Selling' => $data['best_sale'],
            'On_Sale' => $data['on_sale'],
            'New_Arrival' => $data['on_arrival'],
            'digital_file' => $data['digital_file'],
            'digital_link' => $data['digital_link'],
        ]);
        if(!empty($update)){
            ProductTag::where('product_id', $product->id)->delete();
            foreach($data['product_tag'] as $rpt) {
                ProductTag::create([
                    'tag' => $rpt,
                    'product_id' => $product->id,
                ]);
            }

            $result['success'] = true;
        }
        return $result;
    }

    public function licenseProductUpdate($data, $product)
    {
        $result = ['success' => false];
        $update = $product->update([
            'en_Product_Name' => is_null($data['en_product_name']) ? $product->en_Product_Name : $data['en_product_name'],
            'Brand_Id' => is_null($data['en_brand_name']) ? $product->Brand_Id : $data['en_brand_name'],
            'Category_Id' => is_null($data['en_category_name']) ? $product->Category_Id : $data['en_category_name'],
            'Bronze_Price' => is_null($data['bronze_price']) ? $product->Bronze_Price : $data['bronze_price'],
            'Silver_Price' => is_null($data['silver_price']) ? $product->Silver_Price : $data['silver_price'],
            'Gold_Price' => is_null($data['gold_price']) ? $product->Gold_Price : $data['gold_price'],
            'Platinum_Price' => is_null($data['platinum_price']) ? $product->Platinum_Price : $data['platinum_price'],
            'Price' => is_null($data['price']) ? $product->Price : $data['price'],
            'Discount' => is_null($data['discount']) ? $product->Discount : $data['discount'],
            'Discount_Price' => is_null($data['discount_price']) ? $product->Discount_Price : $data['discount_price'],
            'en_About' => is_null($data['en_about']) ? $product->en_About : $data['en_about'],
            'en_Description' => is_null($data['en_description']) ? $product->en_Description : $data['en_description'],
            'en_ShippingReturn' => is_null($data['en_shippingreturn']) ? $product->en_ShippingReturn : $data['en_shippingreturn'],
            'en_AdditionalInformation' => is_null($data['en_additionalinformation']) ? $product->en_AdditionalInformation : $data['en_additionalinformation'],
            'fr_Product_Name' => is_null($data['fr_product_name']) ? $product->fr_Product_Name : $data['fr_product_name'],
            'fr_About' => is_null($data['fr_about']) ? $product->fr_About : $data['fr_about'],
            'fr_Description' => is_null($data['fr_description']) ? $product->fr_Description : $data['fr_description'],
            'fr_ShippingReturn' => is_null($data['fr_shippingreturn']) ? $product->fr_ShippingReturn : $data['fr_shippingreturn'],
            'fr_AdditionalInformation' => is_null($data['fr_additionalinformation']) ? $product->fr_AdditionalInformation : $data['fr_additionalinformation'],
            'Quantity' => is_null($data['qty']) ? $product->Quantity : $data['qty'],
            'ItemTag' => is_null($data['item_teg']) ? $product->ItemTag : $data['item_teg'],
            'Primary_Image' => $data['primary_image'],
            'Image2' => $data['img_two'],
            'Image3' => $data['img_three'],
            'Image4' => $data['img_four'],
            'Image5' => $data['img_five'],

            'Status' => $data['status'],
            'Featured_Product' => $data['feature'],
            'Best_Selling' => $data['best_sale'],
            'On_Sale' => $data['on_sale'],
            'New_Arrival' => $data['on_arrival'],
            'digital_file' => $data['digital_file'],
            'digital_link' => $data['digital_link'],
            'license_name' => $data['license_name'],
            'license_key' => $data['license_key'],
        ]);
        if(!empty($update)){
            ProductTag::where('product_id', $product->id)->delete();
            foreach($data['product_tag'] as $rpt) {
                ProductTag::create([
                    'tag' => $rpt,
                    'product_id' => $product->id,
                ]);
            }
            $result['success'] = true;
        }
        return $result;
    }

    public function affiliateProductUpdate($data, $product)
    {
        $result = ['success' => false];
        $update = $product->update([
            'en_Product_Name' => is_null($data['en_product_name']) ? $product->en_Product_Name : $data['en_product_name'],
            'Brand_Id' => is_null($data['en_brand_name']) ? $product->Brand_Id : $data['en_brand_name'],
            'Category_Id' => is_null($data['en_category_name']) ? $product->Category_Id : $data['en_category_name'],
            'Bronze_Price' => is_null($data['bronze_price']) ? $product->Bronze_Price : $data['bronze_price'],
            'Silver_Price' => is_null($data['silver_price']) ? $product->Silver_Price : $data['silver_price'],
            'Gold_Price' => is_null($data['gold_price']) ? $product->Gold_Price : $data['gold_price'],
            'Platinum_Price' => is_null($data['platinum_price']) ? $product->Platinum_Price : $data['platinum_price'],
            'Price' => is_null($data['price']) ? $product->Price : $data['price'],
            'Discount' => is_null($data['discount']) ? $product->Discount : $data['discount'],
            'Discount_Price' => is_null($data['discount_price']) ? $product->Discount_Price : $data['discount_price'],
            'en_About' => is_null($data['en_about']) ? $product->en_About : $data['en_about'],
            'en_Description' => is_null($data['en_description']) ? $product->en_Description : $data['en_description'],
            'en_ShippingReturn' => is_null($data['en_shippingreturn']) ? $product->en_ShippingReturn : $data['en_shippingreturn'],
            'en_AdditionalInformation' => is_null($data['en_additionalinformation']) ? $product->en_AdditionalInformation : $data['en_additionalinformation'],
            'fr_Product_Name' => is_null($data['fr_product_name']) ? $product->fr_Product_Name : $data['fr_product_name'],
            'fr_About' => is_null($data['fr_about']) ? $product->fr_About : $data['fr_about'],
            'fr_Description' => is_null($data['fr_description']) ? $product->fr_Description : $data['fr_description'],
            'fr_ShippingReturn' => is_null($data['fr_shippingreturn']) ? $product->fr_ShippingReturn : $data['fr_shippingreturn'],
            'fr_AdditionalInformation' => is_null($data['fr_additionalinformation']) ? $product->fr_AdditionalInformation : $data['fr_additionalinformation'],
            'Quantity' => is_null($data['qty']) ? $product->Quantity : $data['qty'],
            'ItemTag' => is_null($data['item_teg']) ? $product->ItemTag : $data['item_teg'],
            'Primary_Image' => $data['primary_image'],
            'Image2' => $data['img_two'],
            'Image3' => $data['img_three'],
            'Image4' => $data['img_four'],
            'Image5' => $data['img_five'],

            'Status' => $data['status'],
            'Featured_Product' => $data['feature'],
            'Best_Selling' => $data['best_sale'],
            'On_Sale' => $data['on_sale'],
            'New_Arrival' => $data['on_arrival'],
            'affiliate_link' => $data['affiliate_link'],
        ]);
        if(!empty($update)){
            ProductTag::where('product_id', $product->id)->delete();
            foreach($data['product_tag'] as $rpt) {
                ProductTag::create([
                    'tag' => $rpt,
                    'product_id' => $product->id,
                ]);
            }
            $result['success'] = true;
        }
        return $result;
    }

    public function slugify($text){

        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        $text = preg_replace('~[^-\w]+~', '', $text);

        $text = trim($text, '-');

        $text = preg_replace('~-+~', '-', $text);

        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }
        return $text;
    }

    public  function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function product_image_remove(Request $request){  
         $product_data = array();
         
         if($request->image==2)
         $product_data['Image2']='';

         if($request->image==3)
         $product_data['Image3']='';

         if($request->image==4)
         $product_data['Image4']='';

         if($request->image==5)
         $product_data['Image5']='';   


        Product::where('id',$request->id)->update($product_data);
        return Redirect::back();


    }
}
