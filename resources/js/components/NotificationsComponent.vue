<template>
    <div class="dropdown d-inline-block">
        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @click="getCheckView">
            <i class="bx bx-bell bx-tada"></i>
            <span class="badge badge-danger badge-pill">{{quantity}}</span>
        </button>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0"
            aria-labelledby="page-header-notifications-dropdown">
            <div class="p-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-0"> Notifications </h6>
                    </div>
                </div>
            </div>
            <simplebar class="simplebar-height" data-simplebar-auto-hide="false">
                <a v-for="(item, index) in listing" class="text-reset notification-item">
                    <div class="media">
                        <div class="avatar-xs mr-3">
                            <span class="avatar-title bg-success rounded-circle font-size-16">
                                <i class="bx bx-badge-check"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <button type="button" class="btn bx bx-trash float-right" id="sa-warning" @click.prevent="delNotification(item.id)"></button>
                            <h6 class="mt-0 mb-1">{{item.title}}</h6>
                            <div class="font-size-12 text-muted">
                                <p class="mb-1">{{item.description}}</p>
                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> {{item.created_at | formatDateFrom }}</p>
                            </div>
                        </div>
                    </div>
                </a>
            </simplebar>
            <div class="p-2 border-top">
                <button type="button" class="col-lg-12 btn btn-success waves-effect waves-light w-xl" id="" @click.prevent="addNotification()">Add New</button>
            </div>
        </div>
    </div>
</template>

<script>
import simplebar from 'simplebar-vue';
import 'simplebar/dist/simplebar.min.css';
import moment from 'moment';

export default {
    components: {
      simplebar
    },
    data() {
      return {
        quantity: 0,
        listing: [],
        title: '',
        description: '',
        errors: '',
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
          }
        },
      }
    },
    mounted(){
      setInterval(() => {
        this.getListing();
      }, 15000);
    },
    methods: {
      showMessage(message) {
          return this.$toast.success(' ', message, this.notificationSystem.options.success);
      },
      showError(error) {
          return this.$toast.error(' ', error, this.notificationSystem.options.error);
      },
      getListing: function () {
          let self = this;
          axios.get(APP_URL + '/admin/notifications').then(function (response) {
              self.quantity = response.data.count;
              self.listing = response.data.listing;
          });
      },

      getCheckView() {
          axios.get(APP_URL + '/admin/checkview')
          .then(() => {
            this.quantity = 0;
          });
      },

      addNotification: function(){
        let self = this;
        const ipAPI = '/admin/add-notification'
        var title1;
        this.$swal.mixin({
            input: 'text',
            confirmButtonText: 'Next &rarr;',
            showCancelButton: true,
            progressSteps: ['1', '2']
          }).queue([
            {
              title: 'Title',
              preConfirm: (data) => {
                return title1 = data;
              }
            },
            {
              title: 'Description',
              confirmButtonText: 'Save',
              showLoaderOnConfirm: true,
              preConfirm: (data) => {
                const data2 = new FormData();
                data2.append('title', title1);
                data2.append('desc',  data);
                data2.append('_token', document.getElementsByName('_token')[0].value);
                
                return fetch(ipAPI, {
                    method: 'POST',
                    body: data2
                  })
                  .then(response => response.json())
                  .then((data1) => {
                    self.alertNotifications('success', 'Create Notification successfully');
                    self.getListing();
                    Swal.fire({
                      title: 'All done!',
                      html: `
                        Notification created successfully
                      `,
                      confirmButtonText: 'Ok!'
                    });
                  })
                  .catch((errors) => Swal.fire({
                    title: 'Errors!',
                    html: `
                      Error creating notification
                    `,
                    confirmButtonText: 'Ok!'
                  }))
              }
            }
          ]).then((result) => {
            self.getListing();
          })

      },
      

      delNotification: function (id) {
        var self = this;
        axios.get(APP_URL + '/admin/del-notification/' + id)
          .then(function (response) {
              if (response.data.type == 'success') {
                  self.getListing();
                  self.alertNotifications('success', 'Delete Notification successfully');
              } else if (response.data.type == 'error') {
                  self.alertNotifications('error', 'Delete Error');
              }
          })
          .catch(function (error) {
              self.alertNotifications('error', 'Delete Error');
          });
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

  filters: {
    formatDateFrom: function (date) {
        return moment.utc(date).fromNow();
    },
  },
}
</script>

<style>
.simplebar-height {
  height: 230px;
}
</style>