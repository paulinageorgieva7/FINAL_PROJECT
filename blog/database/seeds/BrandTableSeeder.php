<?php

use Illuminate\Database\Seeder;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 DB::table('brand')->delete();
    	
         $brand = array (
				['brand_id' => 1, 'brand_name' => 'LG'],
         		['brand_id' => 2, 'brand_name' => 'Philips'],
         		['brand_id' => 3, 'brand_name' => 'Samsung'],
         		['brand_id' => 4, 'brand_name' => 'SANG'],
         		['brand_id' => 5, 'brand_name' => 'Sony'],
         		['brand_id' => 6, 'brand_name' => 'Panasonic'],
         		['brand_id' => 7, 'brand_name' => 'Nokia'],
         		['brand_id' => 8, 'brand_name' => 'Apple'],
         		['brand_id' => 9, 'brand_name' => 'HTC'],
         		['brand_id' => 10, 'brand_name' => 'Asus'],
         		['brand_id' => 11, 'brand_name' => 'Dell'],
         		['brand_id' => 12, 'brand_name' => 'Lenovo'],
         		['brand_id' => 13, 'brand_name' => 'Huawei'],
         		['brand_id' => 14, 'brand_name' => 'HP'],
         		['brand_id' => 15, 'brand_name' => 'Acer'],
         		['brand_id' => 16, 'brand_name' => 'Garmin'],
         		['brand_id' => 17, 'brand_name' => 'MIO'],
         		['brand_id' => 18, 'brand_name' => 'Microsoft'],
         		['brand_id' => 19, 'brand_name' => 'Toshiba']
         		);
         
         DB::table('brand')->insert($brand);
    }
}
