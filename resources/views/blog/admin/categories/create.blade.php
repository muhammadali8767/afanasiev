@extends('layouts.admin')
@section('content')
<form action="{{ route('blog.admin.categories.store') }}" method="POST">
    @csrf
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ $errors->first() }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">
                        <h2 class="d-inline">Categories</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" type="text" name="title" required value="{{ old('title') }}" />
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input class="form-control" type="text"  name="slug" value="{{ old('slug') }}" />
                        </div>
                        <div class="form-group">
                            <label>Parent</label>
                            <select class="form-control" name="parent_id">
                                @foreach($categoryList as $category)
                                    <option value="{{ $category->id }}">{{ $category->id_title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" type="text" name="description">{{ old('description') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <button class="float-right btn btn-success" type="submit">Save</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection
