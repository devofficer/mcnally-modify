<template>
  <div id="links-profile">
<div class="dropdown d-inline-block">
  <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <img class="rounded-circle header-profile-user" id="showUserAvatar" :src="'/images/profile/'+user_avatar" alt="Header Avatar">
    <span class="d-none d-xl-inline-block ml-1" id="showUserName">{{ user_name }}</span>
    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
  </button>
  <div class="dropdown-menu dropdown-menu-right">
    <!-- item-->
    <a class="dropdown-item" href="/admin/profile-settings" id="linkProfile" onclick="event.preventDefault()">
      <i class="bx bx-user font-size-16 align-middle mr-1"></i> Profile
    </a>
    <a class="dropdown-item text-danger" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout
    </a>
  </div>
</div>

  </div>
</template>
<script>
export default {
  data(){
    return{
      // user
      user_name:'User',
      user_avatar:'avatar.jpg',
    }
  },
  mounted: function () {
    this.user_name = $("#user_name").html();
    this.user_avatar = $("#user_avatar").html();
  },
}
</script>
