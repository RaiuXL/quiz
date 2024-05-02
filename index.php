<?php
//328/quiz
ini_set('display_errors',1);
error_reporting(E_ALL);

require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');

$F3 = Base::instance();

// Default Route
$F3->route('GET /', function(){
    $view=new Template();
    echo $view->render('views/home.html');
});

// Survey Route
$F3->route('GET|POST /survey', function($F3){
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = "";
        // Get the data from the post array
        if (isset($_POST['colors']))
            $colors = implode(", ", $_POST['colors']);
        else
            $colors = "None selected";
        // If the data valid
        if (true) {
            // Add the data to the session array
            $F3->set('SESSION.colors', $colors);
            $F3->set('SESSION.name', $name);
            // Send the user to the next form
            $F3->reroute('summary');
        }
        else {
            // Temporary
            echo "<p>Validation errors</p>";
        }
    }
    $colors = getColors();

    $F3->set('colors', $colors);
    $F3->set('name', $name);
    $view=new Template();
    echo $view->render('views/survey.html');
});

// Summary route
$F3->route('GET|POST /summary', function($F3){
    var_dump($F3->get('SESSION'));
    $view=new Template();
    echo $view->render('views/summary.html');
});

$F3->run();