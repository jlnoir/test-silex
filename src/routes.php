<?php

$app->match('/index.html','TestEmbauche\Ctrl\HomeCtrl::indexAction')->bind('homepage');
$app->match('/info','TestEmbauche\Ctrl\InfoCtrl::indexAction')->bind('infopage');

//BLOG
$app->match('/blog','TestEmbauche\Ctrl\Blog\BlogCtrl::indexAction')->bind('blog');
//BLOG=>ARTICLE
$app->get("/blog/admin/article/add", 'TestEmbauche\Ctrl\Blog\ArticleCtrl::newAction')->bind("blog.article.create");
$app->post("/blog/admin/article/post", 'TestEmbauche\Ctrl\Blog\ArticleCtrl::postAction')->bind("blog.article.post");
$app->get("/blog/article/show/{id}", 'TestEmbauche\Ctrl\Blog\ArticleCtrl::showAction')->bind("blog.article.show");
$app->get("/blog/admin/article/delete/{id}", 'TestEmbauche\Ctrl\Blog\ArticleCtrl::deleteAction')->bind("blog.article.delete");
//BLOG=>CATEGORY
$app->get("/blog/admin/category/create", 'TestEmbauche\Ctrl\Blog\CategoryCtrl::createAction')->bind("blog.category.create");
$app->post("/blog/admin/category/post", 'TestEmbauche\Ctrl\Blog\CategoryCtrl::postAction')->bind("blog.category.post");
$app->post("/blog/category/delete", 'TestEmbauche\Ctrl\Blog\CategoryCtrl::deleteAction')->bind("blog.category.delete");

$app->match('/realisations','TestEmbauche\Ctrl\WorkCtrl::indexAction')->bind('workpage');
$app->match('/contact','TestEmbauche\Ctrl\ContactCtrl::indexAction')->bind('contactpage');

//USER
$app->get("/login", 'TestEmbauche\Ctrl\UserCtrl::loginAction')->bind("login");
$app->get("/logout", 'TestEmbauche\Ctrl\UserCtrl::logoutAction')->bind("logout");
$app->get("/user/add", 'TestEmbauche\Ctrl\UserCtrl::addAction')->bind("user.add")->method('GET|POST');;
