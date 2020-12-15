<?php
/*
1- login 
2-login
3-register
4-resetPassword
5-products
6-favorite
7-favorites
8-add
9-notifications
10-countries
11-types
12-bodies
13-currencies
14-notifications
15-profile
16-updateProfileImage
17-updateProfile
18-updatePassword
19-contact
*/
require 'confing.php';
require 'Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

//////////////////////////////links////////////////////////////

///////////////////////////1-login////////////////////////
$app->post('/login', function() use ($app) {
	$db =getDB();
	$data = $app->request->params();
	if(!empty($data)){
		$sql = "select * from users where email = '".$data['mail']."'";
		$result = $db->query($sql);
		$items = $result->fetchAll(PDO::FETCH_OBJ);
	    if ($items) {
	           $firstItem = $items[0];
	           $hash = $firstItem->password;
	           $token = $firstItem-> notif_token;
	           if (password_verify($data['password'] , $hash)) {
	           		if(!empty($data['token']))
	           		{
						$sql = "update users set `notif_token` = ('".$data['token']."') where email = '".$data['mail']."'";
						$result = $db->query($sql);
	           		}
	           $resJson['status'] = array(
	                                      'type' => 'success',
	                                      'title' => 'Successfull request'
	                                      );
	           $resJson['data'] = array(
                                       'id'=> $firstItem->id,
	                                    'name'=> $firstItem->name,
	                                    'mail'=> $firstItem->email,
	                                    'mobile'=> $firstItem->phone,
	                                    'token'=> $firstItem->notif_token,
	                                    'image'=> $firstItem->image
	                                    );
	           print_r(json_encode($resJson));
	           } else {
	           $resJson['status'] = array(
	                                      'type' => 'Failed',
	                                      'title' => 'password does not match'
	                                      );
	           print_r(json_encode($resJson));
	           }
	           } else {
	           $resJson['status'] = array(
	                                      'type' => 'Failed',
	                                      'title' => 'Unknown E-Mail'
	                                      );
	           print_r(json_encode($resJson));
	           }
	       }
       else{
       		$resJson['status'] = array(
                'type' => 'Failed',
                'title' => 'Database Connection Error'
                );
           print_r(json_encode($resJson));
       }
});

//////////////////////////////////////2-Register/////////////////////////////////////////////
$app->post('/register', function() use ($app) {
	$db =getDB();
	$db->query("SET NAMES 'utf8'"); 
	$db->query('SET CHARACTER SET utf8'); 
	$data = $app->request->params();
	if(!empty($data)){
		$sql = "select email from users where email = '".$data['mail']."' ";
		$result = $db->query($sql);
		$result = $result->fetchAll(PDO::FETCH_OBJ);
		if($result){
			$app->response->setStatus(422);
				$resJson['status'] = array(
					'type' => 'Failed',
					'title' => 'registered email is already exist'
				);
				print_r(json_encode($resJson));		
		}
		else{
           $hash = password_hash($data['password'], PASSWORD_DEFAULT);
			$sql = "insert into users (`name`, `email`, `phone`, `password`, `notif_token`) values ('".$data['name']."','".
           $data['mail']."','".$data['mobile']."','".$hash."','".$data['token']."')";
			$result = $db->query($sql);
			$app->response->setStatus(201);
					$resJson['status'] = array(
							'type' => 'success',
							'title' => 'Successfull request'
					);
           
                   $sql = "select id from users where email = '".$data['mail']."' ";
                   $result = $db->query($sql);
                   $result = $result->fetchAll(PDO::FETCH_OBJ);
                   if($result){
                       $firstItem = $result[0];
                       $resJson['data'] = array(
                            'id'=> $firstItem->id,
                            'name'=> $data['name'],
                            'mail'=> $data['mail'],
                            'mobile'=> $data['mobile'],
                            'password'=> $data['password'],
                            'token'=> $data['token']
                            );
                       print_r(json_encode($resJson));
                   }
		}
	}
	else{
		$app->response->setStatus(422);
				$resJson['status'] = array(
					'type' => 'Failed',
					'title' => 'Database Connection Error'
				);
				print_r(json_encode($resJson));	
	}
});

//////////////////////////////////////3-Reset password///////////////////////////////////////
$app->post('/resetPassword', function() use ($app) {
	$db =getDB();
		$data = $app->request->params();
		$to = $data['mail'];
		$subject = 'Reset password';
		$message = 'hello';
		$headers = 'From: www.myspare.net/' . "\r\n".
		    'X-Mailer: PHP/' . phpversion();

		
		if(mail($to, $subject, $message, $headers))
		{
			$resJson['status'] = array(
					'type' => 'success',
					'title' => 'email sent successfully'
				);
				print_r(json_encode($resJson));		
		}
});


