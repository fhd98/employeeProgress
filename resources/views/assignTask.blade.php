<html>
<head>

<link rel="stylesheet" href="assets/tasksForm/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="assets/tasksForm/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="assets/tasksForm/adminlte.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="assets/plugins/summernote/summernote-bs4.min.css">

<title>Assign Tasks</title>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/dashboard" class="nav-link">Home</a>
      </li>
      <li class=" d-sm-inline-block">
        <a href="/approvedEmployees" class="nav-link">Approved</a>
      </li>
      
      <li class=" d-sm-inline-block">
        <a href="/rejectedEmployees" class="nav-link">Rejected</a>
      </li>
      <li class=" d-sm-inline-block">
        <a href="/pendingEmployees" class="nav-link">Pending</a>
      </li>
      
      <li class=" d-sm-inline-block">
        <a href="/task-assign" class="nav-link">Task Assigning</a>
      </li><!-- comment -->
      <li class=" d-sm-inline-block">
        <a href="/task-view" class="nav-link">Tasks View</a>
      </li>
      <li class=" d-sm-inline-block">
        <a href="/view-leaves" class="nav-link">Leaves Status</a>
      </li><!-- comment -->
<li class=" d-sm-inline-block">
        <a href="/profile-view" class="nav-link">Admin Profile</a>
</li><!-- comment -->

<li class=" d-sm-inline-block">
        <a href="/team-profiles" class="nav-link">Team Profiles</a>
</li>
      
      
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a  href="/logout" >
          Logout
        </a>
        
  </nav>
<div class="content-wrapper">

<div class="col-md-6">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Assign Task</h3>
              </div>
            
              <form method="POST" action="/taskPost">
                  
                  {!! csrf_field() !!}
                  
                  @if(session()->has('error'))
                  <div class="col-md-12 mt-2">
                      <div class="alert alert-danger"> {{$error ?? '' }} </div>                                                              
                  </div>                      
                  @endif
                <div class="card-body">             

                      

                      <div class="form-group">
                        <label>Assign To</label>
                        <select required  name="assign_to"  class="form-control">
                          <option value="">Select Employee</option>
                          @foreach ($employeeList as $row)
                          <option value="{{$row->e_name}}">{{$row->e_name}}</option>
                          @endforeach
                            
                        </select>
                      </div>

                    <div class="form-group">
                        <label>Task Title </label>
                        <input name="t_title" value="{{$postedData['t_title'] ?? ''}}"  type="text" class="form-control" placeholder=""/>
                      </div>
                    
                      <div class="form-group">
                        <label>Details </label>
                        <input name="t_details" value="{{$postedData['t_details'] ?? ''}}"  type="text" class="form-control" placeholder=""/>
                      </div>

                      <div class="form-group">
                  <label>Completion Deadline:</label> <br/>
                  <input   type="date" value="{{$postedData['deadline'] ?? ''}}" id="" name="deadline"/>
                </div>

                

                 
                  
                </div>

                <div class="card-footer">
                  <button type="submit"  class="btn btn-primary">Submit</button>
                </div>
              </form>
              </div>

              </div>
              </div>