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
        <li><a href="/admin/post">Yazılar</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="http://localhost:8000/auth/logout"><span class="glyphicon glyphicon-log-in"></span> Çıkış Yap</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="panel-body">  
          
        <form action="/admin/post/{id}/edit" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
              
              
                <div class="col-sm-6">
                    <input type="hidden" name="no" id="task-name" class="form-control" value="{{$post->id}}">
                </div>
            </div>
            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Yazı Başlığı</label>
              
                <div class="col-sm-6">
                    <input type="text" name="title" id="task-name" class="form-control" value="{{$post->title}}">
                </div>
            </div>
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Yazı URL'si</label>

                <div class="col-sm-6">
                    <input type="text" name="slug" id="task-name" class="form-control" value="{{$post->slug}}">
                </div>
            </div>
            <div class="form-group">
              <label for="task" class="col-sm-3 control-label">Yazı İçeriği</label>

              <div class="col-sm-6">
                    <textarea class="form-control" name="content" id="exampleTextarea" rows="6" >{{$post->content}}</textarea>
              </div>
            </div>
              <div class="checkbox">
                <label for="task" class="col-sm-6 control-label">
                  @if ($post->status == false) 
                    <input type="checkbox" name="status" checked="true">Yayınlanacak mı?
                  @else
                    <input type="checkbox" name="status">Yayınlanacak mı?
                  @endif
                </label>
              </div>
            <hr><hr>

            <center>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Güncelle
                    </button>
                </div>
            </div>
            </center>
        </form>
    </div>

</body>
</html>
