<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Seed the categories table with data from SQL dump.
     */
    public function run(): void
    {
        $categories = [
            ['id' => 1,  'title' => 'Сережки',              'slug' => 'serezhky',              'parent_id' => 0, 'is_active' => true, 'description' => ''],
            ['id' => 2,  'title' => 'Браслети',             'slug' => 'braslety',              'parent_id' => 0, 'is_active' => true, 'description' => ''],
            ['id' => 3,  'title' => 'Ланцюжки',             'slug' => 'lancyuzhky',            'parent_id' => 0, 'is_active' => true, 'description' => ''],
            ['id' => 4,  'title' => 'Підвіски',             'slug' => 'pidvisky',              'parent_id' => 0, 'is_active' => true, 'description' => ''],
            ['id' => 5,  'title' => 'Кулони',               'slug' => 'kulony',                'parent_id' => 0, 'is_active' => true, 'description' => ''],
            ['id' => 6,  'title' => 'Кільця',               'slug' => 'kilcya',                'parent_id' => 0, 'is_active' => true, 'description' => ''],
            ['id' => 7,  'title' => 'Заколки',              'slug' => 'zakolky',               'parent_id' => 0, 'is_active' => true, 'description' => ''],
            ['id' => 8,  'title' => 'Сонцезахисні окуляри', 'slug' => 'soncezahysni-okulyary', 'parent_id' => 0, 'is_active' => true, 'description' => ''],
            ['id' => 9,  'title' => 'Годинники',            'slug' => 'godynnyky',             'parent_id' => 0, 'is_active' => true, 'description' => ''],
            ['id' => 10, 'title' => 'Сумки',                'slug' => 'sumky',                 'parent_id' => 0, 'is_active' => true, 'description' => ''],
            ['id' => 11, 'title' => 'Гвіздочки',            'slug' => 'gvozdyky',              'parent_id' => 1, 'is_active' => true, 'description' => ''],
            ['id' => 12, 'title' => 'Протяжки',             'slug' => 'protyazhky',            'parent_id' => 1, 'is_active' => true, 'description' => ''],
            ['id' => 13, 'title' => 'Кільця',               'slug' => 'kilcya',                'parent_id' => 1, 'is_active' => true, 'description' => ''],
            ['id' => 14, 'title' => 'Пірсинг',              'slug' => 'pirsyng',               'parent_id' => 0, 'is_active' => true, 'description' => ''],
            ['id' => 15, 'title' => 'Набір',                'slug' => 'nabir',                 'parent_id' => 0, 'is_active' => true, 'description' => ''],
            ['id' => 16, 'title' => 'Брошки',               'slug' => 'broshky',               'parent_id' => 0, 'is_active' => true, 'description' => ''],
            ['id' => 17, 'title' => 'Чоловічі',             'slug' => 'cholovichi',            'parent_id' => 6, 'is_active' => true, 'description' => ''],
            ['id' => 18, 'title' => 'Жіночі',               'slug' => 'zhinochi',              'parent_id' => 6, 'is_active' => true, 'description' => ''],
            ['id' => 19, 'title' => 'Гребінці',             'slug' => 'grebinci',              'parent_id' => 0, 'is_active' => true, 'description' => ''],
            ['id' => 20, 'title' => 'Шкарпетки',            'slug' => 'shkarpetky',            'parent_id' => 0, 'is_active' => true, 'description' => ''],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(['id' => $category['id']], $category);
        }
    }
}
