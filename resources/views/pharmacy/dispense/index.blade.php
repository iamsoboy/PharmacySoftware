@extends('layouts.pharmacy.main')

@section('head')
    <title>Pharmacy - Prescription History </title>
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
                                <h4 class="nk-block-title">Prescription History</h4>
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
                                        <th style="width:150px" class="nk-tb-col">PHM NO.</th>
                                        <th>NAME</th>
                                        <th>PHONE</th>
                                        <th>CLINIC</th>
                                        <th>CONSULTANT</th>
                                        <th>TOTAL</th>
                                        <th>DATE/TIME</th>
                                        <th>STATUS</th>
                                        <th class="nk-tb-col nk-tb-col-tools text-right">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($dispenses as $item)
                                        <tr>
                                            <td class="nk-tb-col">
                                                <div class="user-info">
                                                    <span class="tb-lead">{{ $item->prescription_no }} <span class="dot dot-success d-md-none ml-1"></span></span>
                                                    <span>{{ $item->hospital_no }}</span>
                                                </div>
                                            </td>
                                            <td>{{ $item->surname }}, {{ $item->other_names }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>{{ $item->ward_clinic }}</td>
                                            <td>{{ $item->consultant }}</td>

                                            <td class="nk-tb-col tb-col-mb" data-order="{{ $item->prescriptions->count() }}">
                                                <span class="tb-amount">{{ $item->prescriptions->count() }}</span>
                                            </td>

                                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y g:i a') }}</td>
                                            <td>
                                                @if($item->dispensed == 1)
                                                    <span class="tb-status text-success">Dispensed</span>
                                                @else
                                                    <span class="tb-status text-danger">Suspend</span>
                                                @endif
                                            </td>
                                            <td class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1">
                                                    <li class="nk-tb-action">
                                                        <a href="{{route('pharmacy.dispense.prescriptions', $item->id)}}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="View Details">
                                                            <em class="icon ni ni-eye"></em>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-right">
                                                                <ul class="link-list-opt no-bdr">
                                                                    <form id="delete-dispense" method="POST" action="{{route('pharmacy.dispense.destroy', $item->id)}}">
                                                                        @method('delete')
                                                                        @csrf
                                                                    </form>
                                                                    <li><a onclick="event.preventDefault(); document.getElementById('delete-dispense').submit();">
                                                                            <em class="icon ni ni-trash"></em><span>Delete</span></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>Oops, No drug(s) prescription found!</td>
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
