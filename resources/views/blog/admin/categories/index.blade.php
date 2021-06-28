@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="d-inline">Categories</h2>
                    <a class="float-right btn btn-success" href="{{ route('blog.admin.categories.create') }}">Add new</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                            <thead>
                                <th>ID</th>
                                <th>Category Title</th>
                                <th>Category Slug</th>
                                <th>Parent ID</th>
                            </thead>
                        @foreach($items as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td><a href="{{ route('blog.admin.categories.edit', $item->id) }}">{{ $item->title }}</a></td>
                                <td>{{ $item->slug }}</td>
                                <td>{{ $item->parent_id }}</td>
                            </tr>
                        @endforeach
                    </table>
                    @include('blog.admin.includes.paginate', ['link' => 'blog.admin.categories.index'])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
