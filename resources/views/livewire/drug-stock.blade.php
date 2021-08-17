<div class="card card-preview">
    <div class="card-inner">
        <form>
            @csrf
            <table class="table table-bordered table-hover text-center table-sm table-responsive-sm">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Drug Name</th>
                    <th scope="col">Cost Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Sale Price</th>
                    <th scope="col">Expiry Date</th>
                    <th scope="col">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($inputs as $key => $value)
                    <tr>
                        <td style="width:350px">
                            <input list="browsers" id="browser" wire:model.lazy="name" type="text" class="form-control">
                            <datalist id="browsers">
                                @forelse($all_drugs as $drug)
                                    <option value="{{$drug->product_name}}"></option>
                                @empty
                                    <option value="">No drugs found!</option>
                                @endforelse
                            </datalist>
                        </td>
                        <td>
                            <input type="number" wire:model="cost_price.{{$key}}" autocomplete="off">
                        </td>
                        <td>
                            <input type="number" wire:model="quantity.{{$key}}" autocomplete="off">
                        </td>
                        <td>
                            <input type="number" wire:model="sale_price.{{$key}}" autocomplete="off">
                        </td>
                        <td wire:ignore>
                            <input type="text" class="date-picker" wire:model="expiry_date.{{$key}}" autocomplete="off">
                        </td>
                        <td>
                            <button wire:click.prevent="removeRow('{{$key}}')" class="btn btn-round btn-icon btn-sm btn-danger"><em class="icon ni ni-cross"></em></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="justify-between mt-2">
                <button wire:click.prevent="addRow('{{$i}}')" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-plus"></em><span>Add Row</span></button>
            </div>
            <div class="col-12 align-center mt-4">
                <div class="form-group">
                    <button wire:click.prevent="store()" class="btn btn-lg btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div><!-- .card-preview -->
