<html>
<head>
  <title>{{ $post->title }}</title>
  <!-- Optional theme -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
  <div class="container">
      <h1>{{ $post->title }}<small>{{$post->slug}}</small></h1>
      <h5>{{ $post->published_at->format('M jS Y g:ia') }}</h5>
      <hr>
      <p class="lead">
      {!! nl2br(e($post->content)) !!}
      </p>
      <hr>
      <button class="btn btn-primary" onclick="history.go(-1)">
        Geri
      </button>
  </div>
</body>
</html>