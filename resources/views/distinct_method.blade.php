<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container mt-5">
        <div class="container-fluid">
            <h1> List of Users: </h1>
            <div class="card">
                <div class="card-body">
                    @include('flash_data')
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                {{-- <th scope="col">Name</th>
                                <th scope="col">Email</th> --}}
                                <th scope="col">Designation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($designations as $designation)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    {{-- <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td> --}}
                                    <td>{{ $designation->designation }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No data found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
