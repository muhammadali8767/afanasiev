<?php

namespace App\Repositories;

use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class BlogPostRepository
 *
 * @package App\Repositories
 */

class BlogPostRepository extends CoreRepository {

    /**
     * @retutn string
     */
    protected function getModelClass() {
        return Model::class;
    }

    /**
     * Get model for editing in admin panel
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id) {
        return $this->startConditions()->find($id);
    }

    /**
     * @return collection
     */
    public function getForSelect() {

        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

        // $result = $this->startConditions()->all();

        // $result = $this->startConditions()
        //     ->select('blog_categories.*', DB::raw('CONCAT (id, ". ", title) AS id_title'))
        //     ->toBase()
        //     ->get();

        $result = $this->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    /**
     * @param int $perPage
     *
     * @return Illuminate\Contracts\Pagination\Paginator
     */

    public function getAllWithPaginate($perPage = null)
    {
        $columns = [
            'id',
            'slug',
            'title',
            'excerpt',
            'content_raw',
            'content_html',
            'is_published',
            'published_at',
            'user_id',
            'category_id'
        ];

        $result = $this->startConditions()
            ->select($columns)
            // ->toBase()
            ->orderBy('id', 'DESC')
            // ->with(['category', 'user'])
            ->with([
                // Можно так
                'category' => function ($query) {
                    $query->select(['id', 'title']);
                },
                // можно и так
                'user:id,name'
            ])
            ->paginate($perPage);

        return $result;
    }
}
