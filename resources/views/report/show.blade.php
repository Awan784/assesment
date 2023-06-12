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

                                    <input type="hidden" value="PUT" name="_method">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">
                                            Title
                                        </label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            value="{{ $report->title }}" name="title">

                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputPassword2" class="form-label">Description</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" value="{{ $report->description }}"
                                            name="description">
                                            {{ $report->description }}
                                            </textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="value" style="margin-bottom: 10px;">Profle</label>
                                        @foreach ($report->reports as $value)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $value->id }}" name="profile[]" checked disabled>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{ $value->user->first_name }} {{ $value->user->last_name }}
                                                </label>
                                            </div>
                                        @endforeach



                                    </div>


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
