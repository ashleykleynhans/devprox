<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DEVPROX Proficiency Test 2</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/test1.css">
    </head>
    <body>
    <div class="container">
        <div class="mb-3">
            <div id="notifications">
            @foreach (['danger', 'warning', 'success', 'info'] as $key)
                @if(Session::has($key))
                    <p class="alert alert-{{ $key }}">{{ Session::get($key) }}</p>
                @endif
            @endforeach
            </div>

            <form id="test2_form" method="post" action="/test2" enctype="multipart/form-data">
                @csrf
                <div class="form-group" id="filename-group">
                    <label for="csv">CSV File</label>
                    <input type="file" id="csv" name="csv" />
                </div>

                <button type="submit" id="submit" class="btn btn-primary">UPLOAD</button>
            </form>
        </div>
    </div>
    </body>
</html>
