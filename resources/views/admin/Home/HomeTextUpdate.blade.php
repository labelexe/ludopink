@extends('admin.layout.master')
@section('title')
    Update Home Text
@endsection
@section('css')
    <!--  link custom css link here -->
    @endsection @section('content')
    <!-- BEGIN: Content-->
    @if (session()->get('error'))
        <div class="alert alert-danger alert-dismissible ml-1 mr-1" id="notice_msg" role="alert">
            <div class="alert-body">
                <b>{{ session()->get('error') }}</b>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @elseif(session()->get('success'))
        <div class="alert alert-success alert-dismissible ml-1 mr-1" id="success_msg" role="alert">
            <div class="alert-body">
                <b>{{ session()->get('success') }}</b>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <!-- left menu section -->
        <div class="col-md-3 mb-2 mb-md-0">
            <ul class="nav nav-pills flex-column nav-left">
                <!-- general -->
                <li class="nav-item">
                    <a class="nav-link active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general"
                        aria-expanded="true">
                        <i class="las la-globe-europe font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Header Details</span>
                    </a>
                </li>
                <!-- change password -->
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-notification" data-toggle="pill"
                        href="#account-vertical-notification" aria-expanded="false">
                        <i class="lab la-pagelines font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">About Details</span>
                    </a>
                </li>

                <!-- change password -->
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-funfact" data-toggle="pill"
                        href="#account-vertical-funfact" aria-expanded="false">
                        <i class="las la-sort-numeric-up font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Fun Fact</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="account-pill-whychoose" data-toggle="pill"
                        href="#account-vertical-whychoose" aria-expanded="false">
                        <i class="las la-question-circle font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Why Choose Us</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="account-pill-logo" data-toggle="pill" href="#account-vertical-logo"
                        aria-expanded="false">
                        <i class="las la-gamepad font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Features Details</span>
                    </a>
                </li>
                <!-- information -->
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-payment" data-toggle="pill" href="#account-vertical-payment"
                        aria-expanded="false">
                        <i class="las la-share-alt font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Download Details</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-shipping" data-toggle="pill"
                        href="#account-vertical-shipping" aria-expanded="true">
                        <i class="las la-sticky-note font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Screenshot Details</span>
                    </a>
                </li>
                <!-- social -->
                <li class="nav-item">
                    <a class="nav-link" id="account-pill-testimonial" data-toggle="pill" href="#account-vertical-testimonial"
                        aria-expanded="false">
                        <i class="las la-grin-stars font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Testimonial Details</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="account-pill-contact-details" data-toggle="pill"
                        href="#account-vertical-contact-details" aria-expanded="true">
                        <i class="las la-map-marked-alt font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Contact Details</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" id="account-pill-social" data-toggle="pill" href="#account-vertical-social"
                        aria-expanded="false">
                        <i class="lab la-youtube font-medium-3 mr-1"></i>
                        <span class="font-weight-bold">Homepage Video</span>
                    </a>
                </li>
            </ul>
        </div>
        <!--/ left menu section -->

        <!-- right content section -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <!-- general tab -->
                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                            aria-labelledby="account-pill-general" aria-expanded="true">
                            <!-- form -->
                            <form class="general_setting" method="post" action="{{ route('update.heading.text') }}"
                                data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <!-- social header -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Heading</label>
                                            <input type="text" value="{{ $homedetails->heading }}" class="form-control"
                                                name="heading" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Sub-Heading</label>
                                            <textarea type="text" class="form-control" name="subheading"
                                                rows="6">{{ $homedetails->subheading }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mr-1 float-right">Update
                                            Text</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ general tab -->

                        <!-- general tab -->
                        <div role="tabpanel" class="tab-pane" id="account-vertical-notification"
                            aria-labelledby="account-pill-notification" aria-expanded="true">
                            <!-- form -->
                            <form class="general_setting" method="post" action="{{ route('update.about.text') }}"
                                data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <!-- social header -->
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">About Title</label>
                                            <input type="text" value="{{ $homedetails->about_title }}"
                                                class="form-control" name="about_title" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>About Description</label>
                                            <textarea class="form-control faq_desc" name="about_desc"
                                                rows="5">{{ $homedetails->about_desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">About Step 1</label>
                                            <input type="text" value="{{ $homedetails->about_setp1 }}"
                                                class="form-control" name="about_setp1" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">About Step 2</label>
                                            <input type="text" value="{{ $homedetails->about_step2 }}"
                                                class="form-control" name="about_step2" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">About Step 3</label>
                                            <input type="text" value="{{ $homedetails->about_step3 }}"
                                                class="form-control" name="about_step3" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mr-1 float-right">Update
                                            Text</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ general tab -->

                          <!-- general tab -->
                          <div role="tabpanel" class="tab-pane" id="account-vertical-whychoose"
                          aria-labelledby="account-pill-whychoose" aria-expanded="true">
                          <form class="general_setting" method="post" action="{{ route('update.whychoose.us') }}"
                              data-parsley-validate autocomplete="off">
                              @csrf
                              <div class="row">
                                  <!-- social header -->
                                  <div class="col-12">
                                      <div class="form-group">
                                          <label for="first-name-column">Card Title 1</label>
                                          <input type="text" value="{{ $homedetails->cardtitle1 }}"
                                              class="form-control" name="cardtitle1" />
                                      </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Card Description 1</label>
                                        <textarea type="text" rows="2" class="form-control" name="carddescr1">{{ $homedetails->carddescr1 }}</textarea>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Card Icon 1</label><small class="text-success" > For Icon Go To <a href="https://icons8.com/line-awesome" target="_blank">Click Here</a></small>
                                        <input type="text" placeholder="Example - <i class='las la-home'></i>" value="{{ $homedetails->cardicon1 }}"
                                            class="form-control" name="cardicon1" />
                                    </div>
                                  </div>

                                  <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Card Title 2</label>
                                        <input type="text" value="{{ $homedetails->cardtitle2 }}"
                                            class="form-control" name="cardtitle2" />
                                    </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                      <label for="first-name-column">Card Description 2</label>
                                      <textarea type="text" rows="2"
                                          class="form-control" name="carddescr2">{{ $homedetails->carddescr2 }}</textarea>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                      <label for="first-name-column">Card Icon 2</label><small class="text-success" > For Icon Go To <a href="https://icons8.com/line-awesome" target="_blank">Click Here</a></small>
                                      <input type="text" placeholder="Example - <i class='las la-home'></i>" value="{{ $homedetails->cardicon2 }}"
                                          class="form-control" name="cardicon2" />
                                  </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Card Title 3</label>
                                        <input type="text" value="{{ $homedetails->cardtitle3 }}"
                                            class="form-control" name="cardtitle3" />
                                    </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                      <label for="first-name-column">Card Description 3</label>
                                      <textarea type="text" rows="2"
                                          class="form-control" name="carddescr3">{{ $homedetails->carddescr3 }}</textarea>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                      <label for="first-name-column">Card Icon 3</label><small class="text-success" > For Icon Go To <a href="https://icons8.com/line-awesome" target="_blank">Click Here</a></small>
                                      <input type="text" placeholder="Example - <i class='las la-home'></i>" value="{{ $homedetails->cardicon3 }}"
                                          class="form-control" name="cardicon3" />
                                  </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Card Title 4</label>
                                        <input type="text" value="{{ $homedetails->cardtitle4 }}"
                                            class="form-control" name="cardtitle4" />
                                    </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                      <label for="first-name-column">Card Description 4</label>
                                      <textarea type="text" rows="2"
                                          class="form-control" name="carddescr4">{{ $homedetails->carddescr4 }}</textarea>
                                  </div>
                                </div>
                                <div class="col-12">
                                  <div class="form-group">
                                      <label for="first-name-column">Card Icon 4</label><small class="text-success" > For Icon Go To <a href="https://icons8.com/line-awesome" target="_blank">Click Here</a></small>
                                      <input type="text" placeholder="Example - <i class='las la-home'></i>" value="{{ $homedetails->cardicon4 }}"
                                          class="form-control" name="cardicon4" />
                                  </div>
                                </div>

                                  <div class="col-12">
                                      <button type="submit" class="btn btn-primary mt-2 mr-1 float-right">Update
                                          Text</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                      <!--/ general tab -->

                       <!-- general tab -->
                       <div role="tabpanel" class="tab-pane" id="account-vertical-funfact"
                       aria-labelledby="account-pill-funfact" aria-expanded="true">
                       <form class="general_setting" method="post" action="{{ route('update.funfact.data') }}"
                           data-parsley-validate autocomplete="off">
                           @csrf
                           <div class="row">
                               <!-- social header -->
                               <div class="col-12">
                                   <div class="form-group">
                                       <label for="first-name-column">Total Install</label>
                                       <input type="text" value="{{ $homedetails->totalinstall }}"
                                           class="form-control" name="totalinstall" />
                                   </div>
                               </div>
                               <div class="col-12">
                                   <div class="form-group">
                                       <label for="first-name-column">Total Download</label>
                                       <input type="text" value="{{ $homedetails->totaldownload }}"
                                           class="form-control" name="totaldownload" />
                                   </div>
                               </div>
                               <div class="col-12">
                                   <div class="form-group">
                                       <label for="first-name-column">Active Users</label>
                                       <input type="text" value="{{ $homedetails->activeuser }}"
                                           class="form-control" name="activeuser" />
                                   </div>
                               </div>
                               <div class="col-12">
                                <div class="form-group">
                                    <label for="first-name-column">Satisfied Users</label>
                                    <input type="text" value="{{ $homedetails->satisfieduser }}"
                                        class="form-control" name="satisfieduser" />
                                </div>
                            </div>
                               <div class="col-12">
                                   <button type="submit" class="btn btn-primary mt-2 mr-1 float-right">Update
                                       Text</button>
                               </div>
                           </div>
                       </form>
                   </div>
                   <!--/ general tab -->

                        <!-- change password -->
                        <div class="tab-pane fade" id="account-vertical-logo" role="tabpanel"
                            aria-labelledby="account-pill-logo" aria-expanded="false">
                            <!-- form -->
                            <form class="logo_setting" method="post" action="{{ route('update.features.text') }}"
                                enctype="multipart/form-data" data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature Title</label>
                                            <input type="text" value="{{ $homedetails->fe_title }}"
                                                class="form-control" name="fe_title" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature Description</label>
                                            <textarea class="form-control faq_desc" name="fe_desc"
                                                rows="5">{{ $homedetails->fe_desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature 1 Title</label>
                                            <input type="text" value="{{ $homedetails->fetitle1 }}"
                                                class="form-control" name="fetitle1" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature 1 Description</label>
                                            <textarea class="form-control faq_desc" name="fedesc1"
                                                rows="3">{{ $homedetails->fedesc1 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature Icon 1</label><small class="text-success" > For Icon Go To <a href="https://icons8.com/line-awesome" target="_blank">Click Here</a></small>
                                            <input type="text" placeholder="Example - <i class='las la-home'></i>" value="{{ $homedetails->feicon1 }}"
                                                class="form-control" name="feicon1" />
                                        </div>
                                      </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature 2 Title</label>
                                            <input type="text" value="{{ $homedetails->fetitle2 }}"
                                                class="form-control" name="fetitle2" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature 2 Description</label>
                                            <textarea class="form-control faq_desc" name="fedesc2"
                                                rows="3">{{ $homedetails->fedesc2 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature Icon 2</label><small class="text-success" > For Icon Go To <a href="https://icons8.com/line-awesome" target="_blank">Click Here</a></small>
                                            <input type="text" placeholder="Example - <i class='las la-home'></i>" value="{{ $homedetails->feicon2 }}"
                                                class="form-control" name="feicon2" />
                                        </div>
                                      </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature 3 Title</label>
                                            <input type="text" value="{{ $homedetails->fetitle3 }}"
                                                class="form-control" name="fetitle3" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature 3 Description</label>
                                            <textarea class="form-control faq_desc" name="fedesc3"
                                                rows="3">{{ $homedetails->fedesc3 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature Icon 3</label><small class="text-success" > For Icon Go To <a href="https://icons8.com/line-awesome" target="_blank">Click Here</a></small>
                                            <input type="text" placeholder="Example - <i class='las la-home'></i>" value="{{ $homedetails->feicon3 }}"
                                                class="form-control" name="feicon3" />
                                        </div>
                                      </div>
                                      <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature 4 Title</label>
                                            <input type="text" value="{{ $homedetails->fetitle4 }}"
                                                class="form-control" name="fetitle4" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature 4 Description</label>
                                            <textarea class="form-control faq_desc" name="fedesc4"
                                                rows="3">{{ $homedetails->fedesc4 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature Icon 4</label><small class="text-success" > For Icon Go To <a href="https://icons8.com/line-awesome" target="_blank">Click Here</a></small>
                                            <input type="text" placeholder="Example - <i class='las la-home'></i>" value="{{ $homedetails->feicon4 }}"
                                                class="form-control" name="feicon4" />
                                        </div>
                                      </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature 5 Title</label>
                                            <input type="text" value="{{ $homedetails->fetitle5 }}"
                                                class="form-control" name="fetitle5" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature 5 Description</label>
                                            <textarea class="form-control faq_desc" name="fedesc5"
                                                rows="3">{{ $homedetails->fedesc5 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature Icon 5</label><small class="text-success" > For Icon Go To <a href="https://icons8.com/line-awesome" target="_blank">Click Here</a></small>
                                            <input type="text" placeholder="Example - <i class='las la-home'></i>" value="{{ $homedetails->feicon5 }}"
                                                class="form-control" name="feicon5" />
                                        </div>
                                      </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature 6 Title</label>
                                            <input type="text" value="{{ $homedetails->fetitle6 }}"
                                                class="form-control" name="fetitle6" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature 6 Description</label>
                                            <textarea class="form-control faq_desc" name="fedesc6"
                                                rows="3">{{ $homedetails->fedesc6 }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Feature Icon 6</label><small class="text-success" > For Icon Go To <a href="https://icons8.com/line-awesome" target="_blank">Click Here</a></small>
                                            <input type="text" placeholder="Example - <i class='las la-home'></i>" value="{{ $homedetails->feicon6 }}"
                                                class="form-control" name="feicon6" />
                                        </div>
                                      </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mr-1 float-right">Update
                                            Text</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ change password -->

                        <!-- payment -->
                        <div class="tab-pane fade" id="account-vertical-payment" role="tabpanel"
                            aria-labelledby="account-pill-payment" aria-expanded="false">
                            <!-- form -->
                            <form class="payment_policy" method="post" action="{{ route('update.download.text') }}"
                                data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Download Title</label>
                                            <input type="text" value="{{ $homedetails->download_title }}"
                                                class="form-control" name="download_title" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Download Description</label>
                                            <textarea class="form-control faq_desc" name="download_desc"
                                                rows="3">{{ $homedetails->download_desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 mr-1 float-right">Update
                                            Text</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ payment-->

                         <!-- payment -->
                         <div class="tab-pane fade" id="account-vertical-testimonial" role="tabpanel"
                         aria-labelledby="account-pill-testimonial" aria-expanded="false">
                         <!-- form -->
                         <form class="payment_policy" method="post" action="{{ route('update.testimonial.text') }}"
                             data-parsley-validate autocomplete="off">
                             @csrf
                             <div class="row">
                                 <div class="col-12">
                                     <div class="form-group">
                                         <label for="first-name-column">Testimonial Title</label>
                                         <input type="text" value="{{ $homedetails->testimonial_title }}"
                                             class="form-control" name="testimonial_title" />
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <div class="form-group">
                                         <label for="first-name-column">Testimonial Description</label>
                                         <textarea class="form-control faq_desc" name="testimonial_desc"
                                             rows="3">{{ $homedetails->testimonial_desc }}</textarea>
                                     </div>
                                 </div>
                                 <div class="col-12">
                                     <button type="submit" class="btn btn-primary mt-1 mr-1 float-right">Update
                                         Text</button>
                                 </div>
                             </div>
                         </form>
                         <!--/ form -->
                     </div>
                     <!--/ payment-->

                      <!-- payment -->
                      <div class="tab-pane fade" id="account-vertical-contact-details" role="tabpanel"
                      aria-labelledby="account-pill-contact-details" aria-expanded="false">
                      <!-- form -->
                      <form class="payment_policy" method="post" action="{{ route('update.contactdetails.text') }}"
                          data-parsley-validate autocomplete="off">
                          @csrf
                          <div class="row">
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="first-name-column">Contact Title</label>
                                      <input type="text" value="{{ $homedetails->contact_title }}"
                                          class="form-control" name="contact_title" />
                                  </div>
                              </div>
                              <div class="col-12">
                                  <div class="form-group">
                                      <label for="first-name-column">Contact Description</label>
                                      <textarea class="form-control faq_desc" name="contact_desc"
                                          rows="3">{{ $homedetails->contact_desc }}</textarea>
                                  </div>
                              </div>
                              <div class="col-12">
                                  <button type="submit" class="btn btn-primary mt-1 mr-1 float-right">Update
                                      Text</button>
                              </div>
                          </div>
                      </form>
                      <!--/ form -->
                  </div>
                  <!--/ payment-->

                        <!-- Shipping -->
                        <div class="tab-pane fade" id="account-vertical-shipping" role="tabpanel"
                            aria-labelledby="account-pill-shipping" aria-expanded="false">
                            <!-- form -->
                            <form class="shipping_policy" method="post" action="{{ route('update.screenshot.text') }}"
                                data-parsley-validate autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Screenshot Title</label>
                                            <input type="text" value="{{ $homedetails->screenshot_title }}"
                                                class="form-control" name="screenshot_title" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Screenshot Description</label>
                                            <textarea class="form-control faq_desc" name="screenshot_desc"
                                                rows="3">{{ $homedetails->screenshot_desc }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 mr-1 float-right">Update
                                            Text</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ Shipping-->

                        <!-- information -->
                        <div class="tab-pane fade" id="account-vertical-social" role="tabpanel"
                            aria-labelledby="account-pill-social" aria-expanded="false">
                            <!-- form -->
                            <form class="social_setting" method="post"
                                action="{{ route('update.contactvideodetails.text') }}" data-parsley-validate
                                autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Homepage Video Link</label>
                                            <input type="text" value="{{ $homedetails->contact_video }}"
                                                class="form-control" name="contact_video" />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-1 mr-1 float-right">Update
                                            Text</button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                        <!--/ information -->
                    </div>
                </div>
            </div>
        </div>
        <!--/ right content section -->
    </div>
    <!-- END: Content-->
    @endsection @section('js')
    <!-- link custom js link here -->
    <script src="{{ URL::asset('admin-assets/css/custom/js/websitesetting/websitesetting.js') }}"></script>
@endsection
