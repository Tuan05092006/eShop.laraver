<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Car::truncate();
        Brand::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            'Lamborghini' => [
                'logo' => 'lamborghini.png',
                'cars' => [
                    ['name' => 'Revuelto V12', 'model' => 'Hybrid PHEV', 'year' => 2024, 'price' => 15000000000, 'img' => '/images/cars/lamborghini.png', 'feat' => true],
                    ['name' => 'Huracán Tecnica', 'model' => 'V10 Performance', 'year' => 2023, 'price' => 8500000000, 'img' => '/images/cars/lamborghini.png', 'feat' => false],
                    ['name' => 'Urus S', 'model' => 'Super SUV', 'year' => 2024, 'price' => 7200000000, 'img' => '/images/cars/urus.png', 'feat' => false],
                ]
            ],
            'Ferrari' => [
                'logo' => 'ferrari.png',
                'cars' => [
                    ['name' => 'SF90 Stradale', 'model' => 'Hybrid V8', 'year' => 2024, 'price' => 18000000000, 'img' => '/images/cars/ferrari.png', 'feat' => true],
                    ['name' => '296 GTB', 'model' => 'V6 Hybrid', 'year' => 2023, 'price' => 9200000000, 'img' => '/images/cars/ferrari.png', 'feat' => false],
                ]
            ],
            'Porsche' => [
                'logo' => 'porsche.png',
                'cars' => [
                    ['name' => '911 GT3 RS', 'model' => '992 Generation', 'year' => 2024, 'price' => 12500000000, 'img' => '/images/cars/porsche.png', 'feat' => true],
                    ['name' => 'Taycan Turbo S', 'model' => 'Electric Sport', 'year' => 2024, 'price' => 8200000000, 'img' => '/images/cars/porsche.png', 'feat' => false],
                ]
            ],
            'BMW' => [
                'logo' => 'bmw.png',
                'cars' => [
                    ['name' => 'M5 Competition', 'model' => 'V8 Twin Turbo', 'year' => 2023, 'price' => 5200000000, 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAe1RD2_jPrXn9Giu5WwTrDacxp0LJy2uTk53_zugatWYF2ZxaXaBe03WpsvjhURpbNOm1ovQlKeobhUpS1Sgf5ecgCK-W7TVXm3Xp4IG6dZ9beEIDUGD9F9riY2Ms3u-VLlPWWT2B5_vwUHtkv2BYd4bU2EiRa_2OU9jFqMiDw40R4lmXemgORqdZA4yrWOR76L_LGAGqjdbuG5dnECf30p3IJBncGkkcYqBbQT2Os_E1Drzp450jebk8JuJt1QbKyoufzuCa3-3w9', 'feat' => false],
                    ['name' => 'i7 M70', 'model' => 'Electric Luxury', 'year' => 2024, 'price' => 6500000000, 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAe1RD2_jPrXn9Giu5WwTrDacxp0LJy2uTk53_zugatWYF2ZxaXaBe03WpsvjhURpbNOm1ovQlKeobhUpS1Sgf5ecgCK-W7TVXm3Xp4IG6dZ9beEIDUGD9F9riY2Ms3u-VLlPWWT2B5_vwUHtkv2BYd4bU2EiRa_2OU9jFqMiDw40R4lmXemgORqdZA4yrWOR76L_LGAGqjdbuG5dnECf30p3IJBncGkkcYqBbQT2Os_E1Drzp450jebk8JuJt1QbKyoufzuCa3-3w9', 'feat' => true],
                ]
            ],
            'Audi' => [
                'logo' => 'audi.png',
                'cars' => [
                    ['name' => 'RS e-tron GT', 'model' => 'Performance EV', 'year' => 2024, 'price' => 5800000000, 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCa9U3CBnPJzAwuPZYsg-evTtSB0ghGCa0U6SpvSO6p2RmlK1hqyfDW2FgEzEoQiSDOyzh5v_L-0un9nPH6EoNc_gBCfLNjMn1pavCLFLs4cPErEilgNmD_yrNNWk7IxXa9ATCq_ay6qTIljsVJbuPDEDeI1Pmm5ZBVI2amooXxEKbDMEjuYT5axmVrxHhuz3LrHeyZVDuNz9kx8Fgm3aF1YHzjmvsiKy_9--4h63gg60w1EAQnBdehvFZwQDUW6erF0TPl5OXAKlXw', 'feat' => false],
                    ['name' => 'R8 V10', 'model' => 'Performance', 'year' => 2023, 'price' => 7500000000, 'img' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCa9U3CBnPJzAwuPZYsg-evTtSB0ghGCa0U6SpvSO6p2RmlK1hqyfDW2FgEzEoQiSDOyzh5v_L-0un9nPH6EoNc_gBCfLNjMn1pavCLFLs4cPErEilgNmD_yrNNWk7IxXa9ATCq_ay6qTIljsVJbuPDEDeI1Pmm5ZBVI2amooXxEKbDMEjuYT5axmVrxHhuz3LrHeyZVDuNz9kx8Fgm3aF1YHzjmvsiKy_9--4h63gg60w1EAQnBdehvFZwQDUW6erF0TPl5OXAKlXw', 'feat' => true],
                ]
            ],
            'Mercedes-Benz' => [
                'logo' => 'mercedes.png',
                'cars' => [
                    ['name' => 'AMG GT Black Series', 'model' => 'Track Edition', 'year' => 2023, 'price' => 11500000000, 'img' => 'https://images.pexels.com/photos/2365572/pexels-photo-2365572.jpeg?auto=compress&cs=tinysrgb&w=800', 'feat' => true],
                ]
            ],
            'Bugatti' => [
                'logo' => 'bugatti.png',
                'cars' => [
                    ['name' => 'Chiron Super Sport', 'model' => 'W16 Quad Turbo', 'year' => 2023, 'price' => 82000000000, 'img' => '/images/cars/bugatti.png', 'feat' => true],
                ]
            ],
            'McLaren' => [
                'logo' => 'mclaren.png',
                'cars' => [
                    ['name' => '750S Spider', 'model' => 'Twin Turbo V8', 'year' => 2024, 'price' => 9200000000, 'img' => '/images/cars/mclaren.png', 'feat' => true],
                ]
            ],
            'Bentley' => [
                'logo' => 'bentley.png',
                'cars' => [
                    ['name' => 'Continental GT', 'model' => 'V8 Mulliner', 'year' => 2024, 'price' => 16500000000, 'img' => 'https://images.pexels.com/photos/210019/pexels-photo-210019.jpeg?auto=compress&cs=tinysrgb&w=800', 'feat' => false],
                ]
            ],
            'Rolls-Royce' => [
                'logo' => 'rollsroyce.png',
                'cars' => [
                    ['name' => 'Spectre Electric', 'model' => 'Luxury EV', 'year' => 2024, 'price' => 32000000000, 'img' => 'https://images.pexels.com/photos/3764984/pexels-photo-3764984.jpeg?auto=compress&cs=tinysrgb&w=1200', 'feat' => true],
                ]
            ]
        ];

        foreach ($data as $brandName => $brandData) {
            $brand = Brand::create([
                'name' => $brandName,
                'slug' => Str::slug($brandName),
                'logo' => $brandData['logo'],
            ]);

            foreach ($brandData['cars'] as $carData) {
                Car::create([
                    'brand_id' => $brand->id,
                    'name' => $brandName . ' ' . $carData['name'],
                    'model' => $carData['model'],
                    'year' => $carData['year'],
                    'price' => $carData['price'],
                    'image' => $carData['img'],
                    'is_featured' => $carData['feat'],
                    'technical_specs' => json_encode([
                        'engine' => $carData['model'],
                        'power' => rand(500, 1500) . ' HP',
                        'top_speed' => rand(300, 480) . ' km/h',
                        'acceleration' => '1.' . rand(8, 9) . 's'
                    ]),
                ]);
            }
        }
    }
}
