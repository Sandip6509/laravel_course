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
<div>
    <h1>For Loop</h1>
    @for ($i =1; $i<11; $i++)
        The Current value is {{$i}} <br>
    @endfor
    <h2>Foreach Loop</h2>
    <ul class="list-group">
        @foreach ($retArr as $course)
        <li class="list-group-item">{{ $course }}</li>
        <p>Remaining Iteration {{ $loop->remaining }}</p>
        @endforeach

    </ul>
    <h2>Forelse Loop</h2>
    <ul class="list-group">
        @forelse ($retArr as $course)
        <li class="list-group-item">{{ $course }}</li>
        @empty
            <p>No Course Found</p>
        @endforelse

    </ul>
    <h2>while Loop</h2>
    @while ($count <= 10)
        <p>Current value is: {{$count}}</p>
        @php
            $count ++
        @endphp
    @endwhile
</div>
</body>
</html>
