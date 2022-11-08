<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid">
    <h2>Name Is: {{ $name }}</h2>
    <ul class="list-group">
        <li class="list-group-item"> {{ $favCars[0] }} </li>
        <li class="list-group-item"> {{ $favCars[1] }} </li>
        <li class="list-group-item"> {{ $favCars[2] }} </li>
        <li class="list-group-item"> {{ $favCars[3] }} </li>
        <li class="list-group-item"> {{ $favCars[4] }} </li>
    </ul>
</div>
</body>
</html>
