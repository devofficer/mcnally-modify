@extends('layouts.master')

@section('title') Add New PDF @endsection

@section('css')
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
@endsection

@section('content')
    <div id="pdf">
        <div class="row">
            <div class="col-lg-12">
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
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">{{ __('Upload PDF') }}</h4>
                        <form action="#" method="POST" id="formUploadPdf" enctype="multipart/form-data" @submit.prevent="submitFormPdf">
                            <div class="form-group row mb-4">
                                <label for="title" class="col-form-label col-lg-2">{{ __('Title') }}</label>
                                <div class="col-lg-10">
                                    <input id="title" name="title" type="text" class="form-control" :class="{ 'is-invalid' : this.hasError('title') }" placeholder="Enter title..." v-model="title">
                                    <div class="invalid-feedback">@{{title_error}}</div>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="desc" class="col-form-label col-lg-2">{{ __('Description') }}</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" :class="{ 'is-invalid' : this.hasError('desc') }" id="desc" name="desc" rows="3" placeholder="Enter Description..." v-model="desc"></textarea>
                                    <div class="invalid-feedback">@{{desc_error}}</div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label col-lg-2">{{ __('Date') }}</label>
                                <div class="col-lg-10">
                                    <div class="input-daterange input-group" data-provide="datepicker" data-date-format="dd M, yyyy" data-date-autoclose="true" data-today-highlight="true">
                                        <input type="text" class="form-control" :class="{ 'is-invalid' : this.hasError('date') }" placeholder="Date" name="date" id="date" />
                                        <div class="invalid-feedback">@{{date_error}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="projectbudget" class="col-form-label col-lg-2">{{ __('Visibility') }}</label>
                                <div class="col-md-10">
                                    <div :class="{ 'is-invalid' : this.hasError('visibility') }">
                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input input-mini" id="Landing" value="1" name="visibility[]" v-model="visibility">
                                            <label class="custom-control-label" for="Landing">{{ __('Landing Page') }}</label>
                                        </div>

                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input input-mini" id="Pro" value="2" name="visibility[]" v-model="visibility">
                                            <label class="custom-control-label" for="Pro">{{ __('Pro') }}</label>
                                        </div>

                                        <div class="custom-control custom-checkbox mb-2">
                                            <input type="checkbox" class="custom-control-input input-mini" id="EXpert" value="3" name="visibility[]" v-model="visibility">
                                            <label class="custom-control-label" for="EXpert">{{ __('Expert') }}</label>
                                        </div>
                                    </div>
                                    <div class="invalid-feedback">@{{visibility_error}}</div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="projectbudget" class="col-form-label col-lg-2">{{ __('Attached File') }}</label>
                                <div class="col-md-10">
                                    <div :class="{ 'is-invalid' : this.hasError('file') }">
                                        <vue-dropzone ref="pdfDropzone" id="dropzone" :options="dropzoneOptions" :duplicate-check="true" v-on:vdropzone-file-added="addedFile" v-on:vdropzone-removed-file="removedFile" v-on:vdropzone-error="failedUpload" v-on:vdropzone-max-files-exceeded="maxFilesExceeded"></vue-dropzone>
                                    </div>
                                    <div class="invalid-feedback">@{{file_error}}</div>
                                    <input type="hidden" name="pdf_file" class="hidden-file" v-model="filename">
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-primary">Upload PDF</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>

@endsection

@section('script')

        <!-- bootstrap datepicker -->
        <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

@endsection