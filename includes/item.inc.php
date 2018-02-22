<?php

	$news = [];
	$members = [];
	$products = [];
	$partners = [];
	$misc = [];

	include 'includes/dbh.inc.php';
        
    $sql_news = "SELECT * FROM news WHERE isDeleted=0 ORDER BY DisplayWeight DESC";
    $sql_members = "SELECT * FROM members WHERE isDeleted=0 ORDER BY DisplayWeight DESC";
    $sql_products = "SELECT * FROM products WHERE isDeleted=0 ORDER BY DisplayWeight DESC";
    $sql_partners = "SELECT * FROM partners WHERE isDeleted=0 ORDER BY DisplayWeight DESC";
    $sql_misc = "SELECT * FROM misc WHERE isDeleted=0 ORDER BY DisplayWeight DESC";

    $result_news = mysqli_query($conn, $sql_news);
    $result_members = mysqli_query($conn, $sql_members);
    $result_products = mysqli_query($conn, $sql_products);
    $result_partners = mysqli_query($conn, $sql_partners);
    $result_misc = mysqli_query($conn, $sql_misc);

    $i = 0;
    while ($row = mysqli_fetch_assoc($result_news)){
    	$news[$i] = $row;
    	$i++;
    }

    $i = 0;
    while ($row = mysqli_fetch_assoc($result_members)){
    	$members[$i] = $row;
    	$i++;
    }

    $i = 0;
    while ($row = mysqli_fetch_assoc($result_products)){
    	$products[$i] = $row;
    	$i++;
    }

    $i = 0;
    while ($row = mysqli_fetch_assoc($result_partners)){
    	$partners[$i] = $row;
    	$i++;
    }

    $i = 0;
    while ($row = mysqli_fetch_assoc($result_misc)){
    	$misc[$i] = $row;
    	$i++;
    }

?>
