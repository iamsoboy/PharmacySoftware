@extends('layouts.hmopricingbody')

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
            border: 1px;
            box-sizing: border-box;
        }
    </style>
@endsection

@section('head')
    <title>Drugs & HMO Management</title>
@endsection

@section('content')
   <!-- content @s -->
    <div class="nk-content ">
       <div class="container-fluid">
           <div class="nk-content-inner">
               <div class="nk-content-body">
                   <a href="{{route('pharmacy.index')}}" class="btn btn-white btn-dim btn-outline-primary mb-4"><em class="icon ni ni-arrow-from-left"></em><span>Go back</span></a>
                   @livewire('drug-retainership')
               </div>
           </div>
       </div>
   </div>
    <!-- content @e -->
@endsection
