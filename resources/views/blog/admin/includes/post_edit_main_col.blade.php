<div class="card">
    <div class="card-header">
        @if ($item->is_published)
            <h2 class="d-inline">Опубликовано</h2>
        @else
            <h2 class="d-inline">Черновик</h2>
        @endif
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                    aria-selected="true">Основные данные</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                    aria-controls="profile" aria-selected="false">Доп. данные</a>
            </li>
        </ul>


        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="form-group">
                    <label>Title</label>
                    <input class="form-control" type="text" name="title" minlength="3" required value="{{ old('title', $item->title) }}" />
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" type="text" rows="10" minlength="3"
                        name="content_raw">{{ old('content_raw', $item->content_raw) }}</textarea>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="form-group">
                    <label>Slug</label>
                    <input class="form-control" type="text" name="slug" value="{{ old('slug', $item->slug) }}" />
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id" required>
                        @foreach ($categoryList as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>
                                {{ $category->id_title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Выдержка</label>
                    <textarea name="excerpt"
                        class="form-control"
                        type="text"
                        minlength="3"
                    >
                        {{ old('excerpt', $item->excerpt) }}
                    </textarea>
                </div>
                <div class="form-check">
                    <input name="is_published"
                        type="hidden"
                        value="0"
                    >

                    <input name="is_published"
                        class="form-check-input"
                        type="checkbox"
                        value="1"
                        @if ($item->is_published)
                            checked="checked"
                        @endif
                    >
                    <label class="form-check-label">Is published</label>
                </div>
            </div>
        </div>

    </div>
</div>
