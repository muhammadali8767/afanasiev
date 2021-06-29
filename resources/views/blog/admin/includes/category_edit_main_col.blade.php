<div class="card">
    <div class="card-header">
        <h2 class="d-inline">Categories</h2>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Title</label>
            <input class="form-control" type="text" name="title" required value="{{ old('title', $item->title) }}" />
        </div>
        <div class="form-group">
            <label>Slug</label>
            <input class="form-control" type="text" name="slug" value="{{ old('slug', $item->slug) }}" />
        </div>
        <div class="form-group">
            <label>Parent</label>
            <select class="form-control" name="parent_id" required>
                @foreach($categoryList as $category)
                    <option value="{{ $category->id }}" {{ ($category->id == old('parent_id', $item->parent_id)) ? "selected" : "" }}>{{ $category->id_title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" type="text" name="description">{{ old('description', $item->description) }}</textarea>
        </div>
    </div>
</div>
