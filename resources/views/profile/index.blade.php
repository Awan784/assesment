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
            <section class="dashboard">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-6 col-sm-6 col-md-8">
                            <h3 class="m-0 text-muted">Profiles</h3>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4">
                            <ol class="breadcrumb" style="float: right;">
                                <li class="breadcrumb-item"><a href="{{ route('profile.index') }}"
                                        class="bread">profile</a></li>
                                <li class="breadcrumb-item active">index</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row border shadow p-2 rowbox">
                        <div class="col-3 col-sm-3 col-md-3">

                            <a href="{{ route('profile.edit', 0) }}" class="btn btn-block btn-success btn">Create
                                Profile</a>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 mt-2 table-responsive">
                            <label style="font-weight: 700; font-size: 20px; padding-left: 40%;">Profile</label>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="p-1">#</th>
                                        <th class="p-1">First Name</th>
                                        <th class="p-1">Last Name
                                        </th>
                                        <th class="p-1">Date Of Birth</th>
                                        <th class="p-1">Gender</th>
                                        <th class="p-1">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($profile as $key=>$value)
                                        <tr>
                                            <th class="p-1">{{ $key + 1 }}</th>
                                            <td class="p-1" class="p-1">{{ $value->first_name }}</td>
                                            <td class="p-1">{{ $value->last_name }}</td>
                                            <td class="p-1">{{ $value->date_of_birth }}</td>
                                            <td class="p-1">{{ $value->gender }}</td>
                                            <td class="p-1">
                                                <a href="{{ route('profile.edit', $value->id) }}" title="Edit"><i
                                                        class="fa fa-edit"></i></a>
                                                <a href="{{ route('profile.show', $value->id) }}" title="Show"><i
                                                        class="fa fa-eye"></i></a>
                                                <a href="{{ route('profile.delete', $value->id) }}" title="Delete"
                                                    class="delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="p-1" colspan="5">No Profile </td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </section>
        </div>

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/plugins/chart/chart.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/custom/custom.js"></script>
</body>

</html>
