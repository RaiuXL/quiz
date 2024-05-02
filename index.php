<?php
//328/quiz
ini_set('display_errors',1);
error_reporting(E_ALL);

require_once ('vendor/autoload.php');


$F3 = Base::instance();

// Default Route
$F3->route('GET /', function(){
    $view=new Template();
    echo $view->render('views/home.html');
});

// Summary Route
$F3->route('GET|POST /summary', function($F3){
    var_dump($F3->get('SESSION'));
    $view=new Template();
    echo $view->render('view/summary.html');
});





$F3->run();