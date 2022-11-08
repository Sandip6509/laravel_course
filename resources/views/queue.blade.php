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
                    <h4 class="card-title text-center">Queues and Jobs</h4>
                    <hr>
                    @include('flash_data')
                    <hr>
                    <form action="{{ route('queue') }}" method="POST" name="emailSendingForm"
                          enctype="multipart/from-data">
                        <hr>
                        @csrf
                        <div class="form-group">
                            <label for="country">Enter Email Ids:</label>
                            <textarea class="form-control" name="emails" id="emails"></textarea>
                        </div>
                        <br>
                        <center>
                            <input type="submit" name="submit_emails" class="btn btn-success" value="Send Email">
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
