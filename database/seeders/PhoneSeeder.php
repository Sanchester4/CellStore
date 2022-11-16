<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Phone;
use Illuminate\Support\Facades\Hash;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phone = Phone::create([
            'id' => '1',
            'title' => 'Iphone 11',
            'tempUrl' => 'https://media.croma.com/image/upload/v1664009482/Croma%20Assets/Communication/Mobiles/Images/243461_0_tzq0y4.png',
            'producedBY' => 'Apple',
            'prodYear' => '2019',
            'price' => '350',
            'color' => 'White',
            'ramSize' => '4',
            'romSize' => '64',
            'mainCameraPx' =>'12',
            'frontCameraPx' => '12'
        ]);


        $phone = Phone::create([
            'id' => '2',
            'title' => 'Iphone 12',
            'tempUrl' => 'https://pngimg.com/uploads/iphone_12/iphone_12_PNG19.png',
            'producedBY' => 'Apple',
            'prodYear' => '2020',
            'price' => '550',
            'color' => 'White',
            'ramSize' => '4',
            'romSize' => '128',
            'mainCameraPx' =>'12',
            'frontCameraPx' => '12'
        ]);

    }
}

?>
