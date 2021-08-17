@extends('layouts.pharmacy.main')

@section('head')
    <title>Pharmacy - Soon Expiring Drug(s) List</title>
@endsection

@section('content')
    <!-- content @s -->
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">

                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Soon Expiring Drug List</h4>

                            </div>
                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="datatable-init nk-tb-list nk-tb-ulist table">
                                    <thead>
                                    <tr>
                                        <th style="width:300px" class="nk-tb-col">NAME</th>
                                        <th>CATEGORY</th>
                                        <th>EXPIRY DATE</th>
                                        <th>DOSAGE</th>
                                        <th>STOCK BALANCE</th>
                                        <th>COST PRICE</th>
                                        <th>SALE PRICE</th>
                                        <th>STATUS</th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($soonExpiring as $drug)
                                        <tr>
                                            <td class="nk-tb-col">
                                                <div class="user-info">
                                                    <span class="tb-lead">{{ $drug->product_name }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span>{{ $drug->generic_name }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $drug->category }}</td>
                                            <td class="text-warning">{{ \Carbon\Carbon::parse($drug->expiry_date)->format('F j, Y') }}</td>
                                            <td>{{ $drug->dosage }}</td>
                                            <td>{{ $drug->store_balance }}</td>
                                            <td class="nk-tb-col tb-col-mb" data-order="{{ $drug->cost_price }}">
                                                <span class="tb-amount">{{ $drug->cost_price }} <span class="currency">NGN</span></span>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb" data-order="{{ $drug->retail_price }}">
                                                <span class="tb-amount">{{ $drug->retail_price }} <span class="currency">NGN</span></span>
                                            </td>
                                            <td>
                                                @if($drug->status == 1)
                                                    <span class="tb-status text-success">Active</span>
                                                @else
                                                    <span class="tb-status text-danger">Suspend</span>
                                                @endif
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <li><a href="{{route('pharmacy.drugs.edit', $drug->id)}}"><em class="icon ni ni-focus"></em><span>Edit Drug</span></a></li>
                                                                    @if($drug->status == 1)
                                                                        <li><a href="{{route('pharmacy.drugs.deactivate', $drug->id)}}"><em class="icon ni ni-na"></em><span>Suspend</span></a></li>
                                                                    @else
                                                                        <li><a href="{{route('pharmacy.drugs.activate', $drug->id)}}"><em class="icon ni ni-check-c"></em><span>Activate</span></a></li>
                                                                    @endif


                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            Oops, No drug(s) found!
                                        </tr>
                                    @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div><!-- .card-preview -->
                    </div> <!-- nk-block -->



                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
