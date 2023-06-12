<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">Reports</h2>

        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">Report</th>

                    <th scope="col">Profile Name</th>

                </tr>
                @foreach ($report as $key => $value)
                    @foreach ($value->reports as $key => $value2)
                        <tr>
                            @if ($key == 0)
                                <td rowspan="{{ count($value->reports) }}" style="width: 50%">
                                    <div class="mb-2 mt-2 d-flex">
                                        Report Title: {{ $value->title }}
                                    </div>
                                    <div class="mb-2 mt-2 d-flex">
                                        Report Description: {{ $value->description }}
                                    </div>
                                </td>
                            @endif

                            <td>{{ $value2->user->first_name }} {{ $value2->user->last_name }}</td>

                        </tr>
                    @endforeach
                @endforeach
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>

</html>
