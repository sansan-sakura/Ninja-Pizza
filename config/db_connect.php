<?php

$conn=mysqli_connect('localhost','san','test123','ninja pizza');

if(!$conn)
{
 echo 'Connection error'.mysqli_connect_error();
}
