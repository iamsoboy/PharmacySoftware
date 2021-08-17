@extends('layouts.pharmacy.main')

@section('customCss')
    <style type="text/css">
        table td {
        position: relative;
        }

        table td input {
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
                                            <div class="drodown">
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
                <div class="nk-block">
                    <form action="{{route('pharmacy.prescription.store')}}" method="post">
                        @csrf
                        <div class="row g-gs">
                            <div class="col-lg-5 col-md-5">
                                <!-- With Only Header -->
                                <div class="card card-bordered h-100">
                                    <div class="card-header border-bottom">
                                        <div class="card-title">
                                            <h6 class="title">Patient Details</h6>
                                        </div>
                                    </div>
                                    <div class="card-inner">
                                        <div class="row">
                                            <div class="col-sm-6 col-xxl-12">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-outlined" name="surname" id="surname" value="">
                                                        <label class="form-label-outlined" for="surname">Surname</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-outlined" name="otherName" id="otherName" value="">
                                                        <label class="form-label-outlined" for="otherName">Other Names</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-xxl-12">
                                                <div class="form-group align-center">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-outlined" name="age" id="age" value="">
                                                        <label class="form-label-outlined" for="age">Age</label>
                                                    </div>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-outlined" name="gender" id="gender" value="">
                                                        <label class="form-label-outlined" for="gender">Gender</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-outlined" name="phone" id="phone" value="">
                                                        <label class="form-label-outlined" for="phone">Phone</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 col-xxl-12">
                                                <div class="form-group mt-4">
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control form-control-outlined" name="ethnicity" id="ethnicity" value="">
                                                        <label class="form-label-outlined" for="ethnicity">Ethnicity</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="nk-order-ovwg-data sell">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-outlined" name="hospitalNo" id="hospitalNo" value="">
                                            <label class="form-label-outlined" for="hospitalNo">Hospital No.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-outlined" name="pharmacyNo" id="pharmacyNo" value="">
                                            <label class="form-label-outlined" for="hospitalNo">Pharmacy No.</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-outlined" name="retainership" id="retainership" value="">
                                            <label class="form-label-outlined" for="hospitalNo">Retainership</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-outlined" name="consultant" id="consultant" value="">
                                            <label class="form-label-outlined" for="consultant">Consultant</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <div class="nk-order-ovwg-data buy">
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control form-control-outlined" name="ward" id="ward" value="">
                                            <label class="form-label-outlined" for="hospitalNo">Ward/Clinic</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-control-wrap">
                                            <textarea class="form-control form-control-sm form-control-outlined no-resize" rows="7" name="clinicInfo" id="clinicInfo" value=""></textarea>
                                            <label class="form-label-outlined" for="hospitalNo">Clinical Info.</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Dispense @s -->
                            <div class="col-12">
                                <!-- Dispense Section-->
                                <div class="card card-bordered">
                                    <table class="table table-bordered table-hover text-center">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Drug/Item Prescribed</th>
                                            <th scope="col">Dose/Regimen</th>
                                            <th scope="col">Unit Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Cost Price</th>
                                            <th scope="col">Stock</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">&nbsp;</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control" name="drugName" id="drugName" value="Paracetamol Tablets">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="dosage" id="dosage" value="2 times X BD">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="unitPrice" id="unitPrice" value="1700">
                                                </td>
                                                <td>
                                                        <input type="text" class="form-control" name="quantity"  id="quantity" value="1">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="costPrice"  id="costPrice" value="2300">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="default-01" value="55" disabled>
                                                </td>
                                                <td>
                                                    <div class="tb-tnx-status"><span class="badge badge-dot badge-success">Paid</span></div></td>
                                                <td><a href="#" class="link-cross mr-sm-n1"><em class="icon ni ni-cross"></em></a></td>
                                            </tr>
                                            <tr>
                                                <td>Paracetamol Tablets</td>
                                                <td>2 times X BD</td>
                                                <td>1700</td>
                                                <td>1</td>
                                                <td>2300</td>
                                                <td>55</td>
                                                <td><div class="tb-tnx-status"><span class="badge badge-dot badge-success">Paid</span></div></td>
                                                <td><a href="#" class="link-cross mr-sm-n1"><em class="icon ni ni-cross"></em></a></td>
                                            </tr>
                                            <tr>
                                                <td>Paracetamol Tablets</td>
                                                <td>2 times X BD</td>
                                                <td>1700</td>
                                                <td>1</td>
                                                <td>2300</td>
                                                <td>55</td>
                                                <td><div class="tb-tnx-status"><span class="badge badge-dot badge-success">Paid</span></div></td>
                                                <td><a href="#" class="link-cross mr-sm-n1"><em class="icon ni ni-cross"></em></a></td>
                                            </tr>
                                        <tr>
                                            <td colspan="4" class="table-active"><b>TOTAL COST</b></td>
                                            <td><b>2300</b></td>
                                            <td colspan="3">
                                                <div class="custom-control custom-switch align-center">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitch1" name="print">
                                                    <label class="custom-control-label" for="customSwitch1">Print Label</label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div><!-- .card -->
                                <!-- Dispense Buttons @s-->
                                <div class="justify-between mt-2">
                                    <a href="#" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
                                    <a href="#" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-download-cloud"></em><span>Export</span></a>
                                    <button  type="submit" class="btn btn-white btn-dim btn-outline-primary"><em class="icon ni ni-capsule-fill"></em><span>Dispense Drug/Item</span></button>
                                </div>
                                <!-- Dispense Buttons @e-->
                                <!-- End Dispense Section-->
                            </div><!-- .col -->
                            <!-- Dispense @e -->
                        </div><!-- .row -->
                    </form>
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
