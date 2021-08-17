<div class="nk-block">
    <form action="{{route('pharmacy.dispense.store')}}" method="post">
        @csrf
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
                                        <input type="text" class="form-control form-control-outlined" name="surname" id="surname" value="">
                                        <label class="form-label-outlined" for="surname">Surname</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control form-control-outlined" name="otherName" id="otherName" value="">
                                        <label class="form-label-outlined" for="otherName">Other Names</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-12">
                                <div class="justify-between">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-outlined" name="age" id="age" value="">
                                            <label class="form-label-outlined" for="age">Age</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <div class="form-control-select">
                                                <select class="custom-select form-control-outlined" id="gender" name="gender">
                                                    <option value=""></option>
                                                    <option value="female">Female</option>
                                                    <option value="male">Male</option>
                                                </select>
                                                <label class="form-label-outlined" for="gender">Gender</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control form-control-outlined" name="phone" id="phone" value="">
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
                            <input type="text" class="form-control form-control-outlined" name="hospitalNo" id="hospitalNo" value="">
                            <label class="form-label-outlined" for="hospitalNo">Hospital No.</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-outlined" name="pharmacyNo" id="pharmacyNo" value="">
                            <label class="form-label-outlined" for="hospitalNo">Pharmacy No.</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-outlined" name="clinic" id="clinic" value="">
                            <label class="form-label-outlined" for="clinic">Ward/Clinic</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-control-wrap">
                            <input type="text" class="form-control form-control-outlined" name="consultant" id="consultant" value="">
                            <label class="form-label-outlined" for="consultant">Consultant</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label class="form-label" for="default-06">Select a drug</label>
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
                    <div class="form-control-wrap" wire:ignore>
                        <div class="form-control-select">
                            <select class="form-control" id="drugSelect" data-search="on" autocomplete="off">
                                <option value="">select a drug</option>
                                @forelse($all_drugs as $drug)
                                <option value="{{$drug->product_name}}">{{$drug->product_name}}</option>
                                @empty
                                    <p>There are no drugs to display</p>
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dispense @s -->
            <div class="col-12">
                @if ($message)
                    <div class="alert alert-icon alert-warning" role="alert">
                        <em class="icon ni ni-check-circle"></em>
                        <strong>This drug has been prescribed already!</strong>
                    </div>
                @elseif ($drugMessage)
                    <div class="alert alert-icon alert-warning" role="alert">
                        <em class="icon ni ni-check-circle"></em>
                        <strong>No drug found with the name {{$selectedDrug}}!</strong>
                    </div>
                @endif
                <!-- Dispense Section-->
                <div class="card card-bordered">
                    <table class="table table-bordered table-hover text-center table-sm">
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

                            @foreach(Cart::content() as $item)
                                <tr>
                                    <td>
                                        <b>{{$item->name}}</b>
                                    </td>

                                    <td>
                                        <b>{{$item->options['dosage']}}</b>
                                    </td>
                                    <td>
                                        <b>{{$item->options['unitPrice']}}</b>
                                    </td>
                                    <td>
                                        <button wire:click.prevent="$emit('decrement', '{{$item->id}}')" class="btn btn-icon custom-btn-sm btn-lighter"><em class="icon ni ni-minus-c"></em></button>
                                        <b>{{$item->qty}}</b>
                                        <button wire:click.prevent="$emit('increment', '{{$item->id}}')" class="btn btn-icon custom-btn-sm btn-lighter"><em class="icon ni ni-plus-c"></em></button>
                                    </td>
                                    <td>
                                        <b>{{$item->price}}</b>
                                    </td>
                                    <td>
                                        <b>{{$item->options['stock']}}</b>
                                    </td>
                                    <td>
                                        <b>{{$item->options['total']}}</b>
                                    </td>
                                    <td>
                                        <button wire:click.prevent="removeDrug('{{$item->rowId}}')" class="btn btn-round btn-icon btn-sm btn-danger"><em class="icon ni ni-cross"></em></button>
                                    </td>
                                </tr>
                            @endforeach

                        <tr>
                            <td colspan="6" class="table-active"><b>TOTAL COST</b></td>
                            <td>
                                <b>
                                    {{Cart::subtotal()}}
                                </b>
                            </td>
                            <td>

                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div><!-- .card -->
                <!-- Dispense Buttons @s-->
                <div class="justify-between mt-2">
                    <a href="#" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-download-cloud"></em><span>Export</span></a>
                    <button type="submit" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-capsule-fill"></em><span>Dispense Drug/Item</span></button>
                </div>
                <!-- Dispense Buttons @e-->
                <!-- End Dispense Section-->
            </div><!-- .col -->
            <!-- Dispense @e -->
        </div><!-- .row -->
    </form>
</div><!-- .nk-block -->

@push('scripts')

    <script>
        $(document).ready(function () {
            $('#drugSelect').select2();
            $('#drugSelect').on('change', function (e) {
                var data = $('#drugSelect').select2("val");
                @this.set('selectedDrug', data);
            });
        });

    </script>

@endpush
