@extends('layouts.pharmacy.main')

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
        border: none;
        padding: 10px;
        box-sizing: border-box;
        }
    </style>
@endsection
@section('head')
    <title>Pharmacy - Dispense Drug(s)</title>
@endsection

@section('content')
    <!-- content @s -->
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Pharmacy Dispensary</h3>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-download-cloud"></em><span>Export</span></a></li>
                                        <li><a href="#" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-reports"></em><span>Reports</span></a></li>
                                        <li class="nk-block-tools-opt">
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-primary" data-toggle="dropdown"><em class="icon ni ni-plus"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-user-add-fill"></em><span>Add User</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-coin-alt-fill"></em><span>Add Order</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-note-add-fill-c"></em><span>Add Page</span></a></li>
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

                @livewire('test-form')
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
