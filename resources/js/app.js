/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueIziToast from 'vue-izitoast';
import 'izitoast/dist/css/iziToast.css';
import VueSweetalert2 from 'vue-sweetalert2';
import vue2Dropzone from 'vue2-dropzone';
import 'vue2-dropzone/dist/vue2Dropzone.min.css';
import VueEvent from './event.js';

import VueRouter from 'vue-router';

import AxiosPlugin from 'vue-axios-cors';

window.Vue = require('vue');
window.jQuery = require('jquery');

Vue.use(VueIziToast);
Vue.use(VueSweetalert2);
Vue.use(vue2Dropzone);
Vue.use(AxiosPlugin);

const moment = require('moment');

Vue.use(require('vue-moment'), {
    moment
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('news-card', require('./components/NewsCardComponent.vue').default);
Vue.component('upload-image', require('./components/UploadImageComponent.vue').default);
Vue.component('editor-component', require('./components/EditorComponent.vue').default);
Vue.component('notifications-manager', require('./components/NotificationsComponent.vue').default);
Vue.component('header-vue', require('./components/partials/HeaderComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueRouter)

import App from './components/views/App'
import Hello from './components/views/Hello'
import Home from './components/views/Home'
import Index from './components/views/IndexComponent'
import ProfileSettings from './components/views/ProfileSettingsComponent'
import ComResearch from './components/views/ComResearchComponent'
import InvNews from './components/views/InvNewsComponent'
import Pricing from './components/views/PricingComponent'
import Header from './components/partials/HeaderComponent'
import TopMarketNews from './components/views/TopMarketNewsComponent'
import ComProfile from './components/views/ComProfileComponent'
import RecTrends from './components/views/RecTrendsComponent'
import PriceTar from './components/views/PriceTarComponent'
import EpsSurprice from './components/views/EpsSurpriceComponent'
import BasFinancials from './components/views/BasFinancialsComponent'
import ComNews from './components/views/ComNewsComponent'


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/admin/index',
            name: 'index',
            component: Index
        },
        {
            path: '/admin/profile-settings',
            name: 'profile-settings',
            component: ProfileSettings,
        },
        {
            path: '/admin/com-research',
            name: 'com-research',
            component: ComResearch,
        },
        {
            path: '/admin/inv-news',
            name: 'inv-news',
            component: InvNews,
        },
        {
            path: '/admin/pricing',
            name: 'pricing',
            component: Pricing,
        },
        {
            path: '/admin/top-market-news',
            name: 'top-market-news',
            component: TopMarketNews,
        },
        {
            path: '/admin/com-profile',
            name: 'com-profile',
            component: ComProfile,
        },
        {
            path: '/admin/rec-trends',
            name: 'rec-trends',
            component: RecTrends,
        },
        {
            path: '/admin/price-tar',
            name: 'price-tar',
            component: PriceTar,
        },
        {
            path: '/admin/eps-surprice',
            name: 'eps-surprice',
            component: EpsSurprice,
        },
        {
            path: '/admin/bas-financials',
            name: 'bas-financials',
            component: BasFinancials,
        },
        {
            path: '/admin/com-news',
            name: 'com-news',
            component: ComNews,
        },
    ],
});

router.beforeResolve((to, from, next) => {
  // If this isn't an initial page load.
  if (to.name) {
      // Start the route progress bar.
      NProgress.start()
  }
  next()
})

router.afterEach((to, from) => {
  // Complete the animation of the route progress bar.
  setTimeout(() => NProgress.done(), 900)
})

if (document.getElementById("app")) {
    const app = new Vue({
    el: '#app',
    components: { App },
    router,
    mounted: function () {
    },
    methods: {
    }
  });
}



