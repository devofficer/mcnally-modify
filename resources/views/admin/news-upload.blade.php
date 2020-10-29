@extends('layouts.master')

@section('title') Create New Project @endsection

@section('css') 
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
        <!-- dropzone css -->
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css')}}">
@endsection

@section('content')

                        <!-- start page title -->
                        
                             
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Upload News</h4>
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
                                                <label for="projectbudget" class="col-form-label col-lg-2">Visibility</label>
                                                <div class="col-md-10">
                
                                                    <div class="custom-control custom-checkbox mb-2">
                                                        <input type="checkbox" class="custom-control-input input-mini" id="closeButton" value="checked">
                                                        <label class="custom-control-label" for="closeButton">Landing Page</label>
                                                    </div>
                
                                                    <div class="custom-control custom-checkbox mb-2">
                                                        <input type="checkbox" class="custom-control-input input-mini" id="addBehaviorOnToastClick" value="checked">
                                                        <label class="custom-control-label" for="addBehaviorOnToastClick">Pro</label>
                                                    </div>
                
                                                    <div class="custom-control custom-checkbox mb-2">
                                                        <input type="checkbox" class="custom-control-input input-mini" id="debugInfo" value="checked">
                                                        <label class="custom-control-label" for="debugInfo">Expert</label>
                                                    </div>
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
                                                <button type="submit" class="btn btn-primary">Upload News</button>
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