<?php
// Include header file
include_once "includes/header.php";

// Include required function file
require_once 'requires/function.php';

// Get requested URL path
$url = @$_REQUEST['url'];

$url = strpos(@$_REQUEST["url"], "/") ? str_split(@$_REQUEST["url"], strpos(@$_REQUEST["url"], "/"))[0] : @$_REQUEST['url'];

// Check requested URL path and set page
switch ($url) {
  case "":
  case "home":
    $page = 'home';
    break;
  case 'create':
    $page = 'create';
    break;
  case 'update':
    $page = $url ? 'update' : '404';
    break;
  case 'delete':
    $page = $url ? 'delete' : '404';
    break;
  case 'contact':
    $page = 'contact';
    break;
  case 'about':
    $page = 'about';
    break;
  default:
    $page = '404';
    break;
}

// Set HTTP response code to 404 if page is not found
if ($page === '404') {
  http_response_code(404);
}
?>

<!-- Include view file -->
<div class="max-w-[1000px] m-auto mt-5 p-5">
  <?php
  require __DIR__ . '/views/' . $page . '.php';
  ?>
</div>


<?php
// Include footer file
include_once "includes/footer.php";
?>