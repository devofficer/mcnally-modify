@extends('layouts.master')

@section('title') Profile @endsection

@section('content')

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Profile</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                            <li class="breadcrumb-item active">Profile</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-soft-primary">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome Back !</h5>
                                                    <p>It will seem like simplified</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="/assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="/assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                <h5 class="font-size-15 text-truncate">Cynthia Price</h5>
                                                <p class="text-muted mb-0 text-truncate">UI/UX Designer</p>
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="pt-4">

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <h5 class="font-size-15">125</h5>
                                                            <p class="text-muted mb-0">Projects</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <h5 class="font-size-15">$1245</h5>
                                                            <p class="text-muted mb-0">Revenue</p>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        <a href="" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i class="mdi mdi-arrow-right ml-1"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Personal Information</h4>

                                        <p class="text-muted mb-4">Hi I'm Cynthia Price,has been the industry's standard dummy text To an English person, it will seem like simplified English, as a skeptical Cambridge.</p>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Full Name :</th>
                                                        <td>Cynthia Price</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Mobile :</th>
                                                        <td>(123) 123 1234</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">E-mail :</th>
                                                        <td>cynthiaskote@gmail.com</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Location :</th>
                                                        <td>California, United States</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-5">Experience</h4>
                                        <div class="">
                                            <ul class="verti-timeline list-unstyled">
                                                <li class="event-list active">
                                                    <div class="event-timeline-dot">
                                                        <i class="bx bx-right-arrow-circle bx-fade-right"></i>
                                                    </div>
                                                    <div class="media">
                                                        <div class="mr-3">
                                                            <i class="bx bx-server h4 text-primary"></i>
                                                        </div>
                                                        <div class="media-body">
                                                            <div>
                                                                <h5 class="font-size-15"><a href="#" class="text-dark">Back end Developer</a></h5>
                                                                <span class="text-primary">2016 - 19</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="event-list">
                                                    <div class="event-timeline-dot">
                                                        <i class="bx bx-right-arrow-circle"></i>
                                                    </div>
                                                    <div class="media">
                                                        <div class="mr-3">
                                                            <i class="bx bx-code h4 text-primary"></i>
                                                        </div>
                                                        <div class="media-body">
                                                            <div>
                                                                <h5 class="font-size-15"><a href="#" class="text-dark">Front end Developer</a></h5>
                                                                <span class="text-primary">2013 - 16</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="event-list">
                                                    <div class="event-timeline-dot">
                                                        <i class="bx bx-right-arrow-circle"></i>
                                                    </div>
                                                    <div class="media">
                                                        <div class="mr-3">
                                                            <i class="bx bx-edit h4 text-primary"></i>
                                                        </div>
                                                        <div class="media-body">
                                                            <div>
                                                                <h5 class="font-size-15"><a href="#" class="text-dark">UI /UX Designer</a></h5>
                                                                <span class="text-primary">2011 - 13</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <!-- end card -->
                            </div>

                            <div class="col-xl-8">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Completed Projects</p>
                                                        <h4 class="mb-0">125</h4>
                                                    </div>

                                                    <div class="mini-stat-icon avatar-sm align-self-center rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-check-circle font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Pending Projects</p>
                                                        <h4 class="mb-0">12</h4>
                                                    </div>

                                                    <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-hourglass font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Total Revenue</p>
                                                        <h4 class="mb-0">$36,524</h4>
                                                    </div>

                                                    <div class="avatar-sm align-self-center mini-stat-icon rounded-circle bg-primary">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-package font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Revenue</h4>
                                        <div id="revenue-chart" class="apex-charts"></div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">My Projects</h4>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Projects</th>
                                                        <th scope="col">Start Date</th>
                                                        <th scope="col">Deadline</th>
                                                        <th scope="col">Budget</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>Skote admin UI</td>
                                                        <td>2 Sep, 2019</td>
                                                        <td>20 Oct, 2019</td>
                                                        <td>$506</td>
                                                    </tr>

                                                    <tr>
                                                        <th scope="row">2</th>
                                                        <td>Skote admin Logo</td>
                                                        <td>1 Sep, 2019</td>
                                                        <td>2 Sep, 2019</td>
                                                        <td>$94</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">3</th>
                                                        <td>Redesign - Landing page</td>
                                                        <td>21 Sep, 2019</td>
                                                        <td>29 Sep, 2019</td>
                                                        <td>$156</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">4</th>
                                                        <td>App Landing UI</td>
                                                        <td>29 Sep, 2019</td>
                                                        <td>04 Oct, 2019</td>
                                                        <td>$122</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">5</th>
                                                        <td>Blog Template</td>
                                                        <td>05 Oct, 2019</td>
                                                        <td>16 Oct, 2019</td>
                                                        <td>$164</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">6</th>
                                                        <td>Redesign - Multipurpose Landing</td>
                                                        <td>17 Oct, 2019</td>
                                                        <td>05 Nov, 2019</td>
                                                        <td>$192</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">7</th>
                                                        <td>Logo Branding</td>
                                                        <td>04 Nov, 2019</td>
                                                        <td>05 Nov, 2019</td>
                                                        <td>$94</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

@endsection

@section('script')

        <!-- flot plugins -->
        <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

        <script src="{{ URL::asset('assets/js/pages/profile.init.js')}}"></script>

@endsection
