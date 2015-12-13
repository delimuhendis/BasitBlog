<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin || {{config('blog.title')}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
    background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Admin Paneli</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="/">AnaSayfa</a></li>
        <li><a href="/admin/post/">Yazılar</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost:8000/auth/logout"><span class="glyphicon glyphicon-log-in"></span> Çıkış Yap</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron">
  <div class="col-md-6 text-center">
        <h1>YAZILAR</h1>
    </div>

  <div class="container text-center">

    
   <div class="col-md-6 text-right">
        <a href="/admin/post/create" class="btn btn-success btn-md">
          <i class="fa fa-plus-circle"></i> Yeni Yazı Ekle
        </a>
   </div>
      
       <div class="row">
        <div class="col-sm-12">


          <table id="posts-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Yayınlanma Tarihi</th>
                <th>Başlık</th>
                <th data-sortable="false"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
                <tr>
                  <td data-order="{{ $post->published_at->timestamp }}">
                    {{ $post->published_at->format('j-M-y g:ia') }}
                  </td>
                  <td>{{ $post->title }}</td>
                  <td>
                    <a href="/admin/post/{{ $post->id }}/edit"
                       class="btn btn-xs btn-info">
                      <i class="fa fa-edit"></i> Düzenle
                    </a>
                    <a href="/{{ $post->slug }}"
                       class="btn btn-xs btn-warning">
                      <i class="fa fa-eye"></i> Görüntüle
                    </a>
                    
                    <hr>
                    <form action="/admin/delete/{{ $post->id }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                     <button class="btn btn-xs btn-danger">Sil</button>
                     </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>      
  </div>
</div>
 

</body>
</html>
