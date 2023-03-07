<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = \App\Models\Book::class;
    public function definition()
    {

        $book = [
            'title' => $this->faker->sentence(),
            'author' => $this->faker->name,
            'publisher' => 'packt',
            'genre' => Str::random(8),
            'description' => $this->faker->text(),
            'isbn' => Str::random(10),
            'image' => 'http://placeimg.com/480/640/any',
            'published' => '2023-03-01'
        ];

        return $book;
    }
}
