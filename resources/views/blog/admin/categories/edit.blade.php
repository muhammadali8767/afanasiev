@extends('layouts.admin')
@section('content')
@if ($item->exists)
<form action="{{ route('blog.admin.categories.update', $item->id) }}" method="POST">
    @method('PATCH')
@else
<form action="{{ route('blog.admin.categories.store') }}" method="POST">
@endif
    @csrf
    <div class="container">

        @include('blog.admin.categories.includes.result_message')

        <div class="row">
            <div class="col-sm-9">
                @include('blog.admin.categories.includes.category_edit_main_col')
            </div>

            <div class="col-sm-3">
                @include('blog.admin.categories.includes.category_edit_add_col')
            </div>

        </div>
    </div>
</form>
@endsection
