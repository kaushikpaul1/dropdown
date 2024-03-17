<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap5.css">

    <title>Bootstrap Table</title>
    <style>
        /* Custom styles for DataTables stripped rows */
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #ba0e0e;
            /* Change this to your desired color */
        }

        /* Custom styles for DataTables borders */
        .table-bordered {
            border: 1px solid #dee2e6;
            /* Set the border color */
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
            /* Set the border color */
        }
    </style>
</head>

<body>

    <div class="container-fluid mt-5 px-4">
        <h2>Students Information</h2>
        <table class="table table-striped" id="example" style="width: 100%">
            <thead>
                <tr>
                    <th>State Name</th>
                    <th>Dist Name</th>
                    <th>Subdiv Name</th>
                    <th>Muncipality/Block Name</th>
                    <th>Gp/Ward Name</th>
                    <th>Caste</th>






                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $row->sname }}</td>
                        <td>{{ $row->dname }}</td>
                        <td>{{ $row->subname }}</td>
                        <td>

                            @if ($row->mname)
                                {{ $row->mname ?? 'N/A' }}
                            @elseif ($row->bname)
                                {{ $row->bname ?? 'N/A' }}
                            @endif
                        </td>
                        <td>

                            @if ($row->gpname)
                                {{ $row->gpname ?? 'N/A' }}
                            @elseif ($row->wname)
                                {{ $row->wname ?? 'N/A' }}
                            @endif
                        </td>
                        <td>

                            @if ($row->scname)
                                {{ $row->scname ?? 'N/A' }}
                            @elseif ($row->stname)
                                {{ $row->stname ?? 'N/A' }}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable(); // Corrected the initialization here
        });
    </script>



</body>

</html>
