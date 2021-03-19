<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table  width="100%">
        <tr style="margin: 70px;" align="center">
            <td>
                <form style="margin: 10%" action="goodsadd/{{$_GET['userId']}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    商品名称：<input type="text" name="goodsName"><br><br>
                    商品价格：<input type="text" name="price"><br><br>
                    商品数量：<input type="text" name="goodsNum"><br><br>
                    商品介绍：<input type="text" name="goodsIntro"><br><br>
                    图片：<input type="file" name="image"><br><br>
                    <input type="submit" name="添加">
                    <a href="{{url()->previous()}}">返回</a>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>
