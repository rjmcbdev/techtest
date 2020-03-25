<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>App</title>
  <!-- Bootstrap core CSS -->
    <link href="{{ url('/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/plugins/datatables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ url('/plugins/datatables/datatables.buttons.min.css') }}" rel="stylesheet">
    <link href="{{ url('/plugins/waitme/waitme.min.css') }}" rel="stylesheet">
    <link href="{{ url('/plugins/sweetalert/swal.min.css') }}" rel="stylesheet">
  </head>

  <body>

    <header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>Forecast App</strong>
          </a>

        </div>
      </div>
    </header>

    <main role="main">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 py-4">
              @yield("content")
            </div>
        </div>
    </main>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ url('/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/plugins/mustache/mustache.min.js') }}"></script>
    <script src="{{ url('/app/app.js') }}"></script>
    <!---datatables scripts start--->
    <script src="{{ url('/plugins/datatables/datatables.min.js') }}"></script>
    <script src="{{ url('/plugins/datatables/datatables.buttons.min.js') }}"></script>
    <script src="{{ url('/plugins/datatables/datatables.html5buttons.min.js') }}"></script>
    <script src="{{ url('/plugins/datatables/datatables.jszip.min.js') }}"></script>
    <script src="{{ url('/plugins/datatables/datatables.pdfmake.min.js') }}"></script>
    <script src="{{ url('/plugins/datatables/datatables.vfsfonts.min.js') }}"></script>
    <!---datatables scripts end--->
    <!---swal scripts start--->
    <script src="{{ url('/plugins/sweetalert/swal.min.js') }}"></script>
    <!---swal scripts end--->
    <!---waitme scripts start--->
    <script src="{{ url('/plugins/waitme/waitme.min.js') }}"></script>
    <!---waitme scripts end--->


  </body>
</html>
