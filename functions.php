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
    if (parse_url($_SERVER['REQUEST_URI'])['path'] === $value) {
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
    if (!isset($_SESSION['userid'])) {
        redirect('/login');
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

//basically process yung pagmove and pagresize ng image file sa designated folder
function moveResizedImage($file, $targetFilePath, $size = 128, $quality = 50)
{
    // gets file type of image
    $fileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    // store tmp_name of image to $image
    if ($fileType === 'jpg' || $fileType === 'jpeg') {
        $image = imagecreatefromjpeg($file['tmp_name']);
    } elseif ($fileType === 'png') {
        $image = imagecreatefrompng($file['tmp_name']);
    }

    // dafuq???
    list($width, $height) = getimagesize($file['tmp_name']);

    // centers and resizes the image
    $size = min($width, $height);
    $x_offset = ($width - $size) / 2;
    $y_offset = ($height - $size) / 2;
    $squareImage = imagecreatetruecolor($size, $size);
    imagecopyresampled($squareImage, $image, 0, 0, $x_offset, $y_offset, $size, $size, $size, $size);

    if ($fileType === 'jpg' || $fileType === 'jpeg') {
        imagejpeg($squareImage, $targetFilePath, $quality);
    } elseif ($fileType === 'png') {
        imagepng($squareImage, $targetFilePath, 6);
    }

    imagedestroy($image);
    imagedestroy($squareImage);

    return true;
}
