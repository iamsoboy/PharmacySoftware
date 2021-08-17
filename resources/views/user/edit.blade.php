@extends('layouts.pharmacy.main')

@section('head')
    <title>Users Management - Create New User</title>
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
                                    <h5 class="card-title">Edit User Information</h5>
                                </div>
                                <form action="{{ route('users.update', $user->id) }}" method="post">
                                    @method('patch')
                                    @include('user.createEditForm')
                                </form>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
