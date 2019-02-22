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
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" />
                </div>

                <div class="form-group">
                    <label for="name">Surname</label>
                    <input type="text" id="surname" name="surname" />
                </div>

                <div class="form-group">
                    <label for="name">ID No</label>
                    <input type="text" id="id" name="id" maxlength="13" />
                </div>

                <div class="form-group">
                    <label for="name">Date of Birth</label>
                    <input type="text" id="dob" name="dob" />
                </div>

                <button type="submit" id="submit" class="btn btn-primary">POST</button>
                <button type="reset" id="reset" class="btn btn-light">CANCEL</button>
            </form>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </body>
</html>