//select not insert ,, filter 
$app->post('/products', function() use ($app) {
	$db =getDB();
	$db->query("SET NAMES 'utf8'"); 
	$db->query('SET CHARACTER SET utf8'); 
	$data = $app->request->params();
	if(!empty($data)){
        
        $countryInQuery = "country_en";
        if ($data['language'] == "ar") {
            $countryInQuery = "country_ar";
        }
        
        $brandInQuery = "brand_en";
        if ($data['language'] == "ar") {
            $brandInQuery = "brand_ar";
        }
        $currencyInQuery = "currency_en";
        if ($data['language'] == "ar") {
            $currencyInQuery = "currency_ar";
        }
		$sql="select  i.id as pid, i.name as productName, i.price as productPrice, i.serial_number as productNumber, currency, u.phone as mobile, image1, image2, image3, i.user_id as id, u.name as name, date, {$countryInQuery} as country, {$brandInQuery} as brand, model_en as model ,{$currencyInQuery} as currency 
			 from items i JOIN countries c ON c.id = i.item_country  
			 			  JOIN categories cat ON cat.id= i.category 
			 			  JOIN brands b ON b.id= i.brand 
			 			  JOIN models m ON m.id= i.sub_model 
			 			  JOIN currency cur ON cur.id= i.currency
			 			  JOIN users u ON u.id = i.user_id";


			 			 // u.id as user_id
							//JOIN users u ON u.email = w.list_user_email
		   if(!empty($data['category'])) {
	           $sql .= " where  category = '".$data['category']."'";
	       }
	       if(!empty($data['country'])) {
	           $sql .= " and country = '".$data['country']."'";
	       }
	       if(!empty($data['date'])) {
	           $sql .= " and date = '".$data['date']."'";
	       }
	       if(!empty($data['model'])) {
	           $sql .= " and sub_model = '".$data['model']."'";
	       }
	       if(!empty($data['brand'])) {
	           $sql .= " and brand = '".$data['brand']."'";
	       }
	       if(!empty($data['number'])) {
	           $sql .= " and serial_number = '".$data['number']."'";
	       }
			$result = $db->query($sql);
			$items = $result->fetchAll(PDO::FETCH_OBJ);
			if($items){
				$app->response->setStatus(201);
							$resJson['status'] = array(
									'type' => 'success',
									'title' => 'Successfull request'
							);
				$resJson['data'] = array();
                if(!empty( $data['id'] )){
                    	foreach ($items as $value) {	
						$query="select item_id , list_user_email from wishlists where item_id = '".$value->pid."' and list_user_email = '". $data['id']."'";
						$resultquery = $db->query($query);
						$itemquery = $resultquery->fetchAll(PDO::FETCH_OBJ);
						$img1 = "http://myspare.net/public/upload/$value->image1";
						$img2 = "http://myspare.net/public/upload/$value->image2";
						$img3 = "http://myspare.net/public/upload/$value->image3";
						if($itemquery){
                            $arr = array(
                                    'pid' => $value->pid,
                                    'productName' => $value->productName,
                                    'productPrice' => $value->productPrice,
                                    'productNumber'=>$value->productNumber,
                                    'currency'=>$value->currency,
                                    'mobile'=>$value->mobile,
                                    'image1'=>$img1,
                                    'image2'=>$img2,
                                    'image3'=>$img3,
                                    'id'=>$value->id,
                                    'name'=>$value->name,
                                    'date'=>$value->date,
                                    'country'=>$value->country,
                                    'brand'=>$value->brand,
                                    'model'=>$value->model,
                                    "isFavorite" =>"true");
                            array_push($resJson['data'], $arr);

						}
						if(!$itemquery){
                            $arr = array(
                                    'pid' => $value->pid,
                                    'productName' => $value->productName,
                                    'productPrice' => $value->productPrice,
                                    'productNumber'=>$value->productNumber,
                                    'currency'=>$value->currency,
                                    'mobile'=>$value->mobile,
                                    'image1'=>$img1,
                                    'image2'=>$img2,
                                    'image3'=>$img3,
                                    'id'=>$value->id,
                                    'name'=>$value->name,
                                    'date'=>$value->date,
                                    'country'=>$value->country,
                                    'brand'=>$value->brand,
                                    'model'=>$value->model,
                                    "isFavorite" =>"false");
							array_push($resJson['data'], $arr);
						}
						
						
	
					}

					
					print_r(json_encode($resJson));
                }
                else{
                	$app->response->setStatus(201);
							$resJson['status'] = array(
									'type' => 'success',
									'title' => 'Successfull request'
							);
					$resJson['data'] = $items;
                	print_r(json_encode($resJson));

                }
					
					

			}
			else
			{
				$app->response->setStatus(422);
				$resJson['status'] = array(
							'type' => 'Failed',
							'title' => 'cannnot Get from DB due to connection error or input error ,, PLZ check your inputs' 
					); 		
				
							print_r(json_encode($resJson));
			}
	}
	else{
			$app->response->setStatus(422);
			$resJson['status'] = array(
						'type' => 'Failed',
						'title' => ' DB connection error ' 
				); 		

						print_r(json_encode($resJson));
		}

});
//////////////////4-addTofavourite//////////////////
$app->post('/addTofavorite', function() use ($app) {
	$db =getDB();
	$db->query("SET NAMES 'utf8'"); 
	$db->query('SET CHARACTER SET utf8'); 
	$data = $app->request->params();
	if(!empty($data)){
			$sql = "select * from wishlists where list_user_email ='".$data['id']."' and item_id ='".$data['pid']."'";
			$stmt = $db->query($sql); 
			$items = $stmt->fetchAll(PDO::FETCH_OBJ);
			$sql1 = "select * from items where id ='".$data['pid']."'";
			$stmt1 = $db->query($sql1); 
			$items1 = $stmt1->fetchAll(PDO::FETCH_OBJ);
			$arr= $items1[0];
		if(!empty($items1)){	
			if ($data['isFavorite'] =="true") {
					if(!$items)
					{
						$sql = "insert into wishlists
						 (`created_at`,`updated_at`,`name`,`brand`,`sub_model`,`price`,`serial_number`,`currency`,`country`,`category`,`phone`,`image1`,`image2`,`image3`,`list_user_email`,`item_country`,`item_id`,`date`)
						  values('".$arr->created_at."','".$arr->updated_at."','".$arr->name."','".$arr->brand."','".$arr->sub_model."','".$arr->price."','".$arr->serial_number."','".$arr->currency."','".$arr->country."','".$arr->category."','".$arr->phone."','".$arr->image1."','".$arr->image2."','".$arr->image3."','".$data['id']."','".$arr->item_country."','".$data['pid']."','".$arr->date."')";
						$result1 = $db->query($sql);

						if($result1)
						{
							$app->response->setStatus(201);
							$resJson1['status'] = array(
									'type' => 'success',
									'title' => 'item added Successfully'
								); 
								$resJson1['data'] = $data;
								print_r(json_encode($resJson1));
						}
						else{
								$app->response->setStatus(422);
								$resJson['status'] = array(
											'type' => 'Failed',
											'title' => 'Adding to DB error occurred please check your inputs' 
									); 		
									$resJson['data'] = $data;
									print_r(json_encode($resJson));
						}
						
					}
					else{
								$app->response->setStatus(422);
								$resJson['status'] = array(
											'type' => 'Failed',
											'title' => 'item is already exist' 
									); 		
									$resJson['data'] = $data;
									print_r(json_encode($resJson));
						}
			}
			elseif($data['isFavorite'] == 'false')
			{
				$sql = "delete from wishlists where item_id ='".$data['pid']."' and list_user_email='".$data['id']."'";
				$result = $db->query($sql); 
				if($result)
				{
					$app->response->setStatus(201);
					$resJson['status'] = array(
							'type' => 'success',
							'title' => 'item deleted Successfully'
						); 

						print_r(json_encode($resJson));
				}
				else
				{
					$app->response->setStatus(422);
					$resJson['status'] = array(
								'type' => 'Failed',
								'title' => 'not deleted'
						); 		
						print_r(json_encode($resJson));
				}
			} 

		}
	}
	else
		{
			$app->response->setStatus(422);
			$resJson['status'] = array(
						'type' => 'Failed',
						'title' => 'Database connection error occured'
				); 		
				print_r(json_encode($resJson));
		}

});
//////////////////////////5-favorites/////////////////////////
$app->post('/favorites', function() use ($app) {
	$db =getDB();
	$db->query("SET NAMES 'utf8'"); 
	$db->query('SET CHARACTER SET utf8'); 
	$data = $app->request->params();

 		$countryInQuery = "country_en";
        if ($data['language'] == "ar") {
            $countryInQuery = "country_ar";
        }
        
        $brandInQuery = "brand_en";
        if ($data['language'] == "ar") {
            $brandInQuery = "brand_ar";
        }
        $currencyInQuery = "currency_en";
        if ($data['language'] == "ar") {
            $currencyInQuery = "currency_ar";
        }
        $categoryInQuery = "categ_en";
        if ($data['language'] == "ar") {
            $categoryInQuery = "categ_ar";
        }
	$sql = "select u.id as user_id ,u.name as user_name , w.item_id as pid, w.name as productName, w.price as productPrice,
			w.serial_number as productNumber, u.phone as mobile, w.image1, w.image2, w.image3,
		     w.date as mdate ,{$categoryInQuery} as category, {$countryInQuery} as country,  {$brandInQuery} as brand, 
		    model_en as model ,{$currencyInQuery} as currency 
		    from wishlists w JOIN countries c ON c.id = w.item_country
		     				 JOIN categories cat ON cat.id = w.category
		     				 JOIN brands b ON b.id = w.brand
		     				 JOIN models m ON m.id = w.sub_model 
		     				 JOIN currency cur ON cur.id = w.currency 
		     				 JOIN users u ON u.email = w.list_user_email ";
				if(!empty($data['id'])) {
				    $sql .= " and list_user_email = '".$data['id']."'";
				}
	$result = $db->query($sql);
	$items = $result->fetchAll(PDO::FETCH_OBJ);
	if($items)
	{
		$resJson['status'] = array(
					'type' => 'success',
					'title' => 'Successfull request'
			); 	
		$resJson['data'] = array();
		foreach ($items as $value) {
			$img1 = "http://myspare.net/public/upload/$value->image1";
			$img2 = "http://myspare.net/public/upload/$value->image2";
			$img3 = "http://myspare.net/public/upload/$value->image3";
				 $arr = array(
                                    'pid' => $value->pid,
                                    'productName' => $value->productName,
                                    'productPrice' => $value->productPrice,
                                    'productNumber'=>$value->productNumber,
                                    'currency'=>$value->currency,
                                    'mobile'=>$value->mobile,
                                    'image1'=>$img1,
                                    'image2'=>$img2,
                                    'image3'=>$img3,
                                    'date'=>$value->mdate,
                                    'country'=>$value->country,
                                    'category'=>$value->category,
                                    'brand'=>$value->brand,
                                    'model'=>$value->model,
                                    'user_name'=>$value->user_name,
                                    'isFavorite'=>"true"
                                    );

				 				 array_push($resJson['data'], $arr);
		}
				
					
					print_r(json_encode($resJson));
	}
	else
		{
			$app->response->setStatus(422);
			$resJson['status'] = array(
						'type' => 'Failed',
						'title' => 'error'
				); 		
				print_r(json_encode($resJson));
		}
});

