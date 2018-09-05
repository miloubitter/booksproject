<!DOCTYPE html>
<html>
<head>
    <meta charset ="utf-8">
    <title>Milou's Bookstore</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="js/slick/slick.css"/>
    <link href="css/main.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/slick/slick.min.js"></script>
    <script src="js/environment-settings.js"></script>
    <script src="js/init.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm fixed-top ">
    <a class="headerlogo navbar-brand " href="?route=index">Milou's Bookstore</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto link">
            <li class="nav-item active">
                <a class="nav-link link" href="?route=index"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link link" href="?route=allbooks">Books <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Authors
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php foreach ($viewModel['authors'] as $lol => $author){?>
                        <a class="dropdown-item lower" href="?route=authorDetailsShow&id=<?php echo $author['id']?>"><?php echo $author['name']?></a>
                    <?php } ?>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link link" href="?route=categoryShow">Categories <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link link" href="?route=contact">Contact <span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <?php if ($viewModel['profile']) { ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $viewModel['profile']['userFullName']; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="?route=logout">Logout</a>
                    </div>
                </li>

            <?php } else { ?>

                <li class="nav-item active">
                    <a class="nav-link" href="?route=login">Login <span class="sr-only">(current)</span></a>
                </li>

            <?php }?>
        </ul>
    </div>
</nav>
            <?php
            if ($viewModel['errors']) {
                $errorMessage = implode('<br />',$viewModel['errors']);
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p><?php echo $errorMessage; ?></p>
                </div>

            <?php } ?>


            <?php
            if ($viewModel['messages']) {
                $message = implode('<br />',$viewModel['messages']);
                ?>
                    <br/>
                <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php echo $message; ?>
                </div>

            <?php } ?>
