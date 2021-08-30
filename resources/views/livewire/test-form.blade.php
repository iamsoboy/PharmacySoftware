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
                                            <select wire:model="selectedTariff" class="custom-select form-control" id="retainership" name="retainership">
                                                @foreach($retainerships as $retainership)
                                                    <option value="{{$retainership->name_price}}">{{$retainership->name}} Tariff</option>
                                                @endforeach
                                            </select>
                                            <!--<label class="form-label" for="retainership">Retainership</label>-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-12">
                                <div class="form-group">
                                    <label class="form-label" for="surname">Surname</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control @error('surname') error @enderror" wire:model="surname">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="form-label" for="otherName">Other Names</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control @error('otherName') error @enderror" wire:model="otherName" id="otherName">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-12">
                                <div class="justify-between">
                                    <div class="form-group">
                                        <label class="form-label" for="age">Age</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" wire:model="age" id="age">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="gender">Gender</label>
                                        <div class="form-control-wrap">
                                            <div class="form-control-select">
                                                <select class="custom-select @error('gender') error @enderror" id="gender" wire:model="gender">
                                                    <option value=""></option>
                                                    <option value="female">Female</option>
                                                    <option value="male">Male</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="phone">Phone</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" wire:model="phone" id="phone">
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
                        <label class="form-label" for="hospitalNo">Hospital No.</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" wire:model="hospitalNo" id="hospitalNo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="pharmacyNo">Pharmacy No.</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control " wire:model="pharmacyNo" id="pharmacyNo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="clinic">Ward/Clinic</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control" wire:model="clinic" id="clinic">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="consultant">Consultant</label>
                        <div class="form-control-wrap">
                            <input type="text" class="form-control @error('consultant') error @enderror" wire:model="consultant" id="consultant">
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
                @if (session()->has('success_message'))
                    <div class="alert alert-icon alert-success" role="alert">
                        <em class="icon ni ni-check-circle"></em>
                        <strong>{{session()->get('success_message')}}</strong>
                    </div>
                @endif
                @if ($drugMessage)
                    <div class="alert alert-icon alert-warning" role="alert">
                        <em class="icon ni ni-check-circle"></em>
                        <strong>Oops, Sorry this drug is not in the Tariff!</strong>
                    </div>
                @endif
                    @if ($errors->any())
                        <div class="alert alert-icon alert-danger" role="alert">
                            @foreach ($errors->all() as $error)
                                <em class="icon ni ni-cross-circle"></em>
                                <strong>{{ $error }}</strong> <br>
                            @endforeach
                        </div>
                    @endif
                <!-- Dispense Section-->
                <div class="card card-bordered">

                    <table class="table table-bordered table-hover text-center table-sm" id="myTable">
                        <thead class="thead-light">
                        <tr>
                            <th style="width: 35%" scope="col">Drug/Item Prescribed</th>
                            <th style="width: 15%" scope="col">Dose/Regimen</th>
                            <th style="width: 8%" scope="col">Unit Price</th>
                            <th style="width: 10%" scope="col">Quantity</th>
                            <th style="width: 10%" scope="col">Cost Price</th>
                            <th style="width: 7%" scope="col">Stock</th>
                            <th style="width: 10%"  scope="col">Total</th>
                            <th style="width: 5%" scope="col">&nbsp;</th>
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
                                    <input wire:model.debounce.1000ms="inputs.{{$key}}.qty" type="text" class="form-control"
                                           wire:keyup.debounce.1000ms="$emit('qty', {{ $key }})">
                                </td>
                                <td>
                                    <input wire:model="inputs.{{$key}}.price" type="text" class="form-control"
                                           wire:keyup="$emit('price', {{ $key }})">
                                </td>
                                <td>
                                    <input wire:model="inputs.{{$key}}.stock" type="text" class="form-control" disabled>
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