/////////////////////////////6-notifications//////////////////////////
$app->post('/notifications', function() use ($app) {
	$db =getDB();
    $db->query("SET NAMES 'utf8'"); 
	$db->query('SET CHARACTER SET utf8'); 
	$data = $app->request->params();
	$sql = "select * from notifi where user_id = '".$data['id']."'";
	$result = $db->query($sql); 
	$items = $result->fetchAll(PDO::FETCH_OBJ);
	if($items){
		$app->response->setStatus(201);
		$resJson['status'] = array(
				'type' => 'success',
				'title' => 'Successfull request'
		);

			$resJson['data']=$items;
			print_r(json_encode($resJson)) ;
		
			}
else
		{
			$app->response->setStatus(422);
			$resJson['status'] = array(
						'type' => 'Failed',
						'title' => 'user id does not exist in Notifications'
				);
				print_r(json_encode($resJson));
		}
});
/////////////////////////////7-profile//////////////////////////
$app->post('/profile', function() use ($app) {
	$db =getDB();
	$db->query("SET NAMES 'utf8'"); 
	$db->query('SET CHARACTER SET utf8'); 
	$data = $app->request->params();
	$sql="select i.id as pid, i.name as productName, price as productPrice, serial_number as productNumber, currency, i.phone as mobile, i.image1, i.image2, i.image3, user_id as id, user_name as name, date, country_en as country, brand_en as brand, model_en as model ,currency_ar as currency , u.email as user_email 
			 from items i JOIN countries c ON c.id = i.item_country  
			 			  JOIN categories cat ON cat.id= i.category 
			 			  JOIN brands b ON b.id= i.brand 
			 			  JOIN models m ON m.id= i.sub_model 
			 			  JOIN currency cur ON cur.id= i.currency
			 			  JOIN users u ON u.id= i.user_id
			 			  where user_id = '".$data['id']."'";
	
	$result = $db->query($sql); 
	$items = $result->fetchAll(PDO::FETCH_OBJ);
	if($items){
		$resJson['data'] = array();
		foreach ($items as $value) {	
						$query="select item_id , list_user_email from wishlists where item_id = '".$value->pid."' and list_user_email = '".$value->user_email."'";
						$resultquery = $db->query($query);
						$itemquery = $resultquery->fetchAll(PDO::FETCH_OBJ);
						if($itemquery){
                            $arr = array(
                                    'pid' => $value->pid,
                                    'productName' => $value->productName,
                                    'productPrice' => $value->productPrice,
                                    'productNumber'=>$value->productNumber,
                                    'currency'=>$value->currency,
                                    'mobile'=>$value->mobile,
                                    'image1'=>$value->image1,
                                    'image2'=>$value->image2,
                                    'image3'=>$value->image3,
                                    'id'=>$value->id,
                                    'name'=>$value->name,
                                    'date'=>$value->date,
                                    'country'=>$value->country,
                                    'brand'=>$value->brand,
                                    'model'=>$value->model,
                                    "isFavorite" =>"true");
                            array_push($resJson['data'], $arr);

						}
						if(!$itemquery){
                            $arr = array(
                                    'pid' => $value->pid,
                                    'productName' => $value->productName,
                                    'productPrice' => $value->productPrice,
                                    'productNumber'=>$value->productNumber,
                                    'currency'=>$value->currency,
                                    'mobile'=>$value->mobile,
                                    'image1'=>$value->image1,
                                    'image2'=>$value->image2,
                                    'image3'=>$value->image3,
                                    'id'=>$value->id,
                                    'name'=>$value->name,
                                    'date'=>$value->date,
                                    'country'=>$value->country,
                                    'brand'=>$value->brand,
                                    'model'=>$value->model,
                                    "isFavorite" =>"false");
							array_push($resJson['data'], $arr);
						}
						
						
	
					}
		$app->response->setStatus(201);
		$resJson['status'] = array(
				'type' => 'success',
				'title' => 'Successfull request'
				); 		
			
				print_r(json_encode($resJson));
		}
	else
		{
			$app->response->setStatus(422);
			$resJson['status'] = array(
						'type' => 'Failed',
						'title' => 'connection error occured '
				);
				print_r(json_encode($resJson));
		}
	
});
/////////////////////////////8-updateProfile//////////////////////////
$app->post('/updateProfile', function() use ($app) {
	$db =getDB();
	$db->query("SET NAMES 'utf8'"); 
	$db->query('SET CHARACTER SET utf8'); 
	$data = $app->request->params();
	if(!empty($data)){
	$sql = "update users set `name` = '".$data['name']."',`email`= '".$data['mail']."',`phone`= '".$data['mobile']."' where id='".$data['id']."'";
	$result = $db->query($sql); 
	if($result){
		$app->response->setStatus(201);
		$resJson['status'] = array(
				'type' => 'success',
				'title' => 'Successfull request'
		); 		
		$resJson['data'] = array(
							'name' => $data['name'] ,
							'mail' => $data['mail'] ,
							'mobile' => $data['mobile'],
							'id' => $data['id']
			);
				print_r(json_encode($resJson));
	}
else
		{
			$app->response->setStatus(422);
			$resJson['status'] = array(
						'type' => 'Failed',
						'title' => 'connection error occured '
				);
				print_r(json_encode($resJson));
		}
	}
	else
		{
			$app->response->setStatus(422);
			$resJson['status'] = array(
						'type' => 'Failed',
						'title' => 'connection error occured '
				);
				print_r(json_encode($resJson));
		}
});

