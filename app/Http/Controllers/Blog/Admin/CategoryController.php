<?php

namespace App\Http\Controllers\blog\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BlogCategoryUpdateRequest;
use Illuminate\Pagination\Paginator;

class CategoryController extends BaseController
{
    public function boot()
    {
        Paginator::useBootstrap();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = BlogCategory::paginate(5);
        // dd($items);
        return view('blog.admin.catrgory.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(__METHOD__);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = BlogCategory::find($id);
        $categoryList = BlogCategory::all();
        return view('blog.admin.catrgory.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        dd($request);
        $item = BlogCategory::find($id);
        
        if(empty($item)) {
            return back()
                ->withErrors(['msg' => 'not found'])
                ->withInput();
        }

        $data = $request->all();
        
        $result = $item
            ->fill($data)
            ->save();

        if ($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => 'Saved']);
        } else {
            return back()
                ->withErrors(['msg' => 'error saving'])
                ->withInput();
        }
    }
}
