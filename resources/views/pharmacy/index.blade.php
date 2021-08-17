@extends('layouts.pharmacy.main')

@section('head')
    <title>Pharmacy - Dashboard</title>
@endsection

@section('content')
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Pharmacy Dashboard</h3>
                            <div class="nk-block-des text-soft">
                                <p>Welcome to HBMC Pharmacy.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-download-cloud"></em><span>Export</span></a></li>
                                        <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                        <li class="nk-block-tools-opt">
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-user-add-fill"></em><span>Add User</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-coin-alt-fill"></em><span>Add Order</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row g-gs">
                        <div class="col-lg-8">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-title-group align-start mb-3">
                                        <div class="card-title">
                                            <h6 class="title">Sales Overview</h6>
                                            <p>In last 7 days buy and sells overview. <a href="#" class="link link-sm">Detailed Stats</a></p>
                                        </div>
                                    </div><!-- .card-title-group -->
                                    <div class="nk-order-ovwg">
                                        <div class="row g-4 align-end">
                                            <div class="col-xxl-8">
                                                <div class="nk-order-ovwg-ck">
                                                    <canvas class="order-overview-chart" id="orderOverview"></canvas>
                                                </div>
                                            </div><!-- .col -->
                                            <div class="col-xxl-4">
                                                <div class="row g-4">
                                                    <div class="col-sm-6 col-xxl-12">
                                                        <div class="nk-order-ovwg-data buy">
                                                            <div class="amount">{{ $amountOfBuy }} <small class="currenct currency-ngn">NGN</small></div>
                                                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> Buy Orders</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-xxl-12">
                                                        <div class="nk-order-ovwg-data sell">
                                                            <div class="amount">{{ $amountOfSell }} <small class="currenct currency-usd">NGN</small></div>
                                                            <div class="title"><em class="icon ni ni-arrow-up-left"></em> Sell Orders</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- .col -->
                                        </div>
                                    </div><!-- .nk-order-ovwg -->
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-lg-4">
                            <div class="card card-bordered h-100">
                                <div class="card-inner-group">
                                    <div class="card-inner card-inner-md">
                                        <div class="card-title-group">
                                            <div class="card-title">
                                                <h6 class="title">Action Center</h6>
                                            </div>
                                        </div>
                                    </div><!-- .card-inner -->
                                    <div class="card-inner">
                                        <div class="nk-wg-action">
                                            <div class="nk-wg-action-content">
                                                <em class="icon ni ni-cc-alt-fill"></em>
                                                <div class="title">Drug Stock</div>
                                                <p>We still have <strong>{{ $outOfStock->count() }}</strong> drugs, that needs review.</p>
                                            </div>
                                            <a href="{{route('pharmacy.stock.create')}}" class="btn btn-icon btn-trigger mr-n2"><em class="icon ni ni-forward-ios"></em></a>
                                        </div>
                                    </div><!-- .card-inner -->
                                    <div class="card-inner">
                                        <div class="nk-wg-action">
                                            <div class="nk-wg-action-content">
                                                <em class="icon ni ni-help-fill"></em>
                                                <div class="title">Support Messages</div>
                                                <p>There is/are <strong>{{ $expired->count() }}</strong> active drug(s). </p>
                                            </div>
                                            <a href="{{ route('pharmacy.expired') }}" class="btn btn-icon btn-trigger mr-n2"><em class="icon ni ni-forward-ios"></em></a>
                                        </div>
                                    </div><!-- .card-inner -->
                                    <div class="card-inner">
                                        <div class="nk-wg-action">
                                            <div class="nk-wg-action-content">
                                                <em class="icon ni ni-wallet-fill"></em>
                                                <div class="title">Pending Dispense</div>
                                                <p><strong>{{Cart::count()}} pending</strong> drug(s).</p>
                                            </div>
                                            <a href="#" class="btn btn-icon btn-trigger mr-n2"><em class="icon ni ni-forward-ios"></em></a>
                                        </div>
                                    </div><!-- .card-inner -->
                                </div><!-- .card-inner-group -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-xl-7 col-xxl-8">
                            <div class="card card-bordered card-full">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title"><span class="mr-2">Recent Dispense Activities</span> <a href="{{route('pharmacy.dispense.index')}}" class="link d-none d-sm-inline">See History</a></h6>
                                        </div>
                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner p-0 border-top">
                                    <div class="nk-tb-list nk-tb-orders">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col nk-tb-orders-type"><span>Type</span></div>
                                            <div class="nk-tb-col"><span>Desc</span></div>
                                            <div class="nk-tb-col tb-col-sm"><span>Dosage</span></div>
                                            <div class="nk-tb-col tb-col-sm"><span>Qty</span></div>
                                            <div class="nk-tb-col tb-col-xxl"><span>Ref</span></div>
                                            <div class="nk-tb-col tb-col-sm text-right"><span>Cost Amount</span></div>
                                            <div class="nk-tb-col text-right"><span>Amount</span></div>
                                        </div><!-- .nk-tb-item -->
                                            @forelse($prescriptions as $item)
                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col nk-tb-orders-type">
                                                        <ul class="icon-overlap">
                                                            <li><em class="bg-btc-dim icon-circle icon ni ni-sign-kobo"></em></li>
                                                            <li><em class="bg-success-dim icon-circle icon ni ni-arrow-up-right"></em></li>
                                                        </ul>
                                                    </div>
                                                    <div class="nk-tb-col">
                                                        <span class="tb-lead">{{$item->drug_name}}</span>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-sub">{{ $item->dosage_regimen }}</span>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-sm">
                                                        <span class="tb-sub">{{ $item->quantity_prescribed }}</span>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-xxl">
                                                        <span class="tb-sub text-primary">RE2309232</span>
                                                    </div>
                                                    <div class="nk-tb-col tb-col-sm text-right">
                                                        <span class="tb-sub tb-amount">{{ $item->sale_price }} <span>NGN</span></span>
                                                    </div>
                                                    <div class="nk-tb-col text-right">
                                                        <span class="tb-sub tb-amount ">{{ $item->subtotal_prescribed }} <span>NGN</span></span>
                                                    </div>
                                                </div><!-- .nk-tb-item -->
                                            @empty
                                                <div class="nk-tb-col">
                                                    <span class="tb-lead">Paracetamol Inj.</span>
                                                </div>
                                            @endforelse

                                    </div>
                                </div><!-- .card-inner -->
                                <div class="card-inner-sm border-top text-center d-sm-none">
                                    <a href="{{route('pharmacy.dispense.index')}}" class="btn btn-link btn-block">See History</a>
                                </div><!-- .card-inner -->
                            </div><!-- .card -->
                        </div><!-- .col -->
                        <div class="col-xl-5 col-xxl-4">
                            <div class="row g-gs">
                                <div class="col-md-6 col-lg-12">
                                    <div class="card card-bordered card-full">
                                        <div class="card-inner">
                                            <div class="card-title-group align-start mb-2">
                                                <div class="card-title">
                                                    <h6 class="title">Top Drugs in Prescriptions</h6>
                                                    <p>In last 7 days prescription overview.</p>
                                                </div>
                                            </div><!-- .card-title-group -->
                                            <div class="nk-coin-ovwg">
                                                <div class="nk-coin-ovwg-ck">
                                                    <canvas class="coin-overview-chart" id="coinOverview"></canvas>
                                                </div>
                                                <ul class="nk-coin-ovwg-legends">
                                                    <li><span class="dot dot-lg sq" data-bg="#f98c45"></span><span>Adrenaline Inj.</span></li>
                                                    <li><span class="dot dot-lg sq" data-bg="#9cabff"></span><span>Corterm</span></li>
                                                    <li><span class="dot dot-lg sq" data-bg="#8feac5"></span><span>Vitamin C</span></li>
                                                    <li><span class="dot dot-lg sq" data-bg="#6b79c8"></span><span>Syrup</span></li>
                                                    <li><span class="dot dot-lg sq" data-bg="#79f1dc"></span><span>Panadol</span></li>
                                                </ul>
                                            </div><!-- .nk-coin-ovwg -->
                                        </div><!-- .card-inner -->
                                    </div><!-- .card -->
                                </div><!-- .col -->
                            </div><!-- .row -->
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
    <!-- content @e -->

    <script>
        const labels = @json($labels);
        const sellOrders = @json($totalSell);
        const buyOrders = @json($totalBuy);
    </script>
@endsection
