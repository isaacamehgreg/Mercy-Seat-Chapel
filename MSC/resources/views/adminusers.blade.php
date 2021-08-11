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
    
              <span class="nav-profile-name">Admin</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
             
              <a class="dropdown-item" href='/logout'>
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
            <a class="nav-link" href="/">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/users">
              <i class="mdi mdi-content-paste menu-icon"></i>
              <span class="menu-title">Slots</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="/users">
              <i class="mdi mdi-account-multiple-outline menu-icon"></i>
              <span class="menu-title">Users</span>
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
                              <h5 class="mr-2 mb-0">{{DB::table('slots')->where('status','opened')->count()}}</h5>
                             
                            </div>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi  mdi-key mr-3 icon-lg text-danger"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Closed Slot</small>
                            <h5 class="mr-2 mb-0">{{DB::table('slots')->where('status','closed')->count()}}</h5>
                          </div>
                        </div>
                        <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                          <i class="mdi mdi-account-multiple-outline mr-3 icon-lg text-success"></i>
                          <div class="d-flex flex-column justify-content-around">
                            <small class="mb-1 text-muted">Total Members</small>
                            <h5 class="mr-2 mb-0">{{DB::table('users')->where('role','worker')->orWhere('role','visitor')->count()}}</h5>
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
                  <h4 class="card-title">All Members</h4>
                 
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        
                       
                          <th>Name</th>
                          <th>Email</th>
                          <th>Booked</th>
                          <th>Attended</th>
                          <th>Missed</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                        <tr>
                   
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{DB::table('attendees')->where('user_id', $user->id)->count()}}</td>
                          <td>{{DB::table('attendees')->where('user_id', $user->id)->where('is_confirmed', true)->count()}}</td>
                          <td>{{DB::table('attendees')->where('user_id', $user->id)->where('is_confirmed', false)->count()}}</td>
                          <td><button class="btn btn-info"  data-toggle="modal" data-target="#exampleModalCenter{{$user->id}}">More</button></td>
                        </tr>
                        @endforeach
                     
                                    
                      </tbody>
                    </table>
                    {{$users->links()}}
                  </div>
                </div>
              </div>
            </div>


           

            @foreach ($users as $user)
            <div class="modal fade" id="exampleModalCenter{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"> {{$user->name}} </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              
                  <div class="modal-body">
                    <div class="card-body">
                
               
                      <div class="form-group">
                        <label>Name: </label>
                          {{$user->name}}
                      </div>
                      <div class="form-group">
                        <label>Email: </label>
                          {{$user->email}}
                      </div>
                      <div class="form-group">
                        <label>Address: </label>
                          {{$user->address}}
                      </div>
                      <div class="form-group">
                        <label>Phone: </label>
                          {{$user->phone}}
                      </div>
                      <div class="form-group">
                        <label>Role: </label>
                          {{$user->role}}
                      </div>
                      
                      
                     
                    </div>
                  </div>
           
      
                   
                  </div>
                </form>
                </div>
              </div>
            </div>
            @endforeach


            
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

