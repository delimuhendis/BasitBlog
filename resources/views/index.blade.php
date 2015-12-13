<html>
<head>
  <title>{{ config('blog.title') }}</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"
        rel="stylesheet">
</head>
<body>
  <div class="container">
    <h1>{{ config('blog.title') }}</h1>
    <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>
    <hr>
    <ul>
      @if(count($posts)<=0)
        <center><kbd>Sitede herhangi bir yazı bulunmamaktadır.</kbd></center>
      @else
        @foreach ($posts as $post)
          <li>
            <a href="/{{ $post->slug }}">{{ $post->title }}</a>
            <em>({{ $post->published_at->format('M jS Y g:ia') }})</em>
            <p>
              {{ str_limit($post->content) }}
            </p>
          </li>
        @endforeach
      @endif
    </ul>
    <hr>
    {!! $posts->render() !!}
  </div>
</body>
</html>
