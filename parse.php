<?php

	require_once "connect.php";
	

	$connection = new mysqli($host, $db_user, $db_password, $db_name);

	if($connection->connect_errno!=0)
	{
		echo "Error: ".$connection->connect_errno;
	}
	else
	{	
		if (file_exists('products_1927a13ce63d227pl (1).xml')) 
		{
			$products = simplexml_load_file('products_1927a13ce63d227pl (1).xml');
			foreach($products -> item as $item)
			{
				$name = $item ->prod_name;
				$id = $item ->prod_id;
				$price = $item ->prod_price;
				$tax_id = $item ->prod_tax_id;
				$taxpercent = $item ->taxpercent;
				$oldprice = $item ->prod_oldprice;
				$buy_price_net = $item ->prod_buy_price_net;
				$amount = $item ->prod_amount;
				$hidden = $item ->prod_hidden;
				$symbol = $item ->prod_symbol;
				$weight = $item ->prod_wieght;
				$sname = $item ->prd_name;
				$pkwiu = $item ->prod_pkwiu;
				$ean = $item ->prod_ean;
				$isbn = $item ->prod_isbn;
				$barcode = $item ->prod_barcode;
				$ship_days = $item ->prod_ship_days;
				$desc = $item ->prod_desc;
				$shortdesc = $item ->prod_shortdesc;
				$info1_pl = $item ->prod_info1_pl;
				$info2_pl = $item ->prod_info2_pl;
				$info3_pl = $item ->prod_info3_pl;
				$info4_pl = $item ->prod_info4_pl;
				$info5_pl = $item ->prod_info5_pl;
				$note = $item ->prod_note;
				$seotitle_pl = $item ->prod_seotitle_pl;
				$seodesc_pl = $item ->prod_seodesc_pl;
				$keywords_pl = $item ->prod_keywords_pl;
				$sales_gain = $item ->prod_sales_gain;
				$link = $item ->prod_link;
				$price_base = $item ->prod_price_base;
				$price_net_base = $item ->prod_price_net_base;
				$price_net = $item ->prod_price_net;
				$cat_path = $item ->cat_path;
				
				$x = 1;
				$img ="Zdjęcia: ";

				foreach($item->prod_img->img as $imgx)
				{
					$img = $img.$x++.". ".$imgx." ";
				}
				
				if ($connection->query("INSERT INTO products_1927 VALUES ('$name', '$id', '$price', '$tax_id', '$taxpercent', '$oldprice', '$buy_price_net', '$amount', '$hidden', '$symbol', '$weight', '$sname', '$pkwiu', '$ean', '$isbn', '$barcode', '$ship_days', '$desc', '$shortdesc', '$info1_pl', '$info2_pl', '$info3_pl', '$info4_pl', '$info5_pl', '$note', '$seotitle_pl', '$seodesc_pl', '$keywords_pl', '$sales_gain', '$link', '$price_base', '$price_net_base', '$price_net', '$cat_path', '$img')"))
				{
				echo "Udane wysylanie danych do bazy danych";
				}else 
				{
				echo "Blad przy wysylaniu danych do bazy danych";
				}
			}
		}else 
			{
			exit('Failed to open xml.');
			}
		
		@$connection->close();
	}

?>