if (document.getElementById("pdf")) {
    const vmPdf = new Vue({
        el: '#pdf',
        components: {
            vueDropzone: vue2Dropzone
        },
        data: {
            loading: false,
            file_model: {},
            file_listing: [],
            file_url: '',
            visibility: [],
            visibility_error: '',
            errors: [],
            id_file: '',
            title: '',
            title_error: '',
            desc: '',
            desc_error: '',
            date: '',
            date_error: '',
            filename: '',
            file_error: '',
            filter: {
              month: '',
              year: '',
            },
            edit: false,
            notificationSystem: {
              options: {
                success: {
                    position: "topRight",
                    timeout: 3000,
                },
                error: {
                    position: "topRight",
                    timeout: 4000,
                },
                completed: {
                    position: 'center',
                    timeout: 1000,
                },
                info: {
                    overlay: true,
                    zindex: 999,
                    position: 'center',
                    timeout: 3000,
                    class: 'info_notification',
                    onClosing: function (instance, toast, closedBy) {
                      vmPdf.showCompleted("Successful process");
                    }
                }
              }
            },
            dropzoneOptions: {
                url: '',
                maxFiles: 1,
                thumbnailWidth: 200,
                addRemoveLinks: true,
                acceptedFiles: '',
                dictDefaultMessage: "<i class='fa fa-cloud-upload-alt fa-lg'></i><br>LOAD FILE",
                headers: {
                  'x-csrf-token': jQuery('meta[name=csrf-token]').prop('content'),
                }
            },
        },
        created: function(){
          this.dropzoneOptions.url = this.getUrl();
          this.dropzoneOptions.acceptedFiles = this.getAcceptedFiles();
        },
        mounted: function(){
          console.log("PDF Manager mounted");

          if (document.getElementsByClassName('file-listing')) {
            this.getPdfFiles();
          }
          if (document.getElementsByClassName('edit-file').length) {
            this.editFile();
          }
        },
        methods: {
          showCompleted(message) {
              return this.$toast.success(' ', message, this.notificationSystem.options.completed);
          },
          showInfo(message) {
              return this.$toast.info(' ', message, this.notificationSystem.options.info);
          },
          showMessage(message) {
              return this.$toast.success(' ', message, this.notificationSystem.options.success);
          },
          showError(error) {
              return this.$toast.error(' ', error, this.notificationSystem.options.error);
          },
          getUrl() {
            return APP_URL + '/upload-temp-file';
          },
          getAcceptedFiles(){
            return 'application/pdf';
          },
          addedFile: function(file){
            var maxFiles = this.$refs.pdfDropzone.options.maxFiles;
            var count = $('.hidden-file').length;
            if (count <= maxFiles || this.edit) {
              jQuery(file.previewElement).find(".dz-image img").attr("src", APP_URL+"/images/pdf.png");
              this.filename = file.name;
            }
          },
          removedFile: function(file, error, xhr){
            if (!file.name) { return; }

            this.filename = '';

            let form_data = new FormData();
            form_data.append('name', file.name);
            axios.post(APP_URL + '/delete-temp-file', form_data)
              .catch(function (error) {
                  console.error(error);
              });
          },
          maxFilesExceeded: function(file){
            var maxFiles = this.$refs.pdfDropzone.options.maxFiles;
            var count = $('.hidden-file').length;
            if (count >= maxFiles) {
              this.showError("File has been rejected because the number of files exceeds the limit.");
              this.$refs.pdfDropzone.removeFile(file);
            }
          },
          failedUpload:function(file, message, xhr){
            if (file.type != this.$refs.pdfDropzone.options.acceptedFiles) {
              this.$refs.pdfDropzone.removeFile(file);
              this.showError(message);
              var media_id = this.$refs.pdfDropzone.id;
              this.filename = '';
            }
          },
          removeError: function(field){
            var pos = this.errors.indexOf(field);
            this.errors.splice(pos, 1);
          },
          hasError: function(field){
            return (this.errors.indexOf(field) > -1);
          },
          submitFormPdf: function () {
            var self = this;
            self.errors = [];
            self.loading = true;
            var upload_data = document.getElementById('formUploadPdf');
            let form_data = new FormData(upload_data);
            axios.post(APP_URL + '/admin/file-manager/store-pdf', form_data).then(function (response) {
                self.loading = false;
                if (response.data.type == 'success') {
                    self.showInfo(response.data.message);
                    // clear fields
                    self.title = '';
                    self.desc = '';
                    self.visibility = [];
                    self.$refs.pdfDropzone.removeAllFiles();
                    jQuery('#date').val('');
                } else if (response.data.type == 'error') {
                    self.showError(response.data.message);
                }
            })
            .catch(function (error) {
                self.loading = false;

                if (error.response.data.errors.title) {
                  self.errors.push('title');
                  self.title_error = error.response.data.errors.title[0];
                }
                if (error.response.data.errors.desc) {
                  self.errors.push('desc');
                  self.desc_error = error.response.data.errors.desc[0];
                }
                if (error.response.data.errors.date) {
                  self.errors.push('date');
                  self.date_error = error.response.data.errors.date[0];
                }
                if (error.response.data.errors.visibility) {
                  self.errors.push('visibility');
                  self.visibility_error = error.response.data.errors.visibility[0];
                }
                if (error.response.data.errors.pdf_file) {
                  self.errors.push('file');
                  self.file_error = error.response.data.errors.pdf_file[0];
                }
            });
          },
          submitFilter: function() {
            let self = this;
            self.loading = true;
            self.file_listing = [];
            var filter_data = document.getElementById('filterPdf');
            let form_data = new FormData(filter_data);
            axios.post(APP_URL + '/admin/file-manager/get-files', form_data).then(function (response) {
                self.loading = false;
                if (response.data.count > 0) {
                  self.file_listing = response.data.files;
                }
            });
          },
          clearFilter: function () {
              this.filter.year = '';
              this.filter.month = '';
              this.getPdfFiles();
          },
          getPdfFiles: function () {
              let self = this;
              self.loading = true;
              self.file_listing = [];
              axios.post(APP_URL + '/admin/file-manager/get-files')
                  .then(function (response) {
                    self.loading = false;
                    if (response.data.count > 0) {
                      self.file_listing = response.data.files;
                    }
                  });
          },
          showFile: function (url) {
              this.file_url = url;
              jQuery('#ModalScrollable').modal('show');
          },
          clearFile: function () {
              this.file_url = '';
          },
          getLinkEdit: function (id) {
              return APP_URL + '/admin/pdf-upload/'+id;
          },
          editFile: function editFile() {
          	this.edit = true;
            this.file_model = $('#pdf').data('file');
            this.id_file = this.file_model.id;
            this.title = this.file_model.title;
            this.desc = this.file_model.desc;
            this.visibility = this.file_model.visibility;
            $('#date').val(this.file_model.date_str);

            if (this.file_model.file) {
              var mockFile = this.file_model.file;
              this.filename = mockFile.name;

              var pdfDropzone = this.$refs.pdfDropzone;
              pdfDropzone.manuallyAddFile(mockFile, mockFile.url);
            }
          },
          submitUpdatePdf: function () {
            var self = this;
            self.errors = [];
            self.loading = true;
            var upload_data = document.getElementById('formUploadPdf');
            let form_data = new FormData(upload_data);
            axios.post(APP_URL + '/admin/file-manager/update-pdf', form_data)
              .then(function (response) {
                  self.loading = false;
                  if (response.data.type == 'success') {
                      self.showInfo(response.data.message);
                  } else if (response.data.type == 'error') {
                      self.showError(response.data.message);
                  }
              })
              .catch(function (error) {
                  self.loading = false;

                  if (error.response.data.errors.title) {
                    self.errors.push('title');
                    self.title_error = error.response.data.errors.title[0];
                  }
                  if (error.response.data.errors.desc) {
                    self.errors.push('desc');
                    self.desc_error = error.response.data.errors.desc[0];
                  }
                  if (error.response.data.errors.date) {
                    self.errors.push('date');
                    self.date_error = error.response.data.errors.date[0];
                  }
                  if (error.response.data.errors.visibility) {
                    self.errors.push('visibility');
                    self.visibility_error = error.response.data.errors.visibility[0];
                  }
                  if (error.response.data.errors.pdf_file) {
                    self.errors.push('file');
                    self.file_error = error.response.data.errors.pdf_file[0];
                  }
              });
          },
          deleteFile: function (id) {
            var self = this;
            this.$swal({
                title: "Do you want delete this pdf?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                closeOnConfirm: true,
                closeOnCancel: true
            }).then((result) => {
                if (result.value) {
                    self.loading = true;

                    let form_data = new FormData();
                    form_data.append('id', id);
                    axios.post(APP_URL + '/admin/file-manager/delete-pdf', form_data)
                      .then(function (response) {
                          self.loading = false;
                          if (response.data.type == 'success') {
                              self.showInfo(response.data.message);
                              self.getPdfFiles();
                          } else if (response.data.type == 'error') {
                              self.showError(response.data.message);
                          }
                      })
                      .catch(function (error) {
                          self.loading = false;
                          self.showError(error.message);
                      });
                } else {
                    this.$swal.close()
                }
            });
          },
        }
    });
}

