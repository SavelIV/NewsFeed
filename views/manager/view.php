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
                            <a href="/manager/create" class="btn btn-danger back"><i class="fa fa-plus"></i> Добавить новость</a>
                            <h4>Список новостей</h4>
                            <br/>
                            <table class="table-bordered table-striped table">
                                <tr>
                                    <th>Заголовок</th>
                                    <th>Краткое содержание</th>
                                    <th>Содержание</th>
                                    <th>Категория</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <?php foreach ($newsList as $newsItem): ?>
                                    <tr>
                                        <td><?php echo htmlentities($newsItem['title']); ?></td>
                                        <td><?php echo htmlentities($newsItem['short_content']); ?></td>
                                        <td><?php echo htmlentities($newsItem['content']); ?></td>
                                        <td><?php echo $newsItem['category']; ?></td>  
                                        <td><a href="/manager/update/<?php echo $newsItem['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                                        <td><a href="/manager/delete/<?php echo $newsItem['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table> 
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


