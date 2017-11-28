<?php 
    session_start();
    if(isset($_SESSION["login"]) && isset($_SESSION["pass"])) {
    // session_destroy();
?>

<!DOCTYPE html>
<html ng-app="rosekaplan">
<head>
	<head>
		<title>Админ панель</title>
        <meta name="fragment" content="!">
        <meta name="robots" content="index, follow">
        <meta content="" name="description">
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/all.css" type="text/css"/>
    </head>
</head>
<?php 
	include './views/base_url.php';
?>
<body ng-controller="AdminCtrl as vm">
    <section class="header-admin">
        <div ng-click="vm.showAdd()" class="header-button">Добавить</div>
    </section>
    <section class="add" ng-if="vm.showadd">
        <form class="add-form" action="<?php echo $base_url.'post.php'?>" method="post" enctype="multipart/form-data">
            <input type="file" name="img">
			<input name="ntitle" type="text" placeholder="Заголовок" class="add-form-input">
            <input name="desc" type="text" placeholder="Описание" class="add-form-input">
            <input name="txt" type="text" placeholder="Текст" class="add-form-input">
            <input type="submit" value="Добавить" class="add-form-submit">
        </form>
    </section>


    <section class="edit-modal" ng-if="vm.editShow">
        <form action="<?php echo $base_url.'put.php'?>" method="post" class="add-form" enctype="multipart/form-data">
            <input name="id" id="cId" style="opacity: 0; position: absolute;" type="text">
            Заголовок: <input id="ntitle" name="ntitle" type="text" placeholder="Заголовок" class="add-form-input">
            Описание: <input id="desc" name="desc" type="text" placeholder="Описание" class="add-form-input">
            Текст: <input id="txt" name="txt" type="text" placeholder="Текст" class="add-form-input">
            <img id="cImg" src="" style="width: 100%;">
            <input id="cFile" name="img" type="file" class="add-form-input" onchange="uploadFileUrlG(this)">
            <input ng-model="name" type="submit" value="Edit" class="edit-form-submit">
        </form>
    </section>

    <div class="table" ng-if="vm.news[0]">
        <div class="table--row main">
            <div class="row--item main">Заголовок</div>
            <div class="row--item main">Описание</div>
            <div class="row--item main">Текст</div>
        </div>
        <div class="table--row" ng-repeat="car in vm.news track by $index">
            <div class="row--item">{{news.ntitle}}</div>
            <div class="row--item">{{news.desc}}</div>
            <div class="row--item">{{news.txt}}</div>
            <div class="row--item edit">
                <span class="edit--item--img" ng-click="vm.edit($index);">
                    <img src="img/widgets/edit.svg">
                </span>
                <span class="edit--item--img" ng-click="vm.delete(car.id, $index);">
                    <img src="img/widgets/delete.svg">
                </span>
            </div>
        </div>
        <?php 
            include "./views/pagination.php";
        ?>
    </div>   
</body>
<script src="js/base_url.js"></script>
<script src="js/vendor/ng.min.js"></script>
<script src="js/adminpanel.js"></script>

</html>
<?php 
    } else {
      header("Location: /login");
    }
?>

