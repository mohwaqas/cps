<?php

namespace Database\Seeders;

use App\Models\Admin\GeneralSettings;
use Illuminate\Database\Seeder;

class GeneralSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GeneralSettings::create([
            'Title' => 'Clean Power Store',
            'Logo' => 'clean_power_store.png',
            'Favicon' =>'favicon.png',
            'MetaDescription' => 'Clean Power Store',
            'MetaKeywords' => 'business,eCommerce, Ecommerce, ecommerce, shop, shopify, shopify ecommerce, creative, woocommerce, design, gallery, minimal, modern, html, html5, responsive',
            'MetaAuthor'=> 'Clean Power Store',
        ]);
    }
}