(function ($) {

    'use strict';

    function initMetisMenu() {
        //metis menu
        $("#side-menu").metisMenu();
    }

    function initLeftMenuCollapse() {
        $('#vertical-menu-btn').on('click', function (event) {
            event.preventDefault();
            $('body').toggleClass('sidebar-enable');
            if ($(window).width() >= 992) {
                $('body').toggleClass('vertical-collpsed');
            } else {
                $('body').removeClass('vertical-collpsed');
            }
        });
    }

    function initActiveMenu() {
        // === following js will activate the menu in left side bar based on url ====
        $("#sidebar-menu a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).addClass("active");
                $(this).parent().addClass("mm-active"); // add active to li of the current link
                $(this).parent().parent().addClass("mm-show");
                $(this).parent().parent().prev().addClass("mm-active"); // add active class to an anchor
                $(this).parent().parent().parent().addClass("mm-active");
                $(this).parent().parent().parent().parent().addClass("mm-show"); // add active to li of the current link
                $(this).parent().parent().parent().parent().parent().addClass("mm-active");
            }
        });
    }

    function initMenuItem() {
        $(".navbar-nav a").each(function () {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).addClass("active");
                $(this).parent().addClass("active");
                $(this).parent().parent().addClass("active");
                $(this).parent().parent().parent().addClass("active");
                $(this).parent().parent().parent().parent().addClass("active");
                $(this).parent().parent().parent().parent().parent().addClass("active");
            }
        });
    }

    function initFullScreen() {
        $('[data-toggle="fullscreen"]').on("click", function (e) {
            e.preventDefault();
            $('body').toggleClass('fullscreen-enable');
            if (!document.fullscreenElement && /* alternative standard method */ !document.mozFullScreenElement && !document.webkitFullscreenElement) {  // current working methods
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.cancelFullScreen) {
                    document.cancelFullScreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitCancelFullScreen) {
                    document.webkitCancelFullScreen();
                }
            }
        });
        document.addEventListener('fullscreenchange', exitHandler );
        document.addEventListener("webkitfullscreenchange", exitHandler);
        document.addEventListener("mozfullscreenchange", exitHandler);
        function exitHandler() {
            if (!document.webkitIsFullScreen && !document.mozFullScreen && !document.msFullscreenElement) {
                console.log('pressed');
                $('body').removeClass('fullscreen-enable');
            }
        }
    }

    function initRightSidebar() {
        // right side-bar toggle
        $('.right-bar-toggle').on('click', function (e) {
            $('body').toggleClass('right-bar-enabled');
        });

        $(document).on('click', 'body', function (e) {
            if ($(e.target).closest('.right-bar-toggle, .right-bar').length > 0) {
                return;
            }

            $('body').removeClass('right-bar-enabled');
            return;
        });
    }

    function initDropdownMenu() {
        $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
            if (!$(this).next().hasClass('show')) {
              $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
            }
            var $subMenu = $(this).next(".dropdown-menu");
            $subMenu.toggleClass('show');
            return false;
        });
    }

    function initComponents() {
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    }

    function initPreloader() {
        $(window).on('load', function() {
            $('#status').fadeOut();
            $('#preloader').delay(350).fadeOut('slow');
        });
    }

    function initSettings() {
        if (window.sessionStorage) {
            var alreadyVisited = sessionStorage.getItem("is_visited");
            if (!alreadyVisited) {
                sessionStorage.setItem("is_visited", "dark-mode-switch");
                updateThemeSetting(false, true, true);
            } else {
                $(".right-bar input:checkbox").prop('checked', false);
                $("#"+alreadyVisited).prop('checked', true);
                $("#"+alreadyVisited).trigger("change");
                if(alreadyVisited === "dark-mode-switch") {
                    updateThemeSetting(false, true, true);
                } else if(alreadyVisited === "light-mode-switch") {
                    updateThemeSetting(true, false, true);
                } else if(alreadyVisited === "rtl-mode-switch") {
                    updateThemeSetting(false, true, false);
                }
            }
        }

        $("#light-mode-switch, #dark-mode-switch, #rtl-mode-switch").on("change", function(e) {
            if(e.target.id === "light-mode-switch" && $(this).prop("checked")) {
                $("#dark-mode-switch").prop("checked", false);
                $("#rtl-mode-switch").prop("checked", false);
                updateThemeSetting(false, true, true);
                sessionStorage.setItem("is_visited", e.target.id);
            } else if(e.target.id === "dark-mode-switch" && $(this).prop("checked")) {
                $("#light-mode-switch").prop("checked", false);
                $("#rtl-mode-switch").prop("checked", false);
                updateThemeSetting(true, false, true);
                sessionStorage.setItem("is_visited", e.target.id);
            } else if(e.target.id === "rtl-mode-switch" && $(this).prop("checked")) {
                $("#dark-mode-switch").prop("checked", false);
                $("#light-mode-switch").prop("checked", false);
                updateThemeSetting(false, true, false);
                sessionStorage.setItem("is_visited", e.target.id);
            }
        });
    }

    function updateThemeSetting(light, dark, rtl) {
        $("#bootstrap-light").prop("disabled", light);
        $("#bootstrap-dark").prop("disabled", dark);
        $("#app-light").prop("disabled", (rtl) ? light : true);
        $("#app-dark").prop("disabled", dark);
        $("#app-rtl").prop("disabled", rtl);
    }

    function init() {
        jQuery(document).ready(function () {
          initMetisMenu();
          initDropdownMenu();
        });
        initLeftMenuCollapse();
        initActiveMenu();
        initMenuItem();
        initFullScreen();
        initRightSidebar();
        initComponents();
        initSettings();
        initPreloader();
        Waves.init();
    }

    init();

})(jQuery)