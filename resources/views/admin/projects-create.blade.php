@extends('layouts.master')

@section('title') Create New Project @endsection

@section('css') 
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
        <!-- dropzone css -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css')}}">
@endsection

@section('content')

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">CREATE ANALYSIS</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Financial Research</a></li>
                                            <li class="breadcrumb-item active">Create New</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Create New Financial Research</h4>
                                        <form>
                                            <div class="form-group row mb-4">
                                                <label for="projectname" class="col-form-label col-lg-2">Company Name</label>
                                                <div class="col-lg-10">
                                                    <input id="projectname" name="projectname" type="text" class="form-control" placeholder="Enter Company Name...">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label for="projectdesc" class="col-form-label col-lg-2">Description</label>
                                                <div class="col-lg-10">
                                                    <textarea class="form-control" id="projectdesc" rows="3" placeholder="Enter Description..."></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label class="col-form-label col-lg-2">Research Date</label>
                                                <div class="col-lg-10">
                                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="dd M, yyyy" data-date-autoclose="true">
                                                        <input type="text" class="form-control" placeholder="Date" name="date" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-4">
                                                <label for="projectbudget" class="col-form-label col-lg-2">Budget</label>
                                                <div class="col-md-10">
                                                <select class="form-control">
                                                    <option>Select</option>
                                                    <option>Landing Page</option>
                                                    <option>Pro</option>
                                                    <option>Expert</option>
                                                </select>
                                            </div>
                                            </div>
                                        </form>
                                        <div class="row mb-4">
                                            <label class="col-form-label col-lg-2">Attached Files</label>
                                            <div class="col-lg-10">
                                                <form action="/" method="post" class="dropzone">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>
                    
                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                                                        </div>
                                                        
                                                        <h4>Drop files here or click to upload.</h4>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="row justify-content-end">
                                            <div class="col-lg-10">
                                                <button type="submit" class="btn btn-primary">Create Research</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

@endsection

@section('script')

        <!-- bootstrap datepicker -->
        <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

        <!-- dropzone plugin -->
        <script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js')}}"></script> 

@endsection