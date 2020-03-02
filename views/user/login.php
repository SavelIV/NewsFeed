<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>News Feed</title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/template/css/style.css" rel="stylesheet" type="text/css" media="screen">
        <link href="/template/css/menu.css" rel="stylesheet" >
        <link rel="shortcut icon" href="/template/images/00.png"> <!--favicon!-->
    </head>
    <body>
        <div class="container">
            <div class="header">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="cssmenu" class="align-center">
                            <ul>
                                <?php if (User::isGuest()): ?>                                        
                                    <li><a href="/user/login/">Manager Login</a></li>
                                <?php else: ?>
                                    <li><a href="/user/logout/">Logout</a></li>
                                <?php endif; ?>
                            </ul>
                        </div>  
                    </div>
                </div>
                <div class="row" id="wrapper">
                    <div class="col-sm-12">
                        <div id="logo">
                            <h1>Adminpanel</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end #header -->
            <div class="content" id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        <div class="col-sm-8" id="content">
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li class="error"> - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <div class="signup-form"><!--sign up form-->
                                <h1>Введите данные администратора</h1>
                                <p class="error">* - обязательное поле</p>
                                <form action="#" method="post">
                                    <p>*Имя:</p><input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>"/>
                                    <br><br><br>
                                    <p>*Пароль:</p><input type="password" name="password" placeholder="Пароль" value=""/>
                                    <br><br><br>
                                    <input type="submit" name="submit" class="btn btn-dark" value="Вход" />
                                </form>
                            </div><!--/sign up form-->
                        </div>
                        <!-- end #content -->
                        <div class="col-sm-4" id="sidebar">
                            <ul>
                                <li>
                                    <h2>About Project</h2>
                                    <p>Отобразить список новостей, отсортированный по дате и времени от новых к старым. 
                                        Есть возможность фильтрации по категории. Заголовок новости ведет на подробное
                                        описание новости. Управление новостями (CRUD) происходит администратором со страницы 
                                        sitename/manager после регистрации.</p>
                                </li>
                            </ul>
                        </div>
                        <!-- end #sidebar -->
                        <div style="clear: both;">&nbsp;</div>
                    </div>
                </div>
            </div>
            <!-- end #page -->
            <footer id="footer">
                <p>Copyright (c) 2020 NewsFeed &nbsp;&bull;&nbsp;&nbsp;&nbsp;All code here: <a href="https://github.com/SavelIV/NewsFeed">GitHub</a></p>
            </footer>
            <!-- end #footer -->
        </div>
    </body>
</html>

