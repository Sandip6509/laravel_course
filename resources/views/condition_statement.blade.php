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
    @switch($name)
        @case('Sandeep Patel')
            <h1>Variable value is Sandeep Patel.</h1><hr>
            @break

        @default
        <h1>Variable value is default.</h1><hr>
    @endswitch
    @empty($retArr)
        <h1>Inside Empty Condition.</h1><hr>
    @endempty

    @isset($retArr)
        <h1>Inside Isset Condition.</h1><hr>
    @endisset
    @unless (!count($retArr))
        <h1>Inside unless condition.</h1><hr>
    @endunless
    @if (count($retArr) == 1)
        <h1>We have one course to learn.</h1><hr>
    @elseif (count($retArr) >1)
        <h1>We have multiple courses to learn.</h1><hr>
    @else
        <h1>It is vaction time.</h1>
    @endif
</div>
</body>
</html>
