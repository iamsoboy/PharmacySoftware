@csrf
<div class="row g-4">
    <div class="col-lg-6">
        <div class="form-group">
            <label class="form-label" for="full-name-1">Full Name</label>
            <div class="form-control-wrap">
                <input type="text" class="form-control" id="name" name="name" value="{{old('name') ?? $user->name }}" required>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="form-label" for="email-address-1">Email address</label>
            <div class="form-control-wrap">
                <input type="email" class="form-control" id="email" name="email" value="{{old('email') ?? $user->email }}">
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="form-label" for="username">Username</label>
            <div class="form-control-wrap">
                <input type="text" class="form-control" id="username" name="username" value="{{old('username') ?? $user->username }}" required>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="form-label" for="phone-no-1">Phone No</label>
            <div class="form-control-wrap">
                <input type="text" class="form-control" id="phone" name="phone" value="{{old('phone') ?? $user->phone }}">
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="form-label" for="username">Password</label>
            <div class="form-control-wrap">
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="form-label" for="phone-no-1">Confirm Password</label>
            <div class="form-control-wrap">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="form-label" for="department">Department</label>
            <div class="form-control-wrap ">
                <div class="form-control-select">
                    <select class="form-control" id="department" name="department">
                        <option value="Pharmacy">Pharmacy</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="form-label" for="rank">Role</label>
            <div class="form-control-wrap ">
                <div class="form-control-select">
                    <select class="form-control" id="rank" name="role">
                        @foreach($roles as $role)
                        <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="form-label">Administrator</label>
            <ul class="custom-control-group g-3 align-center">
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="isAdmin" id="isAdmin">
                        <label class="custom-control-label" for="isAdmin">Yes/No</label>
                    </div>
                </div>
            </ul>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="form-label">Activated</label>
            <ul class="custom-control-group g-3 align-center">
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="isActive" id="isActive" checked>
                        <label class="custom-control-label" for="isActive">Yes/No</label>
                    </div>
                </div>
            </ul>
        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            <button type="submit" class="btn btn-lg btn-primary">Save Information</button>
        </div>
    </div>
</div>
