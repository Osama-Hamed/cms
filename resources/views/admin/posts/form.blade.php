<div class="col-xs-8">
    <div class="box">
        <div class="box-body">
            <div class="form-group @error('title') has-error @enderror">
                <label for="title">Title</label>
                <input type="text" name="title" placeholder="Enter Title here" id="title"
                       class="form-control" value="{{ old('title') ?: $post->title}}">

                @error('title')
                <p class="help-block">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group excerpt @error('excerpt') has-error @enderror">
                <label for="body">Excerpt</label>
                <textarea name="excerpt" id="excerpt" rows="5"
                          class="form-control">{{ old('excerpt') ?: $post->excerpt }}</textarea>

                @error('excerpt')
                <p class="help-block">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group @error('body') has-error @enderror">
                <label for="body">Body</label>
                <textarea name="body" id="body" rows="10"
                          class="form-control">{{ old('body') ?: $post->body}}</textarea>

                @error('body')
                <p class="help-block">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<div class="col-md-4">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Publish</h3>
        </div>
        <div class="box-body">
            <div class="form-group @error('published_at') has-error @enderror">
                <label for="published_at">Publish date</label>
                <div class='input-group date' id='datetimepicker1'>
                    <input type="text" id="published_at" name="published_at" class="form-control"
                           value="{{ old('published_at') ?: $post->published_at }}" placeholder="Y-m-d H:i:s">
                    <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>

                    @error('published_at')
                    <p class="help-block">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="box-footer clearfix">
            <div class="pull-left">
                <button id="draft-btn" class="btn btn-default">Save Draft</button>
            </div>
            <div class="pull-right">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Category</h3>
        </div>
        <div class="box-body">
            <div class="form-group @error('category_id') has-error @enderror">
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Choose category</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == (old('category_id') ?? $categoryId) ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>

                @error('category_id')
                <p class="help-block">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tags</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <input type="text" name="tags" class="form-control">
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Feature Image</h3>
        </div>
        <div class="box-body text-center">
            <div class="fileinput fileinput-new @error('image') has-error @enderror"
                 data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 250px; height: 200px;">
                    <img src="{{ $post->image ? asset('/cms/img/' . $post->image) : 'http://placehold.it/200x200&text=No+Image' }}" width="100%" alt="...">
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail"
                     style="max-width: 200px; max-height: 150px;"></div>
                <div>
                        <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span
                                    class="fileinput-exists">Change</span>
                        <input type="file" name="image">
                    </span>
                    @error('image')
                    <p class="help-block">{{ $message }}</p>
                    @enderror
                    <a href="#" class="btn btn-default fileinput-exists"
                       data-dismiss="fileinput">Remove</a>
                </div>
            </div>
        </div>
    </div>
</div>