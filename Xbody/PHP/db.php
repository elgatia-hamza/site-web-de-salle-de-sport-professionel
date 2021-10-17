<?php

		$bde = new PDO('mysql:host=localhost;dbname=projet-web;charset=utf8', 'root', '');

		$bde->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
		$bde->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_OBJ);