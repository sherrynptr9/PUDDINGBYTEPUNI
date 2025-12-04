<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'nama' => 'Pudding Cokelat Regal',
                'deskripsi' => 'Pudding cokelat lembut dengan topping biskuit Regal dan saus cokelat.',
                'harga' => 18000,
                'gambar' => 'menus/pudding-cokelat-regal.jpg',
                'is_favorit' => true,
            ],
            [
                'nama' => 'Pudding Mango Delight',
                'deskripsi' => 'Pudding mangga segar dengan potongan buah asli dan saus mangga.',
                'harga' => 20000,
                'gambar' => 'menus/pudding-mango-delight.jpg',
                'is_favorit' => true,
            ],
            [
                'nama' => 'Pudding Matcha Cream',
                'deskripsi' => 'Pudding matcha premium dengan krim lembut dan topping red bean.',
                'harga' => 22000,
                'gambar' => 'menus/pudding-matcha.jpg',
                'is_favorit' => false,
            ],
            [
                'nama' => 'Pudding Taro Velvet',
                'deskripsi' => 'Pudding taro ungu yang creamy dengan tambahan taro crumble.',
                'harga' => 21000,
                'gambar' => 'menus/pudding-taro.jpg',
                'is_favorit' => false,
            ],
            [
                'nama' => 'Pudding Vanilla Caramel',
                'deskripsi' => 'Pudding vanilla klasik dengan karamel homemade.',
                'harga' => 16000,
                'gambar' => 'menus/pudding-vanilla-caramel.jpg',
                'is_favorit' => false,
            ],
            [
                'nama' => 'Pudding Strawberry Milk',
                'deskripsi' => 'Pudding susu rasa strawberry dengan topping saus strawberry asli.',
                'harga' => 17000,
                'gambar' => 'menus/pudding-strawberry.jpg',
                'is_favorit' => false,
            ],
            [
                'nama' => 'Pudding Oreo Cream',
                'deskripsi' => 'Pudding oreo dengan base vanilla dan taburan oreo crumble.',
                'harga' => 18000,
                'gambar' => 'menus/pudding-oreo.jpg',
                'is_favorit' => true,
            ],
            [
                'nama' => 'Pudding Cappuccino',
                'deskripsi' => 'Pudding cappuccino untuk pecinta kopi, lembut dan wangi.',
                'harga' => 19000,
                'gambar' => 'menus/pudding-cappuccino.jpg',
                'is_favorit' => false,
            ],
            [
                'nama' => 'Pudding Milo Crunch',
                'deskripsi' => 'Pudding Milo dengan topping milo powder dan sereal crunchy.',
                'harga' => 18000,
                'gambar' => 'menus/pudding-milo.jpg',
                'is_favorit' => true,
            ],
            [
                'nama' => 'Pudding Pandan Gula Melaka',
                'deskripsi' => 'Pudding pandan lembut dengan sirup gula melaka premium.',
                'harga' => 20000,
                'gambar' => 'menus/pudding-pandan.jpg',
                'is_favorit' => false,
            ],
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
