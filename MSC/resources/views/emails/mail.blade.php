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
    @if ($details['type'] == 'booking')
    <h3>Hello {{$details['first_name']}}</h3>
    <br>
    <h3>You have reserve a seat to attend {{$details['title']}} on {{$details['date']}}, please kindly look out for another email on Thursday to confirm your availability.</h3> 
    <br>
    <h3>Thank you</h3>
    <h3>Mercy Seat Chapel</h3>
        
    @else
    <h3>Hello {{$details['first_name']}}</h3>
    <br>
    <h3>Please kindly confirm your registration to attend {{$details['title']}},</h3>
    <br>
    <a href="http://baseurl.com/confirm/{{$details['email']}}/{{$details['slot_id']}}"><button>Confirm Now</button></a>
    <br>
    <h3>Thank you</h3>
    <h3>Mercy Seat Chapel</h3>
    
    @endif

</body>
</html>