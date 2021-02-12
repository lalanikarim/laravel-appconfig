<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ config('app.name')  }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- App CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

    <!-- App JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" defer integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3 d-print-none">
                <div class="card">
                    <div class="card-body">
                        <div class="card-text">
                            <div>
                                <a href="{{ route('all-configs') }}">
                                    App Config Override
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                @if (isset($errors) && $errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (null !== ($status = session('status')))
                <div class="alert alert-success">
                    {{ $status }}
                </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>


    @if (null !== ($flash = session('flash')))

    <div class="alert alert-success" style="position: absolute; top:60px; right:200px" id="flash">
          {{ $flash }} <a href="#" onclick="deleteFlash();">X</a>
      </div>
      <script type="text/javascript">
          function deleteFlash()
          {
              if ($('#flash')) {
                  $('#flash').remove();
              }
          }
          setTimeout('deleteFlash()',3000);
      </script>
    @endif
</body>
</html>