/////////////////////////////9-updatepassword//////////////////////////
$app->post('/updatePassword', function() use ($app) {
	$db =getDB();
	$data = $app->request->params();
	if(!empty($data)){
		$sql = "select * from users where id='".$data['id']."'";
		$result = $db->query($sql);
		$items = $result->fetchAll(PDO::FETCH_OBJ); 
		$itemsarray=$items[0];
		$hash=$itemsarray->password;
		if($items){
			if (password_verify($data['oldPassword'] , $hash))
		 	{
			 	$newhash = password_hash($data['newPassword'], PASSWORD_DEFAULT);
			 	$newquery = "update users set password='".$newhash."' where id='".$data['id']."'"; 
			 	$result1 = $db->query($newquery);
			 	if($result1)
			 	{
			 		$app->response->setStatus(201);
					$resJson['status'] = array(
							'type' => 'success',
							'title' => 'Successfull request'
					); 		
					$resJson['data'] = $data;
					print_r(json_encode($resJson));
			 	}
			 	else
				{
					$app->response->setStatus(422);
					$resJson['status'] = array(
								'type' => 'Failed',
								'title' => 'updating data error '
						);
						print_r(json_encode($resJson));
				}
			}
			else
				{
					$app->response->setStatus(422);
					$resJson['status'] = array(
								'type' => 'Failed',
								'title' => 'Old password is incorrect'
						);
						print_r(json_encode($resJson));
				}
		}
		else
				{
					$app->response->setStatus(422);
					$resJson['status'] = array(
								'type' => 'Failed',
								'title' => 'connection error occured or user does not exist '
						);
						print_r(json_encode($resJson));
				}
	}
	else
				{
					$app->response->setStatus(422);
					$resJson['status'] = array(
								'type' => 'Failed',
								'title' => 'connection error occured '
						);
						print_r(json_encode($resJson));
				}
});



