<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\ImageGallery;
use App\Models\Admin\Testimonial;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs(){
        $data['image_gallery'] = ImageGallery::latest()->get();
        $data['testimonials'] = Testimonial::latest()->get();
        $seo = SeoSetting::where('slug', 'about-us')->first();
        $data['title'] = $seo->title;
        $data['description'] = $seo->description;
        $data['keywords'] = $seo->keywords;
        return view('front.pages.aboutus.index', $data);
    }

    public function faq(){
        $data['image_gallery'] = ImageGallery::latest()->get();
        $data['testimonials'] = Testimonial::latest()->get();
        $seo = SeoSetting::where('slug', 'about-us')->first();
        $data['title'] = $seo->title;
        $data['description'] = $seo->description;
        $data['keywords'] = $seo->keywords;
        return view('front.pages.faq.index', $data);
    }

     public function calculator(){
        $data['image_gallery'] = ImageGallery::latest()->get();
        $data['testimonials'] = Testimonial::latest()->get();
        $seo = SeoSetting::where('slug', 'about-us')->first();
        $data['title'] = $seo->title;
        $data['description'] = $seo->description;
        $data['keywords'] = $seo->keywords;
         return view('front.pages.calculator.index',$data);
    }
}
