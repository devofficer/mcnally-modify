@extends('layouts.master')

@section('title') Account Settings @endsection

@section('css')
    <link href="{{('/assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/libs/datatables/datatables.min.css')}}">
@endsection

@section('content')


  <div class="main-container">

      <section class="space-sm pb-4">
        <div class="container">
          <div class="row justify-content-between align-items-center">
            <div class="col-auto">
              <h1 class="h2">Account Settings</h1>
            </div>
            <!--end of col-->
            <div class="col-auto text-right">
              <a href="pages-pricing" class="btn btn-success">View Plans</a>
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
                    <img class="rounded-circle avatar-md profile-user-wid" alt="avatar" src="/images/profile/{{$profile->avatar}}" class="avatar avatar-lg mb-3 mb-md-0" />
                    <div class="media-body pt-3 ml-4">
                      <form action="/admin/profile-settings/profile/avatar/{{$profile->user_id}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="custom-file mb-2" for="file2">
                          <input type="file" id="file2" class="input ml-3 mr-3" name="avatar" required="">
                          <button class="btn btn-primary" type="submit"><i class="icon-upload-to-cloud">&nbsp;</i>Upload</button>
                        </label>
                        @error('avatar')
                          <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
                        @enderror
                        <div>
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
                  <form class="row" method="POST" action="/admin/profile-settings/user/{{$user->id}}">
                    @csrf
                    <div class="col-6">
                      <div class="form-group">
                        <label for="first-name">First Name:
                          <span class="text-red">*</span>
                        </label>
                        <input class="form-control form-control-lg" type="text" name="firstname" id="first-name" value="{{$user['firstname']}}" required="" maxlength="30" />
                        @error('firstname')
                          <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="last-name">Last Name:
                          <span class="text-red">*</span>
                        </label>
                        <input class="form-control form-control-lg" type="text" name="lastname" placeholder="Cunningham" id="last-name" value="{{$user['lastname']}}" required="" maxlength="30" />
                        @error('lastname')
                          <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
                         @enderror
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="username">Username:
                          <span class="text-red">*</span>
                        </label>
                        <input class="form-control form-control-lg" type="text" name="name" id="username" value="{{$user['name']}}" required="" maxlength="30" />
                        @error('name')
                          <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
                        @enderror
                        <small>This will be displayed on your public profile</small>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="emailaddress">Email Address:
                          <span class="text-red"></span>
                        </label>
                        <input class="form-control form-control-lg" type="email" name="email" id="emailaddress" value="{{$user['email']}}" readonly="" />
                        <small>Used to log in to your account</small>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <button class="btn btn-secondary" type="submit">Save changes</button>
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
                  <form class="row" method="POST" action="/admin/profile-settings/profile/{{$profile->user_id}}">
                    @csrf
                    <div class="col-6">
                      <div class="form-group">
                        <label for="city">City:</label>
                        <input class="form-control form-control-lg" type="text" name="city" placeholder="Melbourne" id="city" value="{{$profile['city']}}" />
                        @error('city')
                          <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="country">Country:</label>
                        <input class="form-control form-control-lg" type="text" name="country" placeholder="Australia" id="country" value="{{$profile['country']}}" />
                        @error('country')
                          <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    <div class="col-6">
                      <div class="form-group">
                        <label for="birthday">Address:</label>
                        <input class="form-control form-control-lg" type="text" placeholder="Select a date" name="address" id="address" data-flatpickr data-alt-input="true" value="{{$profile['address']}}" />
                        @error('address')
                          <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
                        @enderror
                        <small>This will never be made public.</small>
                      </div>
                    </div>
                    
                    <div class="col-6">
                      <div class="form-group">
                        <label for="postal">Postal Code:</label>
                        <input class="form-control form-control-lg" type="text" name="postalcode" id="postalcode" value="{{$profile['postalcode']}}" />
                        @error('postalcode')
                          <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
                        @enderror
                      </div>
                    </div>

                    

                    <div class="col-6">
                      <div class="form-group">
                        <label for="birthday">Document:</label>
                        <input class="form-control form-control-lg" type="text" placeholder="Select a date" name="document" id="document" data-flatpickr data-alt-input="true" value="{{$profile['document']}}" />
                        @error('document')
                          <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
                        @enderror
                        <small>This will never be made public.</small>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="birthday">Birthday:</label>
                        <input class="form-control form-control-lg" type="date" placeholder="" name="birthday" id="birthday" data-flatpickr data-alt-input="true" value="{{$profile['birthday']}}" />
                        @error('birthday')
                          <p class="error-message" style="color: #d9534f;font-size: 12px;">{{ $message }}</p>
                        @enderror
                        <small>This will never be made public.</small>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="Facebook Profile">Facebook Profile:</label>
                        <div class="input-group input-group-lg">
                          <div class="input-group-prepend">
                          </div>
                          <input type="text" class="form-control" placeholder="facebook.com/Username" name="facebookuser" id="Facebook" value="{{$profile['facebookuser']}}">
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <label for="about-me">About me:</label>
                        <textarea class="form-control form-control-lg" name="about" rows="4" id="about-me">{{$profile['about']}}</textarea>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="form-group">
                        <button class="btn btn-secondary" type="submit">Save changes</button>
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
                    <table class="table align-items-center">
                      <thead>
                        <tr>
                          <th scope="col">Card Type</th>
                          <th scope="col">Card Number</th>
                          <th scope="col">Default Payment Method</th>
                          <th scope="col">Remove</th>
                        </tr>
                      </thead>
                      <tbody id="tbodyCards">
                        @foreach($cards as $card)
                        @php
                          if($card->principal == 1){
                            $checked = 'checked=""';
                          } else {
                            $checked = '';
                          }
                        @endphp
                        <tr>
                          <th scope="row">
                            <img alt="Image" src="{{ asset('assets/images/brands/'.$card->branch.'.svg') }}" class="avatar avatar-sm avatar-square" />
                          </th>
                          <td>
                            <span class="d-block">&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; {{ substr($card->number, 12, 4) }}</span>
                            <small class="text-muted">Exp: {{ str_pad($card->expiremonth, 2, "0", STR_PAD_LEFT) }}/{{ $card->expireyear }}</small>
                          </td>
                          <td>
                            <div class="custom-control custom-radio">
                              <input id="radio_{{$card->id}}" name="radio" type="radio" class="custom-control-input" onclick="changeDefault({{$card->id}})" {{$checked}}>
                              <label class="custom-control-label" for="radio_{{$card->id}}"></label>
                            </div>
                          </td>
                          <td>
                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#myModal_{{$card->id}}"><i class="icon-squared-cross"></i> Remove card</button>
                            <!-- sample modal content -->
                            <div id="myModal_{{$card->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                          <form action="" method="POST" id="removeCard_{{$card->id}}" enctype="multipart/form-data">
                                            <div class="form-group row mb-2">
                                              <label for="title" class="col-form-label col-lg-12">Confirm you want to remove this card: <span class="d-block">&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; {{ substr($card->number, 12, 4) }}</span></label>
                                            </div>
                                          </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="closeModal_{{$card->id}}" type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                            <button id="buttonFormCard_{{$card->id}}" type="button" class="btn btn-danger waves-effect waves-light" onclick="this.disabled=true;removeCard('{{$card->id}}')">Remove Card</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#myModal">Add new card</button>
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
                                            <tr>
                                                <td>Pro</td>
                                                <td>Visa</td>
                                                <td>Paid</td>
                                                <td><a href="invoices-detail" class="btn btn-success">0000061</a></td>
                                                <td>2020/04/25</td>
                                            </tr>
                                            <tr>
                                                <td>Pro</td>
                                                <td>Visa</td>
                                                <td>Waiting Payment</td>
                                                <td><a href="invoices-detail" class="btn btn-danger">0000066</a></td>
                                                <td>2019/09/25</td>
                                            </tr>
                                            <tr>
                                                <td>Pro</td>
                                                <td>Visa</td>
                                                <td>Waiting Payment</td>
                                                <td><a href="invoices-detail" class="btn btn-danger">0000067</a></td>
                                                <td>2019/10/30</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                      </div></div>
        
        
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
              <form action="" method="POST" id="formCard" name="formCard" enctype="multipart/form-data">
                <div class="form-group row mb-2">
                  <label for="title" class="col-form-label col-lg-12">Card Number</label>
                  <div class="col-lg-12">
                    <input id="number" name="number" type="text" data-mask='0000 0000 0000 0000' placeholder="1234 1234 1234 1234" class="form-control" value="" required="" maxlength="19">
                    <div class="invalid-feedback"></div>
                  </div>
                </div>

                <div class="form-group row mb-2">
                  <label for="title" class="col-form-label col-lg-4">Expire</label>
                  <label for="title" class="col-form-label col-lg-4">CVC</label>
                  <label for="title" class="col-form-label col-lg-4">Brand</label>
                </div>

                <div class="form-group row mb-2">
                  <div class="col-lg-4">
                    <input id="expire" name="expire" type="text" data-mask='mm/yy' placeholder="MM/AA" required="" maxlength="5" class="form-control">
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="col-lg-4">
                    <input id="cvc" name="cvc" type="text" data-mask='000' placeholder="CVC" class="form-control" maxlength="3" required=""> 
                    <div class="invalid-feedback"></div>
                  </div>

                  <div class="col-lg-4">
                    <select id="branch" name="branch" class="form-control" aria-label="País o región" required="">
                      <option value="visa">visa</option>
                      <option value="mastercard">mastercard</option>
                      <option value="american express">american express</option>
                      <option value="unionpay">unionpay</option>
                      <option value="jcb">jcb</option>
                      <option value="discover">discover</option>
                      <option value="diners">diners</option>
                    </select> 
                    <div class="invalid-feedback"></div>
                  </div>
                </div> 

                <div class="form-group row mb-2">
                  <label for="title" class="col-form-label col-lg-12">Name Card</label>
                  <div class="col-lg-12">
                    <input id="name" name="name" type="text" placeholder="Joe Doe ..." class="form-control" maxlength="30" required=""> 
                    <div class="invalid-feedback"></div>
                  </div>
                </div>  
              </form>
            </div>
            <div class="modal-footer">
                <button id="closeModal" type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button id="buttonFormCard" type="submit" class="btn btn-primary waves-effect waves-light" form="formCard">Add Card</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@csrf


