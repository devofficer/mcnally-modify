@extends('layouts.master')

@section('title') Companies Research @endsection

@section('css')
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-editable/bootstrap-editable.min.css')}}">
@endsection

@section('content')
<div id="pdf" class="file-listing">
        <div class="preloader-section" v-if="loading">
            <div id="status">
                <div class="spinner-chase">
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                </div>
            </div>
        </div>
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">Companies Research</h4>
                </div>
                <div class="col-auto text-right">
                    <a href="{{ route('pdf-upload') }}" class="btn btn-success">Upload PDF</a>
                </div>
            </div>
            <div class="col-12">
                <tr>
                    <h5>Filter</h5>
                    <span class="editable-container editable-inline" style="">
                        <div>
                            <div class="editableform-loading" style="display: none;"></div>
                            <form id="filterPdf" class="form-inline editableform" style="" @submit.prevent="submitFilter">
                                <div class="control-group form-group">
                                    <div>
                                        <div class="editable-input">
                                            <input type="text" style="display: none;">
                                            <span class="combodate">
                                                <select name="month" class="month form-control form-control-sm" style="width: auto;" v-model="filter.month">
                                                    <option value="">Month</option>
                                                    <option value="1">Jan</option>
                                                    <option value="2">Feb</option>
                                                    <option value="3">Mar</option>
                                                    <option value="4">Apr</option>
                                                    <option value="5">May</option>
                                                    <option value="6">Jun</option>
                                                    <option value="7">Jul</option>
                                                    <option value="8">Aug</option>
                                                    <option value="9">Sep</option>
                                                    <option value="10">Oct</option>
                                                    <option value="11">Nov</option>
                                                    <option value="12">Dec</option>
                                                </select>&nbsp;/&nbsp;
                                                <select name="year" class="year form-control form-control-sm" style="width: auto;" v-model="filter.year">
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
                                            <button type="button" class="btn btn-danger editable-cancel btn-sm waves-effect waves-light" @click.prevent="clearFilter">
                                                <i class="mdi mdi-close"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="editable-error-block help-block" style="display: none;"></div>
                                </div>
                            </form>
                        </div>
                    </span>
                </tr>
            </div>
        </div>
        <!-- end page title -->

        <!-- end row -->
        <div class="row mt-3" v-if="file_listing.length > 0">
            <div v-for="(item, index) in this.file_listing" class="col-lg-4">
                <div class="card text-dark card-file">
                    <div class="card-body">
                        <h5 class="mt-0 mb-4 text-primary"><a href="" @click.prevent="showFile(item.file_url)"><div><i class="mdi mdi-bullseye-arrow mr-3"></i> @{{item.title}}</div></a></h5>
                        <p class="card-text">@{{item.desc}}</p>
                        <div class="row">
                          <div class="col-lg-8">@{{item.date_str}}</div>
                          <div class="col-lg-2"><a :href="getLinkEdit(item.id)" class="btn btn-outline-secondary btn-sm waves-effect waves-light"><i class="fa fa-edit"></i></a></div>
                          <div class="col-lg-2"><a href="#" class="btn btn-outline-danger btn-sm waves-effect waves-light" @click.prevent="deleteFile(item.id)"><i class="fa fa-trash"></i></a>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3" v-else>
            <div class="col-lg-12 text-center">
                <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> There aren't records</div>
            </div>
        </div>

        <div class="modal fade" id="ModalScrollable" tabindex="-1" role="dialog" aria-labelledby="ModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style=" min-height: 65vh; ">

                         <iframe :src="file_url" width="100%" height="500px"></iframe>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="clearFile">Close</button>
                        </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
@endsection
@section('script')

        <!-- Plugins js -->
        <script src="{{ URL::asset('assets/libs/moment/moment.min.js')}}"></script>
        <!-- <script src="{{ URL::asset('assets/libs/bootstrap-editable/bootstrap-editable.min.js')}}"></script> -->

        <!-- Init js-->
        <!-- <script src="{{ URL::asset('assets/js/pages/form-xeditable.init.js')}}"></script> -->

@endsection
