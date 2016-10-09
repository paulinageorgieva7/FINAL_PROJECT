<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('product')->delete();
    	
        $products = array(
        		['category_id' => 4, 'product_name' => 'TV LG 42LF561V LED', 'product_qty' => 3, 'price' => 750.00, 'brand_id' => 4, 'product_desc' => 'INCREDIBLE CLARITY, VIBRANT COLOURS FULL HD 1080p provides the pinnacle of picture resolution with incredible clarity and vibrant colours. With up to five times the resolution compared to standard definition TVs and twice that of HD-Ready TVs, FULL HD 1080p is the only way to enjoy the full potential of Blu-ray and HD gaming.', 'product_image' => DB::raw("LOAD_FILE('C:\xampp\htdocs\workspace\Final_Project\blog\public\images\lg.jpg')")],
        		['category_id' => 4, 'product_name' => 'TV PHILIPS 40PFT4201 LED', 'product_qty' => 4, 'price' => 599.00, 'brand_id' => 5, 'product_desc' => 'The right TV for today and tomorrow: Philips 4200 series Full HD Slim LED TV with Digital Crystal Clear. Experience vivid images, clear sound, and all the features you need to enjoy your TV at home, like handy extra USB and HDMI ports.', 'product_image' => DB::raw("LOAD_FILE('C:\xampp\htdocs\workspace\Final_Project\blog\public\images\philips.jpg')")]     		
        		);
        
        DB::table('product')->insert($products);
    }
}
