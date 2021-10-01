<?php

namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class BlogCategoryRepository
 *
 * @package App\Repositories
 */

class BlogCategoryRepository extends CoreRepository {

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
        // Способ 1
        // $result = $this->startConditions()->all();

        // Способ 2
        // $result = $this->startConditions()
        //     ->select('blog_categories.*', DB::raw('CONCAT (id, ". ", title) AS id_title'))
        //     ->toBase()
        //     ->get();

        // Способ 3
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

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
        $columns = ['id', 'title', 'parent_id'];

        $result = $this->startConditions()
            ->select($columns)
            ->with(['parentCategory:id,title'])
            ->paginate($perPage);

        return $result;
    }
}
