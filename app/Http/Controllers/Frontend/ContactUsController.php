<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;
use App\Models\Front\Contactus;
use App\Models\SeoSetting;

class ContactUsController extends Controller
{
    public function contactUs(){
        $seo = SeoSetting::where('slug', 'contact')->first();
        $data['title'] = $seo->title;
        $data['description'] = $seo->description;
        $data['keywords'] = $seo->keywords;
        return view('front.pages.contact.index', $data);
    }
    public function contactUsStore(ContactUsRequest $request){
        $contact = Contactus::create([
            'FirstName' => $request->firstname,
            'LastName' => $request->lastname,
            'Email' => $request->email,
            'ContactNumber' => $request->contact_number,
            'Message' => $request->message,
        ]);



        $url = "https://cleanpowerstore.com/email_contact.php?f_name=".$request->firstname."&l_name=".$request->lastname."&contact_number=".$request->contact_number."&message=".$request->message."&email=".$request->email;
            //return Redirect::to($url);
            return redirect()->away($url);


        if ($contact) {
            return redirect()->back()->with('toast_success', __('Successfully Contact Us !'));
        }
        return redirect()->back()->with('toast_error', __('Please Required the fill  !'));
    }
}
