<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{config('blog.title')}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <div class="panel-heading">Admin Paneli'ne Giriş Yap</div>
              <div class="panel-body">

            

                <form class="form-horizontal" role="form" method="POST"
                      action="{{ url('/auth/login') }}">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">

                  <div class="form-group">
                    <label class="col-md-4 control-label">E-Mail</label>
                    <div class="col-md-6">
                      <input type="email" class="form-control" name="email"
                             value="{{ old('email') }}" autofocus>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-4 control-label">Şifre</label>
                    <div class="col-md-6">
                      <input type="password" class="form-control" name="password">
                    </div>
                  </div>

                 

                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                      <button type="submit" class="btn btn-primary">Giriş Yap</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</body>