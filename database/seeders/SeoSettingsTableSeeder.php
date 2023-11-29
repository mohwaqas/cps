<?php

namespace Database\Seeders;

use App\Models\SeoSetting;
use Illuminate\Database\Seeder;

class SeoSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SeoSetting::create([
            'slug' => 'home',
            'title' => 'Home | Clean Power Store',
            'description' => 'Clean Power Store',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'about-us',
            'title' => 'About Us | Clean Power Store',
            'description' => 'Clean Power Store',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'blog',
            'title' => 'Blogs | Clean Power Store',
            'description' => 'Clean Power Store',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'contact',
            'title' => 'Contact Us| Clean Power Store',
            'description' => 'Clean Power Store',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'all-products',
            'title' => 'All Products| Clean Power Store',
            'description' => 'Clean Power Store',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'cart',
            'title' => 'Cart | Clean Power Store',
            'description' => 'Clean Power Store',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'checkout',
            'title' => 'Checkout | Clean Power Store',
            'description' => 'Clean Power Store',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'wishlist',
            'title' => 'Wishlist | Clean Power Store',
            'description' => 'Clean Power Store',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'compare',
            'title' => 'Compare | Clean Power Store',
            'description' => 'Clean Power Store',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'sign-in',
            'title' => 'Sign In',
            'description' => 'Sign In',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'sign-up',
            'title' => 'Sign Up',
            'description' => 'Sign Up',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'forget-password',
            'title' => 'Forget Password',
            'description' => 'Forget Password',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'reset-password',
            'title' => 'Reset Password',
            'description' => 'Reset Password',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'terms-conditions',
            'title' => 'Terms Conditions',
            'description' => 'Terms Conditions',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'privacy-policy',
            'title' => 'Privacy Policy',
            'description' => 'Privacy Policy',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'shipping-return',
            'title' => 'Shipping Return Policy',
            'description' => 'Shipping Return Policy',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'faq',
            'title' => 'FAQ',
            'description' => 'FAQ',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);

        SeoSetting::create([
            'slug' => 'refund-policy',
            'title' => 'Refund Policy',
            'description' => 'Refund Policy',
            'keywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
        ]);
    }
}
