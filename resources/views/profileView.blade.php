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
    
    <title>Admin Profile</title>
    <style>
        
        @import url('https://fonts.googleapis.com/css?family=Montserrat');

* {
	box-sizing: border-box;
}

body {
	background-color: #28223F;
	font-family: Montserrat, sans-serif;
	
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;

	min-height: 100vh;
	margin: 0;
}

h3 {
	margin: 10px 0;
}

h6 {
	margin: 5px 0;
	text-transform: uppercase;
}

p {
	font-size: 14px;
	line-height: 21px;
}

.card-container {
	background-color: #231E39;
	border-radius: 5px;
	box-shadow: 0px 10px 20px -10px rgba(0,0,0,0.75);
	color: #B3B8CD;
	padding-top: 30px;
	position: relative;
	width: 350px;
	max-width: 100%;
	text-align: center;
}

.card-container .pro {
	color: #231E39;
	background-color: #FEBB0B;
	border-radius: 3px;
	font-size: 14px;
	font-weight: bold;
	padding: 3px 7px;
	position: absolute;
	top: 30px;
	left: 30px;
}

.card-container .round {
	border: 1px solid #03BFCB;
	border-radius: 50%;
	padding: 7px;
}

button.primary {
	background-color: #03BFCB;
	border: 1px solid #03BFCB;
	border-radius: 3px;
	color: #231E39;
	font-family: Montserrat, sans-serif;
	font-weight: 500;
	padding: 10px 25px;
}

button.primary.ghost {
	background-color: transparent;
	color: #02899C;
}

.skills {
	background-color: #1F1A36;
	text-align: left;
	padding: 15px;
	margin-top: 30px;
}

.skills ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
}

.skills ul li {
	border: 1px solid #2D2747;
	border-radius: 2px;
	display: inline-block;
	font-size: 12px;
	margin: 0 7px 7px 0;
	padding: 7px;
}

footer {
    background-color: #222;
    color: #fff;
    font-size: 14px;
    bottom: 0;
    position: fixed;
    left: 0;
    right: 0;
    text-align: center;
    z-index: 999;
}

footer p {
    margin: 10px 0;
}

footer i {
    color: red;
}

footer a {
    color: #3c97bf;
    text-decoration: none;
}
    </style>
    
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
      
      
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a  href="/logout" >
          Logout
        </a>
        
  </nav>

<div class="card-container">
    <span class="pro"><a href="profile-edit"> Edit </a></span>
	<img class="round" src="adminProfilePictures/{{ ($adminInfo->picture) }}" alt="Admin Picture" width="200" height="200" />
	<h3>{{$adminInfo['name']}}</h3>
	<h6>{{$adminInfo['department']}}</h6>
        <p><b>Expertise:</b>   {{$adminInfo['expertise']}}</p>
        <p><b>Experience:</b>   {{$adminInfo['experience']}} years</p>

	<div class="buttons">
		<button class="primary">
			Message
		</button>
		<button class="primary ghost">
			Following
		</button>
	</div>
	<div class="skills">
		<h6>Skills</h6>
		<ul>
			<li>UI / UX</li>
			<li>Front End Development</li>
			<li>HTML</li>
			<li>CSS</li>
			<li>JavaScript</li>
			<li>React</li>
			<li>Node</li>
		</ul>
	</div>
</div>

