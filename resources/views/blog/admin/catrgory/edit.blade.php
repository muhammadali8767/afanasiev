@extends('layouts.admin')
@section('content')
<form action="{{ route('blog.admin.categories.update', $item->id) }}" method="POST">
    @method('PATCH')
    <div class="container">

        @if ($errors->any())
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-danger" role="alert">
                    <button type="button" class="close" data-dismis="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    {{ $errors->first() }}
                </div>
            </div>
        </div>
        @endif

        @if (session('success'))
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismis="alert" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                    {{ session()->get('success') }}
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header">
                        <h2 class="d-inline">Categories</h2>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <a class="float-right btn btn-success" href="{{ route('blog.admin.categories.create') }}">Save</a>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
@endsection
