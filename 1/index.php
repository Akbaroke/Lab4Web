<?php
// if (isset($_REQUEST['mod'])) {
//   switch ($_REQUEST['mod']) {
//     case "home":
//       require("home.php");
//       break;
//     case "about":
//       require("about.php");
//       break;
//     default:
//       require("404.php");
//       break;
//   }
// } else {
//   require('home.php');
// }

include_once 'header.php';

$mod = @$_REQUEST['mod'];

switch ($mod) {
  case "":
  case "home":
    require("home.php");
    break;
  case "about":
    require("about.php");
    break;
  default:
    require("404.php");
    break;
}

include_once 'footer.php';
