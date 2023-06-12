<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/custom/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/animation/animation.min.css') }}">
    <title>Assessment</title>

</head>

<body>
    <div class="main-wrapper">
        <!-- ---------NAVBAR--------- -->
        <div class="header-container fixed-top shadow">
            <header class="header navbar navbar-expand-sm expand-header">
                <div class="header-left d-flex">
                    <a href="#" class="sidebarCollapse">
                        <i class="fas fa-bars text-muted"></i>
                    </a>
                    <div class="logo">
                        Assessment
                    </div>
                </div>

            </header>
        </div>
        <!-- -------NAVBAR END------ -->
        <!-- -------SIDEBAR START------- -->
        <div class="left-menu">
            <div class="menubar-content">
                <nav class="animated inOut">
                    <ul id="sidebar">

                        <li>
                            <a href="{{ route('profile.index') }}"><i class="fas fa-toolbox"></i><span
                                    class="font-hide">Profile</span></a>
                        </li>
                        <li>
                            <a href="{{ route('report.index') }}"><i class="fas fa-toolbox"></i><span
                                    class="font-hide">Report</span></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- -------SIDEBAR END------- -->
        <div class="content-wrapper">
            <sectino class="dashboard">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-6 col-sm-6 col-md-8">
                            <h3 class="m-0 text-muted">Forms</h3>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4">
                            <ol class="breadcrumb" style="float: right;">
                                <li class="breadcrumb-item"><a href="#" class="bread">Home</a></li>
                                <li class="breadcrumb-item active">Form</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6 col-sm-6 col-md-6">

                            <div class="card">
                                <div class="card-header ">
                                    <h4 class="text-center">Profile From</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('profile.update', $id) }}">
                                        @csrf
                                        <input type="hidden" value="PUT" name="_method">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $profile->first_name }}" name="first_name">

                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword2" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="exampleInputPassword2"
                                                value="{{ $profile->last_name }}" name="last_name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword3" class="form-label">Date of Birth</label>
                                            <input type="date" class="form-control" id="exampleInputPassword3"
                                                value="{{ $profile->date_of_birth }}" name="date_of_birth">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputPassword5" class="form-label">Gender</label>
                                            <select class="form-select" id="exampleInputPassword5" required
                                                name="gender">
                                                <option value="{{ $profile->gender }}" selected hidden>
                                                    {{ $profile->gender }}</option>
                                                @if (is_null($profile->gender))
                                                    <option selected disabled value="">Choose Gender</option>
                                                @endif
                                                <option value="male"> Male</option>
                                                <option value="female"> Female</option>
                                                <option value="other"> Other</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </section>
        </div>

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/chart/chart.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/custom/custom.js') }}"></script>
</body>

</html>
