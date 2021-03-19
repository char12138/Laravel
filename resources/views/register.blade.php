<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
<table align="center" width="100%">
    @foreach ($errors->all() as $error)
        <tr><td>{{ $error }}</td></tr>
    @endforeach
    <tr align="center" >
        <td>
            <form  action="/user/register" method="post" style="margin: 10%">
                {{ csrf_field() }}
                邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱：<input type="email" name="userEmail"><br><br>
                用&nbsp;&nbsp;户&nbsp;&nbsp;名：<input type="text" name="userName"><br><br>
                性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别：<input type="text" name="userSex"><br><br>
                密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="password"><br><br>
                确认密码：<input type="password" name="password2"><br><br>
                <input type="submit" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="/">返回</a>
            </form>
        </td>
    </tr>
</table>
</body>
</html>
