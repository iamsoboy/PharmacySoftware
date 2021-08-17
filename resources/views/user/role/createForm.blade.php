@csrf
<div class="row g-3 align-center">
    <div class="col-lg-5">
        <div class="form-group">
            <label class="form-label" for="site-name">{{ucfirst($title)}} Name</label>
            <span class="form-note">Specify the name of the user {{$title}}.</span>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="form-group">
            <div class="form-control-wrap">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name') ?? $role->name }}">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
</div>
<div class="row g-3 align-center">
    <div class="col-lg-5">
        <div class="form-group">
            <label class="form-label">Select Permission</label>
            <span class="form-note">Assign permission(s) to the {{$title}}.</span>
        </div>
    </div>
    <div class="col-lg-7">


            <div class="form-group">
                <div class="form-control-wrap">
                    <select class="form-select" multiple="multiple" name="permissions[]">
                        @foreach($permissions as $permission)
                            <option value="{{$permission->name}}">{{ ucfirst($permission->name) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

    </div>
</div>
<div class="row g-3">
    <div class="col-lg-7 offset-lg-5">
        <div class="form-group mt-2">
            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
        </div>
    </div>
</div>
