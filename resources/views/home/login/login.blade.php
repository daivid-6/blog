<!doctype html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
    <script type="text/javascript" src="{{URL::asset('jquery-3.2.1.min.js')}}"></script>
    <title>登陆</title>
</head>
<body>
    <div>
        @if(count($errors) > 0)
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    <form action = "login/check" method="post">
        {{csrf_field()}}
        <p>姓名：<input type = "text" name="name"></p>
        <p>密码：<input type = "password" name="password"></p>

        <p><input type = "submit" value="登陆"></p>
    </form>
    <form action = "#" method="post">
        <p>
            <a href = "json" >获取数据</a>
        </p>

    </form>

</body>
</html>