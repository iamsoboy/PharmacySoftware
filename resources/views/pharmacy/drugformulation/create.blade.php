@extends('layouts.pharmacy.main')

@section('head')
    <title>Pharmacy - Drug {{$title}}</title>
@endsection

@section('content')
    <!-- content @s -->
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block nk-block-lg">
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
                                    <strong>{{ $error }}</strong>
                                @endforeach
                            </div>
                        @endif
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-title">Drug {{ucfirst($title)}} Setting</h5>
                                </div>
                                <form action="{{route('pharmacy.drugFormulation.store')}}" method="post" class="gy-3">
                                    @include('pharmacy.partials.createForm')
                                </form>
                            </div>
                        </div><!-- card -->
                    </div><!-- .nk-block -->
                    <div class="nk-block nk-block-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="title nk-block-title">List of all drug {{$title}}</h4>
                                <div class="nk-block-des">
                                    <p>You can make style out your setting related form as per below example.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="table table-ulogs">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="tb-col-os"><span class="overline-title">Name</span></th>
                                        <th class="tb-col-ip"><span class="overline-title">Description</span></th>
                                        <th class="tb-col-action"><span class="overline-title">&nbsp;</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($formulations as $formulation)
                                        <tr>
                                            <td class="tb-col-os">{{$formulation->name}}</td>
                                            <td class="tb-col-ip"><span class="sub-text">{{$formulation->description}}</span></td>
                                            <td class="tb-col-action">
                                                <div class="justify-center">
                                                    <div class="tb-odr-btns d-none d-md-inline mr-2">
                                                        <a href="{{route('pharmacy.drugFormulation.edit', $formulation->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                                    </div>
                                                    <div class="tb-odr-btns d-none d-md-inline">
                                                        <form action="{{route('pharmacy.drugFormulation.destroy', $formulation->id)}}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="tb-col-os">No drug {{$title}} found!</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- card -->
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
