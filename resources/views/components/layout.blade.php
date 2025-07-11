<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Travel</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="{{asset('img/icon.png')}}">
     @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/posts">
                <div class="sidebar-brand-icon ">
                    <!-- <i class="fas fa-laugh-wink"></i> -->
                    <h1 style="text-indent:-999999px;background:url('{{asset('img/logo1.png')}}');background-size: 70px 70px;width:70px;
                        height: 70px;">
                        Logo here
                    </h1>
                </div>
                <div class=" sidebar-brand-text mx-3">Travel
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/posts">
                    <i class="fa-solid fa-house-user"></i>
                    <span>View all Post</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fa-solid fa-users"></i>
                    <span>Users</span>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Users</h6>
                        <a class="collapse-item" href="/tables">ViewUsers</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDepartaments"
                    aria-expanded="true" aria-controls="collapseDepartaments">
                    <i class="fa-solid fa-building-user"></i>
                    <span>Departments</span>
                </a>
                <div id="collapseDepartaments" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Departments</h6>
                        <a class="collapse-item" href="/create_departaments">CreateDepatments</a>
                        <a class="collapse-item" href="/displayDepartments">Afisare Departamente</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="/login">Login</a>
                        <a class="collapse-item" href="/register">Register</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown" id="alertsItem">
                                <h6 class=" dropdown-header">
                                    Alerts Center
                                </h6>


                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown" id="alertComments">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>

                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                           @auth
                               <a class='nav-link dropdown-toggle' href='#' id='userDropdown' role='button'
      data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
      <span class='mr-2 d-none d-lg-inline text-gray-600 small'> 
         {{ Auth::user()->firstName }}  {{ Auth::user()->lastName }}
      </span>
      <img class='img-profile rounded-circle' 
           src="{{ asset(Auth::user()->profile_photo) }}" alt='Profile Image'>
   </a>
                           @endauth
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/profile">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <button id="buttonLogout" class="btn btn-primary">Logout</button>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                {{$slot}}

                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    @csrf
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('jquery/jquery.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('chart.js/Chart.min.js')}}"></script>
    <!-- Page level plugins -->
    <script src="{{asset('datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('datatables/dataTables.bootstrap4.min.js')}}"></script>


</body>
<script>
    var userId = "{{ Auth::user()->id }}"; // Acest lucru este OK deoarece este în Blade și este pre-procesat pe server
    var comments = {!! json_encode(session('comments')) !!}; // Acest lucru este OK pentru că este generat de Blade
    var baseUrl = "{{ url('/') }}";
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('#buttonLogout').on('click', function() {
        console.log("OK");
        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
            type: "POST",
            url: '/logout',
            data: [],
            async: false, // Trimiterea sincronizată a cererii (opțional)
            success:function(){
              window.location.href="/";
            }
        });
        
    });

    $('#messagesDropdown').on('click', function() {
        var user_id = userId;
        var selectForm = $('#alertComments');
        
        // Inițializare AJAX pentru comentarii
        $.ajax({
            type: "GET",
            url: '/comments',
            data: {},
            success: function(response) {
                console.log("A mers");
                console.log(comments);
                comments.forEach(function(dep) {
                    var start_actual_time = new Date(dep.created_at);
                    var end_actual_time = new Date();

                    var diff = new Date(end_actual_time - start_actual_time);
                    var diffSeconds = diff / 1000;
                    var HH = Math.floor(diffSeconds / 3600);
                    var MM = Math.floor(diffSeconds % 3600 / 60);

                    var formatted = ((HH < 10) ? ("0" + HH) : HH) + "h:" + ((MM < 10) ? ("0" + MM) : MM) + "m";
                    
                    // Dacă profilul este gol, folosește imaginea implicită
                    var profil =dep.user.profile_photo;
                    if (dep.user.profile_photo == "") {
                        profil = 'img/undraw_profile_2.svg';
                    }
                     var profileUrl = baseUrl + '/' + profil;
                    // Construcția stringului nume_from (acces direct la datele din obiectul primit de la server)
                    var nume_from = dep.user.lastName ? "  -   " + dep.user.lastName : ""; 
                    var htmlString = "";

                    if (!dep.user.lastName) {
                        nume_from = "";
                        htmlString = `
                            <a class="dropdown-item d-flex align-items-center dynamic-item" href="chat.php?id_post=${dep.posts_id}">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="{{asset('${profil}')}}" alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">${dep.description}</div>
                                    <div class="small text-gray-500">${dep.user.firstName} · ${formatted}</div>
                                </div>
                            </a>`;
                    } else {
                        htmlString = `
                            <a class="dropdown-item d-flex align-items-center dynamic-item" href="chat.php?id_post=${dep.posts_id}">
                                <div class="dropdown-list-image mr-3">
                                    <img class="rounded-circle" src="{{asset('${profil}')}}" alt="...">
                                    <div class="status-indicator bg-success"></div>
                                </div>
                                <div class="font-weight-bold">
                                    <div class="text-truncate">${dep.description}</div>
                                    <div class="small text-gray-500">${dep.user.lastName} ${dep.user.firstName} · ${formatted}</div>
                                </div>
                            </a>`;
                    }

                    // Afișează HTML-ul generat
                    selectForm.append(htmlString);
                });
                
                console.log("am afisat");
            },
            error: function(response) {
                console.log("Nu A mers");
            }
        });

        // Curățare la fiecare click pe dropdown
        selectForm.find('.dynamic-item').remove();
    });
     $('#alertsDropdown').on('click', function() {
        var user_id = userId;
        var selectForm = $('#alertsItem');
        $.ajax({
            type: "GET",
            url: '/posts/index',
            data: {
                
            },
            success: function(response) {
                console.log("A mers");
                console.log(response);
                console.log(typeof response);
                
                response['posts'].forEach(function(dep) {
                    if (dep.user.profile_photo == "") {
                        dep.user.profile_photo = 'img/undraw_profile_2.svg';
                    }
                    $nume_from = "  -   " + dep.user.lastName;
                    var htmlString = "";
                    console.log(dep.user_id);
                    console.log(dep.posts_id);
                    console.log(dep.user);
                    if (dep.user.lastName == "") {
                        $nume_from = "";
                        htmlString = "<a class=\"dropdown-item d-flex align-items-center dynamic-item-post\" href=\"uniquePost.php?id_post=" + dep.id_post + "&id_user=" + dep.id_user + "\" data-user_id='" + dep.id_post + "' > " +
                            "    <div class=\"mr-3\">" +
                            "        <div class=\"icon-circle bg-warning\">" +
                            "<img class='img-profile rounded-circle'src ={{asset( '" + dep.user.profile_photo + "')}} alt = 'img/undraw_profile_2.svg' class='img - fluid' > " +
                            "        </div>" +
                            "    </div>" +
                            "    <div>" +
                            "        <div class=\"small text-gray-500\">" + dep.user.firstName + " " + dep.user.lastName + " " + dep.dateTime + "</div>" +
                            dep.description +
                            "    </div>" +
                            "</a>";
                    } else {
                        htmlString = "<a class=\"dropdown-item d-flex align-items-center  dynamic-item-post\" href=\"uniquePost.php?id_post=" + dep.id_post + "&id_user=" + dep.id_user + "\" data-user_id='" + dep.id_post + "'>" +
                            "        <div class=\"icon-circle bg-warning\">" +
                            "<img class='img-profile rounded-circle' src = {{asset( '" + dep.user.profile_photo + "')}} alt = 'img/undraw_profile_2.svg' class='img - fluid' > " +
                            "        </div>" +
                            "    </div>" +
                            "    <div>" +
                            "        <div class=\"small text-gray-500\">" + dep.user.firstName + " " + dep.user.lastName + " -" + dep.user.lastName + " " + dep.data_share + "</div>" +
                            dep.description +
                            "    </div>" +
                            "</a>";
                    }

                    console.log(htmlString); // Verifică ce conține htmlString
                    selectForm.append(htmlString);
                });
                console.log("am afisat");
            },
            error: function(response) {
                console.log("Nu A mers");
            }
        });
        $('#alertsDropdown').on('click', function() {
            selectForm.find('.dynamic-item-post').remove();

        });

    });
</script>


</html>
