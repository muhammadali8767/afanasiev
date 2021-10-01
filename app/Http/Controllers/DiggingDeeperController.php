<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class DiggingDeeperController extends Controller
{
    /**
     * Коллекция
     *
     * Базовая нформация:
     * @url https://laravel.com/docs/8.x/collections
     * @url https://laravel.com/docs/8.x/eloquent-collections
     *
     * Справочная нформация:
     * @url https://laravel.com/api/8.x/Illuminate/Collections.html
     *
     * Вариант коллекции для моделей eloqunt:
     * @url https://laravel.com/api/8.x/Illuminate/Database/Eloquent/Collection.html
     *
     * Билдер запросов - то с чем можно перепутать коллекции:
     * @url https://laravel.com/docs/8.x/queues
     */
    public function collections()
    {
        $result = [];

        /**
         * @var Illuminate\Database\Eloquent\Collection $eloquentCollection
         */
        $eloquentCollection = BlogPost::withTrashed()->get();
        // dd(__METHOD__, $eloquentCollection, $eloquentCollection->toArray());

        /**
         * @var Illuminate\Support\Collection $collection
         */
        $collection = collect($eloquentCollection->toArray());
        // dd(get_class($collection), get_class($eloquentCollection), $collection);

        $result['first'] = $collection->first();
        $result['last'] = $collection->last();
        // dd($result);

        $result['where']['data'] = $collection
            ->where('category_id', 1)
            ->values()
            ->keyBy('id');
        // dd($result);

        $result['where']['count'] = $result['where']['data']->count();
        $result['where']['isEmpty'] = $result['where']['data']->isEmpty();
        $result['where']['isNotEmpty'] = $result['where']['data']->isNotEmpty();
        // dd($result);

        // Не очень крассиво
        if ($result['where']['count']) {
            # code...
        }
        // Так лучше
        if ($result['where']['data']->isNotEmpty()) {
            # code...
        }

        $result['where-first'] = $collection->firstWhere('category_id', '>', '3');
        dd($result);

        // Базовая переменная не изменится. Просто вернутся измененная версия.
        $result['map']['all'] = $collection->map(function(array $item) {
            $newItem = new \stdClass();
            $newItem->item_id = $item['id'];
            $newItem->item_name = $item['title'];
            $newItem->exists = is_null($item['deleted_at']);

            return $newItem;
        });
        dd($result);
    }
}
