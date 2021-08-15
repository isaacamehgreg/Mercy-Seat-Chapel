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
             
              <a class="dropdown-item">
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
            <a class="nav-link" href="/slots">
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
                
                  <button class="btn btn-primary mt-2 mt-xl-0 btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Create a slot</button>
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
                  <h4 class="card-title">All Slots</h4>
                 
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                        
                          <th>Sundays</th>
                          {{-- <th>Progress</th> --}}
                          
                          <th>Slots</th>
                          <th>Attendees</th>
                          <th> Deadline</th>
                          <th>Status</th>
                          <th>action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach ($slots as $slot)
                            
                      
                        <tr>
                          <td>{{$slot->title}}</td>
                          {{-- <td>
                            <div class="progress">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td> --}}
                          <td>{{$slot->title}}</td>
                          <td>{{DB::table('attendees')->where('sunday_id',$slot->id)->count()}}</td>
                          <td>{{$slot->date}}</td>
                            @if ($slot->status == 'closed')
                            <td><label class="badge badge-danger">{{$slot->status}}</label></td>
                            @else
                            <td><label class="badge badge-success">{{$slot->status}}</label></td>
                            @endif
                          <td><button class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalCenter{{$slot->id}}">manage</button></td>
                        </tr>
                        @endforeach
                     
                                    
                      </tbody>
                    </table>
                    {{$slots->links()}}
                  </div>
                </div>
              </div>
            </div>

             
          </div>
        







        </div>
        <!-- content-wrapper ends -->


        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Create a slot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/slot" method="post">@csrf
              <div class="modal-body">
                <div class="card-body">
            
                  </p>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control form-control-lg" placeholder="eg thanksgiving sunday" required aria-label="Username">
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="datetime-local" name="date" class="form-control" placeholder="Date" required aria-label="Username">
      
                  </div>
                  <div class="form-group">
                    <label>Slot Space</label>
                    <input type="number" name="slot" class="form-control form-control-sm" required placeholder="Allocate Slot" aria-label="Username">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
            </form>
            </div>
          </div>
        </div>






        @foreach ($slots as $slot)
        <div class="modal fade" id="exampleModalCenter{{$slot->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 class="modal-title" id="exampleModalCenterTitle">Update or Delete slot </h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="/slot/update/{{$slot->id}}" method="post">@csrf
              <div class="modal-body">
                <div class="card-body">
            
                  </p>
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" value="{{$slot->title}}" class="form-control form-control-lg" placeholder="eg thanksgiving sunday" required aria-label="Username">
                  </div>
                  <div class="form-group">
                    <label>Date</label>
                    <input type="datetime-local" name="date" value="{{$slot->date}}" class="form-control" placeholder="{{$slot->date}}" required aria-label="Username">
      
                  </div>
                  <div class="form-group">
                    <label>Slot Space</label>
                    <input type="number" name="slot" value="{{$slot->slot}}" class="form-control form-control-sm" required placeholder="Allocate Slot" aria-label="Username">
                  </div>
                </div>
              </div>
               <div class="modal-footer row justify-content-lg-between">
                <a class="btn btn-danger" href="/slot/delete/{{$slot->id}}" >Delete</a>
    
                @if ($slot->id == 'closed')
                <a class="btn btn-warning" href="/slot/open/{{$slot->id}}" >Reopen Slot</a> 
                @else
                <a class="btn btn-warning" href="/slot/close/{{$slot->id}}" >Close Slot</a>
                @endif
                

                <button class="btn btn-primary" type="submit" >Update</button>
               
              </div>
            </form>
            </div>
          </div>
        </div>
        @endforeach








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

