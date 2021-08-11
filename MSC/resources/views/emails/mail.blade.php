<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confrmation Email</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

</head>
<body>
    <h1>{{$details['title']}}</h1>
    <h3>hi {{Auth::user()->name}}</h3>
    <h3>{{$details['body']}}</h3>
  
    <h1><a  href="/yes/{{$details['body']}}">YES</a>  |  <a href="/no/{{$details['body']}}">No</a></h1>

    <h4>Thank You</h4>
</body>
</html>