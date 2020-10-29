<template>
  <div>
    <!-- Begin page -->
    <div id="layout-wrapper">
      <header-vue></header-vue>
      <sidebar-left></sidebar-left>

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">
        <div class="page-content">
          <div class="container-fluid">
            
            <p style="display:none;">
              <router-link :to="{ name: 'index' }" id="linkIndex">index</router-link>
              <router-link :to="{ name: 'profile-settings' }" id="linkProfileSettings">profile-settings2</router-link>
            </p>
            
            <router-view></router-view> 

          </div>
          <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <footer-vue></footer-vue>

      </div>
      <!-- end main content-->
    
    </div>
    <!-- END layout-wrapper -->

    <sidebar-right></sidebar-right>
    
  </div>
</template>
<script>

import HeaderVue from '../partials/HeaderComponent.vue'
import FooterVue from '../partials/FooterComponent.vue'
import SidebarLeft from '../partials/SidebarLeftComponent.vue'
import SidebarRight from '../partials/SidebarRightComponent.vue'

export default {
  components: {
    HeaderVue,
    FooterVue,
    SidebarLeft,
    SidebarRight,
  },

  mounted: function () {
    console.log('mounted App contenido')
    let sweetalert2 = document.createElement('script')
    sweetalert2.setAttribute('src', '/assets/libs/sweetalert2/sweetalert2.min.js')
    document.head.appendChild(sweetalert2)

    let sweetalerts = document.createElement('script')
    sweetalerts.setAttribute('src', '/assets/js/pages/sweet-alerts.init.js')
    document.head.appendChild(sweetalerts)
  },


}
</script>