/////////////////////////////10-contact//////////////////////////
$app->post('/contact', function() use ($app) {
	$db =getDB();
	$json = $app->request->getBody();
	$data = json_decode($json, true);
	if(!empty($data)){
	$sql = "insert into contactuses (`name`,`email`,`message`) values ('".$data['name']."','".$data['mail']."','".$data['message']."')";
	$result = $db->query($sql); 
	if($result){
		$app->response->setStatus(201);
		$resJson['status'] = array(
				'type' => 'success',
				'title' => 'Successfull request'
		);
		$resJson['data'] = $data;
				print_r(json_encode($resJson));
	}
	else
			{
				$app->response->setStatus(422);
				$resJson['status'] = array(
							'type' => 'Failed',
							'title' => 'connection error occured '
					);
					print_r(json_encode($resJson));
			}
	}
	else
			{
				$app->response->setStatus(422);
				$resJson['status'] = array(
							'type' => 'Failed',
							'title' => 'connection error occured '
					);
					print_r(json_encode($resJson));
			}
});

/////////////////////////////11-countries//////////////////////////
$app->post('/countries', function() use ($app) {
	$db =getDB();
	$data = $app->request->params();
	$db->query("SET NAMES 'utf8'"); 
	$db->query('SET CHARACTER SET utf8'); 
		if(!empty($data['language']=='ar'||$data['language']=='AR'))
		{
			$sql = "select id ,country_ar as name from countries where id between 1 and 7 ";
			$result = $db->query($sql); 
			$items = $result-> fetchAll(PDO::FETCH_OBJ);

			if($items){
				$app->response->setStatus(201);
				$resJson['status'] = array(
						'type' => 'success',
						'title' => 'Successfull request'
						); 		
						$resJson['data'] = $items;
						print_r(json_encode($resJson));
			}
			else
			{
				$app->response->setStatus(422);
				$resJson['status'] = array(
							'type' => 'Failed',
							'title' => 'connection error occured '
					);
					print_r(json_encode($resJson));
			}
		}
		else if(!empty($data['language']=='en'||$data['language']=='EN'))
		{
			$sql = "select id ,country_en as name from countries where id between 1 and 7 ";
			$result = $db->query($sql); 
			$items = $result-> fetchAll(PDO::FETCH_OBJ);

			if($items){
				$app->response->setStatus(201);
				$resJson['status'] = array(
						'type' => 'success',
						'title' => 'Successfull request'
						); 		
						$resJson['data'] = $items;
						print_r(json_encode($resJson));
			}
			else
			{
				$app->response->setStatus(422);
				$resJson['status'] = array(
							'type' => 'Failed',
							'title' => 'connection error occured '
					);
					print_r(json_encode($resJson));
			}
		}
		else
		{
			$app->response->setStatus(422);
			$resJson['status'] = array(
						'type' => 'Failed',
						'title' => 'connection error occured '
				);
				print_r(json_encode($resJson));
		}
});

