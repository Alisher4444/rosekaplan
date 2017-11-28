<!DOCTYPE html>
<html ng-app="rosekaplan">
    <head>
        <!--<base href="/login">-->
        <meta name="fragment" content="!">
        <meta name="robots" content="index, follow">
        <meta content="" name="description">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/all.css" type="text/css"/>
    </head>
    <body ng-controller="LoginCtrl as vm">
        <section class="block form_block">
            <div class="form--wrapper">
                <div class="form">
                    <div class="form--title">
                        Вход
                    </div>
                    <fieldset class="form--field">
                        <input type="text"
                               ng-model="vm.log"
                               placeholder="Логин">
                    </fieldset>
                    <fieldset class="form--field">
                        <input type="password"
                               ng-model="vm.password"
                               placeholder="Пароль">
                    </fieldset>
                    <fieldset class="form--field">
                        <button ng-click="vm.login()">Войти</button>
                    </fieldset>
                </div>
            </div>
        </section>
        
        <script src="./js/views/base_url.js"></script>
        <script src="js/vendor/ng.min.js"></script>
        <script src="js/views/login.js"></script>
    </body>
</html>