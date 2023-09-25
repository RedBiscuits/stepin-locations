<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Location::create([
            'name' => 'Armani Hotel Dubai - Executive Suite',
            'iframe' => 'https://my.matterport.com/show/?m=S91MEkB5s7N&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Dubai',
        ]);

        Location::create([
            'name' => 'Armani Hotel Dubai - Premium Balcony Suite',
            'iframe' => 'https://my.matterport.com/show/?m=rQ9u1hzDu3C&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Dubai',
        ]);

        Location::create([
            'name' => 'Armani Hotel Dubai - Ambassador Suite',
            'iframe' => 'https://my.matterport.com/show/?m=DVy3DQ5HgJ5&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Dubai',
        ]);

        Location::create([
            'name' => 'Edge Hotel Creekside, Dubai-Premium Room',
            'iframe' => 'https://my.matterport.com/show/?m=AR6WU1hCfeC&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Dubai',
        ]);

        Location::create([
            'name' => 'Edge Hotel Creekside, Dubai - Two Bedroom Suite Creekside',
            'iframe' => 'hhttps://my.matterport.com/show/?m=U9pdeSE3Xu2&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Dubai',
        ]);

        Location::create([
            'name' => 'Habtoor Palace, LXR Hotels & Resorts Dubai - Room 539',
            'iframe' => 'https://my.matterport.com/show/?m=QnrUAFhbUH8&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Dubai',
        ]);

        Location::create([
            'name' => 'Habtoor Palace, LXR Hotels & Resorts Dubai - Habtoor Spa',
            'iframe' => 'https://my.matterport.com/show/?m=6PbaGgCJWXk&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Dubai',
        ]);

        Location::create([
            'name' => 'Résidence Abraj S+4',
            'iframe' => 'https://my.matterport.com/show/?m=bveSMejMBGx&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Tunisia',
        ]);

        Location::create([
            'name' => 'Résidence West Gammarth Garden',
            'iframe' => 'https://my.matterport.com/show/?m=J23RrGCQN86&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Tunisia',
        ]);

        Location::create([
            'name' => 'Villa Chotrana 3',
            'iframe' => 'https://my.matterport.com/show/?m=p57agZHvpSU&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Tunisia',
        ]);

        Location::create([
            'name' => 'Marina Bizerte',
            'iframe' => 'https://my.matterport.com/show/?m=9fUfo28CCeh&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Tunisia',
        ]);

        Location::create([
            'name' => 'Sky Gardens S+3',
            'iframe' => 'https://my.matterport.com/show/?m=5PpeKzZy6bU&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Tunisia',
        ]);

        Location::create([
            'name' => 'City View Hotel - Honeymoon Suit',
            'iframe' => 'https://my.matterport.com/show/?m=Ute5mEcdMHe&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Saudi Arabia',
        ]);

        Location::create([
            'name' => 'City View Hotel - Twin Room',
            'iframe' => 'https://my.matterport.com/show/?m=QV84pr8VV7z&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Saudi Arabia',
        ]);

        Location::create([
            'name' => 'City View Hotel - Connecting Room',
            'iframe' => 'https://my.matterport.com/show/?m=AeBYaBpA4Jr&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Saudi Arabia',
        ]);

        Location::create([
            'name' => 'Marriott Riyadh - The Bridal Suite',
            'iframe' => 'https://my.matterport.com/show/?m=LpXAs8UT1ys&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Saudi Arabia',
        ]);

        Location::create([
            'name' => 'Marriott Riyadh - Business Suite',
            'iframe' => 'https://my.matterport.com/show/?m=719j4iFrsvk&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Saudi Arabia',
        ]);

        Location::create([
            'name' => 'Marriott Riyadh - Family Suite',
            'iframe' => 'https://my.matterport.com/show/?m=MPffUUqfRuF&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Saudi Arabia',
        ]);

        Location::create([
            'name' => 'Marriott Riyadh - Executive Suite',
            'iframe' => 'https://my.matterport.com/show/?m=LijiMYRMRXh&play=1&tour=3&ts=3&hl=0&pin=0',
            'country' => 'Saudi Arabia',
        ]);

    }
}
