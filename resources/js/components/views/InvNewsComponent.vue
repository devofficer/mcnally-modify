<template>
  <div>
    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
          <h4 class="mb-0 font-size-18">INVESTMENTS NEWS</h4> 
        </div>
        
        <!--  Modal content for the above example -->
        <div class="modal bs-Upload-New" id="bs-Upload-New" tabindex="-1" role="dialog" aria-labelledby="UploadNew" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="closeCreateNew">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h4 class="card-title mb-4">Upload News</h4>
                <form id="formCreateNew" @submit.prevent="createNew()">
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
                    <label for="subtitle" class="col-form-label col-lg-2">Subtitle</label>
                    <div class="col-lg-10">
                      <input id="subtitle" v-model="subtitle" type="text" class="form-control" placeholder="Enter subtitle..." required="">
                      <div v-if="errorSubtitle">
                        <p v-for="(value, key, index) in errorSubtitle" class="error-message" style="color: #d9534f;font-size: 12px;margin-bottom: 0px;">
                          {{ value }}
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label for="elm1" class="col-form-label col-lg-2">Description</label>
                    <div class="col-lg-10">
                      <editor
                        tinymce-script-src="/assets/libs/tinymce/tinymce.min.js"
                        v-model="description"
                        :init="{
                          height: 300,
                          plugins: [
                          'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                          'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                          'save table contextmenu directionality emoticons template paste textcolor'
                          ],
                          toolbar:
                           'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | print preview media fullpage | forecolor backcolor emoticons',
                          branding: false
                        }"
                      />
                      <div v-if="errorDescription">
                        <p v-for="(value, key, index) in errorDescription" class="error-message" style="color: #d9534f;font-size: 12px;margin-bottom: 0px;">
                          {{ value }}
                        </p>
                      </div>
                    </div>
                  </div>


                  <div class="form-group row mb-4">
                    <label for="date" class="col-form-label col-lg-2">Images for description</label>
                    <div class="col-lg-10">
                      
                      <div class="row">
                        <div v-show="iDesc1 != ''" class="col-md-2">
                          <img :src="iDesc1" style="width: 100%">
                          <p style="text-align: center;margin-bottom: 5px;">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="removeLinkImg('1')"><i class="mdi mdi-unlink"></i> Remove Link </button>
                          </p>
                          <p style="text-align: center;">
                            <input type="hidden" :value="iDesc1" id="linkImg1">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="copyLinkImg('1')" id="spanCopyLink1"><i class="mdi mdi-link"></i> Copy Link </button>
                          </p>
                        </div>

                        <div v-show="iDesc2 != ''" class="col-md-2">
                          <img :src="iDesc2" style="width: 100%">
                          <p style="text-align: center;margin-bottom: 5px;">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="removeLinkImg('2')"><i class="mdi mdi-unlink"></i> Remove Link </button>
                          </p>
                          <p style="text-align: center;">
                            <input type="hidden" :value="iDesc2" id="linkImg2">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="copyLinkImg('2')" id="spanCopyLink2"><i class="mdi mdi-link"></i> Copy Link </button>
                          </p>
                        </div>

                        <div v-show="iDesc3 != ''" class="col-md-2">
                          <img :src="iDesc3" style="width: 100%">
                          <p style="text-align: center;margin-bottom: 5px;">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="removeLinkImg('3')"><i class="mdi mdi-unlink"></i> Remove Link </button>
                          </p>
                          <p style="text-align: center;">
                            <input type="hidden" :value="iDesc3" id="linkImg1">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="copyLinkImg('3')" id="spanCopyLink3"><i class="mdi mdi-link"></i> Copy Link </button>
                          </p>
                        </div>

                        <div v-show="iDesc4 != ''" class="col-md-2">
                          <img :src="iDesc4" style="width: 100%">
                          <p style="text-align: center;margin-bottom: 5px;">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="removeLinkImg('4')"><i class="mdi mdi-unlink"></i> Remove Link </button>
                          </p>
                          <p style="text-align: center;">
                            <input type="hidden" :value="iDesc4" id="linkImg4">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="copyLinkImg('4')" id="spanCopyLink4"><i class="mdi mdi-link"></i> Copy Link </button>
                          </p>
                        </div>

                        <div v-show="iDesc5 != ''" class="col-md-2">
                          <img :src="iDesc5" style="width: 100%">
                          <p style="text-align: center;margin-bottom: 5px;">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="removeLinkImg('5')"><i class="mdi mdi-unlink"></i> Remove Link </button>
                          </p>
                          <p style="text-align: center;">
                            <input type="hidden" :value="iDesc5" id="linkImg5">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="copyLinkImg('5')" id="spanCopyLink5"><i class="mdi mdi-link"></i> Copy Link </button>
                          </p>
                        </div>

                        <div v-show="iDesc6 != ''" class="col-md-2">
                          <img :src="iDesc6" style="width: 100%">
                          <p style="text-align: center;margin-bottom: 5px;">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="removeLinkImg('6')"><i class="mdi mdi-unlink"></i> Remove Link </button>
                          </p>
                          <p style="text-align: center;">
                            <input type="hidden" :value="iDesc6" id="linkImg6">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="copyLinkImg('6')" id="spanCopyLink6"><i class="mdi mdi-link"></i> Copy Link </button>
                          </p>
                        </div>

                        <div v-show="iDesc7 != ''" class="col-md-2">
                          <img :src="iDesc7" style="width: 100%">
                          <p style="text-align: center;margin-bottom: 5px;">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="removeLinkImg('7')"><i class="mdi mdi-unlink"></i> Remove Link </button>
                          </p>
                          <p style="text-align: center;">
                            <input type="hidden" :value="iDesc7" id="linkImg7">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="copyLinkImg('7')" id="spanCopyLink7"><i class="mdi mdi-link"></i> Copy Link </button>
                          </p>
                        </div>

                        <div v-show="iDesc8 != ''" class="col-md-2">
                          <img :src="iDesc8" style="width: 100%">
                          <p style="text-align: center;margin-bottom: 5px;">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="removeLinkImg('8')"><i class="mdi mdi-unlink"></i> Remove Link </button>
                          </p>
                          <p style="text-align: center;">
                            <input type="hidden" :value="iDesc8" id="linkImg8">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="copyLinkImg('8')" id="spanCopyLink8"><i class="mdi mdi-link"></i> Copy Link </button>
                          </p>
                        </div>

                        <div v-show="iDesc9 != ''" class="col-md-2">
                          <img :src="iDesc9" style="width: 100%">
                          <p style="text-align: center;margin-bottom: 5px;">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="removeLinkImg('9')"><i class="mdi mdi-unlink"></i> Remove Link </button>
                          </p>
                          <p style="text-align: center;">
                            <input type="hidden" :value="iDesc9" id="linkImg9">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="copyLinkImg('9')" id="spanCopyLink9"><i class="mdi mdi-link"></i> Copy Link </button>
                          </p>
                        </div>

                        <div v-show="iDesc10 != ''" class="col-md-2">
                          <img :src="iDesc10" style="width: 100%">
                          <p style="text-align: center;margin-bottom: 5px;">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="removeLinkImg('10')"><i class="mdi mdi-unlink"></i> Remove Link </button>
                          </p>
                          <p style="text-align: center;">
                            <input type="hidden" :value="iDesc10" id="linkImg10">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="copyLinkImg('10')" id="spanCopyLink10"><i class="mdi mdi-link"></i> Copy Link </button>
                          </p>
                        </div>

                        <div v-show="iDesc11 != ''" class="col-md-2">
                          <img :src="iDesc11" style="width: 100%">
                          <p style="text-align: center;margin-bottom: 5px;">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="removeLinkImg('11')"><i class="mdi mdi-unlink"></i> Remove Link </button>
                          </p>
                          <p style="text-align: center;">
                            <input type="hidden" :value="iDesc11" id="linkImg11">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="copyLinkImg('11')" id="spanCopyLink11"><i class="mdi mdi-link"></i> Copy Link </button>
                          </p>
                        </div>

                        <div v-show="iDesc12 != ''" class="col-md-2">
                          <img :src="iDesc12" style="width: 100%">
                          <p style="text-align: center;margin-bottom: 5px;">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="removeLinkImg('12')"><i class="mdi mdi-unlink"></i> Remove Link </button>
                          </p>
                          <p style="text-align: center;">
                            <input type="hidden" :value="iDesc12" id="linkImg12">
                            <button type="button" class="btn btn-light" style="width: 100%;font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="copyLinkImg('12')" id="spanCopyLink12"><i class="mdi mdi-link"></i> Copy Link </button>
                          </p>
                        </div>

                        <div v-show="iDesc12 == ''" class="col-md-2">
                          <label for="fileinput" style="width: 100%;">
                            <input style="display: none;" type="file" id="fileinput" name="fileinput" @change="uploadIDesc">
                            <span class="btn btn-secondary" style="width: 100%"><i class="mdi mdi-plus"></i></span>
                          </label>
                        </div>

                      </div>

                    </div>
                  </div>


                  <div class="form-group row mb-4">
                    <label for="date" class="col-form-label col-lg-2">Research Date</label>
                    <div class="col-lg-10">
                      <div class="input-daterange input-group" data-provide="datepicker" data-date-format="dd M, yyyy" data-date-autoclose="true">
                        <input id="date" type="date" v-model="date" class="form-control" placeholder="Date" form="formCreateNew" required=""/>
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
                </form>
                <div class="row mb-4">
                  <label class="col-form-label col-lg-2">Principal Image</label>
                  <div class="col-lg-10">
                    <vue-dropzone id="drop1" :options="dropOptions" @vdropzone-success="success" ref="myVueDropzone"></vue-dropzone>
                    <div v-if="errorIPrincipal">
                      <p v-for="(value, key, index) in errorIPrincipal" class="error-message" style="color: #d9534f;font-size: 12px;margin-bottom: 0px;">
                        {{ value }}
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row mb-4">
                  <label for="epigraph" class="col-form-label col-lg-2 mt-3">Epigraph</label>
                  <div class="col-lg-10 mt-4">
                    <input v-model="epigraph" form="formCreateNew" id="epigraph" type="text" class="form-control" placeholder="Enter epigraph..." required="">
                    <div v-if="errorEpigraph">
                      <p v-for="(value, key, index) in errorEpigraph" class="error-message" style="color: #d9534f;font-size: 12px;margin-bottom: 0px;">
                        {{ value }}
                      </p>
                    </div>
                  </div>
                </div>

                <div class="row justify-content-left">
                  <div class="col-lg-10">
                    <button type="button" class="btn btn-secondary" @click="closeCreateNew">Close</button>
                    <button type="submit" class="btn btn-primary" form="formCreateNew" id="buttonUpload">Upload News</button>
                  </div>
                </div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
      </div>
    </div>

    <div class="row" style="margin-bottom:30px">

      <div class="col-8 mb-4">
        <h5>Filter</h5>
        <span class="editable-container editable-inline" style="">
          <div>
            <div class="editableform-loading" style="display: none;"></div>
            <form class="form-inline editableform" style="" @submit.prevent="getListNewsFilter()">
              <div class="control-group form-group">
                <div>
                  <div class="editable-input">
                    <input type="text" style="display: none;">
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
                      </select>&nbsp;/&nbsp;
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
        <button type="button" class="btn btn-primary waves-effect waves-light" @click="showCreateNew">Upload New</button>
      </div>
    </div>

    <div class="row"> 
        <div v-for="n in arrayNews" :key="`card-${n.id}`" class="col-lg-4">
          <div class="card">            
            <img :id="`imgPrincipal-${n.id}`" class="img-fluid d-block m-l-none" :src="`/assets/images/newsprin/${n.image}`" alt="Card image cap" data-toggle="modal" :data-target="`.bs-new-${n.id}`" style="width: 100%;height: 220px;">
            <div class="card-body">
              <h4 class="card-title mt-0" data-toggle="modal" :data-target="`.bs-new-${n.id}`">{{ n.title }}</h4>
              <p class="card-text" data-toggle="modal" :data-target="`.bs-new-${n.id}`">
                {{ n.subtitle.substr(0, 130) }}
              </p>
              <p class="card-text">
                <small class="text-muted">{{ n.date.substr(0, 10) }}</small>

                <span style="float: right;">
                  <button type="button" class="btn btn-light" style="font-size: 11px;padding-top: 2px;padding-bottom: 2px;" @click="showEditNew(n)"> Edit </button>
                  
                  <button type="button" class="btn btn-light" style="font-size: 11px;padding-top: 2px;padding-bottom: 2px;margin-left: 5px" data-toggle="modal" :data-target="`#removeCard_${n.id}`"><i class="icon-squared-cross"></i> Remove </button>
                  <!-- sample modal content -->
                  <div :id="`removeCard_${n.id}`" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title mt-0" id="myModalLabel">Remove New</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="form-group row mb-2">
                            <label for="title" class="col-form-label col-lg-12">Confirm you want to remove this New: <span class="d-block">{{ n.title }}</span></label>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" :id="`closeModalDelete_${n.id}`" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                          <button type="button" :id="`buttonDeleteNew_${n.id}`" class="btn btn-danger waves-effect waves-light" @click="removeNew(n.id)">Remove New</button>
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

        <div v-if="!arrayNews.length && !loading" class="col-lg-12 text-center">
          <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> There aren't records</div>
        </div>


          
        <!--  Modal content for the above example -->
        <div v-for="n in arrayNews" :key="`modal-${n.id}`" :class="`modal fade bs-new-${n.id}`" tabindex="-1" role="dialog" aria-labelledby="New" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title mt-0" id="New">{{ n.title }}</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <!--<h5 class="modal-body">prueba</h5>-->
              <div class="modal-body">
                <p>{{ n.subtitle }}.</p>
                <div class="body">    
                  <img class="img-fluid" :src="`/assets/images/newsprin/${n.image}`" alt="Card image cap">
                  <figcaption class="text-muted mb-5">{{ n.epigraph }}</figcaption>
                </div>   
                <div v-html="n.description"></div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

      
    </div>
    <!-- end row -->
    <div id="opacity"></div>



  </div>
