<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [
            'Lamborghini' => [
                ['name' => 'Aventador SVJ', 'model' => 'LP 770-4', 'year' => 2023, 'price' => 15000000000, 'image' => 'https://images.unsplash.com/photo-1544636331-e26879cd4d9b', 'is_featured' => true, 'type' => 'COUPE', 'specs' => ['engine' => '6.5L V12', 'transmission' => '7-speed ISR', 'fuel_type' => 'Petrol', 'mileage' => 1200]],
                ['name' => 'Huracán Sterrato', 'model' => 'All-Terrain', 'year' => 2024, 'price' => 9500000000, 'image' => 'https://images.unsplash.com/photo-1511919884226-fd3cad34687c', 'is_featured' => false, 'type' => 'PERFORMANCE', 'specs' => ['engine' => '5.2L V10', 'transmission' => '7-speed LDF', 'fuel_type' => 'Petrol', 'mileage' => 500]],
                ['name' => 'Urus Performante', 'model' => 'Super SUV', 'year' => 2024, 'price' => 7800000000, 'image' => 'https://images.unsplash.com/photo-1621135802920-133df287f89c', 'is_featured' => false, 'type' => 'SUV', 'specs' => ['engine' => '4.0L V8 Twin-Turbo', 'transmission' => '8-speed Automatic', 'fuel_type' => 'Petrol', 'mileage' => 0]],
                ['name' => 'Revuelto', 'model' => 'HPEV', 'year' => 2024, 'price' => 22000000000, 'image' => 'https://images.unsplash.com/photo-1632243542379-373266e74dfb', 'is_featured' => true, 'type' => 'COUPE', 'specs' => ['engine' => '6.5L V12 Hybrid', 'transmission' => '8-speed Dual-Clutch', 'fuel_type' => 'Hybrid', 'mileage' => 0]],
            ],
            'Ferrari' => [
                ['name' => 'SF90 Stradale', 'model' => 'PHEV', 'year' => 2023, 'price' => 18000000000, 'image' => 'https://images.unsplash.com/photo-1592198084033-aade902d1aae', 'is_featured' => true, 'type' => 'PERFORMANCE', 'specs' => ['engine' => '4.0L V8 Hybrid', 'transmission' => '8-speed Dual-Clutch', 'fuel_type' => 'Hybrid', 'mileage' => 850]],
                ['name' => 'Roma Spider', 'model' => 'Spider', 'year' => 2024, 'price' => 12500000000, 'image' => 'https://images.unsplash.com/photo-1583121274602-3e2820c69888', 'is_featured' => false, 'type' => 'CONVERTIBLE', 'specs' => ['engine' => '3.9L V8 Twin-Turbo', 'transmission' => '8-speed Dual-Clutch', 'fuel_type' => 'Petrol', 'mileage' => 100]],
                ['name' => '296 GTB', 'model' => 'Assetto Fiorano', 'year' => 2023, 'price' => 11000000000, 'image' => 'https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e', 'is_featured' => false, 'type' => 'COUPE', 'specs' => ['engine' => '2.9L V6 Hybrid', 'transmission' => '8-speed Dual-Clutch', 'fuel_type' => 'Hybrid', 'mileage' => 300]],
                ['name' => 'Purosangue', 'model' => 'V12 SUV', 'year' => 2024, 'price' => 16000000000, 'image' => 'https://images.unsplash.com/photo-1707255106263-00994348a0a0', 'is_featured' => true, 'type' => 'SUV', 'specs' => ['engine' => '6.5L V12', 'transmission' => '8-speed Dual-Clutch', 'fuel_type' => 'Petrol', 'mileage' => 0]],
            ],
            'Porsche' => [
                ['name' => '911 GT3 RS', 'model' => '992', 'year' => 2024, 'price' => 8500000000, 'image' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70', 'is_featured' => true, 'type' => 'PERFORMANCE', 'specs' => ['engine' => '4.0L Flat-6', 'transmission' => '7-speed PDK', 'fuel_type' => 'Petrol', 'mileage' => 200]],
                ['name' => 'Taycan Turbo S', 'model' => 'Electric', 'year' => 2024, 'price' => 6200000000, 'image' => 'https://images.unsplash.com/photo-1614200024993-9d609249e097', 'is_featured' => false, 'type' => 'SEDAN', 'specs' => ['engine' => 'Dual Electric Motors', 'transmission' => '2-speed Automatic', 'fuel_type' => 'Electric', 'mileage' => 0]],
                ['name' => 'Panamera Turbo', 'model' => 'Sport Turismo', 'year' => 2024, 'price' => 5800000000, 'image' => 'https://images.unsplash.com/photo-1611859328053-3cbc9f9399f4', 'is_featured' => false, 'type' => 'SEDAN', 'specs' => ['engine' => '4.0L V8 Hybrid', 'transmission' => '8-speed PDK', 'fuel_type' => 'Hybrid', 'mileage' => 150]],
            ],
            'McLaren' => [
                ['name' => '750S Spider', 'model' => 'Super Series', 'year' => 2024, 'price' => 10500000000, 'image' => 'https://images.unsplash.com/photo-1597404294360-fedeca4d9300', 'is_featured' => true, 'type' => 'CONVERTIBLE', 'specs' => ['engine' => '4.0L V8 Twin-Turbo', 'transmission' => '7-speed SSG', 'fuel_type' => 'Petrol', 'mileage' => 50]],
                ['name' => 'Artura Hybrid', 'model' => 'High-Performance Hybrid', 'year' => 2023, 'price' => 8800000000, 'image' => 'https://images.unsplash.com/photo-1597404294360-fedeca4d9300', 'is_featured' => false, 'type' => 'COUPE', 'specs' => ['engine' => '3.0L V6 Hybrid', 'transmission' => '8-speed Seamless Shift', 'fuel_type' => 'Hybrid', 'mileage' => 450]],
                ['name' => 'McLaren GT', 'model' => 'Grand Tourer', 'year' => 2023, 'price' => 7500000000, 'image' => 'https://images.unsplash.com/photo-1627282891910-b83d7195456b', 'is_featured' => false, 'type' => 'COUPE', 'specs' => ['engine' => '4.0L V8 Twin-Turbo', 'transmission' => '7-speed SSG', 'fuel_type' => 'Petrol', 'mileage' => 1200]],
            ],
            'Rolls-Royce' => [
                ['name' => 'Phantom VIII', 'model' => 'Series II', 'year' => 2024, 'price' => 45000000000, 'image' => 'https://images.unsplash.com/photo-1631214500115-598fc2cb882e', 'is_featured' => true, 'type' => 'SEDAN', 'specs' => ['engine' => '6.75L V12', 'transmission' => '8-speed Automatic', 'fuel_type' => 'Petrol', 'mileage' => 0]],
                ['name' => 'Cullinan Black', 'model' => 'Black Badge', 'year' => 2023, 'price' => 38000000000, 'image' => 'https://images.unsplash.com/photo-1563720223185-11003d516935', 'is_featured' => false, 'type' => 'SUV', 'specs' => ['engine' => '6.75L V12 Twin-Turbo', 'transmission' => '8-speed Automatic', 'fuel_type' => 'Petrol', 'mileage' => 2500]],
                ['name' => 'Spectre Electric', 'model' => 'Full Electric', 'year' => 2024, 'price' => 32000000000, 'image' => 'https://images.unsplash.com/photo-1711202863765-7eanf8kRpJI', 'is_featured' => true, 'type' => 'COUPE', 'specs' => ['engine' => 'Dual Electric Motors', 'transmission' => 'Single Speed', 'fuel_type' => 'Electric', 'mileage' => 0]],
            ],
            'Bentley' => [
                ['name' => 'Continental Speed', 'model' => 'Mulliner', 'year' => 2024, 'price' => 18000000000, 'image' => 'https://images.unsplash.com/photo-1621359953476-b1645f063f60', 'is_featured' => true, 'type' => 'COUPE', 'specs' => ['engine' => '6.0L W12 TSI', 'transmission' => '8-speed Dual-Clutch', 'fuel_type' => 'Petrol', 'mileage' => 0]],
                ['name' => 'Bentayga EWB', 'model' => 'Azure', 'year' => 2024, 'price' => 14500000000, 'image' => 'https://images.unsplash.com/photo-1549399542-7e3f8b79c3d8', 'is_featured' => false, 'type' => 'SUV', 'specs' => ['engine' => '4.0L V8 Twin-Turbo', 'transmission' => '8-speed Automatic', 'fuel_type' => 'Petrol', 'mileage' => 500]],
            ],
            'BMW' => [
                ['name' => 'M8 Competition', 'model' => 'Gran Coupe', 'year' => 2024, 'price' => 6800000000, 'image' => 'https://images.unsplash.com/photo-1555215695-3004980ad54e', 'is_featured' => false, 'type' => 'SEDAN', 'specs' => ['engine' => '4.4L V8 M TwinPower', 'transmission' => '8-speed M Steptronic', 'fuel_type' => 'Petrol', 'mileage' => 0]],
                ['name' => 'XM Label Red', 'model' => 'Label Red', 'year' => 2024, 'price' => 12000000000, 'image' => 'https://images.unsplash.com/photo-1617531653332-bd46c24f2068', 'is_featured' => true, 'type' => 'SUV', 'specs' => ['engine' => '4.4L V8 PHEV', 'transmission' => '8-speed M Steptronic', 'fuel_type' => 'Hybrid', 'mileage' => 0]],
                ['name' => 'M4 CSL Edition', 'model' => 'Limited Edition', 'year' => 2023, 'price' => 5500000000, 'image' => 'https://images.unsplash.com/photo-1607853202273-797f1c22a38e', 'is_featured' => false, 'type' => 'COUPE', 'specs' => ['engine' => '3.0L M TwinPower Turbo', 'transmission' => '8-speed M Steptronic', 'fuel_type' => 'Petrol', 'mileage' => 1500]],
            ],
            'Mercedes-Benz' => [
                ['name' => 'AMG GT 63', 'model' => 'E Performance', 'year' => 2024, 'price' => 8800000000, 'image' => 'https://images.unsplash.com/photo-1541899481282-d53bffe3c35d', 'is_featured' => true, 'type' => 'PERFORMANCE', 'specs' => ['engine' => '4.0L V8 Biturbo Hybrid', 'transmission' => '9-speed AMG SPEEDSHIFT', 'fuel_type' => 'Hybrid', 'mileage' => 0]],
                ['name' => 'G 63 Edition', 'model' => 'Grand Edition', 'year' => 2024, 'price' => 11500000000, 'image' => 'https://images.unsplash.com/photo-1520031441872-265e4ff70366', 'is_featured' => false, 'type' => 'SUV', 'specs' => ['engine' => '4.0L V8 Biturbo', 'transmission' => '9-speed Automatic', 'fuel_type' => 'Petrol', 'mileage' => 0]],
                ['name' => 'Maybach S 680', 'model' => 'V12 Luxury', 'year' => 2024, 'price' => 16500000000, 'image' => 'https://images.unsplash.com/photo-1622193552434-6309859f8164', 'is_featured' => true, 'type' => 'SEDAN', 'specs' => ['engine' => '6.0L V12 Biturbo', 'transmission' => '9-speed Automatic', 'fuel_type' => 'Petrol', 'mileage' => 0]],
            ],
            'Audi' => [
                ['name' => 'R8 Performance', 'model' => 'GT RWD', 'year' => 2023, 'price' => 6500000000, 'image' => 'https://images.unsplash.com/photo-1603553323145-3162b2d07119', 'is_featured' => false, 'type' => 'PERFORMANCE', 'specs' => ['engine' => '5.2L V10 FSI', 'transmission' => '7-speed S tronic', 'fuel_type' => 'Petrol', 'mileage' => 3200]],
                ['name' => 'RS e-tron GT', 'model' => 'Quattro', 'year' => 2024, 'price' => 5900000000, 'image' => 'https://images.unsplash.com/photo-1614162692292-7ac56d7f7f1e', 'is_featured' => false, 'type' => 'COUPE', 'specs' => ['engine' => 'Dual Electric Motors', 'transmission' => '2-speed Automatic', 'fuel_type' => 'Electric', 'mileage' => 0]],
                ['name' => 'RS 6 Performance', 'model' => 'Performance', 'year' => 2024, 'price' => 4800000000, 'image' => 'https://images.unsplash.com/photo-1616422285623-13ff0167c958', 'is_featured' => false, 'type' => 'PERFORMANCE', 'specs' => ['engine' => '4.0L V8 Biturbo', 'transmission' => '8-speed Tiptronic', 'fuel_type' => 'Petrol', 'mileage' => 100]],
            ],
            'Aston Martin' => [
                ['name' => 'DBS 770', 'model' => 'V12 Coupe', 'year' => 2024, 'price' => 18500000000, 'image' => 'https://images.unsplash.com/photo-1605515298946-d062f2e9da53', 'is_featured' => true, 'type' => 'COUPE', 'specs' => ['engine' => '5.2L V12 Twin-Turbo', 'transmission' => '8-speed Automatic', 'fuel_type' => 'Petrol', 'mileage' => 0]],
                ['name' => 'DB12 Coupe', 'model' => 'Grand Tourer', 'year' => 2024, 'price' => 12800000000, 'image' => 'https://images.unsplash.com/photo-1627282891910-b83d7195456b', 'is_featured' => false, 'type' => 'COUPE', 'specs' => ['engine' => '4.0L V8 Twin-Turbo', 'transmission' => '9-speed Automatic', 'fuel_type' => 'Petrol', 'mileage' => 0]],
            ]
        ];

        foreach ($data as $catName => $cars) {
            $category = Category::create(['name' => $catName]);

            foreach ($cars as $prodData) {
                Product::create([
                    'category_id' => $category->id,
                    'type' => $prodData['type'],
                    'name' => $prodData['name'],
                    'description' => "Trải nghiệm đỉnh cao công nghệ và sự sang trọng với dòng xe " . $prodData['name'] . ". " . $prodData['model'] . " đại diện cho sự tinh hoa trong thiết kế và hiệu năng vượt trội, mang đến cảm giác lái độc bản và phong cách sống thượng lưu.",
                    'model' => $prodData['model'],
                    'year' => $prodData['year'],
                    'price' => $prodData['price'],
                    'image' => $prodData['image'] . "?auto=format&fit=crop&q=80&w=800",
                    'is_featured' => $prodData['is_featured'],
                    'technical_specs' => $prodData['specs'],
                ]);
            }
        }
    }
}
