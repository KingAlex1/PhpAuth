<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="../../public/style/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../public/style/css/starter-template.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Авторизация</a></li>
                <li><a href="registration">Регистрация</a></li>
                <li><a href="userlist">Список пользователей</a></li>
                <li><a href="filelist">Список файлов</a></li>
                <li><a href="orders">Заказы</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <div class="form-order">
        <form enctype="multipart/form-data" class="form-horizontal" action="./index.php"
              method="post">
            <div class="form-group">
                <label for="inputLog" class="col-sm-2 control-label">Adress</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputLog"
                           name="adress"
                           placeholder="adress">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPhone" class="col-sm-2 control-label">Phone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputPhone"
                           name="phone"
                           placeholder="phone">
                </div>
            </div>
            <div class="form-group">
                <label for="inputMail" class="col-sm-2 control-label">Mail</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputMail"
                           name="mail"
                           placeholder="mail">
                </div>
            </div>
            <div class="form-group">
                <label for="inputGood" class="col-sm-2 control-label">Товар</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputGood"
                           name="good"
                           placeholder="good">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword4" class="col-sm-2 control-label">Фото</label>
                <div class="col-sm-10">
                    <input
                            type="file"
                            name="image"
                            class="form-control"
                            id="formImage"
                            placeholder="картинка">
                </div>
            </div>

            <div class="form-group">
                <label for="inputDesc" class="col-sm-2 control-label">Описание</label>
                <div class="col-sm-10">
                    <textarea cols="3" rows="3" type="text" class="form-control"
                              id="inputDesc"
                              name="description"
                              placeholder="description">
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputSub" class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <input type="submit" class="form-control" id="inputSub"
                           name="submit"
                           placeholder="Отправить">
                </div>
            </div>
        </form>
    </div>


</div><!-- /.container -->

<div class="container">
    <h3>Ваши заказы :</h3>

    <table class="table table-bordered">
        <tr>

            <th>Имя</th>
            <th>Фотография</th>
            <th>телефон</th>
            <th>почта</th>
            <th>Товар</th>
            <th>Адрес</th>
            <th>Описание</th>
            <th>Фото товара</th>
            <th>Редактирование</th>
        </tr>
        <?php foreach ($data as $key => $item) : ?>
            <tr>

            <?php if ($item['orders']) : ?>
                <?php foreach ($item['orders'] as $value => $val) : ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td><img class="image" src="../photos/<?= $item['photo'] ?> "
                                 alt=" <?=
                                 $item['photo']
                                 ?>" width="100" height="100"> <img></td>
                        <td><?= $val['phone'] ?></td>
                        <td><?= $val['mail'] ?></td>
                        <td><?= $val['good'] ?></td>
                        <td><?= $val['adress'] ?></td>
                        <td><?= $val['desc'] ?></td>
                        <td><img class="image" src="../photos/<?= $val['photo'] ?> "
                                 alt=" <?=$val['photo'] ?>" width="100" height="100"> <img></td>
                        <td>
                            <form name="ddd" action="../../index.php" method="post">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <input type="hidden" name="pic"
                                       value="<?= $val['photo'] ?>">
                                <input id="<?= $item['id'] ?>"
                                       name="delete"
                                       type="submit"
                                       value="удалить пользователя">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php endforeach; ?>

    </table>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../../public/js/main.js"></script>
<script src="../../public/js/bootstrap.min.js"></script>

</body>
</html>