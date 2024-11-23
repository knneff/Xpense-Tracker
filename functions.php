<?php

//for testing purposes. iniba para pwede dd($value1, $value2)
function dd(...$values)
{
    echo "<pre>";
    foreach ($values as $value) {
        var_dump($value);
    }
    echo "</pre>";
    die();
}

//checks if current url is same as $value
function isUri($value)
{
    if ($_SERVER['REQUEST_URI'] === $value) {
        return true;
    }
    return false;
}

// Alert pop up dialog then redirect to desired url
function alertRedirect($message, $url)
{
    echo "
        <script type='text/javascript'>
            alert('$message');
            window.location.href = '$url';
        </script>";
    exit(); //recommended every after header execution
}

// Redirect to desired url
function redirect($url)
{
    header("Location: $url");
    exit(); //recommended every after header execution
}

//protects page from being accessed when no user is logged in
function protectPage()
{
    session_start();
    // dd($_SESSION['userid'] . " | isset? " . isset($_SESSION['userid']));
    if (!isset($_SESSION['userid'])) {
        alertRedirect("You must be logged in first!", '/login');
    }
}

//converts dateTime (2024-11-20 23:14:46) to user friendly format (Nov 20, 2024 - 11:14 PM)
function formatDateTime($datetime)
{
    // Convert the string to a DateTime object
    $date = new DateTime($datetime);
    // Format the date
    return $date->format('M j, Y - g:i A');
}

//pampaikli ng mahabang string e.g., kapag masyado mahaba yung description
function stringShortener($string, $length)
{
    return (strlen($string) > $length) ? substr($string, 0, $length) . "..." : $string;
}
