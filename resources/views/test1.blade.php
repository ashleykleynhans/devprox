<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DEVPROX Proficiency Test 1</title>

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

            <form id="test1_form" method="POST" action="/test1">
                @csrf
                <div class="form-group" id="name-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" />
                </div>

                <div class="form-group" id="surname-group">
                    <label for="name">Surname</label>
                    <input type="text" id="surname" name="surname" value="{{ old('surname') }}" />
                </div>

                <div class="form-group" id="id-group">
                    <label for="name">ID No</label>
                    <input type="text" id="id_number" name="id_number" maxlength="13" value="{{ old('id_number') }}" />
                </div>

                <div class="form-group" id="dob-group">
                    <label for="name">Date of Birth</label>
                    <input type="text" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" />
                </div>

                <button type="submit" id="submit" class="btn btn-primary">POST</button>
                <button type="reset" id="reset" class="btn btn-light">CANCEL</button>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/js/test1.js"></script>
    </body>
</html>
