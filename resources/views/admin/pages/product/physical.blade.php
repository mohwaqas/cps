@extends('admin.master', ['menu' => 'products', 'submenu' => 'product'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Add Product')}}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Product')}}</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="gallery__area bg-style">
                <div class="gallery__content">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <form enctype="multipart/form-data" method="POST" action="{{route('admin.product.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-vertical__item bg-style">
                                             
                                            <input type="hidden" name="product_type" value="{{PRODUCT_PHYSICAL}}">
                                             
                                             <div class="row">
                                                    <div><input type="checkbox" name="showing_home" value="1" />  Show Home Page</div>
                                             </div><br> <br><br>   


                                             <div class="input__group mb-25">
                                                <label for="en-product-name">Meta Title</label>
                                                <input type="text" class="form-control" id="meta_title" name="meta_title">
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="en-product-name">Meta Keywords</label>
                                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords">
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="en-product-name">Meta Description</label>
                                                <input type="text" class="form-control" id="meta_description" name="meta_description">
                                            </div>



                                            <div class="input__group mb-25">
                                                <label for="en-product-name">{{ __('Product Name')}}</label>
                                                <input type="text" class="form-control" id="en-product-name" name="en_product_name">
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="en-product-slug">{{ __('Product Slug')}}</label>
                                                <input type="text" class="form-control" id="en-product-slug" name="en_product_slug">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Brand Name')}}</label>
                                                <select class="form-control" id="en_brand_name" name="en_brand_name">
                                                    <option>{{__('---Select item---')}}</option>
                                                    @foreach(Brnad() as $item)
                                                        <option value="{{$item->id}}">{{$item->en_BrandName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Primary Image')}}</label>
                                                <input type="file" class="form-control putImage1"  name="primary_image" id="primary_image">
                                                <img   src="" id="target1"/>
                                
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Image 2')}}</label>
                                                <input type="file" class="form-control putImage2"  name="image_two" id="image_two">
                                                <img   src="" id="target2"/>
                                                <input type="button" value="Remove" id="" name="" onclick="" />
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Image Gallery Image')}}</label>
                                                <input type="file" class="form-control putImage3"  name="image_three" id="image_three">
                                                <img   src="" id="target3"/>
                                                   <input type="button" value="Remove" id="" name="" onclick="" />
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Image 3')}}</label>
                                                <input type="file" class="form-control putImage4"  name="image_four" id="image_four">
                                                <img   src="" id="target4"/>
                                                   <input type="button" value="Remove" id="" name="" onclick="" />
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Image 4')}}</label>
                                                <input type="file" class="form-control putImage5"  name="image_five" id="image_five">
                                                <img   src="" id="target5"/>
                                                   <input type="button" value="Remove" id="" name="" onclick="" />
                                            </div>


                                            
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Category Name')}}</label>
                                                <select class="form-control" id="en_category_name" name="en_category_name">
                                                    <option>{{__('---Select item---')}}</option>
                                                    @foreach($category as $item)
                                                        <option value="{{$item->id}}">{{$item->en_Category_Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Item Tag')}}</label>
                                                <select class="form-control" id="item_teg" name="item_teg">
                                                    <option>{{__('---Select item---')}}</option>
                                                    @foreach ($item_tags as $it)
                                                        <option value="{{$it->name}}">{{$it->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="select2Multiple">{{ __('Product Tag')}}</label>
                                                <select class="select2-multiple form-control tag_two" name="product_tag[]" multiple="multiple">
                                                    @foreach($tags as $tag)
                                                        <option value="{{$tag->name}}" >{{$tag->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="input__group mb-25">
                                                <label for="select2Multiple">{{ __('Product Color')}}</label>
                                                <select class="select2-multiple form-control tag_two" name="color[]" multiple="multiple">
                                                    @foreach(productColor() as $item)
                                                        <option value="{{$item->id}}">{{$item->Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="select2Multiple">{{ __('Product Size')}}</label>
                                                 <input type="text" class="form-control" id="size_new" name="size_new">
                                               <!--  <select class="select2-multiple form-control tag_one" name="size[]" multiple="multiple">
                                                    @foreach(productSize() as $item)
                                                        <option value="{{$item->id}}">{{$item->Size}}</option>
                                                    @endforeach
                                                </select> -->
                                            </div>

                                             <div class="input__group mb-25">
                                                <label for="select2Multiple">Manufacture</label>
                                                <select class="form-control tag_one" name="manufacturer" id="manufacturer" >  
                                                    @foreach($manufacturer as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Quantity')}}</label>
                                                <input type="text" class="form-control" id="qty" name="qty">
                                            </div>

                                            <div style="background: #eee;padding: 16px;">
                                            <div class="input__group mb-25">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Texas</label>
                                                        <input type="text" class="form-control" id="location1" name="location1">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1"> Next(Due) </label>
                                                        <input type="text" class="form-control" id="location_next1" name="location_next1"> 
                                                    </div>
                                                     <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Date </label>
                                                        <input type="text" class="form-control" id="location_date1" name="location_date1"> 
                                                    </div>
                                                </div>                                              
                                            </div>
                                             <div class="input__group mb-25">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Maryland</label>
                                                        <input type="text" class="form-control" id="location2" name="location2">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Next(Due)</label>
                                                        <input type="text" class="form-control" id="location_next2" name="location_next2"> 
                                                    </div>
                                                      <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Date </label>
                                                        <input type="text" class="form-control" id="location_date2" name="location_date2"> 
                                                    </div>
                                                </div>                                              
                                            </div>
                                            <!--   <div class="input__group mb-25">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Central</label>
                                                        <input type="text" class="form-control" id="location3" name="location3">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Next(Due)</label>
                                                        <input type="text" class="form-control" id="location_next3" name="location_next3"> 
                                                    </div>
                                                </div>                                              
                                            </div>
                                                <div class="input__group mb-25">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">N.East</label>
                                                        <input type="text" class="form-control" id="location4" name="location4">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Next(Due)</label>
                                                        <input type="text" class="form-control" id="location_next4" name="location_next4"> 
                                                    </div>
                                                </div>                                              
                                            </div>
                                            <div class="input__group mb-25">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">S.East</label>
                                                        <input type="text" class="form-control" id="location5" name="location5">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Next(Due)</label>
                                                        <input type="text" class="form-control" id="location_next5" name="location_next5"> 
                                                    </div>
                                                </div>                                              
                                            </div> -->
                                       </div>
                                       

                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Bronze Price')}}</label>
                                                <input type="text" class="form-control" id="bronze_price" name="bronze_price">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Silver Price')}}</label>
                                                <input type="text" class="form-control" id="silver_price" name="silver_price">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Diamond Price')}}</label>
                                                <input type="text" class="form-control" id="gold_price" name="gold_price">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Platinum Price')}}</label>
                                                <input type="text" class="form-control" id="platinum_price" name="platinum_price">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Retail Price')}}</label>
                                                <input type="text" class="form-control" id="price" name="price">
                                                <div class="row">
                                                    <div><input type="checkbox" value="1" name="is_retail_price" /></div><div>Show Price</div>
                                                </div>    
                                            </div>
                                            <div class="input__group mb-25">  
                                                <label for="exampleInputEmail1">{{ __('Discount')}}</label> 
                                                <input type="text" class="form-control" id="discount" name="discount">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Discount Price')}}</label>
                                                <input type="text" class="form-control" id="discount_price" name="discount_price" readonly>
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Retail Price')}}</label>
                                                <input type="text" class="form-control" id="price" name="price">
                                                <div class="row">
                                                    <div><input type="checkbox" value="1" name="is_called" /></div><div>Call to Show Price</div>
                                                </div>    
                                            </div>



                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">About</label> 
                                                 <textarea name="en_about" id="en_about" class="form-control summernote"></textarea>
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Description')}}</label>
                                                <textarea name="en_description" id="en_description" class="form-control summernote"></textarea>
                                            </div>
                                            <div class="input__group mb-25"  >
                                                <label for="exampleInputEmail1">{{ __('Specs')}}</label>
                                                <textarea name="en_additionalinformation_old" id="en_additionalinformation_old" class="form-control summernote">
                                                    &nbsp;&n bsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </textarea>
                                            </div> 



                                            <!--  <div class="input__group mb-25" >
                                                <label for="exampleInputEmail1">{{ __('ShippingReturn')}}</label>
                                                <textarea name="en_shippingreturn_old" id="en_shippingreturn_old" class="form-control summernote">
                                                    
                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </textarea>
                                            </div>
                                            <div class="input__group mb-25"  >
                                                <label for="exampleInputEmail1">{{ __('AdditionalInformation')}}</label>
                                                <textarea name="en_additionalinformation_old" id="en_additionalinformation_old" class="form-control summernote">
                                                    &nbsp;&n


                                                    bsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </textarea>
                                            </div> -->  

                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Spec Sheet (PDF)</label>
                                                 <input type="file" name="spec_sheet" value="" />
                                            </div>


                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Spec Sheet 2 (PDF)</label>
                                                 <input type="file" name="spec_sheet2" value="" />
                                            </div>


                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Spec Sheet 3 (PDF)</label>
                                                 <input type="file" name="spec_sheet3" value="" />
                                            </div>


                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1"> Installation manual  (PDF)</label>
                                                 <input type="file" name="spec_sheet4" value="" />
                                            </div>



                                            <div class="input__group mb-25">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox"  value="1" name="status" class="custom-control-input" id="customSwitch1">
                                                    <label class="custom-control-label" for="customSwitch1">{{__('Status')}}</label>
                                                </div>
                                            </div>
                                            <div class="input__group mb-25">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" value="1" name="feature" class="custom-control-input" id="customSwitch2">
                                                    <label class="custom-control-label" for="customSwitch2">{{__('Featured Product')}}</label>
                                                </div>
                                            </div>
                                            <div class="input__group mb-25">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" value="1" name="best_sale" class="custom-control-input" id="customSwitch3">
                                                    <label class="custom-control-label" for="customSwitch3">{{__('Best Selling')}}</label>
                                                </div>
                                            </div>
                                            <div class="input__group mb-25">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" value="1" name="on_sale" class="custom-control-input" id="customSwitch4">
                                                    <label class="custom-control-label" for="customSwitch4">{{__('On Sale')}}</label>
                                                </div>
                                            </div>
                                            <div class="input__group mb-25">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" value="1" name="on_arrival" class="custom-control-input" id="customSwitch5">
                                                    <label class="custom-control-label" for="customSwitch5">{{__('New Arrival')}}</label>
                                                </div>
                                            </div>
                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue">{{ __('Add')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="display: none;">
                                        <div class="form-vertical__item bg-style">
                                            <div class="item-top mb-30">
                                                <h2>{{langString('fr', false).':'}}</h2>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="fr-product-name">{{ __('Product Name')}}</label>
                                                <input type="text" class="form-control" value="product" id="fr-product-name" name="fr_product_name">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="fr-product-slug">{{ __('Product Slug')}}</label>
                                                <input type="text" class="form-control"  value="product" id="fr-product-slug" name="fr_product_slug">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('About')}}</label>
                                                <textarea name="fr_about" id="fr_about" class="form-control">Product</textarea>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Description')}}</label>
                                                <textarea name="fr_description" id="fr_description" class="form-control summernote">Product</textarea>
                                            </div>

                                           <div class="input__group mb-25" style="display:none">
                                                <label for="exampleInputEmail1">a{{ __('ShippingReturn')}}</label>
                                                <textarea name="fr_shippingreturn_old" id="fr_shippingreturn_old" class="form-control summernote">Product</textarea>
                                            </div>
                                            <div class="input__group mb-25" style="display:none">
                                                <label for="exampleInputEmail1">a{{ __('AdditionalInformation')}}</label>
                                                <textarea name="fr_additionalinformation_old" id="fr_additionalinformation_old" class="form-control summernote">Product</textarea>
                                            </div>  

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@push('post_scripts')
    <script src="{{asset('backend/js/admin/products/physical-add.js')}}"></script>
@endpush
@endsection

