<?php

$connection = mysqli_connect(
    $config['db']['server'], 
    $config['db']['username'],
    $config['db']['password'],  
    $config['db']['database'] 
);

if ( $connection == false )
{
    echo 'Database connection denied!';
    echo mysqli_connect_error();

    exit();
}

