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
                                <td><a href="{{ route('blog.admin.categories.edit', ['category' => $item->id]) }}">{{ $item->title }}</a></td>
								<td>{{ $item->slug }}</td>
								<td>{{ $item->parent_id }}</td>
							</tr>
						@endforeach
					</table>

					<nav aria-label="...">
						<ul class="pagination">
							<li class="page-item {{ ($items->currentPage() == 1) ? 'disabled' : ''}}">
								<a class="page-link" href="{{ route('blog.admin.categories.index', ['page' => $items->currentPage() - 1]) }}">Previous</a>
							</li>
							<li class="page-item disabled"><a class="page-link" href="#">{{ $items->currentPage() }} th page of {{ $items->lastPage() }}</a></li>
							<li class="page-item {{ ($items->currentPage() == $items->lastPage()) ? 'disabled' : ''}}">
								<a class="page-link" href="{{ route('blog.admin.categories.index', ['page' => $items->currentPage() + 1]) }}">Next</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
