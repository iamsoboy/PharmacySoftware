<div class="nk-block">
    <form wire:submit.prevent="saveForm" class="form-validate">

        <div class="row g-gs">
            <div class="col-lg-8 col-md-8">
                <div class="card card-bordered h-100">
                    <div class="card-header border-bottom">
                        <div class="card-title">
                            <h6 class="title">Patient Details</h6>
                        </div>
                    </div>
                    <div class="card-inner">
                        <div class="row">
                            <div class="col-sm-12 col-xxl-12">
                                <div class="form-group mb-4">
                                    <div class="form-control-wrap">
                                        <div class="form-control-select">
                                            <select wire:model="selectedTariff" class="custom-select form-control-outlined" id="retainership" name="retainership">
                                                @foreach($retainerships as $retainership)
                                                    <option value="{{$retainership->name_price}}">{{$retainership->name}} Tariff</option>
                                                @endforeach
                                            </select>
                                            <!--<label class="form-label-outlined" for="retainership">Retainership</label>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-12">
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control form-control-outlined @error('surname') error @enderror" wire:model="surname">
                                        <label class="form-label-outlined" for="surname">Surname</label>
                                        @error('surname')
                                        <span id="fv-full-name-error" class="invalid">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control form-control-outlined @error('otherName') error @enderror" wire:model="otherName" id="otherName">
                                        <label class="form-label-outlined" for="otherName">Other Names</label>
                                        @error('otherName')
                                        <span id="fv-full-name-error" class="invalid">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-12">
                                <div class="justify-between">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-outlined" wire:model="age" id="age">
                                            <label class="form-label-outlined" for="age">Age</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <div class="form-control-select">
                                                <select class="custom-select form-control-outlined @error('gender') error @enderror" id="gender" wire:model="gender">
                                                    <option value=""></option>
                                                    <option value="female">Female</option>
                                                    <option value="male">Male</option>
                                                </select>
                                                <label class="form-label-outlined" for="gender">Gender</label>
                                                @error('gender')
                                                <span id="fv-topics-error" class="invalid">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control form-control-outlined" wire:model="phone" id="phone">
                                        <label class="form-label-outlined" for="phone">Phone</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="nk-order-ovwg-data sell">
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-outlined" wire:model="hospitalNo" id="hospitalNo">
                            <label class="form-label-outlined" for="hospitalNo">Hospital No.</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-outlined" wire:model="pharmacyNo" id="pharmacyNo">
                            <label class="form-label-outlined" for="hospitalNo">Pharmacy No.</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-outlined" wire:model="clinic" id="clinic">
                            <label class="form-label-outlined" for="clinic">Ward/Clinic</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-outlined @error('consultant') error @enderror" wire:model="consultant" id="consultant">
                            <label class="form-label-outlined" for="consultant">Consultant</label>
                            @error('consultant')
                            <span id="fv-full-name-error" class="invalid">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!--Drug Selection -->
            <div class="col-12">
            <div class="form-group">
                <label class="form-label" for="default-06">SELECT A DRUG</label>
                {{--<div class="form-control-wrap">
                    <input list="browsers" id="browser" wire:model.lazy="selectedDrug" type="text" class="form-control" autocomplete="off">
                    <datalist id="browsers">
                        @forelse($all_drugs as $drug)
                            <option value="{{$drug->product_name}}"></option>
                        @empty
                        <option value="">No drugs found!</option>
                        @endforelse
                    </datalist>
                </div> --}}
                <div class="form-control-wrap">
                    <div class="form-control-select">
                        <select class="form-control drugselection" id="drugSelect" data-search="on" autocomplete="off">
                            <option value="">select a drug</option>
                            @forelse($all_drugs as $drug)
                                <option value="{{$drug->code_no}}">{{$drug->product_name}}</option>
                            @empty
                                <p>There are no drugs to display</p>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-12">
                @if ($message)
                    <div class="alert alert-icon alert-warning" role="alert">
                        <em class="icon ni ni-check-circle"></em>
                        <strong>This drug has been prescribed already!</strong>
                    </div>
                @elseif ($drugMessage)
                    <div class="alert alert-icon alert-warning" role="alert">
                        <em class="icon ni ni-check-circle"></em>
                        <strong>Oops, Sorry this drug is not in the Tariff!</strong>
                    </div>
                @endif
                @error('inputs')
                    <div class="alert alert-icon alert-danger" role="alert">
                        <em class="icon ni ni-check-circle"></em>
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <!-- Dispense Section-->
                <div class="card card-bordered">
                    <table class="table table-bordered table-hover text-center table-sm" id="myTable">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Drug/Item Prescribed</th>
                            <th scope="col">Dose/Regimen</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Cost Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Total</th>
                            <th scope="col">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($inputs as $key => $item)
                            <tr>
                                <input wire:model="inputs.{{$key}}.code_no" type="hidden">
                                <td>
                                    <input wire:model="inputs.{{$key}}.name" type="text" class="form-control">
                                </td>

                                <td>
                                    <input wire:model="inputs.{{$key}}.dosage" type="text" class="form-control">
                                </td>
                                <td>
                                    <input wire:model="inputs.{{$key}}.unitPrice" type="text" class="form-control">
                                </td>
                                <td>
                                    <input wire:model="inputs.{{$key}}.qty" type="text" class="form-control"
                                           wire:keyup="$emit('qty', {{ $key }})">
                                </td>
                                <td>
                                    <input wire:model="inputs.{{$key}}.price" type="text" class="form-control"
                                           wire:keyup="$emit('price', {{ $key }})">
                                </td>
                                <td>
                                    <input wire:model="inputs.{{$key}}.stock" type="text" class="form-control">
                                </td>
                                <td>
                                     <input wire:model="inputs.{{$key}}.total" type="text" class="form-control"

                                     >
                                    {{--<input value ="{{ (float)$item['qty'] * (float)$item['price']}}"
                                           name="total_price[]" id="total_price" class="form-control"
                                           type="text">--}}
                                </td>
                                <td>
                                    <button wire:click.prevent="removeDrug('{{$key}}')" class="btn btn-round btn-icon btn-sm btn-danger"><em class="icon ni ni-cross"></em></button>
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="6" class="table-active"><b>TOTAL COST</b></td>
                            <td>
                                <b>
                                    {{ $grand_total }}
                                </b>
                            </td>
                            <td>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div><!-- .card -->
                <!-- Dispense Buttons @s-->
                <div class="float-right my-4">
                    <button type="submit" wire:loading.attr="disabled" class="btn btn-white btn-dim btn-outline-primary">
                        <em class="icon ni ni-capsule-fill"></em><span>Dispense Drug(s)</span>
                    </button>
                </div>
                <!-- Dispense Buttons @e-->
                <!-- End Dispense Section-->
            </div>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        /*
        window.addEventListener('tariff-updated', event => {
            var input = event.detail.newName;
            var data = $.map(input, function (obj) {
                obj.text = obj.text || obj.product_name; // replace name with the property used for the text

                return obj;
            });

            $('.drugselection').select2({
                data: data
            });
            $('.drugselection').on('change', function (e) {
                var data = $('.drugselection').select2("val");
            @this.set('selectedDrug', data);
            });

            //console.log(data)
        });
*/

        $('.drugselection').select2();
        $('.drugselection').on('change', function (e) {
            var data = $('.drugselection').select2("val");
        @this.set('selectedDrug', data);
        });


        document.addEventListener("livewire:load", () => {
            Livewire.hook('message.processed', (message, component) => {
                $('.drugselection').select2();
                //alert('A post was added with the id of:');
            })
        });


    </script>

@endpush
