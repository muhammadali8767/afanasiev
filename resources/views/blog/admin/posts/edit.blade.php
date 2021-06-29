@extends('layouts.admin')
@section('content')
<div class="container">
    @if ($item->exists)
    <form action="{{ route('blog.admin.posts.update', $item->id) }}" method="POST">
        @method('PATCH')
    @else
    <form action="{{ route('blog.admin.posts.store') }}" method="POST">
    @endif
        @csrf

        @include('blog.admin.includes.result_message')

        <div class="row">
            <div class="col-sm-9">
                @include('blog.admin.includes.post_edit_main_col')
            </div>

            <div class="col-sm-3">
                @include('blog.admin.includes.edit_add_col')
            </div>
        </div>
    </form>

    @include('blog.admin.includes.delete_button', ['link' => 'blog.admin.posts.destroy'])
</div>
@endsection
