@extends('layouts.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
@endsection

@section('title') Investments News @endsection

@section('content')
    <div id="news">
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
        <div class="row" style="margin-bottom:30px">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18">INVESTMENTS NEWS</h4>
                </div>
                <div class="col-auto text-right">
                    <!-- Extra Large modal -->
                    <button type="button" class="btn btn-primary waves-effect waves-light" @click.prevent="createNews">Upload New</button>
                </div>
                <!--  Modal content for the above example -->
                <div id="UploadNews" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="UploadNews" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title">Upload News</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="POST" id="formNews" enctype="multipart/form-data" @submit.prevent="submitNewsForm">
                                    <div class="form-group row mb-4">
                                        <label for="title" class="col-form-label col-lg-2">Title</label>
                                        <div class="col-lg-10">
                                            <input id="title" name="title" type="text" class="form-control" :class="{ 'is-invalid' : this.hasError('title') }" placeholder="Enter title..." v-model="title">
                                            <div class="invalid-feedback">@{{title_error}}</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="subtitle" class="col-form-label col-lg-2">Subtitle</label>
                                        <div class="col-lg-10">
                                            <input id="subtitle" name="subtitle" type="text" class="form-control" :class="{ 'is-invalid' : this.hasError('subtitle') }" placeholder="Enter subtitle..." v-model="subtitle">
                                            <div class="invalid-feedback">@{{subtitle_error}}</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="projectdesc" class="col-form-label col-lg-2">Description</label>
                                        <div class="col-lg-10">
                                            <div :class="{ 'is-invalid' : this.hasError('description') }">
                                                <editor-component ref="editor"></editor-component>
                                            </div>
                                            <div class="invalid-feedback">@{{description_error}}</div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label col-lg-2">Research Date</label>
                                        <div class="col-lg-10">
                                            <div class="input-daterange input-group" data-provide="datepicker" data-date-format="dd M, yyyy" data-date-autoclose="true" data-date-end-date="0d">
                                                <input type="text" class="form-control" :class="{ 'is-invalid' : this.hasError('date') }" placeholder="Date" name="date" id="date" autocomplete="off" />
                                                <div class="invalid-feedback">@{{date_error}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="visibility" class="col-form-label col-lg-2">{{ __('Visibility') }}</label>
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
                                    <div class="row mb-4">
                                        <label class="col-form-label col-lg-2">Principal Image</label>
                                        <div class="col-lg-10">
                                            <div :class="{ 'is-invalid' : this.hasError('image') }">
                                                <upload-image ref="uploadImage" temp_url="{{ url('upload-temp-image') }}"></upload-image>
                                                <input type="hidden" name="previmage" v-model="previmage">
                                                <input type="hidden" name="image" class="hidden-file" v-model="filename">
                                            </div>
                                            <div class="invalid-feedback">@{{image_error}}</div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="projectdesc" class="col-form-label col-lg-2 mt-3">Epigraph</label>
                                        <div class="col-lg-10 mt-4">
                                            <input id="epigraph" name="epigraph" type="text" class="form-control" :class="{ 'is-invalid' : this.hasError('epigraph') }" placeholder="Enter epigraph..." v-model="epigraph">
                                            <div class="invalid-feedback">@{{epigraph_error}}</div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-left">
                                        <div class="col-lg-12">
                                            <button type="submit" class="btn btn-primary float-right">Upload News</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
            <div class="col-12 mb-4">
                <h5>Filter</h5>
                <span class="editable-container editable-inline" style="">
                    <div>
                        <form id="filterNews" class="form-inline" style="" @submit.prevent="submitFilter">
                            <div class="control-group form-group">
                                <div>
                                    <div class="editable-input">
                                        <span class="combodate">
                                            <select name="month" class="month form-control form-control-sm" style="width: auto;" v-model="filter.month">
                                                <option value="">Month</option>
                                            @for ($i=1; $i <= 12; $i++)
                                                @php $month = \Carbon\Carbon::parse(date('Y-'.$i.'-01'))->format('M'); @endphp
                                                <option value="{{ $i }}">{{ $month }}</option>
                                            @endfor
                                            </select>&nbsp;/&nbsp;
                                            <select name="year" class="year form-control form-control-sm" style="width: auto;" v-model="filter.year">
                                                <option value="">Year</option>
                                            @for ($i=date('Y'); $i >= date('Y')-20; $i--)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
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
                            </div>
                        </form>
                    </div>
                </span>
            </div>
        </div>
        <!-- end page title -->
        <div class="row news-listing" v-if="news_listing.length > 0">
            <div v-for="(item, index) in this.news_listing" class="col-lg-4">
                <news-card
                    :news="item"
                    v-on:edit-news="editNews"
                    v-on:delete-news="deleteNews"
                ></news-card>
            </div>
        </div>
        <div class="row" v-else>
            <div class="col-lg-12 text-center">
                <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> There aren't records</div>
            </div>
        </div>
        <!-- end row -->
    </div>

@endsection

@section('script')
     <!-- bootstrap datepicker -->
    <script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
@endsection