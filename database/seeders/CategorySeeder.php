<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $categories = [
        // ['name'=>'Arredamento',
        // 'icon'=>'fa-couch',
        // 'colour'=>'#D2691E'],
        // ['name'=>'Elettronica',
        // 'icon'=>'fa-plug',
        // 'colour'=>'#808080'],
        // ['name'=>'Musica',
        // 'icon'=>'fa-headphones',
        // 'colour'=>'#001F3F'],
        // ['name'=>'Elettrodomestici',
        // 'icon'=>'fa-blender',
        // 'colour'=>'#D3D3D3'],
        // ['name'=>'Automobili',
        // 'icon'=>'fa-car',
        // 'colour'=>'#FF4500'],
        // ['name'=>'Abbigliamento',
        // 'icon'=>'fa-shirt',
        // 'colour'=>'#191970'],
        // ['name'=>'Casa',
        // 'icon'=>'fa-house',
        // 'colour'=>'#556B2F'],
        // ['name'=>'Giardino',
        // 'icon'=>'fa-leaf',
        // 'colour'=>'#2E8B57'],
        // ['name'=>'Sport',
        // 'icon'=>'fa-dumbbell',
        // 'colour'=>'#4169E1'],
        // ['name'=>'Motociclette',
        // 'icon'=>'fa-motorcycle',
        // 'colour'=>'#2F4F4F'],
        // ];
        $categories = [
            ['name' => 'Arredamento', 'icon' => 'fa-couch', 'colour' => '#FFA07A'],       // Light Salmon
            ['name' => 'Elettronica', 'icon' => 'fa-plug', 'colour' => '#A9A9A9'],       // Dark Gray
            ['name' => 'Musica', 'icon' => 'fa-headphones', 'colour' => '#6495ED'],       // Cornflower Blue
            ['name' => 'Elettrodomestici', 'icon' => 'fa-blender', 'colour' => '#D3D3D3'], // Light Gray
            ['name' => 'Automobili', 'icon' => 'fa-car', 'colour' => '#FF6347'],          // Tomato
            ['name' => 'Abbigliamento', 'icon' => 'fa-shirt', 'colour' => '#1E90FF'],      // Dodger Blue
            ['name' => 'Casa', 'icon' => 'fa-house', 'colour' => '#556B2F'],              // Dark Olive Green
            ['name' => 'Giardino', 'icon' => 'fa-leaf', 'colour' => '#2E8B57'],           // Sea Green
            ['name' => 'Sport', 'icon' => 'fa-dumbbell', 'colour' => '#4169E1'],          // Royal Blue
            ['name' => 'Motociclette', 'icon' => 'fa-motorcycle', 'colour' => '#2F4F4F'], // Dark Slate Gray
        ];
        

        foreach ($categories as $category){
            Category::create([
                'name'=>$category['name'],
                'icon'=>$category['icon'],
                'colour'=>$category['colour'],
                          
            ]);
        };
        /* foreach ($icons as $icon){
            Category::create([
                'icon'=>$icon
            ]);
        }; */
    }
}