/////////////////////////////12-categories//////////////////////////
$app->post('/categories', function() use ($app) {
	$db =getDB();
	$data = $app->request->params();
	$db->query("SET NAMES 'utf8'"); 
	$db->query('SET CHARACTER SET utf8'); 
		if(!empty($data['language']=='ar'||$data['language']=='AR'))
		{
			$sql = "select id, categ_ar as name, image from categories ";
			$result = $db->query($sql); 
			$items = $result-> fetchAll(PDO::FETCH_OBJ);

			if($items){
				$app->response->setStatus(201);
				$resJson['status'] = array(
						'type' => 'success',
						'title' => 'Successfull request'
						); 		
						$resJson['data'] = $items;

						print_r(json_encode($resJson));
			}
			else
			{
				$app->response->setStatus(422);
				$resJson['status'] = array(
							'type' => 'Failed',
							'title' => 'connection error occured '
					);
					print_r(json_encode($resJson));
			}
		}
		else if(!empty($data['language']=='EN'||$data['language']=='en'))
		{
			$sql = "select id, categ_en as name, image from categories ";
			$result = $db->query($sql); 
			$items = $result-> fetchAll(PDO::FETCH_OBJ);
			if($items){
				$app->response->setStatus(201);
				$resJson['status'] = array(
						'type' => 'success',
						'title' => 'Successfull request'
						); 		
						$resJson['data'] = $items;
						print_r(json_encode($resJson));
			}
			else
			{
				$app->response->setStatus(422);
				$resJson['status'] = array(
							'type' => 'Failed',
							'title' => 'connection error occured '
					);
					print_r(json_encode($resJson));
			}
		}
		else
		{
			$app->response->setStatus(422);
			$resJson['status'] = array(
						'type' => 'Failed',
						'title' => 'connection error occured '
				);
				print_r(json_encode($resJson));
		}
});

