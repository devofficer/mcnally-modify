<template>
  <div>
    <!-- start page title -->   
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="text-center mb-5">
                <h4>Choose your Pricing plan</h4>
                <p class="text-muted">To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words If several languages coalesce</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-xl-3 col-md-6">
            <div class="card plan-box" style="min-height: 530px;">
                <div class="card-body p-3">
                    <div class="media">
                        <div class="media-body">
                            <h5>PRO</h5>
                            <p class="text-muted">Developed for Smart investor</p>
                        </div>
                        <div class="ml-3">
                            <i class="bx bx-run h1 text-primary"></i>
                        </div>
                    </div>
                    <div class="py-4">
                        <h2><sup><small>$</small></sup> {{ formatPrice(plan1.cost) }}/ <span class="font-size-13">Per month</span></h2>
                    </div>
                    <div class="text-center">
                      <button v-if="plan1.id == user.plan_id" type="button" class="btn btn-secondary btn-sm waves-effect waves-light" disabled="">CURRENT PLAN</button>
                      <button v-else type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-toggle="modal" data-target="#downgradeModal">DOWNGRADE NOW</button>
                    </div>

                    <div class="plan-features mt-5">
                        <p><i class="bx bx-checkbox-square text-primary mr-2"></i> Recommendations trends</p>
                        <p><i class="bx bx-checkbox-square text-primary mr-2"></i> Price Target</p>
                        <p><i class="bx bx-checkbox-square text-primary mr-2"></i> EPS Estimates</p>
                        <p><i class="bx bx-checkbox-square text-primary mr-2"></i> EPS Surprices</p>
                        <p><i class="bx bx-checkbox-square text-primary mr-2"></i> Revenue Estimate</p>
                        <p><i class="bx bx-checkbox-square text-primary mr-2"></i> Company News</p>
                        <p><i class="bx"></i> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card plan-box" style="min-height: 530px;">
                <div class="card-body p-3">
                    <div class="media">
                        <div class="media-body">
                            <h5>Expert</h5>
                            <p class="text-muted">Developed for Smart and Expert investor</p>
                        </div>
                        <div class="ml-3">
                            <i class="bx bx-cycling h1 text-primary"></i>
                        </div>
                    </div>
                    <div class="py-4">
                        <h2><sup><small>$</small></sup> {{ formatPrice(plan2.cost) }}/ <span class="font-size-13">Per month</span></h2>
                    </div>
                    <div class="text-center">
                      <button v-if="plan2.id == user.plan_id" type="button" class="btn btn-secondary btn-sm waves-effect waves-light" disabled="">CURRENT PLAN</button>
                      <button v-else type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-toggle="modal" data-target="#upgradeModal">UPGRADE NOW</button>
                    </div>

                    <div class="plan-features mt-5">
                        <p><i class="bx bx-checkbox-square text-primary mr-2"></i> Industries Research</p>
                        <p><i class="bx bx-checkbox-square text-primary mr-2"></i> Financial projections to 5 years</p>
                        <p><i class="bx bx-checkbox-square text-primary mr-2"></i> Analysis of companies of emerging markets</p>
                        <p><i class="bx bx-checkbox-square text-primary mr-2"></i> Company News</p>
                        <p><i class="bx bx-checkbox-square text-primary mr-2"></i> Core fundamentals data India</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- sample modal content -->
    <div v-if="plan2.id == user.plan_id" id="downgradeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Downgrade Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <p>
                    Confirm that you want to downgrade to The Pro Plan.
                  </p>
                </div>
                <div class="modal-footer">
                    <button id="closeModal" type="submit" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button id="buttonFormPlan" type="button" class="btn btn-primary waves-effect waves-light" @click="changePlan(plan2.id, plan1.id)" >Confirm</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <div v-else id="upgradeModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Upgrade Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <p>
                    Confirm that you want to upgrade to The Expert Plan.
                  </p>
                </div>
                <div class="modal-footer">
                    <button id="closeModal" type="submit" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button id="buttonFormPlan" type="button" class="btn btn-primary waves-effect waves-light" @click="changePlan(plan1.id, plan2.id)">Confirm</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  </div>
</template>
<script>
export default {
  data(){
    return{
      // data
      plan1:[],
      plan2:[],
      user:[],
    }
  },
  methods:{
    async getPlans(){
      let url = '/admin/plan/list'; //Ruta que hemos creado para que nos devuelva todas las tareas
      let response = await axios.get(url);
      this.plan1 = response.data.plans[0];
      this.plan2 = response.data.plans[1];
      this.user = response.data.user;
      NProgress.done();
    },

    changePlan(current, update){
      NProgress.start();
      $("#buttonFormPlan").prop( "disabled", true );
      axios.post('/admin/plan/change', {
        current:current,
        update:update,
        _token:$('meta[name="csrf-token"]').attr('content')
      }).
      then( (response) => {
        console.log(response.data);
        this.getPlans();
        $('#closeModal').click();
        $("#buttonFormPlan").prop( "disabled", false );
        this.alertNotifications('success', 'Change of Plan successfully');
      })
      .catch(error => {
        console.log(error.response.data.errors);
        this.alertNotifications('error', error.response.data.errors);
        $("#buttonFormPlan").prop( "disabled", false );
        NProgress.done();
      });
    },

    formatPrice(value = 0) {
        let val = (value/1).toFixed(2).replace('.', ',');
        return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
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
    this.getPlans();
  },
}
</script>