@endsection

@section('script')
    <!-- Required vendor scripts (Do not remove) -->
    <script type="text/javascript" src="/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/assets/js/popper.min.js"></script>
    <script type="text/javascript" src="/assets/js/bootstrap.js"></script>

    <!-- Optional Vendor Scripts (Remove the plugin script here and comment initializer script out of index.js if site does not use that feature) -->

    <!-- AOS (Animate On Scroll - animates elements into view while scrolling down) -->
    <script type="text/javascript" src="/assets/js/aos.js"></script>
    <!-- Flatpickr (calendar/date/time picker UI) -->
    <script type="text/javascript" src="/assets/js/flatpickr.min.js"></script>
    <!-- Flickity (handles touch enabled carousels and sliders) -->
    <script type="text/javascript" src="/assets/js/flickity.pkgd.min.js"></script>
    <!-- jarallax (parallax effect and video backgrounds) -->
    <script type="text/javascript" src="/assets/js/jarallax.min.js"></script>
    <script type="text/javascript" src="/assets/js/jarallax-video.min.js"></script>
    <script type="text/javascript" src="/assets/js/jarallax-element.min.js"></script>
    <!-- ScrollMonitor (manages events for elements scrolling in and out of view) -->
    <script type="text/javascript" src="/assets/js/scrollMonitor.js"></script>
    <!-- jQuery smartWizard facilitates steppable wizard content -->
    <script type="text/javascript" src="/assets/js/jquery.smartWizard.min.js"></script>
    <!-- Smooth scroll (animation to links in-page)-->
    <script type="text/javascript" src="/assets/js/smooth-scroll.polyfills.min.js"></script>
    <!-- Prism (displays formatted code boxes) -->
    <script type="text/javascript" src="/assets/js/prism.js"></script>
    <script type="text/javascript" src="/assets/js/zoom.min.js"></script>

    <!-- Required theme scripts (Do not remove) -->
    <script type="text/javascript" src="/assets/js/theme.js"></script>

    <script src="{{ URL::asset('assets/libs/select2/select2.min.js')}}"></script>

    <script src="{{ URL::asset('assets/js/pages/ecommerce-select2.init.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{ URL::asset('assets/libs/datatables/datatables.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js')}}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>

    <!-- Init js-->
    <!-- <script src="{{ URL::asset('assets/js/pages/datatables.init.js')}}"></script> -->

    <script src="https://bossanova.uk/jsuites/v2/jsuites.js"></script>


