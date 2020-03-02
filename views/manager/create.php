<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>News Feed</title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="/template/css/font-awesome.min.css" rel="stylesheet">
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
                                <li><a href="/user/logout/">Logout</a></li>
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
                        <div class="col-sm-12" id="content">
                            <h4>Добавить новость</h4>
                            <br/>
                            <p class="error">* - обязательное поле</p>
                            <br/>
                            <?php if (isset($errors) && is_array($errors)): ?>
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li class="error"> * - <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <div class="col-lg-4">
                                <div class="login-form">
                                    <form action="#" method="post" enctype="multipart/form-data">
                                        <p>*Заголовок</p>
                                        <textarea rows="3" cols="50" name="title" required placeholder="Заголовок"></textarea>
                                        <br/><br/>
                                        <p>*Краткое содержание</p>
                                        <textarea rows="3" cols="50" name="short_content" required placeholder="Краткое содержание"></textarea>
                                        <br/><br/>
                                        <p>*Содержание</p>
                                        <textarea rows="3" cols="50" name="content" required placeholder="Полное содержание"></textarea>
                                        <br/><br/>
                                        <p>Фото новости</p>
                                        <input type="file" name="image" accept="image/*">
                                        <br/><br/>
                                        <p>*Категория</p>
                                        <select name="category">
                                            <?php if (is_array($categoriesList)): ?>
                                                <?php foreach ($categoriesList as $category): ?>
                                                    <option value="<?php echo $category['category']; ?>">
                                                        <?php echo $category['category']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                        <br/><br/><br/><br/><br/><br/>
                                        <input type="submit" name="submit" class="btn btn-dark" value="Сохранить">
                                        <br/><br/>
                                    </form>
                                </div>
                            </div> 
                        </div>
                        <!-- end #content -->
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

