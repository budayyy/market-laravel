@extends('layouts.main')

@section('content')
    <div class="content pt-3">
        <div class="row">
            <div class="col-lg-4">
                <div class="card" style="height: 30rem">
                    <div class="card-header">
                        <h5>Chat</h5>
                    </div>
                    <div class="card-body" style="height: 100%">
                        
                        <div class="direct-chat-messages" style="height: 100%">
                            <ul class="contacts-list">
                                <li>
                                  <a href="#">
                                    <img class="contacts-list-img" src="{{ asset('adminlte/dist/img/user1-128x128.jpg') }}" alt="User Avatar">
            
                                    <div class="contacts-list-info">
                                      <span class="contacts-list-name text-dark">
                                        Count Dracula
                                        <small class="contacts-list-date float-right">2/28/2015</small>
                                      </span>
                                      <span class="contacts-list-msg">How have you been? I was...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                  </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                  <a href="#">
                                    <img class="contacts-list-img" src="{{ asset('adminlte/dist/img/user7-128x128.jpg') }}" alt="User Avatar">
            
                                    <div class="contacts-list-info">
                                      <span class="contacts-list-name text-dark">
                                        Sarah Doe
                                        <small class="contacts-list-date float-right">2/23/2015</small>
                                      </span>
                                      <span class="contacts-list-msg">I will be waiting for...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                  </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                  <a href="#">
                                    <img class="contacts-list-img" src="{{ asset('adminlte/dist/img/user3-128x128.jpg') }}" alt="User Avatar">
            
                                    <div class="contacts-list-info">
                                      <span class="contacts-list-name text-dark">
                                        Nadia Jolie
                                        <small class="contacts-list-date float-right">2/20/2015</small>
                                      </span>
                                      <span class="contacts-list-msg">I'll call you back at...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                  </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                  <a href="#">
                                    <img class="contacts-list-img" src="{{ asset('adminlte/dist/img/user5-128x128.jpg') }}" alt="User Avatar">
            
                                    <div class="contacts-list-info">
                                      <span class="contacts-list-name text-dark">
                                        Nora S. Vans
                                        <small class="contacts-list-date float-right">2/10/2015</small>
                                      </span>
                                      <span class="contacts-list-msg">Where is your new...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                  </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                  <a href="#">
                                    <img class="contacts-list-img" src="{{ asset('adminlte/dist/img/user6-128x128.jpg') }}" alt="User Avatar">
            
                                    <div class="contacts-list-info">
                                      <span class="contacts-list-name text-dark">
                                        John K.
                                        <small class="contacts-list-date float-right">1/27/2015</small>
                                      </span>
                                      <span class="contacts-list-msg">Can I take a look at...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                  </a>
                                </li>
                                <!-- End Contact Item -->
                                <li>
                                  <a href="#">
                                    <img class="contacts-list-img" src="{{ asset('adminlte/dist/img/user8-128x128.jpg') }}" alt="User Avatar">
            
                                    <div class="contacts-list-info">
                                      <span class="contacts-list-name text-dark">
                                        Kenneth M.
                                        <small class="contacts-list-date float-right">1/4/2015</small>
                                      </span>
                                      <span class="contacts-list-msg">Never mind I found...</span>
                                    </div>
                                    <!-- /.contacts-list-info -->
                                  </a>
                                </li>
                                <!-- End Contact Item -->
                              </ul>
                              <!-- /.contacts-list -->
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card" style="height: 30rem">
                    <div class="card-header">
                        <h5>Message</h5>
                    </div>
                    <div class="card-body" style="height: 100%">
                        <div class="direct-chat-messages" style="height: 100%">
                            <!-- Message. Default to the left -->
                            <div class="direct-chat-msg">
                              <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">Alexander Pierce</span>
                                <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                              </div>
                              <!-- /.direct-chat-infos -->
                              <img class="direct-chat-img" src="{{ asset('adminlte/dist/img/user1-128x128.jpg')}}" alt="message user image">
                              <!-- /.direct-chat-img -->
                              <div class="direct-chat-text">
                                Is this template really for free? That's unbelievable!
                              </div>
                              <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->
          
                            <!-- Message to the right -->
                            <div class="direct-chat-msg right">
                              <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right">Sarah Bullock</span>
                                <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                              </div>
                              <!-- /.direct-chat-infos -->
                              <img class="direct-chat-img" src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="message user image">
                              <!-- /.direct-chat-img -->
                              <div class="direct-chat-text">
                                You better believe it!
                              </div>
                              <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->
          
                            <!-- Message. Default to the left -->
                            <div class="direct-chat-msg">
                              <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-left">Alexander Pierce</span>
                                <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                              </div>
                              <!-- /.direct-chat-infos -->
                              <img class="direct-chat-img" src="{{ asset('adminlte/dist/img/user1-128x128.jpg') }}" alt="message user image">
                              <!-- /.direct-chat-img -->
                              <div class="direct-chat-text">
                                Working with AdminLTE on a great new app! Wanna join?
                              </div>
                              <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->
          
                            <!-- Message to the right -->
                            <div class="direct-chat-msg right">
                              <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-right">Sarah Bullock</span>
                                <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                              </div>
                              <!-- /.direct-chat-infos -->
                              <img class="direct-chat-img" src="{{ asset('adminlte/dist/img/user3-128x128.jpg') }}" alt="message user image">
                              <!-- /.direct-chat-img -->
                              <div class="direct-chat-text">
                                I would love to.
                              </div>
                              <!-- /.direct-chat-text -->
                            </div>
                            <!-- /.direct-chat-msg -->
          
                          </div>
                    </div>
                    <div class="card-footer">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Ketikan sesuatu" aria-label="Ketikan sesuatu" aria-describedby="button-addon2">
                            <button class="btn btn-outline-primary" type="button" id="button-addon2">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection