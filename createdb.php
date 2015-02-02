<?php

	include("db_include.php");
	
	//Creating database
	mysql_query("CREATE DATABASE IF NOT EXISTS $databasename",$link);	
	mysql_select_db("$databasename");
		
	//Creating Table
		
	$query = "CREATE TABLE IF NOT EXISTS admin(admin_id int(10) unsigned NOT NULL PRIMARY KEY auto_increment,admin_name varchar(45) null,
	admin_password varchar(45) null,admin_level varchar(45) null,adimn_since datetime null)";
	$result = mysql_query($query);
	
	$query = "CREATE TABLE IF NOT EXISTS bookstore(b_id int(10) unsigned NOT NULL PRIMARY KEY auto_increment,isbn varchar(50) null,
		faculty varchar(40) null,subject varchar(40) null,subjectyear varchar(10) null,category varchar(30) null,
		name varchar(60) null,author varchar(20) null,byear varchar(10) null,publisher varchar(30) null,language varchar(20) null,imgname varchar(30) null,
		bcondition varchar(50) null,blocation varchar(30) null)";
	$result = mysql_query($query);
	
	$query = "CREATE TABLE IF NOT EXISTS userlist(u_id int(10) unsigned NOT NULL PRIMARY KEY auto_increment,name varchar(50) null,lname varchar(50) null,
		uname varchar(50) null,password varchar(70) null,university varchar(60) null,uemail varchar(50) null,email varchar(50) null,imgname varchar(50) null,isactive tinyint null)";
	$result = mysql_query($query);
		
	$query = "insert into admin(admin_name,admin_password) values('admin','admin')";
	$result = mysql_query($query);
?>