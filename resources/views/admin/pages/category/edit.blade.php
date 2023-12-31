@extends('admin.master', ['menu' => 'catbad', 'submenu' => 'category'])
@section('title', isset($title) ? $title : '')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>{{__('Edit Category')}}</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Category')}}</li>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-vertical__item bg-style">
                                        <form enctype="multipart/form-data" method="POST" action="{{route('admin.category.update')}}">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$edit->id}}">


                                               <div class="input__group mb-25">
                                                <label for="en-product-name">Meta Title</label>
                                                <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{$edit->meta_title}}" />
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="en-product-name">Meta Keywords</label>
                                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{$edit->meta_keywords}}" />
                                            </div>

                                            <div class="input__group mb-25">
                                                <label for="en-product-name">Meta Description</label>
                                                <input type="text" class="form-control" id="meta_description" name="meta_description" value="{{$edit->meta_description}}" />
                                            </div>



                                            <div class="input__group mb-25">
                                                <label>{{ __('Category Name '.langString('en'))}}</label>
                                                <input type="text" id="en_category_name" name="en_category_name" value="{{$edit->en_Category_Name}}">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{ __('Category Name '.langString('fr'))}}</label>
                                                <input type="text" id="fr_category_name" name="fr_category_name" value="{{$edit->fr_Category_Name}}">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{ __('Parent Category')}}</label>
                                                <select class="form-control" name="parent_category">
                                                    <option value="">Select Parent Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}" @if($edit->parent_category === $category->id) selected @endif>{{$category->en_Category_Name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{ __('Icon Class')}}</label>
                                                <input type="text" id="icon_class" name="icon_class" value="{{$edit->Category_Icon}}">
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{__('Description '.langString('en'))}}</label>
                                                <textarea name="en_description" id="en_description">{{$edit->en_Description}}</textarea>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{__('Description '.langString('fr'))}}</label>
                                                <textarea name="fr_description" id="fr_description">{{$edit->fr_Description}}</textarea>
                                            </div>
                                            <div class="input__group mb-25">
                                                <label>{{ __('Image')}}</label>
                                                <input type="file" class="form-control putImage1"  name="image" id="image">
                                                <img class="admin_image"  src="{{asset(CategoryImage().$edit->image)}}" id="target1"/>
                                            </div>
                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue">{{ __('Edit')}}</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

