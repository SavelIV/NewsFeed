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
                            <section class="section-inner">
                                <div class="container">
                                    <br/>
                                    <h4>Удалить новость #<?php echo $id; ?></h4>
                                    <br/><br/>
                                    <p>Вы действительно хотите удалить эту новость?</p>
                                    <br/><br/>
                                    <form method="post">
                                        <input type="submit" name="submit" value="Удалить" />
                                    </form>
                                </div>
                            </section>
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


