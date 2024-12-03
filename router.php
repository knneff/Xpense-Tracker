<?php

$routes = [
    //mga page na di required ng user login
    "/" => __DIR__ . "/controllers/noBars/home.php",
    "/signup" => __DIR__ . "/controllers/noBars/signup.php",
    "/changepassword" => __DIR__ . "/controllers/noBars/forgot.php",
    "/login" => __DIR__ . "/controllers/noBars/login.php",
    "/logout" => __DIR__ . "/controllers/noBars/logout.php",
    "/reset" => __DIR__ . "/controllers/noBars/reset.php",

    //mga page na accessible lang kapag may nakalog-in
    "/dashboard" => __DIR__ . "/controllers/dashboard.php",
    "/usersettings" => __DIR__ . "/controllers/userSettings.php",
    "/goal" => __DIR__ . "/controllers/goal.php",
    "/expenselog" => __DIR__ . "/controllers/expenseLog.php",
    "/subscriptions" => __DIR__ . "/controllers/subscriptionList.php",
    "/audit" => __DIR__ . "/controllers/audit.php",
    "/settings" => __DIR__ . "/controllers/settings.php",
    "/statistics" => __DIR__ . "/controllers/statistics.php",

    //mga shared expense shiz
    "/group" => __DIR__ . "/controllers/group.php",
    "/invite" => __DIR__ . "/controllers/noBars/invite.php",

    //test
    "/test" => __DIR__ . "/views/test.view.php",
];

$pageTitles = [
    //mga page na di required ng user login
    "/" => "Home",
    "/signup" => "Sign Up",
    "/changepassword" => "Change Password",
    "/login" => "Login",
    "/logout" => "Logout",
    "/reset" => "Reset Password",

    //mga page na accessible lang kapag may nakalog-in
    "/dashboard" => "Dashboard",
    "/usersettings" => "User Settings",
    "/goal" => "Goals and Plans",
    "/expenselog" => "Expense Log",
    "/subscriptions" => "Subscription",
    "/audit" => "Audit Log",
    "/settings" => "Settings",
    "/statistics" => "Statistics",

    //mga shared expense shiz
    "/group" => "Groups",
    "/invite" => "Invites",

    //test
    "/test" => "Test",
];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

//tatanggalin lang yung extra string sa url e.g., if "localhost/dashboard?sex=3" nilagay sa url, yung /dashboard lang
//maii-store sa $uri

// this checks if nageexist yung route sa $routes sa taas
if (array_key_exists($uri, $routes)) {
    $pageTitle = $pageTitles[$uri];
    require($routes[$uri]);
    // e.g., ng $routes[$uri] is $routes["/add"] = "controllers/add.php"
    // meaning require("controllers/add.php") will be rendered
} else {
    // ito magloload kapag hindi nag-eexist yung route
    http_response_code(404);
    require('views/noBarsPages/404.php');
}
