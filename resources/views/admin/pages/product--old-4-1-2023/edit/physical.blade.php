@extends('admin.master', ['menu' => 'products', 'submenu' => 'product'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Edit Product')}}</h2>
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
                            <form enctype="multipart/form-data" method="POST" action="{{route('admin.product.update')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-vertical__item bg-style">
                                            <div class="item-top mb-30">
                                                <h2>{{langString('en', false).':'}}</h2>
                                            </div>
                                            <input type="hidden" name="product_type" value="{{PRODUCT_PHYSICAL}}">
                                            <input type="hidden" name="id" value="{{$product->id}}">
                                            

                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Product Name')}}</label>
                                                <input type="text" class="form-control" id="en_product_name" name="en_product_name" value="{{$product->en_Product_Name}}">
                                            </div>

                                                 <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Primary Image')}}</label>
                                                <input type="file" class="form-control putImage1"  name="primary_image" id="primary_image">
                                                <img class="admin_image"  src="{{asset(ProductImage().$product->Primary_Image)}}" id="target1"/>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Image 2')}}</label>
                                                <input type="file" class="form-control putImage2"  name="image_two" id="image_two">
                                                <img   class="admin_image"  src="{{asset(ProductImage().$product->Image2)}}" id="target2"/>
                                                   <input type="button" value="Remove" id="" name="" onclick="location.href='{{route('product.image.delete',['id'=>$product->id, 'image'=>2])}}' " style="width: 160px" />
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Image Gallery Image')}}</label>
                                                <input type="file" class="form-control putImage3"  name="image_three" id="image_three">
                                                <img   class="admin_image"  src="{{asset(ProductImage().$product->Image3)}}" id="target3"/>
                                                   <input type="button" value="Remove" id="" name=""  onclick="location.href='{{route('product.image.delete',['id'=>$product->id, 'image'=>3])}}' " style="width: 160px"  />
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Image 3')}}</label>
                                                <input type="file" class="form-control putImage4"  name="image_four" id="image_four">
                                                <img   class="admin_image"  src="{{asset(ProductImage().$product->Image4)}}" id="target4"/>
                                                   <input type="button" value="Remove" id="" name=""  onclick="location.href='{{route('product.image.delete',['id'=>$product->id, 'image'=>4])}}' " style="width: 160px"  />
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Image 4')}}</label>
                                                <input type="file" class="form-control putImage5"  name="image_five" id="image_five">
                                                <img   class="admin_image"  src="{{asset(ProductImage().$product->Image5)}}" id="target5"/>
                                                   <input type="button" value="Remove" id="" name=""  onclick="location.href='{{route('product.image.delete',['id'=>$product->id, 'image'=>5])}}' " style="width: 160px"  />
                                            </div>


                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Brand Name')}}</label>
                                                <select class="form-control" id="en_brand_name" name="en_brand_name">
                                                    <option value="">{{__('---SELECT A BRAND---')}}</option>
                                                    @foreach(Brnad() as $item)
                                                        <option value="{{$item->id}}" {{$item->id == $product->Brand_Id ? 'selected' : ''}}>{{$item->en_BrandName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Category Name')}}</label>
                                                <select class="form-control" id="en_category_name" name="en_category_name">
                                                    <option value="">{{__('---SELECT A CATEGORY---')}}</option>
                                                    

                                                      @foreach($category as $item)
                                                        <option value="{{$item->id}}"  {{$item->id == $product->Category_Id ? 'selected' : ''}}>{{$item->en_Category_Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Item Tag')}}</label>
                                                <select class="form-control" id="item_teg" name="item_teg">
                                                    <option>{{__('---Select item---')}}</option>
                                                    @foreach ($item_tags as $it)
                                                        <option value="{{$it->name}}" {{$it->name == $product->ItemTag ? 'selected' : ''}}>{{$it->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="select2Multiple">{{ __('Product Tag')}}</label>
                                                <select class="select2-multiple form-control tag_two" name="product_tag[]" multiple="multiple">
                                                    <option value="">{{__('---SELECT A PRODUCT TAG---')}}</option>
                                                    @foreach($tags as $tag)
                                                        <option value="{{$tag->name}}" {{selectProductTag($tag->name, $product->id)}}>{{$tag->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="select2Multiple">{{ __('Product Color')}}</label>
                                                <select class="select2-multiple form-control tag_two" name="color[]" multiple="multiple">
                                                    @foreach($colors as $item)
                                                        <option value="{{$item->id}}" {{colorSelected($product->id, $item->id) == 1 ? 'selected' : ''}}>{{$item->Name}}</option >
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="select2Multiple">{{ __('Product Size')}}</label>
                                                   <input type="text" class="form-control" id="size_new" value="{{$product->Size_New}}" name="size_new">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Quantity')}}</label>
                                                <input type="text" class="form-control" id="qty" name="qty" value="{{$product->Quantity}}">
                                            </div>

                                              <div style="background: #eee;padding: 16px;">
                                            <div class="input__group mb-25">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Texas</label>
                                                        <input value="{{@$product->location[0]['location1']}}" type="text" class="form-control" id="location1" name="location1">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1"> Next(Due) </label>
                                                        <input value="{{@$product->location[0]['location_next1']}}" type="text" class="form-control" id="location_next1" name="location_next1">  
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Date </label>
                                                        <input type="text" class="form-control" id="location_date1" name="location_date1" value="{{@$product->location[0]['location_date1']}}"> 
                                                    </div>
                                                </div>                                              
                                            </div>
                                             <div class="input__group mb-25">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Maryland</label>
                                                        <input value="{{@$product->location[0]['location2']}}" type="text" class="form-control" id="location2" name="location2">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Next(Due)</label> 
                                                        <input value="{{@$product->location[0]['location_next2']}}" type="text" class="form-control" id="location_next2" name="location_next2"> 
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Date </label>
                                                        <input type="text" class="form-control" id="location_date2" name="location_date2" value="{{@$product->location[0]['location_date2']}}"> 
                                                    </div>
                                                </div>                                              
                                            </div>
                                         <!--      <div class="input__group mb-25">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Central</label>
                                                        <input value="{{@$product->location[0]['location3']}}" type="text" class="form-control" id="location3" name="location3">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Next(Due)</label>
                                                        <input  value="{{@$product->location[0]['location_next3']}}" type="text" class="form-control" id="location_next3" name="location_next3"> 
                                                    </div>
                                                </div>                                              
                                            </div>
                                                <div class="input__group mb-25">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">N.East</label>
                                                        <input value="{{@$product->location[0]['location4']}}" type="text" class="form-control" id="location4" name="location4">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Next(Due)</label>
                                                        <input value="{{@$product->location[0]['location_next4']}}" type="text" class="form-control" id="location_next4" name="location_next4"> 
                                                    </div>
                                                </div>                                              
                                            </div>
                                            <div class="input__group mb-25">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">S.East</label>
                                                        <input value="{{@$product->location[0]['location5']}}" type="text" class="form-control" id="location5" name="location5">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label for="exampleInputEmail1">Next(Due)</label>
                                                        <input value="{{@$product->location[0]['location_next5']}}" type="text" class="form-control" id="location_next5" name="location_next5"> 
                                                    </div>
                                                </div>                                              
                                            </div> -->
                                       </div>
                                       


                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Bronze Price')}}</label>
                                                <input type="text" class="form-control" id="bronze_price" name="bronze_price" value="{{$product->Bronze_Price}}">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Silver Price')}}</label>
                                                <input type="text" class="form-control" id="silver_price" name="silver_price" value="{{$product->Silver_Price}}">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Diamond Price')}}</label>
                                                <input type="text" class="form-control" id="gold_price" name="gold_price" value="{{$product->Gold_Price}}">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Platinum Price')}}</label>
                                                <input type="text" class="form-control" id="platinum_price" name="platinum_price" value="{{$product->Platinum_Price}}">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Retail Price')}}</label>
                                                <input type="text" class="form-control" id="price" name="price" value="{{$product->Price}}"> 
                                                 <div class="row">
                                                    <div><input type="checkbox" value="1" name="is_retail_price" @if($product->is_retail_price && $product->is_retail_price==1) checked @endif /> Show Price</div>
                                                </div>  
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Discount')}}</label>
                                                <input type="text" class="form-control" id="discount" name="discount" value="{{$product->Discount}}">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Discount Price')}}</label>
                                                <input type="text" class="form-control" value="{{$product->Discount_Price}}" id="discount_price" name="discount_price" readonly>
                                            </div>

                                       
                                             <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">About</label> 
                                                 <textarea name="en_about" id="en_about" class="form-control summernote">{!! $product->en_About !!}</textarea>
                                            </div>


                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Description')}}</label>
                                                <textarea name="en_description" id="en_description" class="form-control summernote">{!! $product->en_Description !!}</textarea>
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('ShippingReturn')}}</label>
                                                <textarea name="en_shippingreturn" id="en_shippingreturn" class="form-control summernote">{!! $product->en_ShippingReturn !!}</textarea>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('AdditionalInformation')}}</label>
                                                <textarea name="en_additionalinformation" id="en_additionalinformation" class="form-control summernote">{!! $product->en_AdditionalInformation !!}</textarea>
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Spec Sheet (PDF)</label>
                                                 <input type="file" name="spec_sheet" value="" />
                                                 @if($product->Spec_Sheet)
                                                  
                                                   <a target="_blank"  href="{{url('uploaded_files/spec_sheets/')}}/{{$product->Spec_Sheet}}">Download </a>
                                                   <input type="hidden" value="{{$product->Spec_Sheet}}" name="s_sheet" />
                                                 @endif
                                            </div>



                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Spec Sheet 2 (PDF)</label>
                                                 <input type="file" name="spec_sheet2" value="" />
                                                 @if($product->Spec_Sheet2)
                                                  <a target="_blank"  href="{{url('uploaded_files/spec_sheets/')}}/{{$product->Spec_Sheet2}}">Download </a>
                                                   <input type="hidden" value="{{$product->Spec_Sheet2}}" name="s_sheet2" />
                                                 @endif
                                            </div>


                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">Spec Sheet 3 (PDF)</label>
                                                 <input type="file" name="spec_sheet3" value="" />
                                                  @if($product->Spec_Sheet3)
                                                  <a target="_blank"  href="{{url('uploaded_files/spec_sheets/')}}/{{$product->Spec_Sheet3}}">Download </a>
                                                   <input type="hidden" value="{{$product->Spec_Sheet3}}" name="s_sheet3" />
                                                 @endif
                                            </div>


                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">  Installation manual  (PDF)</label>
                                                 <input type="file" name="spec_sheet4" value="" />
                                                  @if($product->Spec_Sheet4)
                                                  <a target="_blank"  href="{{url('uploaded_files/spec_sheets/')}}/{{$product->Spec_Sheet4}}">Download </a>
                                                   <input type="hidden" value="{{$product->Spec_Sheet4}}" name="s_sheet4" />
                                                 @endif
                                            </div>







                                       

                                            <div class="input__group mb-25">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox"  value="1" {{$product->Status == 1 ? 'checked' : ''}} name="status" class="custom-control-input" id="customSwitch1">
                                                    <label class="custom-control-label" for="customSwitch1">{{ __('Status')}}</label>
                                                </div>
                                            </div>
                                            <div class="input__group mb-25">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" value="1" {{$product->Featured_Product == 1 ? 'checked' : ''}} name="feature" class="custom-control-input" id="customSwitch2">
                                                    <label class="custom-control-label" for="customSwitch2">{{ __('Featured Product')}}</label>
                                                </div>
                                            </div>
                                            <div class="input__group mb-25">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" value="1" {{$product->Best_Selling == 1 ? 'checked' : ''}} name="best_sale" class="custom-control-input" id="customSwitch3">
                                                    <label class="custom-control-label" for="customSwitch3">{{ __('Best Selling')}}</label>
                                                </div>
                                            </div>
                                            <div class="input__group mb-25">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" value="1" {{$product->On_Sale == 1 ? 'checked' : ''}} name="on_sale" class="custom-control-input" id="customSwitch4">
                                                    <label class="custom-control-label" for="customSwitch4">{{ __('On Sale')}}</label>
                                                </div>
                                            </div>
                                            <div class="input__group mb-25">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" value="1" {{$product->New_Arrival == 1 ? 'checked' : ''}} name="on_arrival" class="custom-control-input" id="customSwitch5">
                                                    <label class="custom-control-label" for="customSwitch5">{{ __('New Arrival')}}</label>
                                                </div>
                                            </div>
                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue">{{ __('Update')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="display: none;">
                                        <div class="form-vertical__item bg-style">
                                            <div class="item-top mb-30">
                                                <h2>{{langString('fr', false).':'}}</h2>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Product Name')}}</label>
                                                <input type="text" class="form-control" id="fr_product_name" value="{{$product->fr_Product_Name}}" name="fr_product_name">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('About')}}</label>
                                                <textarea name="fr_about" id="fr_about" class="form-control">{!! $product->fr_About !!}</textarea>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('Description')}}</label>
                                                <textarea name="fr_description" id="fr_description" class="form-control summernote">{!! $product->fr_Description !!}</textarea>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('ShippingReturn')}}</label>
                                                <textarea name="fr_shippingreturn" id="fr_shippingreturn" class="form-control summernote">{!! $product->fr_ShippingReturn !!}</textarea>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label for="exampleInputEmail1">{{ __('AdditionalInformation')}}</label>
                                                <textarea name="fr_additionalinformation" id="fr_additionalinformation" class="form-control summernote">{!! $product->fr_AdditionalInformation !!}</textarea>
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
        <script src="{{asset('backend/js/admin/products/physical-edit.js')}}"></script>
    @endpush
@endsection
