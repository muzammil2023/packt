<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Elastic\Elasticsearch\ClientBuilder;

class Book extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();

        self::created(function ($book) {

            $client = ClientBuilder::create()
                ->setHosts(['localhost:9200'])
                ->build();

            $params = [
                'index' => 'packt',
                'type' => '_doc',
                'id' => $book->id,
                'body'  =>  $book
            ];

            $response = $client->index($params);
            try {
            } catch (ClientResponseException $e) {
                // manage the 4xx error
            } catch (ServerResponseException $e) {
                // manage the 5xx error
            } catch (\Exception $e) {
                // eg. network error like NoNodeAvailableException
            }
        });

        self::updated(function ($model) {
            // ... code here
        });

        self::deleted(function ($model) {
            // ... code here
        });
    }


    public static function search($q = "")
    {

        $client = ClientBuilder::create()
            ->setHosts(['localhost:9200'])
            ->build();
        $body = [];
        if ($q !== "") {
            $body = [
                'query' => [
                    'multi_match' => [
                        'query' => $q,
                        'fields' => [
                            'title',
                            'author',
                            'publisher',
                            'genre',
                            'description',
                            'isbn'
                        ]
                    ]
                ]
            ];
        }
        $params = [
            'index' => 'packt',
            'type' => '_search',
            'size' => 12,
            'body'  => $body
        ];

        try {
            $response = $client->search($params);
            return $response['hits']['hits'];
        } catch (ClientResponseException $e) {
            // manage the 4xx error
        } catch (ServerResponseException $e) {
            // manage the 5xx error
        } catch (\Exception $e) {
            // eg. network error like NoNodeAvailableException
        }
    }
}
