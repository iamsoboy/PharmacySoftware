@extends('layouts.pharmacy.main')

@section('head')
    <title>Drugs & HMO Management</title>
@endsection

@section('customCss')
    <style type="text/css">
        table td {
            position: relative;
        }

        table td input{
            position: absolute;
            display: block;
            text-align: center;
            top:0;
            left:0;
            margin: 0;
            height: 100% !important;
            width: 100% !important;
            border: none;
            padding: 10px;
            box-sizing: border-box;
        }
    </style>
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
                                <h4 class="nk-block-title">New Drug Stock Entry</h4>
                            </div>
                        </div>
                        @if (session()->has('success_message'))
                            <div class="alert alert-icon alert-success" role="alert">
                                <em class="icon ni ni-check-circle"></em>
                                <strong>{{session()->get('success_message')}}</strong>
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
                        <div class="card card-preview">
                            <div class="card-inner">
                                <form action="{{route('pharmacy.stock.store')}}" method="post">
                                    @csrf
                                    <table class="table table-bordered table-hover text-center table-sm table-sm">
                                        <thead class="thead-light">
                                        <tr>
                                            <th style="width:300px" scope="col">Drug Name</th>
                                            <th scope="col">Cost Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Sale Price</th>
                                            <th scope="col">Expiry Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($inputs as $key => $value)
                                            <tr>
                                            <td>
                                                <select class="form-select form-control" data-search="on" name="name[]">
                                                    <option value="">-- Select a Drug --</option>
                                                    @foreach($all_drugs as $drug)
                                                        <option value="{{$drug->code_no}}">{{$drug->product_name}}</option>
                                                    @endforeach

                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="cost_price[]" autocomplete="off">
                                            </td>
                                            <td>
                                                <input type="number" name="quantity[]" autocomplete="off">
                                            </td>
                                            <td>
                                                <input type="text" name="sale_price[]" autocomplete="off">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control date-picker" name="expiry_date[]" autocomplete="off">
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="col-12 align-center mt-4">
                                        <div class="form-group">
                                            <button data-loading-text="Saving Invoice..." type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- .card-preview -->
                    </div> <!-- nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
