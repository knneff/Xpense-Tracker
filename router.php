<?php

$routes = [
    //mga page na di required ng user login
    "/" => __DIR__ . "/controllers/home.php",
    "/signup" => __DIR__ . "/controllers/SignUp.php",
    "/changepassword" => __DIR__ . "/controllers/forgot.php",
    "/login" => __DIR__ . "/controllers/login.php",
    "/logout" => __DIR__ . "/controllers/logout.php",

    //mga page na accessible lang kapag may nakalog-in
    "/dashboard" => __DIR__ . "/controllers/dashboard.php",
    "/usersettings" => __DIR__ . "/controllers/userSettings.php",
    "/shared" => __DIR__ . "/controllers/expense-sharing-group.php",
    "/goal" => __DIR__ . "/controllers/goal.php",
    "/expenselog" => __DIR__ . "/controllers/expenselog.php",
    "/subscriptionList" => __DIR__ . "/controllers/subscriptionList.php",
    "/audit" => __DIR__ . "/controllers/audit.php",
    "/settings" => __DIR__ . "/controllers/settings.php",
    "/reset" => __DIR__ . "/controllers/reset.php",
];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//tatanggalin lang yung extra string sa url e.g., if "localhost/dashboard?sex=3" nilagay sa url, yung /dashboard lang
//maii-store sa $uri

// this checks if nageexist yung route sa $routes sa taas
if (array_key_exists($uri, $routes)) {
    require($routes[$uri]);
    // e.g., ng $routes[$uri] is $routes["/add"] = "controllers/add.php"
    // meaning require("controllers/add.php") will be rendered
} else {
    // ito magloload kapag hindi nag-eexist yung route
    http_response_code(404);
    require('views/404.php');
}
