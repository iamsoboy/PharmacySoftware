<div class="form-group">
    <div class="form-control-wrap" wire:ignore>
        <select class="form-control form-control-xl" data-ui="xl" id="select" data-search="on">
            <option value="default_option">Default Option</option>
            @foreach($all_drugs as $item)
                <option value="{{$item->code_no}}">{{$item->product_name}}</option>
            @endforeach
        </select>
        <label class="form-label-outlined" for="outlined-select">Outlined Select</label>
    </div>
    <div class="card-bordered mt-5">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
            </tr>
            </thead>
            <tbody>
            @foreach($entries as $index => $value)
            <tr>
                <th scope="row"><input type="text" wire:model="name.{{ $value }}"></th>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

@push('scripts')

    <script>
        $(document).ready(function () {
            $('#select').select2();
            $('#select').on('change', function (e) {
                var data = $('#select').select2("val");
            @this.set('selected', data);
            });
        });

    </script>

@endpush