/////////////////////////////13-brands//////////////////////////
$app->post('/brands', function() use ($app) {
	$db =getDB();
	$data = $app->request->params();
	$db->query("SET NAMES 'utf8'"); 
	$db->query('SET CHARACTER SET utf8'); 
		if(!empty($data['language']=='ar'||$data['language']=='AR'))
		{
			$sql = "select id, brand_ar as name from brands ";
			$result = $db->query($sql); 
			$items = $result-> fetchAll(PDO::FETCH_OBJ);

			if($items){
				$app->response->setStatus(201);
				$resJson['status'] = array(
						'type' => 'success',
						'title' => 'Successfull request'
						); 		
						$resJson['data'] = $items;
						print_r(json_encode($resJson));
			}
			else
			{
				$app->response->setStatus(422);
				$resJson['status'] = array(
							'type' => 'Failed',
							'title' => 'connection error occured '
					);
					print_r(json_encode($resJson));
			}
		}
		else if(!empty($data['language']=='EN'||$data['language']=='en'))
		{
			$sql = "select id, brand_en as name from brands ";
			$result = $db->query($sql); 
			$items = $result-> fetchAll(PDO::FETCH_OBJ);
			if($items){
				$app->response->setStatus(201);
				$resJson['status'] = array(
						'type' => 'success',
						'title' => 'Successfull request'
						); 		
						$resJson['data'] = $items;
						print_r(json_encode($resJson));
			}
			else
			{
				$app->response->setStatus(422);
				$resJson['status'] = array(
							'type' => 'Failed',
							'title' => 'connection error occured '
					);
					print_r(json_encode($resJson));
			}
		}
		else
		{
			$app->response->setStatus(422);
			$resJson['status'] = array(
						'type' => 'Failed',
						'title' => 'connection error occured '
				);
				print_r(json_encode($resJson));
		}
});
/////////////////////////////14-currencies//////////////////////////
$app->post('/currencies', function() use ($app) {
	$db =getDB();
	$data = $app->request->params();
	$db->query("SET NAMES 'utf8'");
	$db->query('SET CHARACTER SET utf8'); 
		if(!empty($data['language']=='ar'||$data['language']=='AR'))
		{
			$sql = "select id, currency_ar as name from currency ";
			$result = $db->query($sql); 
			$items = $result-> fetchAll(PDO::FETCH_OBJ);

			if($items){
				$app->response->setStatus(201);
				$resJson['status'] = array(
						'type' => 'success',
						'title' => 'Successfull request'
						); 		
						$resJson['data'] = $items;
						print_r(json_encode($resJson));
			}
			else
			{
				$app->response->setStatus(422);
				$resJson['status'] = array(
							'type' => 'Failed',
							'title' => 'connection error occured '
					);
					print_r(json_encode($resJson));
			}
		}
		else if(!empty($data['language']=='EN'||$data['language']=='en'))
		{
			$sql = "select id, currency_en as name from currency ";
			$result = $db->query($sql); 
			$items = $result-> fetchAll(PDO::FETCH_OBJ);
			if($items){
				$app->response->setStatus(201);
				$resJson['status'] = array(
						'type' => 'success',
						'title' => 'Successfull request'
						); 		
						$resJson['data'] = $items;
						print_r(json_encode($resJson));
			}
			else
			{
				$app->response->setStatus(422);
				$resJson['status'] = array(
							'type' => 'Failed',
							'title' => 'connection error occured '
					);
					print_r(json_encode($resJson));
			}
		}
		else
		{
			$app->response->setStatus(422);
			$resJson['status'] = array(
						'type' => 'Failed',
						'title' => 'connection error occured '
				);
				print_r(json_encode($resJson));
		}
});
/////////////////////////////15-models//////////////////////////
$app->post('/models', function() use ($app) {
	$db =getDB();
	$db->query("SET NAMES 'utf8'");
	$db->query('SET CHARACTER SET utf8'); 
	$data = $app->request->params();
		
		 	if(!empty($data['bid']))
		 	{
				$sql = "select id, model_en as name  from models where brand_id ='".$data['bid']."'";
				$result = $db->query($sql); 
				$items = $result-> fetchAll(PDO::FETCH_OBJ);

				if($items){
					$app->response->setStatus(201);
					$resJson['status'] = array(
							'type' => 'success',
							'title' => 'Successfull request'
							); 		
							$resJson['data'] = $items;
							print_r(json_encode($resJson));
				}
				else
				{
					$app->response->setStatus(422);
					$resJson['status'] = array(
								'type' => 'Failed',
								'title' => 'item doesn not exist'
						);
						print_r(json_encode($resJson));
				}
			}
			elseif(empty($data['bid'])){
				$sql = "select id, model_en as name from models";
				$result = $db->query($sql); 
				$items = $result-> fetchAll(PDO::FETCH_OBJ);
				if($items){
					$app->response->setStatus(201);
					$resJson['status'] = array(
							'type' => 'success',
							'title' => 'Successfull request'
							); 		
							$resJson['data'] = $items;
							print_r(json_encode($resJson));
				}
				else
				{
					$app->response->setStatus(422);
					$resJson['status'] = array(
								'type' => 'Failed',
								'title' => 'item doesn not exist'
						);
						print_r(json_encode($resJson));
				}

			}

});
/////////////////////////////16-manufacturingCountries//////////////////////////
$app->post('/manufacturingCountries', function() use ($app) {
	$db =getDB();
	$db->query("SET NAMES 'utf8'");
	$db->query('SET CHARACTER SET utf8'); 
	$data = $app->request->params();
		 if(!empty($data['language']=='ar'||$data['language']=='AR')){
				$sql = "select id, country_ar as name from countries where id between 11 and 29";
				$result = $db->query($sql); 
				$items = $result-> fetchAll(PDO::FETCH_OBJ);

				if($items){
					$app->response->setStatus(201);
					$resJson['status'] = array(
							'type' => 'success',
							'title' => 'Successfull request'
							); 		
							$resJson['data'] = $items;
							print_r(json_encode($resJson));
				}
		}
		else if(!empty($data['language']=='EN'||$data['language']=='en')){
				$sql = "select id, country_en as name from countries where id between 11 and 29 ";
				$result = $db->query($sql); 
				$items = $result-> fetchAll(PDO::FETCH_OBJ);
				if($items){
					$app->response->setStatus(201);
					$resJson['status'] = array(
							'type' => 'success',
							'title' => 'Successfull request'
							); 		
							$resJson['data'] = $items;
							print_r(json_encode($resJson));
				}
				else
				{
					$app->response->setStatus(422);
					$resJson['status'] = array(
								'type' => 'Failed',
								'title' => 'connection error occured '
						);
						print_r(json_encode($resJson));
				}
		}
			else
			{
				$app->response->setStatus(422);
				$resJson['status'] = array(
							'type' => 'Failed',
							'title' => 'connection error occured '
					);

					print_r(json_encode($resJson));
			}
});





$app->post('/removeItem', function() use ($app) {
	$db =getDB();
	$data = $app->request->params();
	if(!empty($data)){
		$sql = "delete from items where id = '".$data['id']."'";
		$result = $db->query($sql); 
		if($result){
			$sql1 = "delete from wishlists where item_id = '".$data['id']."'";
			$result1 = $db->query($sql1); 
			if($result1){
				$app->response->setStatus(201);
				$resJson['status'] = array(
						'type' => 'success',
						'title' => 'item removed successfully'
				);
						$resJson['data'] = $data;
						print_r(json_encode($resJson));
			}
		}
		else
				{
					$app->response->setStatus(422);
					$resJson['status'] = array(
								'type' => 'Failed',
								'title' => 'connection error occured '
						);
						print_r(json_encode($resJson));
				}
	}
	
});



$app->run();
?>
