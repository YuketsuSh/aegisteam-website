<?php

unset($_SESSION['username']);
unset($_SESSION['id']);
session_destroy();
header('Location: /');


?>