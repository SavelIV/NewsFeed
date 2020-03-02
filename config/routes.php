<?php

return array(
    'user/login' => 'user/login', // actionLogin in UserController
    'user/logout' => 'user/logout', // actionLogout in UserController
    'manager' => 'manager/index', // actionIndex in ManagerController
    'manager/view' => 'manager/view', // actionView in ManagerController
    'manager/create' => 'manager/create', // actionCreate in ManagerController
    'manager/update/([0-9]+)' => 'manager/update/$1', // actionUpdate in ManagerController
    'manager/delete/([0-9]+)' => 'manager/delete/$1', // actionDelete in ManagerController
    'news/([A-Za-z]+)' => 'news/category/$1', // actionCategory in NewsController
    'news/([0-9]+)' => 'news/view/$1', // actionView in NewsController
    'news' => 'news/index', // actionIndex in NewsController
    '' => 'news/index',
    
);
