<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>welcome</title>
</head>
<body>
<table align="center">
    <tr>
        <td>
            <h1>welcome to mystore!</h1>
        </td>
    </tr>
    @foreach($errors->all() as $error)
        <tr><td>{{$error}}</td></tr>
    @endforeach
    <tr>
        <td>
            <form action="/user/login" method="post">
                {{ csrf_field() }}
                邮箱：<input type="email" name="userEmail">
                <a href="/views/register">注册</a><br>
                密码：<input type="password" name="password">
                <input type="submit" value="登录">
            </form>
        </td>
    </tr>
</table>
</body>
</html>
