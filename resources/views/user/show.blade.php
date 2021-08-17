@extends('layouts.pharmacy.main')

@section('head')
    <title>Users Management - View User Details</title>
@endsection

@section('content')
    <!-- content @s -->
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
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
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Personal Information</h4>
                                            <div class="nk-block-des">
                                                <p>Basic info, like your name and username, etc.</p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="nk-data data-list">
                                        <div class="data-head">
                                            <h6 class="overline-title">Basics</h6>
                                        </div>
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Full Name</span>
                                                <span class="data-value">{{ $user->name }}</span>
                                            </div>

                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">UserName</span>
                                                <span class="data-value">{{ $user->username }}</span>
                                            </div>
                                        </div><!-- data-item -->
                                        <div class="data-item">
                                            <div class="data-col">
                                                <span class="data-label">Email</span>
                                                <span class="data-value">{{ $user->email }}</span>
                                            </div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Phone Number</span>
                                                <span class="data-value text-soft">{{ $user->phone }}</span>
                                            </div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit">
                                            <div class="data-col">
                                                <span class="data-label">Department</span>
                                                <span class="data-value">{{ $user->department }}</span>
                                            </div>
                                        </div><!-- data-item -->
                                        <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                                            <div class="data-col">
                                                <span class="data-label">Rank</span>
                                                <span class="data-value">{{ $user->rank }}</span>
                                            </div>
                                        </div><!-- data-item -->
                                    </div><!-- data-list -->
                                </div><!-- .nk-block -->
                            </div>
                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                                <div class="card-inner-group" data-simplebar>
                                    <div class="card-inner">
                                        <div class="user-card">
                                            <div class="user-avatar bg-primary">
                                                <span>{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                                            </div>
                                            <div class="user-info">
                                                <span class="lead-text">{{ $user->name }}</span>
                                                <span class="sub-text">{{ $user->username }}</span>
                                            </div>
                                        </div><!-- .user-card -->
                                    </div><!-- .card-inner -->
                                    <div class="card-inner p-0">
                                        <ul class="link-list-menu">
                                            <li><a class="active" href="#"><em class="icon ni ni-user-fill-c"></em><span>Personal Information</span></a></li>
                                            <li><a href="{{route('users.edit', $user->id)}}"><em class="icon ni ni-lock-alt-fill"></em><span>Update User Profile</span></a></li>
                                            <div class="data-item" data-toggle="modal" data-target="#profile-edit" data-tab-target="#address">
                                                <div class="data-col">
                                                    <em class="icon ni ni-security"></em><span>Change Password</span>
                                                </div>
                                                <div class="data-col data-col-end"><span class="data-more"><em class="icon ni ni-forward-ios"></em></span></div>
                                            </div><!-- data-item -->

                                        </ul>
                                    </div><!-- .card-inner -->
                                </div><!-- .card-inner-group -->
                            </div><!-- card-aside -->
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection

@section('modal')
    <!-- @@ Profile Edit Modal @e -->
    <div class="modal fade" tabindex="-1" role="dialog" id="profile-edit">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal"><em class="icon ni ni-cross-sm"></em></a>
                <div class="modal-body modal-body-lg">
                    <h5 class="title">Update Password</h5>
                    <ul class="nk-nav nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#password">Personal</a>
                        </li>
                    </ul><!-- .nav-tabs -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="password">
                            <form method="POST" action="{{ route('updatePassword', $user->id) }}">
                                @csrf
                                <div class="row gy-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="full-name">Password</label>
                                        <input type="password" class="form-control form-control-lg" id="password" name="password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="display-name">Confirm Password</label>
                                        <input type="password" class="form-control form-control-lg" name="password_confirmation" id="password_confirmation">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <ul class="align-center flex-wrap flex-sm-nowrap gx-4 gy-2">
                                        <li>
                                            <button type="submit" class="btn btn-lg btn-primary">Update Password</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            </form>
                        </div><!-- .tab-pane -->
                    </div><!-- .tab-content -->
                </div><!-- .modal-body -->
            </div><!-- .modal-content -->
        </div><!-- .modal-dialog -->
    </div><!-- .modal -->
@endsection
