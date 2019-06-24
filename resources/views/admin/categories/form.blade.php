<div class="col-xs-6">
    <div class="box">
        <div class="box-body">
            <div class="form-group @error('name') has-error @enderror">
                <label for="name">Name</label>
                <input type="text" name="name" placeholder="Enter Title here" id="name"
                       class="form-control" value="{{ old('name') ?: $category->name }}">

                @error('name')
                <p class="help-block">{{ $message }}</p>
                @enderror
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ $category->exists ? 'Edit Category' : 'Add Category' }}</button>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>
