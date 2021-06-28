@extends('layouts.admin')
@section('content')
<div class="container">
@if ($item->exists)
<form action="{{ route('blog.admin.posts.update', $item->id) }}" method="POST">
    @method('PATCH')
@else
<form action="{{ route('blog.admin.posts.store') }}" method="POST">
@endif
    @method('PATCH')
    @csrf

        @include('blog.admin.posts.includes.result_message')


        <div class="row">
            <div class="col-sm-9">
                @include('blog.admin.posts.includes.post_edit_main_col')
            </div>

            <div class="col-sm-3">
                @include('blog.admin.posts.includes.post_edit_add_col')
            </div>

        </div>
</form>

@if ($item->exists)
<form action="{{ route('blog.admin.posts.destroy', $item->id) }}" method="POST">
    @method('DELETE')
    @csrf
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-danger float-right">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <br>
</form>
@endif
</div>

@endsection
