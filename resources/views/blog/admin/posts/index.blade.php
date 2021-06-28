@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
                <div class="card-header">
                    <h2 class="d-inline">posts</h2>
                    <a class="float-right btn btn-success" href="{{ route('blog.admin.posts.create') }}">Add new</a>
                </div>
				<div class="card-body">

					<table class="table table-bordered">
							<thead>
								<th>ID</th>
								<th>User</th>
								<th>Category</th>
								<th>Post Title</th>
								<th>Published at</th>
							</thead>
						@foreach($items as $item)
                            @php
                                /** @var \App\Models\BlogPost $item */
                            @endphp
							<tr @if (!$item->is_published) style="background-color: #ccc" @endif>
								<td>{{ $item->id }}</td>
								<td>{{ $item->user->name }}</td>
								<td>{{ $item->category->title }}</td>
                                <td><a href="{{ route('blog.admin.posts.edit', $item->id) }}">{{ $item->title }}</a></td>
								<td>{{ $item->published_at ? \Carbon\Carbon::parse($item->published_at)->format('d.M H:i') : '' }}</td>
							</tr>
						@endforeach
					</table>
                    @include('blog.admin.posts.includes.post_paginate')
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
