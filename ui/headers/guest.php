<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title><?php echo $page_title; ?> | Buy and sell products in Nigeria - Firstonlinemarket.com</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="ui/_general/_styles.dd.css">
    <link rel="stylesheet" href="ui/<?php echo $page_link; ?>/_styles.dd.css">

    
    <link rel="stylesheet" href="_assets/icons/pe-icon/styles/pe-icon.css">
</head>
<body>
    
	<dd_loader>
		<div dd_ajaxload></div>
	</dd_loader>
    
    <header>

        <nav id="main_nav">
                
            <div id="logo">
                <img src="_assets/logo/first-online-market.png" onclick="window.location.href='index'">
            </div>

            
            <?php include 'search.php' ?>

            <div id="main_links">
                <a href="list"> <i class="pe-7s-albums"></i>  All items </a>

                <a href="index"> <i class="pe-7s-home"></i> </a>

                <a title="sell" href="register?to=dashboard"> <i class="pe-7s-shopbag"></i> Sell </a>
                <a title="account" href="login?to=dashboard"> <i class="pe-7s-lock"></i> Account </a>
            </div>

        </nav>

        <section  id="page_title">
            <div title="navigation">
                <a onclick="window.history.back()"> <i class="pe-7s-angle-left"></i> Back </a>
            </div>

            <h1 title="page title"> <i class="<?php echo $page_icon; ?>"></i> <?php echo $page_title; ?> </h1>
        </section>

    </header>

    <main>