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



  </head>

  <body>

    <header>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
            <strong>Forecast App</strong>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
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


  </body>
</html>
