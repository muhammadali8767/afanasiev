<div class="card">
    <div class="card-body">
        <button class="float-right btn btn-success" type="submit">Save</button>
    </div>
</div>
<br>
@if ($item->exists)
<div class="card">
    <div class="card-body">
        ID: {{ $item->id }}
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>Created at</label>
            <input class="form-control" disabled value="{{ $item->created_at }}" />
        </div>
        <div class="form-group">
            <label>Updated at</label>
            <input class="form-control" disabled value="{{ $item->updated_at }}" />
        </div>
        @if ($item->published_at)
        <div class="form-group">
            <label>Published at</label>
            <input class="form-control" disabled value="{{ $item->published_at }}" />
        </div>
        @endif
        @if ($item->deleted_at)
        <div class="form-group">
            <label>Deleted at</label>
            <input class="form-control" disabled value="{{ $item->deleted_at }}" />
        </div>
        @endif
    </div>
</div>
@endif
