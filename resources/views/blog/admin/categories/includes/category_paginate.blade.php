@if ($items->total() > $items->perPage())
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
@endif
