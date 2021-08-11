<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mercy Seat Chapel</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
        
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant">MSC</span>
          </button>

        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="input-group">
              
              
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
         
         
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
    
              <span class="nav-profile-name">{{$user->name}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             
              <a class="dropdown-item" href="logout">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">

       
       
         
          <li class="nav-item">
            <a class="nav-link" href="/user">
              <i class="mdi mdi-account-multiple-outline menu-icon"></i>
              <span class="menu-title">Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">
              <i class="mdi mdi-logout menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>

        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                
                  <button class="btn btn-primary mt-2 mt-xl-0"  data-toggle="modal" data-target="#exampleModalCenter">book a slot</button>
                </div>
              </div>
            </div>
          </div>
    
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body dashboard-tabs p-0">
               
                  <div class="tab-content py-0 px-0">
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                      <div class="d-flex flex-wrap justify-content-xl-between">
                        <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-calendar-heart icon-lg mr-3 text-primary"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Opened Slot</small>
                            <div class="dropdown">
                              <a class="btn btn-secondary p-0 bg-transparent border-0 text-dark shadow-none font-weight-medium" href="#" role="button" id="dropdownMenuLinkA" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="mr-2 mb-0">{{DB::table('slots')->where('status','opened')->count()}}</h5>
                              </a>
                             
                            </div>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-book-open-variant mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Booked Slot</small>
                            <h5 class="mr-2 mb-0">{{DB::table('attendees')->where('user_id',Auth::user()->id)->count()}}</h5>
                          </div>
                        </div>

                       
                        
                      </div>
                    </div>

                  
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">


            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">My Slots</h4>
                 
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                     
                            
                       
                        <tr>
                        
                          <th>Slot ID</th>
                          <th>Sundays</th>
                          <th>Date</th>
                          <th>Status</th>
                          
                          <th>cancel</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @foreach ($attendees as $attendee)
                        <tr>
                          <th>{{$attendee->id}}</th>
                          <td>{{DB::table('slots')->where('id',$attendee->sunday_id)->value('title')}}</td>
                          <td>{{DB::table('slots')->where('id',$attendee->sunday_id)->value('date')}}</td>
                          @if (DB::table('slots')->where('id',$attendee->sunday_id)->value('date') == 'closed')
                          <td><label class="badge badge-danger">{{DB::table('slots')->where('id',$attendee->sunday_id)->value('status')}}</label></td>
                          @else
                          <td><label class="badge badge-success">{{DB::table('slots')->where('id',$attendee->sunday_id)->value('status')}}</label></td>
                          @endif
                          
                          <td><a class="btn btn-danger" href="/attend/delete/{{$attendee->id}}">cancel booking</a></td>
                        </tr>
                   
                        @endforeach
                                    
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>


           




            
          </div>
        
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © unorthodox solution 2021</span>

          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->






  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Opened Sundays to Attend</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card">
            <div class="card-body">
           
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Sunday</th>
                      <th>Date</th>
                      <th>Slots</th>
                      <th>Book</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($slots as $slot)
                        
                    @if (DB::table('attendees')->where('user_id',Auth::user()->id)->where('sunday_id',$slot->id)->count() == 0)

                    <tr>
                      <td>{{$slot->title}}</td>
                      <td>{{$slot->date}}</td>
                      <td class="text-info"> {{$slot->slot}} </td>
                      <td><a href="/attend/{{$slot->id}}" class="btn btn-danger">Book a Slot</a></td>
                    </tr>

                    @endif
                   
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         
        </div>
      </div>
    </div>
  </div>






  <!-- plugins:js -->
  <script src="vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/data-table.js"></script>
  <script src="js/jquery.dataTables.js"></script>
  <script src="js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
</body>

</html>

