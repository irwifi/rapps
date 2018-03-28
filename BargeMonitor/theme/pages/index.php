<?php
  if(empty($_GET["route"])) {
    include "../../pages/home.php";
  } else {
    include "../../pages/login.php";
  }
?>