@extends('layouts.pharmacy.main')

@section('head')
    <title>Pharmacy - Prescription History </title>
@endsection



@section('content')
    <!-- content @s -->
    <div class="nk-content nk-content-fluid">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head">
                        @if (session()->has('success_message'))
                            <div class="alert alert-icon alert-success mt-2" role="alert">
                                <em class="icon ni ni-check-circle"></em>
                                <strong>{{session()->get('success_message')}}</strong>
                            </div>
                        @endif
                        <div class="nk-block-between g-3">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Prescription No.: <strong class="text-primary small">{{$dispense->prescription_no}}</strong></h3>
                                <div class="nk-block-des text-soft">
                                    <ul class="list-inline">
                                        <li>Created At: <span class="text-base">{{\Carbon\Carbon::parse($dispense->prescription_date)->format('F j, Y, g:i a')  }}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="nk-block-head-content">
                                <a href="{{route('pharmacy.dispense.index')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                <a href="{{route('pharmacy.dispense.index')}}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                            </div>
                        </div>
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="invoice">
                            <div class="invoice-action">
                                <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="#" target="_blank"><em class="icon ni ni-printer-fill"></em></a>
                            </div><!-- .invoice-actions -->
                            <div class="invoice-wrap">
                                <div class="invoice-brand text-center">
                                    <img src="{{asset('src/images/logo-dark.png')}}" srcset="{{asset('src/images/logo2x.png')}} 4x" alt="">
                                </div>
                                <div class="invoice-head">
                                    <div class="invoice-contact">
                                        <span class="overline-title">Prescribed To</span>
                                        <div class="invoice-contact-info">
                                            <h4 class="title">{{$dispense->surname}}, {{$dispense->other_names}}</h4>
                                            <ul class="list-plain">
                                                <li><em class="icon ni ni-home"></em><span> {{$dispense->hospital_no}}</span></li>
                                                <li><em class="icon ni ni-cross"></em><span> {{$dispense->gender}}</span></li>
                                                <li><em class="icon ni ni-call-fill"></em><span> {{$dispense->phone}}</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="invoice-desc">
                                        <h3 class="title">Details</h3>
                                        <ul class="list-plain">
                                            <li class="invoice-date"><span>Dispensed By</span>:<span>{{$dispense->dispensed_by}}</span></li>
                                        </ul>
                                    </div>
                                </div><!-- .invoice-head -->
                                <div class="invoice-bills">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Description</th>
                                                <th>Dosage</th>
                                                <th>Price</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse($dispense->prescriptions as $item)
                                            <tr>
                                                <td>1</td>
                                                <td>{{$item->drug_name}}</td>
                                                <td>{{$item->dosage_regimen}}</td>
                                                <td>&#8358; {{$item->sale_price}}</td>
                                                <td>{{$item->quantity_prescribed}}</td>
                                                <td>&#8358; {{$item->subtotal_prescribed}}</td>
                                                <td>
                                                            <a href="{{route('pharmacy.dispense.returnDrug', $item->id)}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Return Drug">
                                                                <em class="icon ni ni-tranx"></em>
                                                            </a>

                                                </td>
                                            </tr>
                                            @empty
                                                <tr>
                                                    <td>
                                                        <p>No Drug(s) Prescriptions found!</p>
                                                    </td>
                                                </tr>
                                            @endforelse

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td colspan="2"><strong>SubTotal</strong></td>
                                                <td><strong>&#8358; {{$dispense->prescriptions->sum('sale_price')}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"></td>
                                                <td colspan="2"><b>GRAND TOTAL</b></td>
                                                <td><b>&#8358; {{$dispense->prescriptions->sum('subtotal_prescribed')}}</b></td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                        <div class="nk-notes ff-italic fs-12px text-soft"> Prescription was created on a computer and is valid without the signature and seal. </div>
                                    </div>
                                </div><!-- .invoice-bills -->
                            </div><!-- .invoice-wrap -->
                        </div><!-- .invoice -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
