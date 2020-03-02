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
                                <li class="active"><a href="/">Homepage</a></li>
                                <li class="has-sub"><a href="#">Latest News IN Categories</a>
                                    <ul>
                                        <?php foreach ($latestNewsInCategories as $news): ?>
                                            <li class="has-sub"><a href="/news/<?php echo $news['category']; ?>"><span>Category: <?php echo $news['category']; ?></span></a>
                                                <ul>
                                                    <li><a href="/news/<?php echo $news['id']; ?>"><span><?php echo htmlentities($news['title']); ?></span></a></li>
                                                </ul>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
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
                            <h1><a href="/">News Feed</a></h1>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end #header -->
            <div class="content" id="page">
                <div id="page-bgtop">
                    <div id="page-bgbtm">
                        <div class="col-sm-8" id="content">
                            <?php foreach ($newsList as $newsItem): ?>
                                <div class="post">
                                    <h2 class="title"><a href='/news/<?php echo $newsItem['id']; ?>'><?php echo htmlentities($newsItem['title']); ?></a></h2>
                                    <p class="meta">Category: <a href='/news/<?php echo $newsItem['category']; ?>'>
                                            <?php echo $newsItem['category']; ?></a>&nbsp;&bull;&nbsp;Posted by
                                        <?php echo $newsItem['author_name']; ?> on <?php echo $newsItem['date']; ?>
                                        &nbsp;&bull;&nbsp;
                                    <div class="entry">
                                        <p><img src="<?php echo News::getImage($newsItem['id']); ?>" alt="" /></p>
                                        <p><?php echo htmlentities($newsItem['short_content']); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
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
                                <li>
                                    <h2>Categories</h2>
                                    <?php foreach ($latestNewsInCategories as $newsCategory): ?>
                                        <ul>
                                            <li><a href='/news/<?php echo $newsCategory['category']; ?>'>Category: <?php echo $newsCategory['category']; ?></a></li>
                                        </ul>
                                    <?php endforeach; ?>
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
