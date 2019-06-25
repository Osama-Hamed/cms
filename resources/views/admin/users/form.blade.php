<div class="col-xs-9">
    <div class="box">
        <div class="box-body">
            <div class="form-group @error('name') has-error @enderror">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?: $user->name }}">

                @error('name')
                <p class="help-block">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group @error('email') has-error @enderror">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') ?: $user->email }}">

                @error('email')
                <p class="help-block">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group @error('bio') has-error @enderror">
                <label for="bio">Bio</label>
                <input type="text" name="bio" id="bio" class="form-control" value="{{ old('bio') ?: $user->bio }}">

                @error('bio')
                <p class="help-block">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group @error('password') has-error @enderror">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">

                @error('password')
                <p class="help-block">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group @error('password_confirmation') has-error @enderror">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{ $user->exists ? 'Edit User' : 'Add User' }}</button>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>
