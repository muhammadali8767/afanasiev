<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogPostCreateRequest;
use App\Http\Requests\BlogPostUpdateRequest;
use App\Models\BlogPost;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogPostRepository;

class PostController extends BaseController
{
    /**
     * @var BlogPostRepository $blogPostRepository
     */
    private $blogPostRepository;

    /**
     * @var BlogCategoryRepository $blogCategoryRepository
     */
    private $blogCategoryRepository;


    public function __construct()
    {
        parent::__construct();
        $this->blogPostRepository = app(BlogPostRepository::class);
        $this->blogCategoryRepository = app(BlogCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->blogPostRepository->getAllWithPaginate(5);
        return view('blog.admin.posts.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     * @param BlogPostRepository $categoryRepository
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogPost();
        if (empty($item)) {
            abort(404);
        }
        $categoryList = $this->blogCategoryRepository->getForSelect();
        return view('blog.admin.posts.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogPostCreateRequest $request)
    {
        $data = $request->input();
        $item = (new BlogPost())->create($data);

        if ($item) {
            return redirect()
                ->route('blog.admin.posts.edit', $item->id)
                ->with(['success' => 'Saved']);
        } else {
            return back()
                ->withErrors(['msg' => 'error saving'])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param BlogPostRepository $categoryRepository
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->blogPostRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }
        $categoryList = $this->blogCategoryRepository->getForSelect();

        return view('blog.admin.posts.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogPostUpdateRequest $request, $id)
    {
        $item = $this->blogPostRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => 'not found'])
                ->withInput();
        }

        $data = $request->all();
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('blog.admin.posts.edit', $item->id)
                ->with(['success' => 'Saved']);
        } else {
            return back()
                ->withErrors(['msg' => 'error saving'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Soft Delete
        $result = BlogPost::destroy($id);

        // Polnoe udalenie iz baze dannix
        // $result = BlogPost::find($id)->forceDelete();

        if ($result) {
            return redirect()
                ->route('blog.admin.posts.index')
                ->with(['success' => "Запись id[$id] удалена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаление']);
        }
    }
}
