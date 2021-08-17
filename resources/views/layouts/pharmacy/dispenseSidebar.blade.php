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
                            <a href="{{route('pharmacy.prescription')}}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-scan"></em></span>
                                <span class="nk-menu-text">Dispense Drug(s)</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-item">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-histroy"></em></span>
                                <span class="nk-menu-text">Prescription(s) History</span>
                            </a>
                        </li><!-- .nk-menu-item -->
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Incoming Request</h6>
                        </li><!-- .nk-menu-heading -->
                        <li class="nk-menu-item">
                            <div class="nk-menu-link">
                            <table class="table table-hover table-sm table-responsive">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="nk-menu-link justify-between">
                                <span class="nk-menu-text">Total</span>
                                <a class="btn btn-outline-primary btn-sm">10</a>
                            </div>
                        </li><!-- .nk-menu-item -->
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
