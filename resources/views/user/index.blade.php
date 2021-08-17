@extends('layouts.pharmacy.main')

@section('head')
    <title>Users Management</title>
@endsection

@section('content')
    <!-- content @s -->
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Users Lists</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have total {{$users->count()}} user(s).</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li class="nk-block-tools-opt">
                                            <div class="drodown">
                                                <a href="{{route('register')}}" class="dropdown-toggle btn btn-icon btn-primary"><em class="icon ni ni-plus"></em> <p class="pr-2">Register new user</p></a>

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner position-relative card-tools-toggle">
                                <div class="card-title-group">
                                    <div class="card-tools">
                                    </div><!-- .card-tools -->
                                    <div class="card-tools mr-n1">
                                        <ul class="btn-toolbar gx-1">
                                            <li>
                                                <a href="#" class="btn btn-icon search-toggle toggle-search" data-target="search"><em class="icon ni ni-search"></em></a>
                                            </li><!-- li -->
                                            <li class="btn-toolbar-sep"></li><!-- li -->
                                            <li>
                                                <div class="toggle-wrap">
                                                    <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                                    <div class="toggle-content" data-content="cardTools">
                                                        <ul class="btn-toolbar gx-1">
                                                            <li class="toggle-close">
                                                                <a href="#" class="btn btn-icon btn-trigger toggle" data-target="cardTools"><em class="icon ni ni-arrow-left"></em></a>
                                                        </ul><!-- .btn-toolbar -->
                                                    </div><!-- .toggle-content -->
                                                </div><!-- .toggle-wrap -->
                                            </li><!-- li -->
                                        </ul><!-- .btn-toolbar -->
                                    </div><!-- .card-tools -->
                                </div><!-- .card-title-group -->
                                <div class="card-search search-wrap" data-search="search">
                                    <div class="card-body">
                                        <div class="search-content">
                                            <a href="#" class="search-back btn btn-icon toggle-search" data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                            <input type="text" class="form-control border-transparent form-focus-none" placeholder="Search by user or email">
                                            <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                                        </div>
                                    </div>
                                </div><!-- .card-search -->
                            </div><!-- .card-inner -->
                            <div class="card-inner p-0">
                                <div class="nk-tb-list nk-tb-ulist is-compact">
                                    <div class="nk-tb-item nk-tb-head">
                                        <div class="nk-tb-col"><span class="sub-text">User</span></div>
                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Username</span></div>
                                        <div class="nk-tb-col tb-col-sm"><span class="sub-text">Email</span></div>
                                        <div class="nk-tb-col tb-col-md"><span class="sub-text">Phone</span></div>
                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Department</span></div>
                                        <div class="nk-tb-col tb-col-lg"><span class="sub-text">Role</span></div>
                                        <div class="nk-tb-col"><span class="sub-text">Status</span></div>
                                        <div class="nk-tb-col nk-tb-col-tools text-right">

                                        </div>
                                    </div><!-- .nk-tb-item -->
                                    @forelse($users as $user)
                                    <div class="nk-tb-item">
                                        <div class="nk-tb-col">
                                            <div class="user-card">
                                                <div class="user-avatar xs bg-primary">
                                                    <span>{{ strtoupper(substr($user->name, 0, 2)) }}</span>
                                                </div>
                                                <div class="user-name">
                                                    <span class="tb-lead">{{ $user->name }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ $user->username }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-sm">
                                            <span>{{ $user->email }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-md">
                                            <span>{{ $user->phone }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg">
                                            <span>{{ $user->department }}</span>
                                        </div>
                                        <div class="nk-tb-col tb-col-lg">
                                            <span>{{ $user->rank }}</span>
                                        </div>
                                        <div class="nk-tb-col">
                                            @if ($user->isActive == 1)
                                            <span class="tb-status text-success">Active</span>
                                            @else
                                            <span class="tb-status text-danger">Inactive</span>
                                            @endif
                                        </div>
                                        <div class="nk-tb-col nk-tb-col-tools">
                                            <ul class="nk-tb-actions gx-2">
                                                <li>
                                                    <div class="drodown">
                                                        <a href="#" class="btn btn-sm btn-icon btn-trigger dropdown-toggle" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="{{ route('users.show', $user->id) }}"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                                <li class="divider"></li>
                                                                <li><a href="{{ route('users.edit', $user->id) }}"><em class="icon ni ni-shield-star"></em><span>Edit User</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div><!-- .nk-tb-item -->
                                    @empty
                                    <p>No User(s) found!</p>
                                    @endforelse
                                </div><!-- .nk-tb-list -->
                            </div><!-- .card-inner -->
                            <div class="card-inner">
                                <ul class="pagination justify-content-center justify-content-md-start">
                                    <li class="page-item"><a class="page-link">{{$users->links()}}</a></li>
                                    <!--<li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item"><a class="page-link" href="#">7</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>-->
                                </ul><!-- .pagination -->
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
