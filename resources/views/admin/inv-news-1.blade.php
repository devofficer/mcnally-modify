@extends('layouts.master')

@section('css')

<!-- <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/editor.css')}}" media="screen"> -->

@endsection

@section('title') Investments News @endsection



@section('content')

                        <!-- start page title -->
                        <div class="row" style="margin-bottom:30px">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">INVESTMENTS NEWS</h4> 
                                </div>
                                  <div class="col-auto text-right">
                                    <!-- Extra Large modal -->
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-Upload-New">Upload New</button>
                                   </div>
                                    <!--  Modal content for the above example -->
                                    <div class="modal fade bs-Upload-New" tabindex="-1" role="dialog" aria-labelledby="UploadNew" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h4 class="card-title mb-4">Upload News</h4>
                                                        <form>
                                                            <div class="form-group row mb-4">
                                                                <label for="projectname" class="col-form-label col-lg-2">Title</label>
                                                                <div class="col-lg-10">
                                                                    <input id="projectname" name="projectname" type="text" class="form-control" placeholder="Enter title...">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-4">
                                                                <label for="projectname" class="col-form-label col-lg-2">Subtitle</label>
                                                                <div class="col-lg-10">
                                                                    <input id="projectname" name="projectname" type="text" class="form-control" placeholder="Enter subtitle...">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-4">
                                                                <label for="projectdesc" class="col-form-label col-lg-2">Description</label>
                                                                <div class="col-lg-10">
                                                                    <div id="editor"></div>
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
                                                            <label class="col-form-label col-lg-2">Principal Image</label>
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
                                                        <div class="row mb-4">
                                                            <label for="projectdesc" class="col-form-label col-lg-2 mt-3">Epigraph</label>
                                                                <div class="col-lg-10 mt-4">
                                                                    <input id="projectname" name="projectname" type="text" class="form-control" placeholder="Enter epigraph...">
                                                                </div>
                                                        </div>
                                                        <div class="row justify-content-left">
                                                            <div class="col-lg-10">
                                                                <button type="submit" class="btn btn-primary">Upload News</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                              </div>
                            </div>
                            <div class="col-12 mb-4">
                                <h5>Filter</h5>
                                    <span class="editable-container editable-inline" style="">
                                        <div>
                                            <div class="editableform-loading" style="display: none;"></div>
                                            <form class="form-inline editableform" style="">
                                                <div class="control-group form-group">
                                                    <div>
                                                        <div class="editable-input">
                                                            <input type="text" style="display: none;">
                                                            <span class="combodate">
                                                                <select class="month form-control form-control-sm" style="width: auto;">
                                                                    <option value="">Month</option>
                                                                    <option value="0">Jan</option>
                                                                    <option value="1">Feb</option>
                                                                    <option value="2">Mar</option>
                                                                    <option value="3">Apr</option>
                                                                    <option value="4">May</option>
                                                                    <option value="5">Jun</option>
                                                                    <option value="6">Jul</option>
                                                                    <option value="7">Aug</option>
                                                                    <option value="8">Sep</option>
                                                                    <option value="9">Oct</option>
                                                                    <option value="10">Nov</option>
                                                                    <option value="11">Dec</option>
                                                                </select>&nbsp;/&nbsp;
                                                                <select class="year form-control form-control-sm" style="width: auto;">
                                                                    <option value="">Year</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2001">2001</option>
                                                                </select>
                                                            </span>
                                                        </div>
                                                        <div class="editable-buttons">
                                                            <button type="submit" class="btn btn-success editable-submit btn-sm waves-effect waves-light">
                                                                <i class="mdi mdi-check"></i>
                                                            </button>
                                                            <button type="button" class="btn btn-danger editable-cancel btn-sm waves-effect waves-light">
                                                                <i class="mdi mdi-close"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="editable-error-block help-block" style="display: none;"></div>
                                                </div>
                                            </form>
                                        </div>
                                    </span>
                            </div>
                        </div>   
                        <!-- end page title -->
                        <div class="row">

                            <div id="editor">
                                                    </div>


                            <div class="col-lg-4">
                                <div class="card" data-toggle="modal" data-target=".bs-new">
                                    <img class="card-img-top img-fluid" src="assets/images/small/img-5.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title mt-0">Card title 1</h4>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit
                                            longer.</p>
                                        </p>
                                        <p class="card-text">
                                            <small class="text-muted">20 april 2020 - 5 min read</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--  Modal content for the above example -->
                            <div class="modal fade bs-new" tabindex="-1" role="dialog" aria-labelledby="New" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title mt-0" id="New">Title</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <h5 class="modal-body">Subtitle</h5>
                                        <div class="modal-body">
                                            <p>Cras mattis consectetur purus sit amet fermentum.
                                                Cras justo odio, dapibus ac facilisis in,
                                                egestas eget quam. Morbi leo risus, porta ac
                                                consectetur ac, vestibulum at eros.</p>
                                                <div class="body">    
                                                    <img class="img-fluid" src="assets/images/small/img-5.jpg" alt="Card image cap">
                                                    <figcaption class="text-muted mb-5">Epigraph image</figcaption>
                                                </div>   
                                            <p>Praesent commodo cursus magna, vel scelerisque
                                                nisl consectetur et. Vivamus sagittis lacus vel
                                                augue laoreet rutrum faucibus dolor auctor.</p>
                                            <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur.
                                                Praesent commodo cursus magna, vel scelerisque
                                                nisl consectetur et. Donec sed odio dui. Donec
                                                ullamcorper nulla non metus auctor
                                                fringilla.</p>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                              <div class="col-lg-4">
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="assets/images/small/img-5.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title mt-0">Card title 2</h4>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit
                                            longer.</p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-lg-4">
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="assets/images/small/img-5.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title mt-0">Card title 3</h4>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit
                                            longer.</p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="assets/images/small/img-3.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title mt-0">Card title</h4>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit
                                            longer.</p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-lg-4">
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="assets/images/small/img-2.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title mt-0">Card title</h4>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit
                                            longer.</p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="assets/images/small/img-5.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title mt-0">Card title</h4>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit
                                            longer.</p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="assets/images/small/img-4.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title mt-0">Card title</h4>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit
                                            longer.</p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-lg-4">
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="assets/images/small/img-5.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title mt-0">Card title</h4>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit
                                            longer.</p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-lg-4">
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="assets/images/small/img-6.jpg" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title mt-0">Card title</h4>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural lead-in to additional content. This content is a little bit
                                            longer.</p>
                                        <p class="card-text">
                                            <small class="text-muted">Last updated 3 mins ago</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                   

@endsection

@section('script')

       <script src="{{ URL::asset('assets/js/pages/ckeditor.js')}}"></script>
        <script>
            ClassicEditor
                .create( document.querySelector( '#editor' ), {
                    // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
                } )
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( err => {
                    console.error( err.stack );
                } );
        </script>

@endsection