<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($title)) echo $title?></title>
    <link rel="icon" href="./public/images/favicon.png"/>
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">   
    <link rel="stylesheet" href="./public/css/font-awesome.min.css">   
</head>
<style>
    body{
        /* background: url(./public/images/bg.png); */
    }
    td img{
        width: 50px;
    }
    .main{
        max-height: 500px!important;
        overflow-y: auto;
    }
    .main::-webkit-scrollbar {
        display: none;
    }
</style>
<body>