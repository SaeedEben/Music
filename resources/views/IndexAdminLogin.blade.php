<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>IndexLogin</title>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

  <div class="header" style="margin: 30px 30px 30px 30px; ">
  <h1>Welcome | Admin Login Page</h1>
  </div>


    <div class="container-sm">
      <div class="inner" style="width:400px; height:400px;">

        <form method="post" action="/login">
            @csrf
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" required>
          </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
   </div>
</body>
</html>
