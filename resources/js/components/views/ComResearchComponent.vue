<template>
  <div>
    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
          <h4 class="mb-0 font-size-18">Companies Research</h4>
        </div>
      </div>
    </div>
            
    <div class="row" style="margin-bottom:30px">
      <div class="col-8 mb-4">
        <h5>Filter</h5>
        <span class="editable-container editable-inline" style="">
          <div>
            <div class="editableform-loading" style="display: none;"></div>
            <form class="form-inline editableform" style="" @submit.prevent="getListPdfFilter()">
              <div class="control-group form-group">
                <div>
                  <div class="editable-input">
                    <span class="combodate">
                      <select class="month form-control form-control-sm" style="width: auto;" v-model="month" required="">
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
                      </select>
                      &nbsp;/&nbsp;
                      <select class="year form-control form-control-sm" style="width: auto;" v-model="year" required="">
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
                    <button type="button" class="btn btn-danger editable-cancel btn-sm waves-effect waves-light" @click="cancelFilter">
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

      <div class="col-4 mb-4 text-right">
        <!-- Extra Large modal -->
        <button type="button" class="btn btn-primary waves-effect waves-light" @click="showCreatePdf">Upload PDF</button>
      </div>
    </div>
    <!-- end page title -->

    <!--  Modal content for the above example -->
    <div class="modal bs-Upload-Pdf" id="bs-Upload-Pdf" tabindex="-1" role="dialog" aria-labelledby="UploadPdf" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeCreatePdf">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h4 class="card-title mb-4">Upload PDF</h4>
            <form id="formCreatePdf" enctype="multipart/form-data" @submit.prevent="createPdf()">
              <div class="form-group row mb-4">
                <label for="title" class="col-form-label col-lg-2">Title</label>
                <div class="col-lg-10">
                  <input id="title" v-model="title" type="text" class="form-control" placeholder="Enter title..." required="">
                  <div v-if="errorTitle">
                    <p v-for="(value, key, index) in errorTitle" class="error-message" style="color: #d9534f;font-size: 12px;margin-bottom: 0px;">
                      {{ value }}
                    </p>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label for="desc" class="col-form-label col-lg-2">Description</label>
                <div class="col-lg-10">
                  <textarea class="form-control" id="description" rows="3" placeholder="Enter Description..." v-model="description" required=""></textarea>
                  <div v-if="errorDescription">
                    <p v-for="(value, key, index) in errorDescription" class="error-message" style="color: #d9534f;font-size: 12px;margin-bottom: 0px;">
                      {{ value }}
                    </p>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label class="col-form-label col-lg-2">Date</label>
                <div class="col-lg-10">
                  <div class="input-daterange input-group" data-provide="datepicker" data-date-format="dd M, yyyy" data-date-autoclose="true" data-today-highlight="true">
                    <input id="date" type="date" v-model="date" class="form-control" placeholder="Date" required=""/>
                    <div v-if="errorDate">
                      <p v-for="(value, key, index) in errorDate" class="error-message" style="color: #d9534f;font-size: 12px;margin-bottom: 0px;">
                        {{ value }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label for="projectbudget" class="col-form-label col-lg-2">Visibility</label>
                <div class="col-md-10">
                  <div class="custom-control custom-checkbox mb-2">
                    <input v-model="checkedPlans" type="checkbox" class="custom-control-input input-mini" id="free" value="free">
                    <label class="custom-control-label" for="free">Landing Page</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-2">
                    <input v-model="checkedPlans" type="checkbox" class="custom-control-input input-mini" id="pro" value="pro">
                    <label class="custom-control-label" for="pro">Pro</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-2">
                    <input v-model="checkedPlans" type="checkbox" class="custom-control-input input-mini" id="expert" value="expert">
                    <label class="custom-control-label" for="expert">Expert</label>
                  </div>
                  <div v-if="errorcheckedPlans">
                    <p v-for="(value, key, index) in errorcheckedPlans" class="error-message" style="color: #d9534f;font-size: 12px;margin-bottom: 0px;">
                      {{ value }}
                    </p>
                  </div>
                </div>
              </div>

              <div class="form-group row mb-4">
                <label for="projectbudget" class="col-form-label col-lg-2">Attached File</label>
                <div class="col-lg-10">
                  <vue-dropzone id="drop1" :options="dropOptions" @vdropzone-success="success" ref="myVueDropzone"></vue-dropzone>
                  <div v-if="errorAttachedFile">
                    <p v-for="(value, key, index) in errorAttachedFile" class="error-message" style="color: #d9534f;font-size: 12px;margin-bottom: 0px;">
                      {{ value }}
                    </p>
                  </div>
                </div>
              </div>
              <div class="row justify-content-left">
                <div class="col-lg-10">
                  <button type="button" class="btn btn-secondary" @click="closeCreatePdf">Close</button>
                  <button type="submit" class="btn btn-primary" form="formCreatePdf" id="buttonUpload">Upload PDF</button>
                </div>
              </div>
            </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="row mt-3">
      <div v-if="arrayPdf.length != 0" v-for="n in arrayPdf" :key="`card-${n.id}`" class="col-lg-4">
        <div class="card text-dark">
          <div class="card-body">
            <h5 class="mt-0 mb-4 text-primary" data-toggle="modal" :data-target="`.bs-pdf-${n.id}`">{{n.title}}</h5>
            <p class="card-text" data-toggle="modal" :data-target="`.bs-pdf-${n.id}`">
              {{n.desc}}
              <embed :src="`../assets/files/pdf/${n.file}`" type="application/pdf" width="100%" height="600px" />
            </p>
            <p class="card-text">
              <small class="text-muted">{{ n.date.substr(0, 10) }}</small>
              <span style="float: right;">
                <button type="button" class="btn btn-light" style="font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="showEditPdf(n)"> Edit </button>
                <button type="button" class="btn btn-light" style="font-size: 11px;padding-top: 2px;padding-bottom: 2px;margin-left: 5px" data-toggle="modal" :data-target="`#removeCard_${n.id}`"><i class="icon-squared-cross"></i> Remove </button>
                <!-- sample modal content -->
                <div :id="`removeCard_${n.id}`" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title mt-0" id="myModalLabel">Remove PDF</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group row mb-2">
                          <label for="title" class="col-form-label col-lg-12">Confirm you want to remove this PDF: <span class="d-block">{{ n.title }}</span></label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" :id="`closeModalDelete_${n.id}`" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" :id="`buttonDeletePdf_${n.id}`" class="btn btn-danger waves-effect waves-light" @click="removePdf(n.id)">Remove PDF</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
              </span>
            </p>
          </div>
        </div>
      </div>

      <div v-if="loading" class="col-lg-12 text-center">
        <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> Loading</div>
      </div>

      <div v-if="!arrayPdf.length && !loading" class="col-lg-12 text-center">
        <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> There aren't records</div>
      </div>

      <!--  Modal content for the above example -->
      <div v-for="n in arrayPdf" :key="`modal-${n.id}`" :class="`modal fade bs-pdf-${n.id}`" tabindex="-1" role="dialog" aria-labelledby="New" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title mt-0" id="New">{{ n.title }}</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <pdf-view :url="n.file"></pdf-view>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>

    <div id="opacity"></div>

  </div>
</template>

<script>
import vueDropzone from "vue2-dropzone";
import PdfView from '../partials/PdfViewcomponent.vue'

export default {
  components: {
    vueDropzone,
    PdfView
  },

  data() {
    return {
      arrayPdf:[],
      title:'',
      description:'',
      date:'',
      checkedPlans:[],
      attachedFile:'',
      idEdit:'',
      dropOptions: {
        url: "/admin/pdf/attach",
        maxFilesize: 20, // MB
        maxFiles: 1,
        thumbnailWidth: 150, // px
        thumbnailHeight: 150,
        addRemoveLinks: true,
        acceptedFiles:'application/pdf',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        },
        params: {
          _token:$('meta[name="csrf-token"]').attr('content')
        },
      },
      errorTitle:'',
      errorDescription:'',
      errorDate:'',
      errorcheckedPlans:'',
      errorAttachedFile:'',
      month:'',
      year:'',
      currentPage: 0,
      pageCount: 0,
      loading:true,
    }
  },

  methods: {
    getListPdf() {
      NProgress.start()
      axios.get('/admin/pdfs')
      .then( (response) => {
        this.arrayPdf = response.data;
        this.loading = false;
        NProgress.done();
      })
      .catch(error => {
        NProgress.done();
      });
    },

    getListPdfFilter() {
      this.loading = true;
      this.arrayPdf = [];
      NProgress.start()
      axios.post('/admin/pdf/filter', {
        month:this.month,
        year:this.year,
        _token:$('meta[name="csrf-token"]').attr('content')
      }).
      then( (response) => {
        this.arrayPdf = response.data;
        this.loading = false;
        NProgress.done();
      })
      .catch(error => {
        this.loading = false;
        NProgress.done();
      });
    },

    cancelFilter() {
      this.getListPdf();
    },

    success(file, response) {
      this.attachedFile = response.pdf;
      $(file.previewElement).find(".dz-image img").attr("src", "/assets/images/brands/pdf-logo.jpg");
    },

    createPdf(){
      NProgress.start();
      $("#buttonUpload").prop( "disabled", true );
      
      var url = this.idEdit != '' ? '/admin/pdf/edit/'+this.idEdit : '/admin/pdf/create';
      axios.post(url, {
        title:this.title,
        desc:this.description,
        date:this.date,
        visibility:this.checkedPlans,
        file:this.attachedFile,
        id:this.idEdit,
        _token:$('meta[name="csrf-token"]').attr('content')
      }).
      then( (response) => {
        $("#buttonUpload").prop( "disabled", false );
        this.arrayPdf = [];
        this.loading = true;
        this.getListPdf();
        var alert = this.idEdit != '' ? this.alertNotifications('success', 'Update PDF successfully') : this.alertNotifications('success', 'Create PDF successfully');
        this.closeCreatePdf();
      })
      .catch(error => {
        if (error.response.status == 422){
          var e = error.response.data.errors;
          this.errorTitle = e.title;
          this.errorDescription = e.desc;
          this.errorDate = e.date;
          this.errorcheckedPlans = e.visibility;
          this.errorAttachedFile = e.file;
          this.alertNotifications('error', 'Please fill in the fields PDF');
        }
        NProgress.done();
        $("#buttonUpload").prop( "disabled", false );
      });
    },

    showCreatePdf() {
      $('#bs-Upload-Pdf').prop( "style", 'display:block; overflow-y:auto' );
      $('body').prop( "style", 'overflow-y:hidden' );
      $('#opacity').prop( "class", 'modal-backdrop fade show' );
    },

    closeCreatePdf() {
      $('#bs-Upload-Pdf').prop( "style", '' );
      $('body').prop( "style", '' );
      $('#opacity').prop( "class", '' );
      this.clearInputs();
      this.clearErrors();
    },

    showEditPdf(n) {
      var self = this;
      this.title = n.title;
      this.description = n.desc;
      this.date = n.date.substr(0, 10);
      this.attachedFile = n.file;
      this.idEdit = n.id;

      let plans = [];

      var str = n.visibility;
      var res = str.split(",");
      if(res[0] == 'free' || res[1] == 'free' || res[2] == 'free') {
        $('#free').prop( "checked", true );
        plans.push('free');
      }
      if(res[0] == 'pro' || res[1] == 'pro' || res[2] == 'pro') {
        $('#pro').prop( "checked", true );
        plans.push('pro');
      }
      if(res[0] == 'expert' || res[1] == 'expert' || res[2] == 'expert') {
        $('#expert').prop( "checked", true );
        plans.push('expert');
      }

      this.checkedPlans = plans;

      var xhr = new XMLHttpRequest();
      xhr.open('HEAD', "/assets/files/pdf/"+n.file, true);
      xhr.onreadystatechange = function(){
        if ( xhr.readyState == 4 ) {
          if ( xhr.status == 200 ) {
            var iSize = xhr.getResponseHeader('Content-Length');
            var file = { size: iSize, name: n.file, type: "application/pdf" };
            var url = APP_URL+"/assets/files/pdf/"+n.file;
            self.$refs.myVueDropzone.manuallyAddFile(file, url);
            self.showCreatePdf();
          } else {
            
          }
        }
      };
      xhr.send(null);
    },

    removePdf(id){
      NProgress.start()
      $("#buttonDeletePdf_"+id).prop( "disabled", true );
      
      axios.post('/admin/pdf/delete', {
        id:id,
        _token:$('meta[name="csrf-token"]').attr('content')
      }).
      then( (response) => {
        this.getListPdf();
        $('#closeModalDelete_'+id).click();
        this.alertNotifications('success', 'Delete PDF successfully');
      })
      .catch(error => {
        console.log(error.response.data.errors);
        $("#buttonDeletePdf_"+id).prop( "disabled", false );
        NProgress.done();
      });
    },

    clearInputs() {
      this.title='';
      this.description='';
      this.date='';
      this.checkedPlans=[];
      this.attachedFile='';
      this.idEdit=0;
      this.checkPlan1='';
      this.checkPlan2='';
      this.checkPlan3='';
      this.$refs.myVueDropzone.removeAllFiles();
      $('#formCreatePdf').trigger("reset");
    },

    clearErrors() {
      this.errorTitle = '';
      this.errorDescription = '';
      this.errorDate = '';
      this.errorcheckedPlans = '';
      this.errorAttachedFile = '';
    },

    numberPdf() {
      setTimeout(() => {
        this.getListPdf();
      }, 5000);
    },

    alertNotifications(type, message){
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": 300,
        "hideDuration": 1000,
        "timeOut": 5000,
        "extendedTimeOut": 1000,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
      toastr[type](message);
    },
  },
  mounted() {
    VueEvent.$on('pdfNotifications', (text) => {
      this.numberPdf();
    });

    var date = new Date();
    var m = date.getMonth() + 1;
    var y = date.getFullYear();
    this.month = m;
    this.year = y;
  },

  created() {
    this.getListPdf();
  },

  beforeDestroy() {
    VueEvent.$off('pdfNotifications')
  }

}
</script>