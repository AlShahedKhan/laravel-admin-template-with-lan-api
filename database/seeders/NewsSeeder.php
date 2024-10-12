<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = [
            [
                'title' => 'Exciting Cricket Match',
                'author' => 'John Doe',
                'date' => '2023-05-16',
                'image' => 'https://unsplash.com/photos/dE3exzmYlKc',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing
                 elit. Duis rhoncus leo sit amet dolor venenatis, et tristique enim
                 ullamcorper.',
            ],
            [
                'title' => 'Cricket News Update',
                'author' => 'Jane Smith',
                'date' => '2023-05-17',
                'image' => 'https://unsplash.com/photos/gywHscPZwMM',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing
                elit. Sed consectetur est et ultricies.',
            ],
            // Add more news items as needed
        ];

        foreach ($news as $item) {
            DB::table('news')->insert([
                'title' => $item['title'],
                'author' => $item['author'],
                'date' => $item['date'],
                'image' => $item['image'],
                'description' => $item['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
