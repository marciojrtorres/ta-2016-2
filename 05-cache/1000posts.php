<?php
    $link = new mysqli('localhost', 'root', 'root', 'glitter');
    if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

    for ($i=0; $i < 1000; $i++) { 
        $link->query("INSERT INTO posts VALUES ('Posts nro #$i', '$i:Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.')");
    }
