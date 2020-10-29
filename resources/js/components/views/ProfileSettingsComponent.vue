<template>
    <div class="main-container">
      
      <section class="space-sm pb-4">
        <div class="container">
          <div class="row justify-content-between align-items-center">
            <div class="col-auto">
              <h1 class="h2">Account Settings</h1>
            </div>
            <!--end of col-->
            <div class="col-auto text-right">
              <router-link :to="{ name: 'pricing' }" class="btn btn-success">View Plans</router-link>
            </div>
            <!--end of col-->
          </div>
          <!--end of row-->
        </div>
        <!--end of container-->
      </section>
      <!--end of section-->
      

      <section class="flush-with-above space-0">
        <div>
          <div class="container">
            <div class="row">
              <div class="col">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="overview-tab" data-toggle="tab" href="#general" role="tab" aria-selected="true">General</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="billing-tab" data-toggle="tab" href="#billing" role="tab" aria-selected="false">Billing</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="suscription-tab" data-toggle="tab" href="#suscription" role="tab" aria-selected="false">Suscription</a>
                  </li>
                </ul>
              </div>
              <!--end of col-->
            </div>
            <!--end of row-->
          </div>
          <!--end of container-->
        </div>
      </section>
      
      <section class="flush-with-above height-80 d-block">
        
        <div class="tab-content">
          <div class="tab-pane fade show active" id="general" role="tabpanel">
            <div class="container">
              <div class="row">
                <div class="col-12 center pt-4">
                  <div class="media flex-wrap mb-0 align-items-center">
                    <img class="rounded-circle avatar-md profile-user-wid" alt="avatar" :src="avatar" />
                    <div class="media-body pt-3 ml-4">
                      <form>
                        <label for="avatar">
                          <input style="display: none;" type="file" id="avatar" name="avatar" class="btn btn-primary" @change="uploadPhoto">
                          <span class="btn btn-primary mb-2"><i class="icon-upload-to-cloud">&nbsp;</i>Upload</span>
                        </label>
                        <div>
                          <div v-if="errorAvatar">
                            <p v-for="(value, key, index) in errorAvatar" class="error-message" style="color: #d9534f;font-size: 12px;">
                              {{ value }}
                            </p>
                          </div>
                          <small>For best results, use an image at least 256px by 256px in either .jpg or .png format</small>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!--end of col-->
              </div>
              <!--end of row-->
              <hr>
              <div class="row mb-4">
                <div class="col">
                  <h5>Account Details</h5>
                </div>
                <!--end of col-->
              </div>
              <!--end of row-->
              <div class="row">
                <div class="col-12 col-md-4 order-md-2">
                  <div class="alert alert-info text-small" role="alert">
                    <i class="icon-shield"></i>
                    <span>
                      Your information is always kept encrypted and can never be accessed by third parties.
                    </span>
                    <a href="#">See our privacy policy</a>
                  </div>
                </div>
                <!--end of col-->
                <div class="col-12 col-md-8 order-md-1">
                  <form class="row" method="POST" @submit.prevent="updateUser()">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="first-name">First Name:
                          <span class="text-red">*</span>
                        </label>
                        <input v-model="firstname" type="text" class="form-control form-control-lg" id="firstname" placeholder="FirstName" maxlength="30" required="" @keyup="removeBorde('firstname')"/>
                        <div v-if="errorFirstName">
                          <p v-for="(value, key, index) in errorFirstName" class="error-message" style="color: #d9534f;font-size: 12px;">
                            {{ value }}
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="last-name">Last Name:</label>
                        <input v-model="lastname" type="text" class="form-control form-control-lg" id="lastname" placeholder="LastName" maxlength="30" required="" @keyup="removeBorde('lastname')"/>
                        <div v-if="errorLastName">
                          <p v-for="(value, key, index) in errorLastName" class="error-message" style="color: #d9534f;font-size: 12px;">
                            {{ value }}
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="username">Username:
                          <span class="text-red">*</span>
                        </label>
                        <input v-model="name" type="text" class="form-control form-control-lg" id="username" placeholder="Username" maxlength="20" required="" @keyup="removeBorde('username')"/>
                        <div v-if="errorName">
                          <p v-for="(value, key, index) in errorName" class="error-message" style="color: #d9534f;font-size: 12px;">
                            {{ value }}
                          </p>
                        </div>
                        <small>This will be displayed on your public profile</small>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="emailaddress">Email Address:
                          <span class="text-red">*</span>
                        </label>
                        <input v-model="email" type="email" class="form-control form-control-lg" id="email" placeholder="email@example.com" maxlength="30" required="" readonly="" />
                        <small>Used to log in to your account</small>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <button type="submit" class="btn btn-secondary" @click="validFormUser">Save changes</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!--end of col-->
              </div>
              <!--end of row-->
              <hr>
              <div class="row mb-4">
                <div class="col">
                  <h5>Profile Information</h5>
                </div>
                <!--end of col-->
              </div>
              <!--end of row-->
              <div class="row">
                <div class="col-12 col-md-4 order-md-2">
                  <div class="alert alert-info text-small" role="alert">
                    <i class="icon-user"></i>
                    <span>
                      Some of this information will appear on your public profile. A detailed public profile helps users with similar professional interests and location to connect with you.
                    </span>
                    <a href="#">View your public profile</a>
                  </div>
                </div>
                <!--end of col-->
                <div class="col-12 col-md-8 order-md-1">
                  <form class="row" method="POST" @submit.prevent="updateProfile()">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="city">City:</label>
                        <input v-model="city" type="text" class="form-control form-control-lg" placeholder="City" id="city" maxlength="30" required="" @keyup="removeBorde('city')"/>
                        <div v-if="errorCity">
                          <p v-for="(value, key, index) in errorCity" class="error-message" style="color: #d9534f;font-size: 12px;">
                            {{ value }}
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="country">Country:</label>
                        <input v-model="country" type="text" class="form-control form-control-lg" placeholder="Country" id="country" maxlength="30" required="" @keyup="removeBorde('country')"/>
                        <div v-if="errorCountry">
                          <p v-for="(value, key, index) in errorCountry" class="error-message" style="color: #d9534f;font-size: 12px;">
                            {{ value }}
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="birthday">Address:</label>
                        <input v-model="address" type="text" class="form-control form-control-lg" placeholder="address" id="address" maxlength="30" required="" @keyup="removeBorde('address')"/>
                        <div v-if="errorAddress">
                          <p v-for="(value, key, index) in errorAddress" class="error-message" style="color: #d9534f;font-size: 12px;">
                            {{ value }}
                          </p>
                        </div>
                        <small>This will never be made public.</small>
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="postal">Postal Code:</label>
                        <input v-model="postalcode" type="text" class="form-control form-control-lg onlyNumber" placeholder="00000" id="postalcode" maxlength="5" required="" @keyup="removeBorde('postalcode')"/>
                        <div v-if="errorPostalcode">
                          <p v-for="(value, key, index) in errorPostalcode" class="error-message" style="color: #d9534f;font-size: 12px;">
                            {{ value }}
                          </p>
                        </div>
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="birthday">Document:</label>
                        <input v-model="document" type="text" class="form-control form-control-lg onlyNumber" placeholder="Document" id="document" maxlength="20" required="" @keyup="removeBorde('document')"/>
                        <div v-if="errorDocument">
                          <p v-for="(value, key, index) in errorDocument" class="error-message" style="color: #d9534f;font-size: 12px;">
                            {{ value }}
                          </p>
                        </div>
                        <small>This will never be made public.</small>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="birthday">Birthday:</label>
                        <input v-model="birthday" type="date" class="form-control form-control-lg" id="birthday"  required="" @keyup="removeBorde('birthday')" min='1940-01-01'/>
                        <div v-if="errorBirthday">
                          <p v-for="(value, key, index) in errorBirthday" class="error-message" style="color: #d9534f;font-size: 12px;">
                            {{ value }}
                          </p>
                        </div>
                        <small>This will never be made public.</small>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="Facebook Profile">Facebook Profile:</label>
                        <div class="input-group input-group-lg">
                          <div class="input-group-prepend">
                          </div>
                          <input v-model="facebookuser" type="text" class="form-control form-control-lg" placeholder="facebook.com/username" id="facebookuser" maxlength="30"/>
                          <div v-if="errorFacebookuser">
                            <p v-for="(value, key, index) in errorFacebookuser" class="error-message" style="color: #d9534f;font-size: 12px;">
                              {{ value }}
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="about-me">About me:</label>
                        <textarea v-model="about" class="form-control form-control-lg" id="about" rows="4"></textarea>
                        <div v-if="errorAbout">
                          <p v-for="(value, key, index) in errorAbout" class="error-message" style="color: #d9534f;font-size: 12px;">
                            {{ value }}
                          </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <button class="btn btn-secondary" type="submit" @click="validFormProfile">Save changes</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!--end of col-->
              </div>
              <!--end of row-->
            </div>
            <!--end of container-->
          </div>
          <!--end of tab pane-->
          <div class="tab-pane fade" id="billing" role="tabpanel">
            <div class="container">
              <div class="row mb-4">
                <div class="col mt-3">
                  <h5>Payment Methods</h5>
                </div>
                <!--end of col-->
              </div>
              <!--end of row-->
              <div class="row">
                <div class="col-12">
                  <form>
                    <table class="table align-items-center">
                      <thead>
                        <tr>
                          <th scope="col">Card Type</th>
                          <th scope="col">Card Number</th>
                          <th scope="col">Default Payment Method</th>
                          <th scope="col">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(card, key, index) in arrayCards" v-if="card.activate == 1">
                          <th scope="row">
                            <img alt="Image" :src="'/assets/images/brands/' + card.branch +'.svg'" class="avatar avatar-sm avatar-square" />
                          </th>
                          <td>
                            <span class="d-block">&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; {{ card.number.slice(12) }}</span>
                            <small class="text-muted">Exp: {{ card.expiremonth }}/{{ card.expireyear }}</small>
                          </td>
                          <td>
                            <div class="custom-control custom-radio">
                              <input :id="'radio_'+ card.id" name="payment-default" type="radio" class="custom-control-input" :checked="card.principal == 1" @click="changeDefault(card.id)">
                              <label class="custom-control-label" :for="'radio_'+ card.id"></label>
                            </div>
                          </td>
                          <td>
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" :data-target="'#editModal_'+card.id"><i class="icon-squared-cross"></i> Edit</button>
                            <div :id="'editModal_'+card.id" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myModalLabel">Edit Card</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                          <div id="errorCard"></div>
                      <div class="form-group row mb-2">
                        <label for="title" class="col-form-label col-lg-12">Card Number</label>
                        <div class="col-lg-12">
                          <input name="number" :value="card.number" type="text" class="form-control" data-mask='0000 0000 0000 0000' placeholder="1234 1234 1234 1234" :id="'number_'+card.id" maxlength="19" readonly=""/>
                        </div>
                      </div>

                      <div class="form-group row mb-2">
                        <label for="title" class="col-form-label col-lg-6">Expire</label>
                        <label for="title" class="col-form-label col-lg-6">CVC</label>
                      </div>

                      <div class="form-group row mb-2">
                        <div class="col-lg-6">
                          <input name="expire" value="" type="text" class="form-control" data-mask='mm/yy' placeholder="MM/AA" :id="'expire_'+card.id" maxlength="5" required=""/>
                        </div>
                        <div class="col-lg-6">
                          <input name="cvc" value="" type="text" class="form-control" data-mask='000' placeholder="CVC" :id="'cvc_'+card.id" maxlength="3" required=""/>
                        </div>
                      </div> 
                                        </div>
                                        <div class="modal-footer">
                                            <button :id="'closeEditModal_'+card.id" type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                            <button :id="'buttonEditCard_'+card.id" type="button" class="btn btn-primary waves-effect waves-light" @click="editCard(card.id)">Edit Card</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" :data-target="'#myModal_'+card.id"><i class="icon-squared-cross"></i> Remove</button>
                            <!-- sample modal content -->
                            <div :id="'myModal_'+card.id" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0" id="myModalLabel">Remove Card</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                          <div id="errorCard"></div>
                                            <div class="form-group row mb-2">
                                              <label for="title" class="col-form-label col-lg-12">Confirm you want to remove this card: <span class="d-block">&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; {{ card.number.slice(12) }}</span></label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button :id="'closeModal_'+card.id" type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                            <button :id="'buttonDeleteCard_'+card.id" type="button" class="btn btn-danger waves-effect waves-light" @click="removeCard(card.id)">Remove Card</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->

                            
                          </td>
                        </tr>


                      </tbody>
                    </table>
                    <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#myModal">Add new card</button>
                  </form>
                </div>
                <!--end of col-->
              </div>
              <!--end of row-->
            </div>
            <!--end of container-->
          </div>
         
          <div class="tab-pane fade" id="suscription" role="tabpanel">
            <div class="container">
              <div class="row mt-3">
                <div class="col-12">
                  <div class="card-table">
                    <div class="card-body">
                      <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                          <tr>
                            <th>Suscription</th>
                            <th>Payment Method</th>
                            <th>Paid Out</th>
                            <th>Invoice Nº</th>
                            <th>Date Invoice</th>
                          </tr>
                        </thead>
        
                        <tbody>
                          <tr v-for="(value, key, index) in arrayInvoices">
                            <td>{{ value.name_plan }}</td>
                            <td>{{ value.card_brand }}</td>
                            <td>{{ value.paid_out }}</td>
                            <td><a :href="value.invoice_pdf" :class="[value.paid_out === 'paid' ? 'btn btn-success' : 'btn btn-danger']">{{ value.number }}</a></td>
                            <td>{{ value.created | formatDate }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- end col -->
              </div> <!-- end row -->
            </div>
          </div>
        </div>
      </section>

      <!-- sample modal content -->
      <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title mt-0" id="myModalLabel">Add Card</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <div id="errorCard"></div>
                    <form id="formAddCard" method="POST" @submit.prevent="createCard">
                      <div class="form-group row mb-2">
                        <label for="title" class="col-form-label col-lg-12">Card Number</label>
                        <div class="col-lg-12">
                          <input name="number" value="" type="text" class="form-control" data-mask='0000 0000 0000 0000' placeholder="1234 1234 1234 1234" id="number" maxlength="19" required="" @keyup="removeBorde('number')"/>
                          <div v-if="errorNumber">
                            <p v-for="(value, key, index) in errorNumber" class="error-message" style="color: #d9534f;font-size: 12px;">
                              {{ value }}
                            </p>
                          </div>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>

                      <div class="form-group row mb-2">
                        <label for="title" class="col-form-label col-lg-6">Expire</label>
                        <label for="title" class="col-form-label col-lg-6">CVC</label>
                      </div>

                      <div class="form-group row mb-2">
                        <div class="col-lg-6">
                          <input name="expire" value="" type="text" class="form-control" data-mask='mm/yy' placeholder="MM/AA" id="expire" maxlength="5" required="" @keyup="removeBorde('expire')"/>
                          <div v-if="errorExpire">
                            <p v-for="(value, key, index) in errorExpire" class="error-message" style="color: #d9534f;font-size: 12px;">
                              {{ value }}
                            </p>
                          </div>
                          <div class="invalid-feedback"></div>
                        </div>
                        <div class="col-lg-6">
                          <input name="cvc" value="" type="text" class="form-control" data-mask='000' placeholder="CVC" id="cvc" maxlength="3" required="" @keyup="removeBorde('cvc')"/>
                          <div v-if="errorCvc">
                            <p v-for="(value, key, index) in errorCvc" class="error-message" style="color: #d9534f;font-size: 12px;">
                              {{ value }}
                            </p>
                          </div>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div> 

                      <div class="form-group row mb-2">
                        <label for="title" class="col-form-label col-lg-12">Name Card</label>
                        <div class="col-lg-12">
                          <input name="cardname" value="" type="text" class="form-control" placeholder="Joe Doe ..." id="cardname" maxlength="30" required="" @keyup="removeBorde('cardname')"/>
                          <div v-if="errorCardname">
                            <p v-for="(value, key, index) in errorCardname" class="error-message" style="color: #d9534f;font-size: 12px;">
                              {{ value }}
                            </p>
                          </div>
                          <div class="invalid-feedback"></div>
                        </div>
                      </div>  
                    </form>
                  </div>
                  <div class="modal-footer">
                      <button id="closeModal" type="submit" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                      <button id="buttonFormCard" type="submit" class="btn btn-primary waves-effect waves-light" @click="validFormAddCard">Add Card</button>
                  </div>
              </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>

</template>
<script>
import moment from 'moment';

export default {
  data(){
    return{
      // user
      id_user:0,
      firstname:"",
      lastname:"",
      name:"",
      email:"",
      user_stripeId:"",
      // profile
      id_profile:0,
      city:"",
      country:"",
      address:"",
      postalcode:"",
      document:"",
      birthday:"",
      facebookuser:"",
      about:"",
      avatar:"",
      // card
      cardBrand:"",
      id_PaymentMethods:"",
      arrayCards:[],
      // invoice
      arrayInvoices:[],
      update:0, /*Esta variable contrarolará cuando es una nueva tarea o una modificación, si es 0 significará que no hemos seleccionado ninguna tarea, pero si es diferente de 0 entonces tendrá el id de la tarea y no mostrará el boton guardar sino el modificar*/
      arrayTasks:[], //Este array contendrá las tareas de nuestra bd
      //errors
      errorFirstName: null,
      errorLastName: null,
      errorName: null,
      errorCity: null,
      errorCountry: null,
      errorAddress: null,
      errorPostalcode: null,
      errorDocument: null,
      errorBirthday: null,
      errorFacebookuser: null,
      errorAbout: null,
      errorAvatar: null,
      errorNumber: null,
      errorCardname: null,
      errorExpire: null,
      errorCvc: null,
    }
  },
  methods:{
    async getUser(){
      let url = '/admin/profile-settings'; //Ruta que hemos creado para que nos devuelva todas las tareas
      let response = await axios.get(url);

      this.id_user = response.data.user.id;
      this.firstname = response.data.user.firstname;
      this.lastname = response.data.user.lastname;
      this.name = response.data.user.name;
      this.email = response.data.user.email;
      this.user_stripeId = response.data.user.user_stripeId;
      this.city = response.data.profile.city;
      this.country = response.data.profile.country;
      this.address = response.data.profile.address;
      this.postalcode = response.data.profile.postalcode;
      this.document = response.data.profile.document;
      this.birthday = response.data.profile.birthday;
      this.facebookuser = response.data.profile.facebookuser;
      this.about = response.data.profile.about;
      this.avatar = '/images/profile/'+response.data.profile.avatar;
      $("#user_name").html(response.data.user.name);
      $("#showUserName").html(response.data.user.name);
      $("#user_avatar").html(response.data.profile.avatar);
      $("#showUserAvatar").attr('src', '/images/profile/'+response.data.profile.avatar);
      NProgress.done();
      /*axios.get(url).then((response) => {
        //creamos un array y guardamos el contenido que nos devuelve el response
        this.id_user = response.data.user.id;
        this.firstname = response.data.user.firstname;
        this.lastname = response.data.user.lastname;
        this.name = response.data.user.name;
        this.email = response.data.user.email;
        console.log(response.data);
        NProgress.done();
      })
      .catch((error) => {
        // handle error
        console.log(error);
      });*/
    },

    async getCards(){
      let url = '/admin/listcards'; //Ruta que hemos creado para que nos devuelva todas las tareas
      let response = await axios.get(url);

      this.arrayCards = response.data;

      $('#closeModal').click();
      $('#formAddCard').trigger("reset");
      NProgress.done();
    },

    async getInvoices(){
      let url = '/admin/invoices/list'; //Ruta que hemos creado para que nos devuelva todas las tareas
      let response = await axios.get(url);

      this.arrayInvoices = response.data;
      NProgress.done();
    },
    
    updateUser(){
      if ($('#firstname').val() == '') {
        $('#firstname').prop( "style", 'border-color:red' );
      }
      NProgress.start()
      axios.post('/admin/profile-settings/user/'+this.id_user, {
        id:this.id_user,
        firstname:this.firstname,
        lastname:this.lastname,
        name:this.name,
        _token:$('meta[name="csrf-token"]').attr('content')
      }).
      then( (response) => {
        this.clearErrors();
        this.getUser();
        this.alertNotifications('success', 'Updated account successfully');
      })
      .catch(error => {
        if (error.response.status == 422){
          var e = error.response.data.errors;
          this.errorFirstName = e.firstname;
          this.errorLastName = e.lastname;
          this.errorName = e.name;
          this.alertNotifications('error', 'Please fill in the fields account');
          NProgress.done();
        }
      });
    },

    updateProfile(){
      NProgress.start()
      axios.post('/admin/profile-settings/profile/'+this.id_user, {
        id:this.id_user,
        city:this.city,
        country:this.country,
        address:this.address,
        postalcode:$('#postalcode').val(),
        document:$('#document').val(),
        birthday:this.birthday,
        facebookuser:this.facebookuser,
        about:this.about,
        _token:$('meta[name="csrf-token"]').attr('content')
      }).
      then( (response) => {
        this.clearErrors();
        this.getUser();
        this.alertNotifications('success', 'Updated profile successfully');
      })
      .catch(error => {
        if (error.response.status == 422){
          var e = error.response.data.errors;
          this.errorCity = e.city;
          this.errorCountry = e.country;
          this.errorAddress = e.address;
          this.errorPostalcode = e.postalcode;
          this.errorDocument = e.document;
          this.errorBirthday = e.birthday;
          this.errorFacebookuser = e.facebookuser;
          this.errorAbout = e.about;
          this.alertNotifications('error', 'Please fill in the fields profile');
          NProgress.done();
        }
      });
    },

    uploadPhoto(e){
      NProgress.start()

      let formData = new FormData();
      formData.append('avatar', e.target.files[0]);
      formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

      axios.post('/admin/profile-settings/profile/avatar/'+this.id_user,
        formData,
        {
          headers: {'Content-Type': 'multipart/form-data',}
        }
      ).then((response) => {
        this.clearErrors();
        this.getUser();
        this.alertNotifications('success', 'Updated photo profile successfully');
      })
      .catch(error => {
        if (error.response.status == 422){
          var e = error.response.data.errors;
          this.errorAvatar = e.avatar;
          this.alertNotifications('error', 'Please fill in the fields avatar');
          NProgress.done();
        }
      });

    },

    createCard(){
      NProgress.start()
      $("#buttonFormCard").prop( "disabled", true );
      axios.post('/admin/createpaymentmethods', {
        id:this.id_user,
        number:$('#number').val(),
        expire:$('#expire').val(),
        cvc:$('#cvc').val(),
        name:$('#cardname').val(),
        _token:$('meta[name="csrf-token"]').attr('content')
      }).
      then( (response) => {
        this.id_PaymentMethods = response.data.id;
        this.cardBrand = response.data.card.brand;
        this.clearErrors();
        this.attachCard();
      })
      .catch(error => {
        if (error.response.status == 422){
          var e = error.response.data.errors;
          this.errorNumber = e.number;
          this.errorCardname = e.name;
          this.errorExpire = e.expire;
          this.errorCvc = e.cvc;
        }

        this.alertNotifications('error', error.response.data.message);
        $("#buttonFormCard").prop( "disabled", false );

        NProgress.done();
      });
    },

    attachCard(){
      axios.post('/admin/cards/create', {
        id:this.id_user,
        id_PaymentMethods:this.id_PaymentMethods,
        branch:this.cardBrand,
        number:$('#number').val(),
        expire:$('#expire').val(),
        cvc:$('#cvc').val(),
        name:$('#cardname').val(),
        _token:$('meta[name="csrf-token"]').attr('content')
      }).
      then( (response) => {
        this.getCards();
        this.alertNotifications('success', 'Attach Card successfully');
        $("#buttonFormCard").prop( "disabled", false );
      })
      .catch(error => {
        if (error.response.status == 500){
          this.alertNotifications('error', 'Card is already registered');
        }
        $("#buttonFormCard").prop( "disabled", false );
        NProgress.done();
      });
    },

    changeDefault(id){
      NProgress.start();
      axios.post('/admin/cards/default', {
        id:id,
        _token:$('meta[name="csrf-token"]').attr('content')
      }).
      then( (response) => {
        this.getCards();
        this.alertNotifications('success', 'Change default Card successfully');
      })
      .catch(error => {
        console.log(error.response.data.errors);
        NProgress.done();
      });
    },

    editCard(id){
      NProgress.start()
      $("#buttonEditCard_"+id).prop( "disabled", true );
      
      axios.post('/admin/cards/edit/'+id, {
        id:id,
        expire:$('#expire_'+id).val(),
        cvc:$('#cvc_'+id).val(),
        _token:$('meta[name="csrf-token"]').attr('content')
      }).
      then( (response) => {
        this.getCards();
        $('#closeEditModal_'+id).click();
        $("#buttonEditCard_"+id).prop( "disabled", false );
        this.alertNotifications('success', 'Edit Card successfully');
      })
      .catch(error => {
        console.log(error.response.data.errors);
        this.alertNotifications('error', 'Edit Card Error');
        $("#buttonEditCard_"+id).prop( "disabled", false );
        NProgress.done();
      });
    },

    removeCard(id){
      NProgress.start()
      $("#buttonDeleteCard_"+id).prop( "disabled", true );
      if ($('#radio_'+id).prop("checked")) {
        this.alertNotifications('info', 'You cannot remove the default card. Select another default card, and then try again');
        $("#buttonDeleteCard_"+id).prop( "disabled", false );
        NProgress.done();
        return;
      }
      axios.post('/admin/cards/delete', {
        id:id,
        _token:$('meta[name="csrf-token"]').attr('content')
      }).
      then( (response) => {
        this.getCards();
        $('#closeModal_'+id).click();
        this.alertNotifications('success', 'Delete Card successfully');
      })
      .catch(error => {
        console.log(error.response.data.errors);
        NProgress.done();
      });
    },

    clearErrors(){
      this.errorFirstName = null;
      this.errorLastName = null;
      this.errorName = null;
      this.errorCity = null;
      this.errorCountry = null;
      this.errorAddress = null;
      this.errorPostalcode = null;
      this.errorDocument = null;
      this.errorBirthday = null;
      this.errorFacebookuser = null;
      this.errorAbout = null;
      this.errorAvatar = null;
      this.errorCardname = null;
      this.errorNumber = null;
      this.errorExpire = null;
      this.errorCvc = null;
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
    validFormUser(){
      if ($('#firstname').val() == '') {
        $('#firstname').prop( "style", 'border-color:red' );
      }
      if ($('#lastname').val() == '') {
        $('#lastname').prop( "style", 'border-color:red' );
      }
      if ($('#username').val() == '') {
        $('#username').prop( "style", 'border-color:red' );
      }
    },
    validFormProfile(){
      if ($('#city').val() == '') {
        $('#city').prop( "style", 'border-color:red' );
      }
      if ($('#country').val() == '') {
        $('#country').prop( "style", 'border-color:red' );
      }
      if ($('#address').val() == '') {
        $('#address').prop( "style", 'border-color:red' );
      }
      if ($('#postalcode').val() == '') {
        $('#postalcode').prop( "style", 'border-color:red' );
      }
      if ($('#document').val() == '') {
        $('#document').prop( "style", 'border-color:red' );
      }
      if ($('#birthday').val() == '') {
        $('#birthday').prop( "style", 'border-color:red' );
      }
    },
    validFormAddCard(){
      var error = 0;
      if ($('#number').val() == '') {
        error = 1;
        $('#number').prop( "style", 'border-color:red' );
      }
      if ($('#expire').val() == '') {
        error = 1;
        $('#expire').prop( "style", 'border-color:red' );
      }
      if ($('#cvc').val() == '') {
        error = 1;
        $('#cvc').prop( "style", 'border-color:red' );
      }
      if ($('#cardname').val() == '') {
        error = 1;
        $('#cardname').prop( "style", 'border-color:red' );
      }

      if (error == 0) {
        this.createCard();
      }
    },
    removeBorde(id){
      $('#'+id).prop( "style", '' );
    },
    
    /*formatDate(created) {
      var n =  new Date();
      var y = n.getFullYear();
      var m = n.getMonth();
      var d = n.getDate();

      var in1 = new Date(y, m, d, 0, 0, 1);
      var fi1 = new Date(y, m, d, 23, 59, 59);

      var ini = in1.getTime() / 1000;
      var fin = fi1.getTime() / 1000;

      if ( (created < fin) && (created > ini) ) {
        return 'Today';
      } else {
        //var month = m+1;
        //return y+'-'+month.toString().padStart(2, 0)+'-'+d.toString().padStart(2, 0);
        return new Date(created * 1000).toISOString().slice(0, 10).replace('T', ' ')
      }
      
    },*/

    tellTime() {
      let time = new Date('1591322954' * 1000).toISOString().slice(0, 10).replace('T', ' ');
      console.log(this.$moment(time).format('YYYY-MM-DD'));

      console.log(this.$moment(time).fromNow());
    }
  },
  created() {
  },
  mounted() {
    this.avatar = '/images/profile/' + $("#user_avatar").html();
    let jsuitesScript = document.createElement('script')
    jsuitesScript.setAttribute('src', '/assets/js/jsuites/jsuites.js')
    document.head.appendChild(jsuitesScript)
    this.getUser();
    this.getCards();
    this.getInvoices();

    $(".onlyNumber").keydown(function(event){
        //alert(event.keyCode);
        if((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105) && event.keyCode !==190  && event.keyCode !==110 && event.keyCode !==8 && event.keyCode !==9  ){
            return false;
        }
    });

    this.tellTime();

  },

  filters: {
    formatDate: function (date) {
      var n =  new Date();
      var y = n.getFullYear();
      var m = n.getMonth();
      var d = n.getDate();

      var in1 = new Date(y, m, d, 0, 0, 1);
      var fi1 = new Date(y, m, d, 23, 59, 59);

      var ini = in1.getTime() / 1000;
      var fin = fi1.getTime() / 1000;

      if ( (date < fin) && (date > ini) ) {
        return 'Today';
      } else {
        let time = new Date(date * 1000).toISOString().slice(0, 10);
        return moment(time).format('YYYY-MM-DD');
      }
    },
  },
}
</script>