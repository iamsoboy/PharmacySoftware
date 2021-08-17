@extends('layouts.pharmacy.main')

@section('head')
    <title>Pharmacy - Edit {{ucfirst($param->name)}} Drug {{ucfirst($title)}}</title>
@endsection

@section('content')
    <!-- content @s -->
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">Drug {{ucfirst($title)}} Setting</h5>
                                </div>
                                <form action="{{route('pharmacy.drugCategory.update', $param->id)}}" method="post" class="gy-3">
                                    @method('patch')
                                    @include('pharmacy.partials.createForm')
                                </form>
                            </div>
                        </div><!-- card -->
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
