@csrf
<div class="row g-3 align-center">
    <div class="col-lg-5">
        <div class="form-group">
            <label class="form-label" for="site-name">Retainership Name</label>
            <span class="form-note">Specify the name of the retainership.</span>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="form-group">
            <div class="form-control-wrap">
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name') ?? $param->name}}">
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
            <label class="form-label">Retainership Description</label>
            <span class="form-note">Specify a little description about this retainership</span>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="form-group">
            <div class="form-control-wrap">
                <input type="text" class="form-control" name="description" id="description" value="{{old('description') ?? $param->description }}">
                @error('description')
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
            <label class="form-label">Retainership Status</label>
            <span class="form-note">Specify this retainership status</span>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="form-group">
            <div class="form-control-wrap">
                <div class="form-control-select">
                    <select class="form-control" id="status" name="status">
                        <option value="" disabled>Select a status</option>
                        @foreach($param->statusOptions() as $key => $value)
                        <option value="{{ $key }}" {{$param->status == $value ? 'selected' : ''}}>{{$value}}</option>
                        @endforeach

                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
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
