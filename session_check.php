<?php
session_start();
if(!empty($_SESSION["login"]))
{


}

else {
    header("location: index.php");

}

?>