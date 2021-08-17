@extends('layouts.pharmacy.main')

@section('head')
    <title>Pharmacy - Edit - {{$drug->code_no}}</title>
@endsection

@section('content')
    <!-- content @s -->
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-lg">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between g-3">

                        <div class="nk-block-head-content">
                            <a href="{{route('pharmacy.drugs.index')}}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                            <a href="html/kyc-list-regular.html" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="row gy-5">
                        <div class="col-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h5 class="nk-block-title title">Drug Editing Module</h5>
                                </div>
                            </div><!-- .nk-block-head -->
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
                                    <form action="{{route('pharmacy.drugs.update', $drug->id)}}" method="post">
                                        @csrf
                                        @method('patch')
                                        <span class="preview-title-lg overline-title">Drug Details</span>
                                        <div class="row g-4">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="full-name-1">Drug Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="name" name="name" value="{{ $drug->product_name }}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="full-name-1">Brand Name</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="brand-name-1" name="brandName" value="{{ $drug->generic_name }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="therapeutic-group">Therapeutic Group</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select form-control" name="category" id="group" data-search="on">
                                                            <option value="{{ $drug->category }}" selected>{{ $drug->category }}</option>
                                                            @forelse($categories as $category)
                                                                <option value="{{$category->name}}">{{$category->name}}</option>
                                                            @empty
                                                                <option value="">No drugs categories found!</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="email-address-1">Formulation</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select form-control" name="formulation" id="formulation" data-search="on">
                                                            <option value="{{ $drug->formulation }}" selected>{{ $drug->category }}</option>
                                                            @forelse($formulations as $formulation)
                                                                <option value="{{$formulation->name}}">{{$formulation->name}}</option>
                                                            @empty
                                                                <option value="">No drugs formulation found!</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="email-address-1">Allergy Group</label>
                                                    <div class="form-control-wrap">
                                                        <select class="form-select form-control" name="allergy" id="allergy" data-search="on">
                                                            <option value="{{ $drug->allergy_group }}" selected>{{ $drug->allergy_group }}</option>
                                                            @forelse($allergyGroups as $allergy)
                                                                <option value="{{$allergy->name}}">{{$allergy->name}}</option>
                                                            @empty
                                                                <option value="">No drugs allergy found!</option>
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label" for="expiry_date">Expiry Date</label>
                                                    <div class="form-control-wrap">
                                                        <div class="form-icon form-icon-right">
                                                            <em class="icon ni ni-calendar-alt"></em>
                                                        </div>
                                                        <input type="text" class="form-control date-picker" id="expiry_date" name="expiry_date" value="{{ $drug->expiry_date }}" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="preview-hr">
                                        <span class="preview-title-lg overline-title">Important information for Doctors and Nurses</span>
                                        <div class="row g-4">
                                            <div class="col-lg-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="phone-no-1">Description</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="description" name="description" value="{{ $drug->descriptions }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="pay-amount-1">Instructions</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="instruction" name="instruction" value="{{ $drug->instructions }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="phone-no-1">Indications</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="indication" id="indication" value="{{ $drug->indications }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="pay-amount-1">Mechanism of Action</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="mechanism" name="mechanism" value="{{ $drug->mechanisms }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="phone-no-1">Contra-Indications</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="contraIndication" id="contraIndication" value="{{ $drug->contra_indications }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="pay-amount-1">Precautions</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="precaution" name="precaution" value="{{ $drug->precautions }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="phone-no-1">Side/Adverse Effects</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" name="sideEffect" id="sideEffect" value="{{ $drug->adverse_effects }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="pay-amount-1">Drug Interactions</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="drugInteraction" name="drugInteraction" value="{{ $drug->drug_interactions }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="preview-hr">
                                        <span class="preview-title-lg overline-title">Drug Dosage/Regimen</span>
                                        <div class="row g-4">
                                            <div class="col-lg-2 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="pay-amount-1">Dose</label>
                                                    <div class="form-control-wrap align-center">
                                                        <input type="text" class="form-control" id="dose" name="dose" value="{{ $drug->dose }}">
                                                        <select class="form-select form-control" name="unit" id="unit" data-search="on">
                                                            <option value="{{ $drug->unit }}" selected>{{ $drug->unit }}</option>
                                                            <option value="mLs/Dose">mLs/Dose</option>
                                                            <option value="mg/Dose">mg/Dose</option>
                                                            <option value="Tablets">Tablets</option>
                                                            <option value="Capsules">Capsules</option>
                                                            <option value="Drops">Drops</option>
                                                            <option value="Ampules">Ampules</option>
                                                            <option value="PUFF">PUFF</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="pay-amount-1">Frequency</label>
                                                    <select class="form-select form-control" name="frequency" id="frequency" data-search="on">
                                                        <option value="{{ $drug->frequency }}" selected>{{ $drug->frequency }}</option>
                                                        <option value="Hourly">Hourly</option>
                                                        <option value="BD">BD</option>
                                                        <option value="TDS">TDS</option>
                                                        <option value="Daily">Daily</option>
                                                        <option value="12 hourly">12 hourly</option>
                                                        <option value="STAT">STAT</option>
                                                        <option value="Weekly">Weekly</option>
                                                        <option value="PRN">PRN</option>
                                                        <option value="Days">Days</option>
                                                        <option value="Nocte">Nocte</option>
                                                        <option value="8 hourly">8 hourly</option>
                                                        <option value="QDS">QDS</option>
                                                        <option value="6 hourly">6 hourly</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="pay-amount-1">Duration</label>
                                                    <div class="form-control-wrap align-center">
                                                        <input type="text" class="form-control" id="duration" name="duration" value="{{ $drug->duration }}">
                                                        <select class="form-select form-control" name="time" id="time">
                                                            <option value="{{ $drug->time }}" selected>{{ $drug->time }}</option>
                                                            <option value="Days">Days</option>
                                                            <option value="Weeks">Weeks</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr class="preview-hr">
                                        <span class="preview-title-lg overline-title">Drug Details</span>
                                        <div class="row g-4 align-center">
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="pay-amount-1">UNIT PACK</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="unitPack" name="unitPack" value="{{ $drug->unit_pack }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="pay-amount-1">QUANTITY</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $drug->quantity }}">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="pay-amount-1">COST PRICE</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="costPrice" name="costPrice" value="{{ $drug->cost_price }}">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-3 col-sm-6">
                                                <div class="form-group">
                                                    <label class="form-label" for="pay-amount-1">SALE PRICE</label>
                                                    <div class="form-control-wrap">
                                                        <input type="number" class="form-control" id="salePrice" name="salePrice" value="{{ $drug->retail_price }}">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-label">Prescription</label>
                                                    <div class="custom-control custom-switch align-center">
                                                        <input type="checkbox" class="custom-control-input" id="customSwitch1" name="show" checked>
                                                        <label class="custom-control-label" for="customSwitch1">Hide/Show</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-lg btn-primary">Save Information</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- .card -->

                        </div><!-- .col -->
                    </div><!-- .row -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
    <!-- content @e -->
@endsection
