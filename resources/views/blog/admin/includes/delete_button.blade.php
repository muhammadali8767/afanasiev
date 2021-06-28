@if ($item->exists)
    <form action="{{ route($link, $item->id) }}" method="POST">
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