<script type="text/javascript">
var form = document.getElementById('formCard');
form.addEventListener('submit', function(event) {
  event.preventDefault();
  document.getElementById('buttonFormCard').disabled = true;
  addCard()
});

function addCard() {
  var _token = document.getElementsByName('_token')[0].value;
  var name = document.getElementById('name').value;
  var number = document.getElementById('number').value;
  var branch = document.getElementById('branch').value;
  var cvc = document.getElementById('cvc').value;
  var expire = document.getElementById('expire').value;
  
  const data = new FormData();
        
  data.append('_token', _token);
  data.append('name',   name);
  data.append('number', number);
  data.append('branch', branch);
  data.append('cvc',    cvc);
  data.append('expire', expire);

  fetch('/admin/cards/create', {
    method: 'POST',
    body: data
  })
  .then(function(response) {
    if(response.ok) {
    	listCard()
      return response.json();
    } else {
      console.log('error data');
    }
  })
  .then(function(response) {
  	document.getElementById('buttonFormCard').disabled = false;
  })
  .catch(function(err) {
    document.getElementById('errorCard').innerHTML = '<span style="color: red;">* INVALID DATA. Please review the entered data!</span>';
    document.getElementById('buttonFormCard').disabled = false;
  });

}

function removeCard(id) {
  var _token = document.getElementsByName('_token')[0].value;
  
  const data = new FormData();
  data.append('_token', _token);
  data.append('id',   id);

  fetch('/admin/cards/delete', {
    method: 'POST',
    body: data
  })
  .then(function(response) {
    if(response.ok) {
    	listCard()
      return response.json();
    } else {
      console.log('error data');
    }
  })
  .then(function(response) {
    document.getElementById('closeModal_'+id).click();
  })
  .catch(function(err) {
  });
}

function listCard() {
  fetch("{{route('card.list')}}", {
    method: 'GET',
  })
  .then(function(response) {
    if(response.ok) {
      return response.json();
    } else {
      console.log('error data');
    }
  })
  .then(function(response) {
  	var tbodyCards = document.getElementById('tbodyCards');
  	var content = response;
		tbodyCards.innerHTML = content;
		document.getElementById('closeModal').click();
    form.reset()
  })
  .catch(function(err) {
  });
}

function changeDefault(id) {
	var _token = document.getElementsByName('_token')[0].value;
  const data = new FormData();
        
  data.append('_token', _token);
  data.append('id',   id);

  fetch('/admin/cards/default', {
    method: 'POST',
    body: data
  })
  .then(function(response) {
    if(response.ok) {
      return response.json();
    } else {
      console.log('error data');
    }
  })
  .then(function(response) {
  	console.log(response);
  })
  .catch(function(err) {
  });
}

console.log('swich');
document.getElementById('dark-mode-switch').click();
</script>

@endsection
