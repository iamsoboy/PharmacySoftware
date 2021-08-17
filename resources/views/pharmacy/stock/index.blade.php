@extends('layouts.pharmacy.main')

@section('head')
    <title>Pharmacy - Stock History </title>
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
                                <h4 class="nk-block-title">Stock History</h4>
                            </div>
                            @if (session()->has('success_message'))
                                <div class="alert alert-icon alert-success mt-2" role="alert">
                                    <em class="icon ni ni-check-circle"></em>
                                    <strong>{{session()->get('success_message')}}</strong>
                                </div>
                            @endif
                            @if ($errors->any())
                                <div class="alert alert-icon alert-danger" role="alert">
                                    @foreach ($errors->all() as $error)
                                        <em class="icon ni ni-cross-circle"></em>
                                        <strong>{{ $error }}</strong>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="datatable-init nk-tb-list nk-tb-ulist">
                                    <thead>
                                    <tr>
                                        <th class="nk-tb-col">REF./NAME</th>
                                        <th>COST PRICE</th>
                                        <th>QUANTITY</th>
                                        <th>SALE PRICE</th>
                                        <th>EXPIRY DATE</th>
                                        <th>SUBMITTED BY</th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($stocks as $item)
                                        <tr>
                                            <td class="nk-tb-col">
                                                <div class="user-info">
                                                    <span class="tb-lead">{{ $item->name }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span>{{ $item->stock_reference }}</span>
                                                </div>
                                            </td>
                                            <td class="nk-tb-col tb-col-mb" data-order="{{ $item->cost_price }}">
                                                <span class="tb-amount">{{ $item->cost_price }} <span class="currency">NGN</span></span>
                                            </td>
                                            <td>{{ $item->quantity }}</td>
                                            <td class="nk-tb-col tb-col-mb" data-order="{{ $item->sale_price }}">
                                                <span class="tb-amount">{{ $item->sale_price }} <span class="currency">NGN</span></span>
                                            </td>

                                            <td>{{ \Carbon\Carbon::parse($item->expiry_date)->format('F j, Y') }}</td>
                                            <td>{{ $item->submitted_by }}</td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li class="nk-tb-action">
                                                        <form action="{{route('pharmacy.stock.destroy', $item->id)}}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button href="#" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Delete">
                                                                <em class="icon ni ni-trash"></em>
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>Oops, No drug(s) stock found!</td>
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
