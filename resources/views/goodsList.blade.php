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
    <table width="100%" border="1">
        <tr align="center">
            <td colspan="2"><h1>{{$title}}</h1></td>
            <td>
                <form action="/goods/search" method="post">
                    {{ csrf_field() }}
                    <input type="text" name="userId" value="{{$userId}}" hidden="hidden">
                    <input type="text" name="goodsName">
                    <input type="submit" value="搜索">
                    <a href="/user/logout">退出</a>
                </form>
            </td>
        </tr>
        <tr align="center">
            <td width="40%">商品图片</td>
            <td width="40%">商品信息</td>
            <td width="20%">操作</td>
        </tr>
        @foreach($rows as $row)
            <tr align="center">
                <td width="40%">
                    <img src="/storage/{{$row->image}}" style="width: 100%">
                </td>
                <td width="40%">
                    商品编号：{{$row->goodsId}}<br><br>
                    商品名称：{{$row->goodsName}}<br><br>
                    商品价格：{{$row->price}}<br><br>
                    商品数量：{{$row->goodsNum}}<br><br>
                    商品介绍：{{$row->goodsIntro}}
                </td>
                <td width="20%">
                    <a href="/goodsdel/{{$row->goodsId}}">删除</a>
                    <a href="/goodsalt/{{$row->goodsId}}">修改</a>
                </td>
            </tr>
        @endforeach

        <tr align="center">
            <td colspan="3">
                <a href="add?userId={{$userId}}"><img src="/image/image_02.png"></a>
            </td>
        </tr>
    </table>
</body>
</html>
