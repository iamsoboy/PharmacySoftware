<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="#" class="logo-link nk-sidebar-logo">
                <img class="logo-light logo-img" src="{{asset('src/images/logo.png')}}" srcset="{{asset('src/images/logo2x.png')}} 2x" alt="logo">
                <img class="logo-dark logo-img" src="{{asset('src/images/logo-dark.png')}}" srcset="{{asset('src/images/logo-dark2x.png')}} 2x" alt="logo-dark">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
        </div>
    </div><!-- .nk-sidebar-element -->
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-body" data-simplebar>
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-menu">
                    <ul class="nk-menu">
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Pharmacy Home</h6>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="{{route('pharmacy.index')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-home"></em></span>
                                <span class="nk-menu-text">Home</span><span class="nk-menu-badge badge-danger">HOT</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Dispensary</h6>
                        </li><!-- .nk-menu-heading -->
                        <li class="nk-menu-item">
                            <a href="{{route('pharmacy.dispense.create')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-scan"></em></span>
                                <span class="nk-menu-text">Dispense Drug(s)</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="{{route('pharmacy.dispense.index')}}" class="nk-menu-link nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-histroy"></em></span>
                                <span class="nk-menu-text">Prescription(s) History</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Drug(s) Inventory</h6>
                        </li><!-- .nk-menu-heading -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-capsule"></em></span>
                                <span class="nk-menu-text">Drug(s)</span>
                            </a>
                            <ul class="nk-menu-sub">
                                @can('user-create')
                                <li class="nk-menu-item">
                                    <a href="{{route('pharmacy.drugs.create')}}" class="nk-menu-link"><span class="nk-menu-text">Add New Drug(s)</span></a>
                                </li>
                                @endcan
                                <li class="nk-menu-item">
                                    <a href="{{route('pharmacy.drugs.index')}}" class="nk-menu-link"><span class="nk-menu-text">Drug List(s)</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-todo"></em></span>
                                <span class="nk-menu-text">Drug Details</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="{{route('pharmacy.drugCategory.create')}}" class="nk-menu-link"><span class="nk-menu-text">Drug Category</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('pharmacy.drugFormulation.create')}}" class="nk-menu-link"><span class="nk-menu-text">Drug Formulation</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('pharmacy.drugAllergy.create')}}" class="nk-menu-link"><span class="nk-menu-text">Drug Allergy Group</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('pharmacy.drugDetail.create')}}" class="nk-menu-link"><span class="nk-menu-text">Drug Section</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('pharmacy.drugClass.create')}}" class="nk-menu-link"><span class="nk-menu-text">Drug Class</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="{{ route('pharmacy.soonExpiring') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-scan"></em></span>
                                <span class="nk-menu-text">Soon Expiring Drug(s)</span><span class="nk-menu-badge badge-danger">{{ $soonExpiring->count() }}</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="{{ route('pharmacy.outOfStock') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-scan"></em></span>
                                <span class="nk-menu-text">Out of Stock</span><span class="nk-menu-badge badge-danger">{{ $outOfStock->count() }}</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="{{ route('pharmacy.expired') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-scan"></em></span>
                                <span class="nk-menu-text">Expired Drug(s)</span><span class="nk-menu-badge badge-danger">{{ $expired->count() }}</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">HMO| Drug Stocks</h6>
                        </li><!-- .nk-menu-heading -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>
                                <span class="nk-menu-text">Drug Stock Entry</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="{{route('pharmacy.stock.create')}}" class="nk-menu-link"><span class="nk-menu-text">Add New Stock(s)</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('pharmacy.stock.index')}}" class="nk-menu-link"><span class="nk-menu-text">Stock History</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span>
                                <span class="nk-menu-text">Retainership/HMO</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="{{route('retainership.create')}}" class="nk-menu-link"><span class="nk-menu-text">Create New HMO</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('drugRetainership')}}" class="nk-menu-link"><span class="nk-menu-text">HMO Drug Prices</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        @can('user-create')
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Administrator</h6>
                        </li><!-- .nk-menu-heading -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                <span class="nk-menu-text">User Manage</span>
                            </a>
                            <ul class="nk-menu-sub">
                                <li class="nk-menu-item">
                                    <a href="{{route('users.index')}}" class="nk-menu-link"><span class="nk-menu-text">All User(s)</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('users.create')}}" class="nk-menu-link"><span class="nk-menu-text">Create New User</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('roles.create')}}" class="nk-menu-link"><span class="nk-menu-text">Create New Role</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{{route('permissions.create')}}" class="nk-menu-link"><span class="nk-menu-text">Create New Permission</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li><!-- .nk-menu-item -->
                        @endcan
                    </ul><!-- .nk-menu -->
                </div><!-- .nk-sidebar-menu -->
                <div class="nk-sidebar-footer">
                    <ul class="nk-menu nk-menu-footer">
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-help-alt"></em></span>
                                <span class="nk-menu-text">Support</span>
                            </a>
                        </li>
                    </ul><!-- .nk-footer-menu -->
                </div><!-- .nk-sidebar-footer -->
            </div><!-- .nk-sidebar-content -->
        </div><!-- .nk-sidebar-body -->
    </div><!-- .nk-sidebar-element -->
</div>
<!-- sidebar @e -->
