<?php

$connection = mysqli_connect("localhost", "root", " ", "WEBT");

if (!$connection) {
    die("Error " . mysqli_connect_error());
} else {
    echo "connection established";
}