</template>
<script>
import vueDropzone from "vue2-dropzone";
import Editor from '@tinymce/tinymce-vue'

export default {
  data() {
    return {
      arrayNews:[],
      title:'',
      subtitle:'',
      description:'',
      iDesc1:'',
      iDesc2:'',
      iDesc3:'',
      iDesc4:'',
      iDesc5:'',
      iDesc6:'',
      iDesc7:'',
      iDesc8:'',
      iDesc9:'',
      iDesc10:'',
      iDesc11:'',
      iDesc12:'',
      date:'',
      checkedPlans:[],
      iPrincipal:'',
      epigraph:'',
      idEdit:'',
      dropOptions: {
        url: "/admin/news/imgprin",
        maxFilesize: 2, // MB
        maxFiles: 1,
        thumbnailWidth: 150, // px
        thumbnailHeight: 150,
        addRemoveLinks: true,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
        },
        params: {
          _token:$('meta[name="csrf-token"]').attr('content')
        },
      },
      erroriDesc:'',
      errorTitle:'',
      errorSubtitle:'',
      errorDescription:'',
      errorDate:'',
      errorcheckedPlans:'',
      errorIPrincipal:'',
      errorEpigraph:'',
      month:'',
      year:'',
      loading:true,
    }
  },

  components: {
    Editor,
    vueDropzone
  },

  methods: {
    getListNews() {
      NProgress.start()
      axios.get('/admin/news')
      .then( (response) => {
        this.arrayNews = response.data;
        this.loading = false;
        NProgress.done();
      })
      .catch(error => {
        NProgress.done();
      });
    },

    getListNewsFilter() {
      this.loading = true;
      this.arrayNews = [];
      NProgress.start()
      axios.post('/admin/news/filter', {
        month:this.month,
        year:this.year,
        _token:$('meta[name="csrf-token"]').attr('content')
      }).
      then( (response) => {
        this.arrayNews = response.data;
        this.loading = false;
        NProgress.done();
      })
      .catch(error => {
        this.loading = false;
        NProgress.done();
      });
    },

    cancelFilter() {
      this.getListNews();
    },

    uploadIDesc(e) {
      NProgress.start()

      var input = document.getElementById('fileinput');

      var data = new FormData()
      data.append('file', input.files[0])
      data.append('_token', $('meta[name="csrf-token"]').attr('content') )

      fetch('/admin/news/imgdesc', {
        method: 'POST',
        body: data
      }).then((response) => {
        return response.json();
      }).then((response) => {

        this.showIDesc(response.image);
        
        NProgress.done();
        this.alertNotifications('success', 'Updated Image successfully');
      }).catch(error => {
        if (error.response.status == 422){
          var e = error.response.errors;
          this.erroriDesc = e.file;
          this.alertNotifications('error', 'Please fill in the fields image');
        }
        NProgress.done();
      });

      /*let formData = new FormData();
      formData.append('avatar', e.target.files[0]);
      formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

      axios.post('/admin/news/imgdesc',
        formData,
        {
          headers: {'Content-Type': 'multipart/form-data',}
        }
      ).then((response) => {

        this.showIDesc(response.data.image);
        
        NProgress.done();
        this.alertNotifications('success', 'Updated Image successfully');
      })
      .catch(error => {
        if (error.response.status == 422){
          var e = error.response.data.errors;
          this.erroriDesc = e.avatar;
          this.alertNotifications('error', 'Please fill in the fields image');
        }
        NProgress.done();
      });*/
    },

    showIDesc(image) {
      if (this.iDesc1 == '') {
        this.iDesc1 = APP_URL+'/assets/images/newsdesc/'+image;
        return;
      }
      if (this.iDesc2 == '') {
        this.iDesc2 = APP_URL+'/assets/images/newsdesc/'+image;
        return;
      }
      if (this.iDesc3 == '') {
        this.iDesc3 = APP_URL+'/assets/images/newsdesc/'+image;
        return;
      }
      if (this.iDesc4 == '') {
        this.iDesc4 = APP_URL+'/assets/images/newsdesc/'+image;
        return;
      }
      if (this.iDesc5 == '') {
        this.iDesc5 = APP_URL+'/assets/images/newsdesc/'+image;
        return;
      }
      if (this.iDesc6 == '') {
        this.iDesc6 = APP_URL+'/assets/images/newsdesc/'+image;
        return;
      }
      if (this.iDesc7 == '') {
        this.iDesc7 = APP_URL+'/assets/images/newsdesc/'+image;
        return;
      }
      if (this.iDesc8 == '') {
        this.iDesc8 = APP_URL+'/assets/images/newsdesc/'+image;
        return;
      }
      if (this.iDesc9 == '') {
        this.iDesc9 = APP_URL+'/assets/images/newsdesc/'+image;
        return;
      }
      if (this.iDesc10 == '') {
        this.iDesc10 = APP_URL+'/assets/images/newsdesc/'+image;
        return;
      }
      if (this.iDesc11 == '') {
        this.iDesc11 = APP_URL+'/assets/images/newsdesc/'+image;
        return;
      }
      if (this.iDesc12 == '') {
        this.iDesc12 = APP_URL+'/assets/images/newsdesc/'+image;
        return;
      }
    },

    success(file, response) {
      this.iPrincipal = response.image;
    },

    createNew(){
      NProgress.start();
      $("#buttonUpload").prop( "disabled", true );
      
      var url = this.idEdit != '' ? '/admin/news/edit/'+this.idEdit : '/admin/news/create';
      axios.post(url, {
        title:this.title,
        slug:this.title,
        subtitle:this.subtitle,
        description:this.description,
        date:this.date,
        visibility:this.checkedPlans,
        epigraph:this.epigraph,
        image:this.iPrincipal,
        id:this.idEdit,
        _token:$('meta[name="csrf-token"]').attr('content')
      }).
      then( (response) => {
        $("#buttonUpload").prop( "disabled", false );
        this.getListNews();
        var alert = this.idEdit != '' ? this.alertNotifications('success', 'Update New successfully') : this.alertNotifications('success', 'Create New successfully');
        this.closeCreateNew();
      })
      .catch(error => {
        if (error.response.status == 422){
          var e = error.response.data.errors;
          this.errorTitle = e.title;
          this.errorSubtitle = e.subtitle;
          this.errorDescription = e.description;
          this.errorDate = e.date;
          this.errorcheckedPlans = e.visibility;
          this.errorIPrincipal = e.image;
          this.errorEpigraph = e.epigraph;
          this.alertNotifications('error', 'Please fill in the fields new');
        }
        NProgress.done();
        $("#buttonUpload").prop( "disabled", false );
      });
    },

    showCreateNew() {
      $('#bs-Upload-New').prop( "style", 'display:block; overflow-y:auto' );
      $('body').prop( "style", 'overflow-y:hidden' );
      $('#opacity').prop( "class", 'modal-backdrop fade show' );
    },

    closeCreateNew() {
      $('#bs-Upload-New').prop( "style", '' );
      $('body').prop( "style", '' );
      $('#opacity').prop( "class", '' );
      this.clearInputs();
      this.clearErrors();
    },

    showEditNew(n) {
      var self = this;
      this.title = n.title;
      this.subtitle = n.subtitle;
      this.description = n.description;
      this.date = n.date.substr(0, 10);
      this.iPrincipal = n.image;
      this.epigraph = n.epigraph;
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
      xhr.open('HEAD', "/assets/images/newsprin/"+n.image, true);
      xhr.onreadystatechange = function(){
        if ( xhr.readyState == 4 ) {
          if ( xhr.status == 200 ) {
            var iSize = xhr.getResponseHeader('Content-Length');
            var file = { size: iSize, name: n.image, type: "image/jpeg" };
            var url = APP_URL+"/assets/images/newsprin/"+n.image;
            self.$refs.myVueDropzone.manuallyAddFile(file, url);
            self.showCreateNew();
          } else {
            
          }
        }
      };
      xhr.send(null);
    },

    copyLinkImg(id) {
      $("body").unbind("copy");
      const el = document.createElement('textarea');  
      el.value = $('#linkImg'+id).val(); 
      el.setAttribute('readonly', '');                
      el.style.position = 'absolute';                     
      el.style.left = '-9999px';                      
      document.body.appendChild(el);                  
      const selected =  document.getSelection().rangeCount > 0  ? document.getSelection().getRangeAt(0) : false;                                    
      el.select();                                    
      document.execCommand('copy');
      document.body.removeChild(el);                  
      if (selected) {                                 
        document.getSelection().removeAllRanges();    
        document.getSelection().addRange(selected);   
      }
      
      this.alertNotifications('success', 'Copied to clipboard');
      document.getElementById("spanCopyLink"+id).innerHTML = 'Copied';
      setTimeout(function () {
        document.getElementById("spanCopyLink"+id).innerHTML = '<i class="mdi mdi-link"></i> Copy Link ';
          // Deshabilito la función copiar 
             $('body').on("copy", function(e) { 
          // Muestro un mensaje que no se puede copiar el contenido 
              e.preventDefault();
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
              toastr['error']("can't copy content");
          });
      }, 5000)
    },

    removeLinkImg(id) {
      if (id == '1') {
        this.iDesc1 = '';
      }
      if (id == '2') {
        this.iDesc2 = '';
      }
      if (id == '3') {
        this.iDesc3 = '';
      }
      if (id == '4') {
        this.iDesc4 = '';
      }
      if (id == '5') {
        this.iDesc5 = '';
      }
      if (id == '6') {
        this.iDesc6 = '';
      }
      if (id == '7') {
        this.iDesc7 = '';
      }
      if (id == '8') {
        this.iDesc8 = '';
      }
      if (id == '9') {
        this.iDesc9 = '';
      }
      if (id == '10') {
        this.iDesc10 = '';
      }
      if (id == '11') {
        this.iDesc11 = '';
      }
      if (id == '12') {
        this.iDesc12 = '';
      }
    },

    removeNew(id){
      NProgress.start()
      $("#buttonDeleteNew_"+id).prop( "disabled", true );
      
      axios.post('/admin/news/delete', {
        id:id,
        _token:$('meta[name="csrf-token"]').attr('content')
      }).
      then( (response) => {
        this.getListNews();
        $('#closeModalDelete_'+id).click();
        this.alertNotifications('success', 'Delete New successfully');
      })
      .catch(error => {
        console.log(error.response.data.errors);
        $("#buttonDeleteNew_"+id).prop( "disabled", false );
        NProgress.done();
      });
    },

    clearInputs() {
      this.title='';
      this.subtitle='';
      this.description='';
      this.iDesc1='';
      this.iDesc2='';
      this.iDesc3='';
      this.iDesc4='';
      this.iDesc5='';
      this.iDesc6='';
      this.iDesc7='';
      this.iDesc8='';
      this.iDesc9='';
      this.iDesc10='';
      this.iDesc11='';
      this.iDesc12='';
      this.date='';
      this.checkedPlans=[];
      this.iPrincipal='';
      this.epigraph='';
      this.idEdit=0;
      this.checkPlan1='';
      this.checkPlan2='';
      this.checkPlan3='';
      this.$refs.myVueDropzone.removeAllFiles();
      $('#formCreateNew').trigger("reset");
    },

    clearErrors() {
      this.errorTitle = '';
      this.errorSubtitle = '';
      this.errorDescription = '';
      this.errorDate = '';
      this.errorcheckedPlans = '';
      this.errorIPrincipal = '';
      this.errorEpigraph = '';
    },

    numberNews() {
      setTimeout(() => {
        this.getListNews();
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
    VueEvent.$on('newsNotifications', (text) => {
      this.numberNews();
    });

    var date = new Date();
    var m = date.getMonth() + 1;
    var y = date.getFullYear();
    this.month = m;
    this.year = y;
  },

  created() {
    this.getListNews();
  },

  beforeDestroy() {
    VueEvent.$off('newsNotifications')
  }
}
</script>