<?php
// Include header file
include_once "includes/header.php";

// Include required function file
require_once 'requires/function.php';

// Get requested URL path
$url = @$_REQUEST['url'];
$id = @$_REQUEST['id'];

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
    $page = $id ? 'update' : '404';
    break;
  case 'delete':
    $page = isset($_GET['id']) ? isValidId($_GET['id']) ? 'delete' : '404' : '404';
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
<div class="container">
  <?php
  require __DIR__ . '/views/' . $page . '.php';
  ?>
</div>


<?php
// Include footer file
include_once "includes/footer.php";
?>