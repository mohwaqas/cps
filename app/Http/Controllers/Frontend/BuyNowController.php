<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Color;
use App\Models\Admin\Product;
use App\Models\Admin\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Cart;

class BuyNowController extends Controller
{
    public function buyNow(Request $request){
        if (Auth::check()){
            if ($request->ajax()) {
                $product=Product::with('colors','sizes',)->where('id',$request->product_id)->first();
                $color_id = DB::table('color_product')->where('Product_Id', $request->product_id)->where('Color_Id', $request->color_id)->count();
                $size_id = DB::table('size_product')->where('Product_Id', $request->product_id)->where('Size_Id', $request->size_id)->count();
                if($color_id == 0 ){
                    $color_id = null;
                }
                if($size_id == 0){
                    $size_id=null;
                }
                $color_name=Color::where('id',$request->color_id)->first();
                $size_name=Size::where('id',$request->size_id)->first();

                $user = auth()->check();
                $installer = $user ? auth()->user()->is_installer : 0;
                $userPackage = $user ? auth()->user()->package_id : 0;
                $price = 0;
                $weight = 0;

                if($user && $userPackage === 0) {
                    $price = $product->Price;
                    $weight = $product->Price;
                }
                else if($user && $userPackage === 1) {
                    $price = $product->Bronze_Price;
                    $weight = $product->Bronze_Price;
                }
                else if($user && $userPackage === 2) {
                    $price = $product->Silver_Price;
                    $weight = $product->Silver_Price;
                }
                else if($user && $userPackage === 3) {
                    $price = $product->Gold_Price;
                    $weight = $product->Gold_Price;
                }
                else if($user && $userPackage === 4) {
                    $price = $product->Platinum_Price;
                    $weight = $product->Platinum_Price;
                }
                else {
                    $price = $product->Discount_Price;
                    $weight = $product->Price;
                }

                $cart= Cart::add([
                    'id' => $request->product_id,
                    'name' => $product->en_Product_Name,
                    'qty' => $request->quantity,
                    'price' => $price,
                    'weight' => $weight,
                    'options' =>
                        ['size' => $size_id == 0 ? $size_id : $size_name->Size,
                            'color' => $color_id == 0 ? $color_id : $color_name->ColorCode,
                            'image'=>$product->Primary_Image,
                            'discount_price'=> $price,
                            'item_tag'=>$product->ItemTag,
                            'discount_parcent'=>$product->Discount,
                            'voucher'=>$product->Voucher,
                        ]
                ]);
                if($cart){
                    return redirect()->route('checkout');
                }
            }
        }
    }
}
