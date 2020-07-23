<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<h1 style="text-align: center; color: red; padding-top: 20px">Hello, world!</h1>
<div class="container">

    <div class="col-sm-4">
    <form action="/playerinsert" method="post">
        {{csrf_field()}}
        @if(\Session::has('ok'))
        <div style="background-color: aqua; margin: 10px">
            <p style="color: #0a73bb">
            {{Session::get('ok')}}
            </p>
        </div>
        @endif
        <div class="form-group">
            <label for="exampleInputEmail1">Ismi</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Futbolchining ismini kiriting">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Klubi</label>
            <input type="text" name="clubs" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="O'ynaydigan klubini kiriting">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Yoshi</label>
            <input type="text" name="age" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Yoshini kiriting">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Davlati</label>
            <input type="text" name="country" class="form-control" id="exampleInputPassword1" placeholder="Davlatini kiriting">
        </div>

{{--        <div class="form-check">--}}
{{--            <input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
{{--            <label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
{{--        </div>--}}

        <button type="submit" class="btn btn-primary">Kiritish</button>
    </form>
    </div>


    <div class="col-sm-8" >
        <table class="table table-sm">
            <thead>
            <tr>
                <th scope="col">T/R</th>
                <th scope="col">Ismi</th>
                <th scope="col">Klubi</th>
                <th scope="col">Yoshi</th>
                <th scope="col">Davlati</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($oyinchi as $key => $o)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$o->name}}</td>
                    <td>{{$o->clubs}}</td>
                    <td>{{$o->age}}</td>
                    <td>{{$o->country}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$oyinchi->links()}}
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
