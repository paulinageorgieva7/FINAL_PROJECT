<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 DB::table('category')->delete();
    	
         $category = array(
         		['category_id' => 1, 'category' => 'TV'],
         		['category_id' => 2, 'category' => 'PHONES & TABLETS'],
         		['category_id' => 3, 'category' => 'PC PERIPHERALS'],
         		['category_id' => 4, 'category' => 'IT'],
         		['category_id' => 5, 'category' => 'AUTO & GPS'],
         		['category_id' => 6, 'category' => 'PHOTO & VIDEO'], 
				['category_id' => 7, 'category' => 'TV', 'main_category' => 1],
         		['category_id' => 8, 'category' => 'HOME TEATHER', 'main_category' => 1],
         		['category_id' => 9, 'category' => 'DVD PLAYERS', 'main_category' => 1],
         		['category_id' => 10, 'category' => 'SOUNDBARS', 'main_category' => 1],
         		['category_id' => 11, 'category' => 'PROJECTOR AND SCREENS', 'main_category' => 1],
         		['category_id' => 12, 'category' => 'TV ACCESSORIES', 'main_category' => 1],
         		['category_id' => 13, 'category' => 'MOBILE PHONES', 'main_category' => 2],
         		['category_id' => 14, 'category' => 'TABLETS', 'main_category' => 2],
         		['category_id' => 15, 'category' => 'SMART WATCHES', 'main_category' => 2],
         		['category_id' => 16, 'category' => 'FITNES WRIST', 'main_category' => 2],
         		['category_id' => 17, 'category' => 'PHONE ACCESSORIES', 'main_category' => 2],
         		['category_id' => 18, 'category' => 'LAPTOPS', 'main_category' => 3],
         		['category_id' => 19, 'category' => 'DESCTOPS', 'main_category' => 3],
         		['category_id' => 20, 'category' => 'MONITORS', 'main_category' => 3],
         		['category_id' => 21, 'category' => 'PRINTERS AND SCANERS', 'main_category' => 3],
         		['category_id' => 22, 'category' => 'PC SOFTWARE', 'main_category' => 3],
         		['category_id' => 23, 'category' => 'EBOOK READERS', 'main_category' => 3],
         		['category_id' => 24, 'category' => 'PC ACCESSORIES', 'main_category' => 3],
         		['category_id' => 25, 'category' => 'USB MEMORY STICKS', 'main_category' => 4],
         		['category_id' => 25, 'category' => 'MOUSE AND KEYBOARDS', 'main_category' => 4],
         		['category_id' => 26, 'category' => 'JOYSTICKS AND WHEELS', 'main_category' => 4],
         		['category_id' => 27, 'category' => 'WI-FI ADAPTORS', 'main_category' => 4],
         		['category_id' => 28, 'category' => 'CHARGES ACCESSORIES', 'main_category' => 4],
         		['category_id' => 29, 'category' => 'GPS NAVIGATIONS', 'main_category' => 5],
         		['category_id' => 30, 'category' => 'GPS ACCESSORIES', 'main_category' => 5],
         		['category_id' => 31, 'category' => 'CD/DVD RECIEVERS', 'main_category' => 5],
         		['category_id' => 32, 'category' => 'CAR TV AND MONITORS', 'main_category' => 5],
         		['category_id' => 33, 'category' => 'CAR SPEAKERS', 'main_category' => 5],
         		['category_id' => 34, 'category' => 'CAMERAS - COMPACT', 'main_category' => 6],
         		['category_id' => 35, 'category' => 'CAMERAS - HYBRID', 'main_category' => 6],
         		['category_id' => 36, 'category' => 'PHOTO PRINTERS', 'main_category' => 6],
         		['category_id' => 37, 'category' => 'DIGITAL PHOTO FRAMES', 'main_category' => 6],
         		['category_id' => 38, 'category' => 'MEMORY CARDS', 'main_category' => 6],
         		['category_id' => 39, 'category' => 'PHOTO ACCESSORIES', 'main_category' => 6]
   		
         		);
         
         DB::table('category')->insert($category);
    }
}
