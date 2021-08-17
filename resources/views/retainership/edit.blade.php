@extends('layouts.pharmacy.main')

@section('head')
    <title>Pharmacy - Edit {{ucfirst($param->name)}} Retainership</title>
@endsection

@section('content')
    <!-- content @s -->
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                </div><!-- .nk-block-head -->
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head-content mb-4">
                            <a href="{{route('retainership.create')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">Retainership Setting</h5>
                                </div>
                                <form action="{{route('retainership.update', $param->id)}}" method="post" class="gy-3">
                                    @method('patch')
                                    @include('retainership.partials.createForm')
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
