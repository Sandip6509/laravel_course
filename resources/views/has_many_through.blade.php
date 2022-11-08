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
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h2 class="card-title text-center">Has One Through Relationship</h2>
                    <form action="{{ route('view_multiple_cities') }}" method="GET" name="loginForm"
                          enctype="multipart/from-data">
                        <hr>
                        <div class="form-group">
                            <label for="country">Countries:</label>
                            <select class="form-control" name="county" id="country">
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <center>
                            <input type="submit" name="submit_country" class="btn btn-success" value="Submit">
                        </center>
                    </form>
                    @isset($cities)
                        <table class="table table-bordered mt-4">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>City Name</td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cities as $city)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $city->name}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="text-center" colspan="2">No Data found</td>
                                </tr>
                                @endforelse

                            </tbody>
                        </table>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</body>
</html>
