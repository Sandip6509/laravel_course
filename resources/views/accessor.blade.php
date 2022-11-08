<!DOCTYPE html>
<html>
<head>
    <title>Welcome To LearnVern</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-12 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h2 class="card-title text-center">Accessor</h2>
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>First Name</td>
                                    <td>Last Name</td>
                                    <td>Full Name</td>
                                    <td>user Name</td>
                                    <td>Email</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->full_name}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="6">No Data Found</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
