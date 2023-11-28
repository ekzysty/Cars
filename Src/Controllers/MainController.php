<?php

namespace Src\Controllers;

use MiladRahimi\PhpRouter\View\View;
use ORM;

class MainController
{
    public function indexPage(View $view)
    {

        $items = ORM::for_table('cars')->find_many();
        $reviews = ORM::for_table('reviews')->find_many();

        return $view->make('index', [
            "items" => $items,
            "reviews" => $reviews,
        ]);
    }

    public function blogpostsPage(View $view)
    {
        return $view->make('blog-posts');
    }

    public function postPage(View $view)
    {
        return $view->make('blog-single-post');
    }

    public function errorPage(View $view)
    {
        return $view->make('error404');
    }

    public function car(View $view, $id)
    {
        $car = ORM::for_table('cars')->where('id',$id)->find_one();

        return $view->make('index', [
            "car" => $car,
        ]);
    }
}