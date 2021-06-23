@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-9">
			<div class="card">
				<div class="card-body">

					<table class="table table-bordered">
							<thead>
								<th>ID</th>	
								<th>Category Title</th>	
								<th>Edit</th>	
							</thead>
						@foreach($items as $item)
							<tr>
								<td>{{ $item->id }}</td>	
								<td>{{ $item->title }}</td>	
								<td>Edit</td>	
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
					<p></p>

				</div>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="card">
				<div class="card-body">
					<button class="btn btn-success">Save</button>		
				</div>
			</div>
		</div>
	</div> 	
</div>
@endsection
