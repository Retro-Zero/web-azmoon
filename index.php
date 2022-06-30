<?php
//session start
session_start();

//config
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'web-azmoon');
define('BASE_PATH', __DIR__ . '/');
define('DISPLAY_ERROR', true);
define('CURRENT_DOMAIN', currentDomain());

//display error
if (DISPLAY_ERROR) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(0);
}

//load files
require_once(BASE_PATH . '/panel/Home.php');

//routing
function uri($reservedUrl, $class, $method, $requestMethod = 'GET')
{
    //current url array
    $currentUrl = explode('?', currentUrl())[0];
    $currentUrl = str_replace(currentDomain(), '', $currentUrl);
    $currentUrl = trim($currentUrl, '/');
    $currentUrlArray = explode('/', $currentUrl);
    $currentUrlArray = array_filter($currentUrlArray);

    //reserved url array
    $reservedUrl = trim($reservedUrl, '/');
    $reservedUrlArray = explode('/', $reservedUrl);
    $reservedUrlArray = array_filter($reservedUrlArray);

    if (sizeof($reservedUrlArray) != sizeof($currentUrlArray) || $requestMethod != methodField()) {
        return false;
    }

    //match
    $parameters = [];
    for ($key = 0; $key < sizeof($currentUrlArray); $key++) {
        if ($reservedUrlArray[$key][0] == '{' && $reservedUrlArray[$key][strlen($reservedUrlArray[$key]) - 1] == '}') {
            array_push($parameters, $currentUrlArray[$key]);
        } elseif ($currentUrlArray[$key] != $reservedUrlArray[$key]) {
            return false;
        }
    }

    //request parameter
    if (methodField() == 'POST') {
        $request = isset($_FILES) ? array_merge($_POST, $_FILES) : $_POST;
        $parameters = array_merge([$request], $parameters);
    }

    //execution
    $class = "AdminDashboard\\" . $class;
    $object = new $class;
    call_user_func_array([$object, $method], $parameters);
    exit();
}

//helpers
function asset($src)
{
    $domain = trim(CURRENT_DOMAIN, '/');
    return $domain . '/' . trim($src, '/ ');
}

function url($url)
{
    $domain = trim(CURRENT_DOMAIN, '/');
    return $domain . '/' . trim($url, '/ ');
}

function protocol()
{
    return stripos($_SERVER['SERVER_PROTOCOL'], 'https') === true ? 'https://' : 'http://';
}

function currentDomain() {
    return protocol() . $_SERVER['HTTP_HOST'];
}

function currentUrl() {
    return currentDomain() . $_SERVER['REQUEST_URI'];
}

function methodField() {
    return $_SERVER['REQUEST_METHOD'];
}

//routes
uri('web-azmoon/check-login', 'Auth', 'checkLogin', 'POST');
uri('web-azmoon', 'Home', 'index');
uri('web-azmoon/dashboard', 'Dashboard', 'index');