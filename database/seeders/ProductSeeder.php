<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([
            [
                'name'=>'LG mobile',
                'price'=>'200',
                'category'=>'mobile',
                'description'=>'A smartphone with 4gb ram with many features',
                'gallery'=>'https://upload.wikimedia.org/wikipedia/commons/3/34/LG_G4_White_Gold_Edition.jpg',
            ],
            [
                'name'=>'Samsung',
                'price'=>'210',
                'category'=>'mobile',
                'description'=>'A smartphone with 5gb ram with many features',
                'gallery'=>'https://upload.wikimedia.org/wikipedia/commons/2/2f/Samsung_Galaxy_Z_Fold_%26_Z_Flip.jpg',
            ],
            [
                'name'=>'Apple',
                'price'=>'500',
                'category'=>'mobile',
                'description'=>'A smartphone with 2gb ram with many features',
                'gallery'=>'https://upload.wikimedia.org/wikipedia/commons/f/fd/Apple_iPhone.jpg',
            ],
            [
                'name'=>'Pixel',
                'price'=>'300',
                'category'=>'mobile',
                'description'=>'A smartphone with 6gb ram with many features',
                'gallery'=>'https://upload.wikimedia.org/wikipedia/commons/8/88/Pixel_%28smartphone%29_5_inch_silver_mock.png',
            ]
        ]);
    }
}
