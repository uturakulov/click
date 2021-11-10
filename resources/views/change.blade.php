<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body class="text-center" style="display: flex; justify-content:center; align-items:center; height:80vh">
    <form action="{{ route('change-store') }}" method="POST" style="width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: 0 auto">
        {{ csrf_field() }}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="list-style: none">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="text" name="currentpass" placeholder="current">
        <input type="password" name="newpass" placeholder="new">
        <input type="password" name="confirmpass" placeholder="confirm">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</body>

</html>
