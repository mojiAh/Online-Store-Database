<?php

// get all Products
function getProducts() {
    $sql="Select * from Product";
    try {
        $db = getDB();
        $stmt = $db->query($sql);
        $object = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return '{"data": ' . json_encode($object, JSON_UNESCAPED_UNICODE) . '}';
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// get product by id
function getProductById($id) {
    $sql="Select * from Product
    WHERE idProduct=:id";
    try {
        $db = getDB();	
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $object = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return '{"data": ' . json_encode($object, JSON_UNESCAPED_UNICODE) . '}';
        } catch(PDOException $e) {        
			return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

//create Products 
function createProduct ($params) {
	$sql="INSERT INTO Product(`Product_Name`, `Product_ShortDesc`,`Product_LongDesc`, `Product_Stock`, `Product_Price`, `Product_Wight`, `Product_Location`, `Category_idCategory`, `Staff_idStaff`) VALUES (:Product_Name, :Product_ShortDesc,:Product_LongDesc, :Product_Stock, :Product_Price, :Product_Wight, :Product_Location, :Category_idCategory, :Staff_idStaff)";
	try {
		$db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':Product_Name', $params->Product_Name);
		$stmt->bindParam(':Product_ShortDesc', $params->Product_ShortDesc);
		$stmt->bindParam(':Product_LongDesc', $params->Product_LongDesc);
        $stmt->bindParam(':Product_Stock', $params->Product_Stock);
        $stmt->bindParam(':Product_Price', $params->Product_Price);
        $stmt->bindParam(':Product_Wight', $params->Product_Wight);
        $stmt->bindParam(':Product_Location', $params->Product_Location);
        $stmt->bindParam(':Category_idCategory', $params->Category_idCategory);
        $stmt->bindParam(':Staff_idStaff', $params->Staff_idStaff);
		$result = $stmt->execute ();
		echo $stmt->debugDumpParams().'\n'.var_export($stmt->errorInfo());
		$db = null; //closes pdo-connection
		if ($result)
			return '("info": "ok")';
		else
			return '("info": "nok")';
	} catch(PDOException $e) {
	   
	return '{"error":{"text":'. $e->getMessage() .'}}';

}
}



//update Products
function updateProduct($id,$params) {
	$sql="Update Product
		 SET Product_Name=:Product_Name, Product_ShortDesc=:Product_ShortDesc, Product_LongDesc=:Product_LongDesc, Product_Stock=:Product_Stock, Product_Price=:Product_Price, Product_Wight=:Product_Wight, Product_Location=:Product_Location
         Where idProduct=:id";
	try {
		$db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':Product_Name', $params->Product_Name);
		$stmt->bindParam(':Product_ShortDesc', $params->Product_ShortDesc);
		$stmt->bindParam(':Product_LongDesc', $params->Product_LongDesc);
        $stmt->bindParam(':Product_Stock', $params->Product_Stock);
        $stmt->bindParam(':Product_Price', $params->Product_Price);
        $stmt->bindParam(':Product_Wight', $params->Product_Wight);
        $stmt->bindParam(':Product_Location', $params->Product_Location);
		$result = $stmt->execute ();
		echo $stmt->debugDumpParams().'\n'.var_export($stmt->errorInfo());
		$db = null; //closes pdo-connection
		if ($result)
			return '("info": "ok")';
		else
			return '("info": "nok")';
	} catch(PDOException $e) {
	   
	return '{"error":{"text":'. $e->getMessage() .'}}';

	}
}

//delete Product
function deleteProduct($id) {
	$id = (int)$id;
	if (empty($id)) {
		exitWithError('invalid or missing id');
	}
	dbDelete('Product', $id,idProduct);
}

//----Customer

// get all Customer
function getCustomer() {
    $sql="SELECT * From Customer";
    try {
        $db = getDB();
        $stmt = $db->query($sql);
        $object = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return '{"data": ' . json_encode($object, JSON_UNESCAPED_UNICODE) . '}';
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// get Customer by id
function getCustomerById($id) {
    $sql="SELECT * From Customer 
            Where idCustomer=:id";
    try {
        $db = getDB();	
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $object = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return '{"data": ' . json_encode($object, JSON_UNESCAPED_UNICODE) . '}';
        } catch(PDOException $e) {        
			return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

//create Customer 
function createCustomer ($params) {
	$sql="INSERT INTO Customer(`Customer_Username`, `Customer_Password`, `Customer_Email`, `Customer_EmailVerfied`, `Customer_Firstname`, `Customer_Lastname`, `Customer_PhoneNumber`, `Customer_Fax`, `Customer_Address`, `Customer_Address2`, `Customer_Gender`, `Customer_Country`, `Customer_State`, `Customer_City`,`Customer_Zip`) VALUES (:Customer_Username, :Customer_Password, :Customer_Email, :Customer_EmailVerfied, :Customer_Firstname, :Customer_Lastname, :Customer_PhoneNumber, :Customer_Fax, :Customer_Address, :Customer_Address2, :Customer_Gender, :Customer_Country, :Customer_State, :Customer_City, :Customer_Zip)";
	try {
		$db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':Customer_Username', $params->Customer_Username);
		$stmt->bindParam(':Customer_Password', $params->Customer_Password);
		$stmt->bindParam(':Customer_Email', $params->Customer_Email);
		$stmt->bindParam(':Customer_EmailVerfied', $params->Customer_EmailVerfied);
		$stmt->bindParam(':Customer_Firstname', $params->Customer_Firstname);
        $stmt->bindParam(':Customer_Lastname', $params->Customer_Lastname);
		$stmt->bindParam(':Customer_PhoneNumber', $params->Customer_PhoneNumber);
		$stmt->bindParam(':Customer_Fax', $params->Customer_Fax);
		$stmt->bindParam(':Customer_Address', $params->Customer_Address);
		$stmt->bindParam(':Customer_Address2', $Customer_Address2);
		$stmt->bindParam(':Customer_Gender', $params->Customer_Gender);
        $stmt->bindParam(':Customer_Country', $params->Customer_Country);
        $stmt->bindParam(':Customer_State', $params->Customer_State);
        $stmt->bindParam(':Customer_City', $params->Customer_City);
        $stmt->bindParam(':Customer_Zip', $params->Customer_Zip);
		$result = $stmt->execute ();
		echo $stmt->debugDumpParams().'\n'.var_export($stmt->errorInfo());
		$db = null; //closes pdo-connection
		if ($result)
			return '("info": "ok")';
		else
			return '("info": "nok")';
	} catch(PDOException $e) {
	   
	return '{"error":{"text":'. $e->getMessage() .'}}';

}
}

//delete Customer
function deleteCustomer($id) {
	$id = (int)$id;
	if (empty($id)) {
		exitWithError('invalid or missing id');
	}
	dbDelete('Customer', $id,idCustomer);
}

//update Customer
function updateCustomer($id,$params) {
	$sql="Update Customer
		 SET Customer_Username=:Customer_Username, Customer_Password=:Customer_Password, Customer_Email=:Customer_Email, Customer_EmailVerfied=:Customer_EmailVerfied, Customer_Firstname=:Customer_Firstname, Customer_Lastname=:Customer_Lastname, Customer_PhoneNumber=:Customer_PhoneNumber, Customer_Fax=:Customer_Fax, Customer_Address=:Customer_Address, Customer_Address2=:Customer_Address2, Customer_Gender=:Customer_Gender, Customer_Country=:Customer_Country, Customer_State=:Customer_State, Customer_City=:Customer_City, Customer_Zip=:Customer_Zip
         Where idCustomer=:id";
	try {
		$db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':Customer_Username', $params->Customer_Username);
		$stmt->bindParam(':Customer_Password', $params->Customer_Password);
		$stmt->bindParam(':Customer_Email', $params->Customer_Email);
		$stmt->bindParam(':Customer_EmailVerfied', $params->Customer_EmailVerfied);
		$stmt->bindParam(':Customer_Firstname', $params->Customer_Firstname);
        $stmt->bindParam(':Customer_Lastname', $params->Customer_Lastname);
		$stmt->bindParam(':Customer_PhoneNumber', $params->Customer_PhoneNumber);
		$stmt->bindParam(':Customer_Fax', $params->Customer_Fax);
		$stmt->bindParam(':Customer_Address', $params->Customer_Address);
		$stmt->bindParam(':Customer_Address2', $Customer_Address2);
		$stmt->bindParam(':Customer_Gender', $params->Customer_Gender);
        $stmt->bindParam(':Customer_Country', $params->Customer_Country);
        $stmt->bindParam(':Customer_State', $params->Customer_State);
        $stmt->bindParam(':Customer_City', $params->Customer_City);
        $stmt->bindParam(':Customer_Zip', $params->Customer_Zip);
		$result = $stmt->execute ();
		echo $stmt->debugDumpParams().'\n'.var_export($stmt->errorInfo());
		$db = null; //closes pdo-connection
		if ($result)
			return '("info": "ok")';
		else
			return '("info": "nok")';
	} catch(PDOException $e) {
	   
	return '{"error":{"text":'. $e->getMessage() .'}}';
	
	}
}


//---Staff

// get all Staff
function getStaff() {
    $sql="SELECT * from Staff";
    try {
        $db = getDB();
        $stmt = $db->query($sql);
        $object = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return '{"data": ' . json_encode($object, JSON_UNESCAPED_UNICODE) . '}';
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// get Staff by id
function getStaffById($id) {
    $sql="SELECT * from Staff
    where idStaff=:id";
    try {
        $db = getDB();	
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $object = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return '{"data": ' . json_encode($object, JSON_UNESCAPED_UNICODE) . '}';
        } catch(PDOException $e) {        
			return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

//create Staff 
function createStaff ($params) {
	$sql="INSERT INTO Staff (`Staff_FirstName`, `Staff_LastName`, `Staff_Username`, `Staff_Password`, `Staff_PhoneNumber`) 
	VALUES (:Staff_FirstName, :Staff_LastName, :Staff_Username, :Staff_Password ,:Staff_PhoneNumber)";
	try {
		$db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':Staff_FirstName', $params->Staff_FirstName);
		$stmt->bindParam(':Staff_LastName', $params->Staff_LastName);
		$stmt->bindParam(':Staff_Username', $params->Staff_Username);
        $stmt->bindParam(':Staff_Password', $params->Staff_Password);
        $stmt->bindParam(':Staff_PhoneNumber', $params->Staff_PhoneNumber);
		$result = $stmt->execute ();
		echo $stmt->debugDumpParams().'\n'.var_export($stmt->errorInfo());
		$db = null; //closes pdo-connection
		if ($result)
			return '("info": "ok")';
		else
			return '("info": "nok")';
	} catch(PDOException $e) {
	   
	return '{"error":{"text":'. $e->getMessage() .'}}';

}
}

//delete Staff
function deleteStaff($id) {
	$id = (int)$id;
	if (empty($id)) {
		exitWithError('invalid or missing id');
	}
	dbDelete('Staff', $id,idStaff);
}

//update Staff
function updateStaff($id,$params) {
		$sql="Update Staff
		 SET Staff_FirstName=:Staff_FirstName, Staff_LastName=:Staff_LastName, Staff_Username=:Staff_Username, Staff_Password=:Staff_Password, Staff_PhoneNumber= :Staff_PhoneNumber
         Where idStaff=:id";
	try {
		$db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':Staff_FirstName', $params->Staff_FirstName);
		$stmt->bindParam(':Staff_LastName', $params->Staff_LastName);
		$stmt->bindParam(':Staff_Username', $params->Staff_Username);
        $stmt->bindParam(':Staff_Password', $params->Staff_Password);
        $stmt->bindParam(':Staff_PhoneNumber', $params->Staff_PhoneNumber);
		$result = $stmt->execute ();
		echo $stmt->debugDumpParams().'\n'.var_export($stmt->errorInfo());
		$db = null; //closes pdo-connection
		if ($result)
			return '("info": "ok")';
		else
			return '("info": "nok")';
	} catch(PDOException $e) {
	   
	return '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

//---Category   

// get all Category
function getCategory() {
    $sql="SELECT * from Category";
    try {
        $db = getDB();
        $stmt = $db->query($sql);
        $object = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return '{"data": ' . json_encode($object, JSON_UNESCAPED_UNICODE) . '}';
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// get Category by id
function getCategoryById($id) {
    $sql="SELECT * from Category
    Where idCategory=:id";
    try {
        $db = getDB();	
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $object = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return '{"data": ' . json_encode($object, JSON_UNESCAPED_UNICODE) . '}';
        } catch(PDOException $e) {        
			return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

//create Category 
function createCategory ($params) {
	$sql="INSERT INTO Category (Category_Name, Category_ParentID) 
	VALUES (:Category_Name, :Category_ParentID)";
	try {
		$db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':Category_Name', $params->Category_Name);
		$stmt->bindParam(':Category_ParentID', $params->Category_ParentID);
		echo $stmt->debugDumpParams().'\n'.var_export($stmt->errorInfo());
		$result = $stmt->execute ();
		$db = null; //closes pdo-connection
		if ($result)
			return '("info": "ok")';
		else
			return '("info": "nok")';
	} catch(PDOException $e) {
	   
	return '{"error":{"text":'. $e->getMessage() .'}}';

}
}

//delete Category
function deleteCategory($id) {
	$id = (int)$id;
	if (empty($id)) {
		exitWithError('invalid or missing id');
	}
	dbDelete('Category', $id,idCategory);
}

//update Category
function updateCategory($id,$params) {
	$sql="Update Category
		 SET Category_Name=:Category_Name, Category_ParentID=:Category_ParentID
         Where idCategory=:id";
	try {
		$db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
         $stmt->bindParam(':Category_Name', $params->Category_Name);
		$stmt->bindParam(':Category_ParentID', $params->Category_ParentID);
		$result = $stmt->execute ();
		echo $stmt->debugDumpParams().'\n'.var_export($stmt->errorInfo());
		$db = null; //closes pdo-connection
		if ($result)
			return '("info": "ok")';
		else
			return '("info": "nok")';
	} catch(PDOException $e) {
	   
	return '{"error":{"text":'. $e->getMessage() .'}}';
	}
}



//----Orders


// get all Orders
function getOrders() {
    $sql="SELECT * from Orders";
    try {
        $db = getDB();
        $stmt = $db->query($sql);
        $object = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return '{"data": ' . json_encode($object, JSON_UNESCAPED_UNICODE) . '}';
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}


// get Orders by id
function getOrdersById($id) {
    $sql="SELECT * from Orders
    Where idOrder=:id";
    try {
        $db = getDB();	
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $object = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return '{"data": ' . json_encode($object, JSON_UNESCAPED_UNICODE) . '}';
        } catch(PDOException $e) {        
			return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}


//create Orders 
function createOrders ($params) {
	$sql="INSERT INTO Orders (Customer_idCustomer, Product_idProduct, Product_Staff_idStaff , Order_Amount, Order_ShipName, Order_ShipAddress, Order_Country, Order_State, Order_City, Order_Zip ,Order_Phone, Order_Fax, Order_Tax ,Order_Email , Order_TrackingNumber) 
	VALUES (:Customer_idCustomer, :Product_idProduct, :Product_Staff_idStaff , :Order_Amount, :Order_ShipName, :Order_ShipAddress, :Order_Country, :Order_State, :Order_City, :Order_Zip, :Order_Phone, :Order_Fax, :Order_Tax , :Order_Email , :Order_TrackingNumber)";
	try {
		$db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':Customer_idCustomer', $params->Customer_idCustomer);
		$stmt->bindParam(':Product_idProduct', $params->Product_idProduct);
        $stmt->bindParam(':Product_Staff_idStaff', $params->Product_Staff_idStaff);
        $stmt->bindParam(':Order_Amount', $params->Order_Amount);
        $stmt->bindParam(':Order_ShipName', $params->Order_ShipName);
        $stmt->bindParam(':Order_ShipAddress', $params->Order_ShipAddress);
        $stmt->bindParam(':Order_Country', $params->Order_Country);
        $stmt->bindParam(':Order_State', $params->Order_State);
        $stmt->bindParam(':Order_City', $params->Order_City);
        $stmt->bindParam(':Order_Zip', $params->Order_Zip);
        $stmt->bindParam(':Order_Phone', $params->Order_Phone);
        $stmt->bindParam(':Order_Fax', $params->Order_Fax);
        $stmt->bindParam(':Order_Tax', $params->Order_Tax);
        $stmt->bindParam(':Order_Email', $params->Order_Email);
        $stmt->bindParam(':Order_TrackingNumber', $params->Order_TrackingNumber);
		echo $stmt->debugDumpParams().'\n'.var_export($stmt->errorInfo());
		$result = $stmt->execute ();
		$db = null; //closes pdo-connection
		if ($result)
			return '("info": "ok")';
		else
			return '("info": "nok")';
	} catch(PDOException $e) {
	   
	return '{"error":{"text":'. $e->getMessage() .'}}';

}
}

//delete Orders
function deleteOrders($id) {
	$id = (int)$id;
	if (empty($id)) {
		exitWithError('invalid or missing id');
	}
	dbDelete('Orders', $id,idOrder);
}

//update Orders
function updateOrders($id,$params) {
	$sql="Update Orders
		 SET Customer_idCustomer=:Customer_idCustomer , Product_idProduct=:Product_idProduct , Product_Staff_idStaff=:Product_Staff_idStaff , Order_Amount=:Order_Amount , Order_ShipName=:Order_ShipName , Order_ShipAddress=:Order_ShipAddress , Order_Country=:Order_Country , Order_State=:Order_State , Order_City=:Order_City , Order_Zip=:Order_Zip ,Order_Phone=:Order_Phone , Order_Fax=:Order_Fax , Order_Tax=:Order_Tax ,Order_Email=:Order_Email , Order_TrackingNumber=:Order_TrackingNumber
         Where idOrder=:id";
	try {
		$db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':Customer_idCustomer', $params->Customer_idCustomer);
		$stmt->bindParam(':Product_idProduct', $params->Product_idProduct);
        $stmt->bindParam(':Product_Staff_idStaff', $params->Product_Staff_idStaff);
        $stmt->bindParam(':Order_Amount', $params->Order_Amount);
        $stmt->bindParam(':Order_ShipName', $params->Order_ShipName);
        $stmt->bindParam(':Order_ShipAddress', $params->Order_ShipAddress);
        $stmt->bindParam(':Order_Country', $params->Order_Country);
        $stmt->bindParam(':Order_State', $params->Order_State);
        $stmt->bindParam(':Order_City', $params->Order_City);
        $stmt->bindParam(':Order_Zip', $params->Order_Zip);
        $stmt->bindParam(':Order_Phone', $params->Order_Phone);
        $stmt->bindParam(':Order_Fax', $params->Order_Fax);
        $stmt->bindParam(':Order_Tax', $params->Order_Tax);
        $stmt->bindParam(':Order_Email', $params->Order_Email);
        $stmt->bindParam(':Order_TrackingNumber', $params->Order_TrackingNumber);
		$result = $stmt->execute ();
		echo $stmt->debugDumpParams().'\n'.var_export($stmt->errorInfo());
		$db = null; //closes pdo-connection
		if ($result)
			return '("info": "ok")';
		else
			return '("info": "nok")';
	} catch(PDOException $e) {
	   
	return '{"error":{"text":'. $e->getMessage() .'}}';
	}
}


//___Comment

// get all Comment
function getComment() {
    $sql="SELECT * from Comment";
    try {
        $db = getDB();
        $stmt = $db->query($sql);
        $object = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return '{"data": ' . json_encode($object, JSON_UNESCAPED_UNICODE) . '}';
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}


// get Comment by id
function getCommentById($id) {
    $sql="SELECT * from Comment
    Where idComment=:id";
    try {
        $db = getDB();	
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $object = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return '{"data": ' . json_encode($object, JSON_UNESCAPED_UNICODE) . '}';
        } catch(PDOException $e) {        
			return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

//create Comment 
function createComment ($params) {
	$sql="INSERT INTO Comment (Comment_Msg , Customer_idCustomer, Product_idProduct)
    VALUES (:Comment_Msg, :Customer_idCustomer, :Product_idProduct)";
	try {
		$db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':Comment_Msg', $params->Comment_Msg);
		$stmt->bindParam(':Customer_idCustomer', $params->Customer_idCustomer);
        $stmt->bindParam(':Product_idProduct', $params->Product_idProduct);
		echo $stmt->debugDumpParams().'\n'.var_export($stmt->errorInfo());
		$result = $stmt->execute ();
		$db = null; //closes pdo-connection
		if ($result)
			return '("info": "ok")';
		else
			return '("info": "nok")';
	} catch(PDOException $e) {
	   
	return '{"error":{"text":'. $e->getMessage() .'}}';

}
}

//delete Comment
function deleteComment($id) {
	$id = (int)$id;
	if (empty($id)) {
		exitWithError('invalid or missing id');
	}
	dbDelete('Comment', $id,idComment);
}

//update Comment
function updateComment($id,$params) {
	$sql="Update Comment
		 SET Comment_Msg= :Comment_Msg , Customer_idCustomer= :Customer_idCustomer, Product_idProduct= :Product_idProduct
         Where idComment=:id";
	try {
		$db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':Comment_Msg', $params->Comment_Msg);
		$stmt->bindParam(':Customer_idCustomer', $params->Customer_idCustomer);
        $stmt->bindParam(':Product_idProduct', $params->Product_idProduct);
		$result = $stmt->execute ();
		echo $stmt->debugDumpParams().'\n'.var_export($stmt->errorInfo());
		$db = null; //closes pdo-connection
		if ($result)
			return '("info": "ok")';
		else
			return '("info": "nok")';
	} catch(PDOException $e) {
	   
	return '{"error":{"text":'. $e->getMessage() .'}}';
	}
}

//---Rating


// get all Rating
function getRating() {
    $sql="SELECT * from Rating";
    try {
        $db = getDB();
        $stmt = $db->query($sql);
        $object = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return '{"data": ' . json_encode($object, JSON_UNESCAPED_UNICODE) . '}';
        } catch(PDOException $e) {
            return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}


// get Rating by id
function getRatingById($id) {
    $sql="SELECT * from Rating
    Where idRating=:id";
    try {
        $db = getDB();	
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $object = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        return '{"data": ' . json_encode($object, JSON_UNESCAPED_UNICODE) . '}';
        } catch(PDOException $e) {        
			return '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

//create Rating 
function createRating ($params) {
	$sql="INSERT INTO Rating (Rating_Value, Customer_idCustomer, Product_idProduct) 
	VALUES (:Rating_Value, :Customer_idCustomer, :Product_idProduct)";
	try {
		$db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':Rating_Value', $params->Rating_Value);
		$stmt->bindParam(':Customer_idCustomer', $params->Customer_idCustomer);
        $stmt->bindParam(':Product_idProduct', $params->Product_idProduct);
		echo $stmt->debugDumpParams().'\n'.var_export($stmt->errorInfo());
		$result = $stmt->execute ();
		$db = null; //closes pdo-connection
		if ($result)
			return '("info": "ok")';
		else
			return '("info": "nok")';
	} catch(PDOException $e) {
	   
	return '{"error":{"text":'. $e->getMessage() .'}}';

}
}

//delete Rating
function deleteRating($id) {
	$id = (int)$id;
	if (empty($id)) {
		exitWithError('invalid or missing id');
	}
	dbDelete('Rating', $id,idRating);
}

//update Rating
function updateRating($id,$params) {
	$sql="Update Rating
		 SET Rating_Value= :Rating_Value, Customer_idCustomer= :Customer_idCustomer, Product_idProduct=:Product_idProduct
         Where idRating=:id";
	try {
		$db = getDB();
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':Rating_Value', $params->Rating_Value);
		$stmt->bindParam(':Customer_idCustomer', $params->Customer_idCustomer);
        $stmt->bindParam(':Product_idProduct', $params->Product_idProduct);
		$result = $stmt->execute ();
		echo $stmt->debugDumpParams().'\n'.var_export(    $stmt->errorInfo());
		$db = null; //closes pdo-connection
		if ($result)
			return '("info": "ok")';
		else
			return '("info": "nok")';
	} catch(PDOException $e) {
	   
	return '{"error":{"text":'. $e->getMessage() .'}}';
	}
}


/////////////////////////

function getRequestDataAsObject() {
	$request = Slim::getInstance()->request();
	$json = $request->getBody();
	$object = json_decode($json);
	return $object;
}

function exitWithError($text) {
	$error = array('error' => array('text' => $text));
	$json = json_encode($error);
	die($json);
}

function validateDepartmentData($data) {
	$error = '';
	if (empty($data->id)) {
		$error = 'missing required data (you must provide a ID)';
	}
	return $error;
}

function validateEmployeeData($data) {
	$error = '';
	if (empty($data->id)) {
		$error = 'missing required data (you must provide a ID)';
	}
	return $error;
}

function validateProjectData($data) {
	$error = '';
	if (empty($data->id)) {
		$error = 'missing required data (you must provide a ID)';
	}
	return $error;
}

function validateWorkData($data) {
	$error = '';
	if (empty($data->id)) {
		$error = 'missing required data (you must provide a ID)';
	}
	return $error;
}




/////////////////////////
function dbQuery($sql, $params = array()) {
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		foreach ($params as $key => $val) {
			$stmt->bindValue($key, $val);
		}
		$stmt->execute();
		$records = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		return $records;
	} catch(PDOException $e) {
		exitWithError($e->getMessage());
	}
}
function dbInsertFromObject($table, $object) {
	if (empty($table) || empty($object)) {
		return null;
	}
	$fields = get_object_vars($object);
	$field_names = array_keys($fields);
	$sql = "INSERT INTO {$table} (" . implode(', ', $field_names) . ") VALUES (:" . implode(', :', $field_names) . ")";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		foreach ($fields as $key => $val) {
			$stmt->bindValue($key, $val);
		}
		$stmt->execute();
		$id = $db->lastInsertId();
		$db = null;
		return $id;
	} catch(PDOException $e) {
		exitWithError($e->getMessage());
	}
}
function dbUpdateFromObject($table, $object, $id, $id_field_name = 'id') {
	if (empty($table) || empty($object) || empty($id)) {
		return;
	}
	$fields = get_object_vars($object);
	$field_names = array_keys($fields);
	$field_pairs = array();
	foreach ($field_names as $field_name) {
		$field_pairs[] = "{$field_name}=:{$field_name}";
	}
	$sql = "UPDATE {$table} SET " . implode(', ', $field_pairs) . " WHERE {$id_field_name}=:{$id_field_name}";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		foreach ($fields as $key => $val) {
			$stmt->bindValue($key, $val);
		}
		$stmt->bindValue($id_field_name, $id);
		$stmt->execute();
		$db = null;
		return;
	} catch(PDOException $e) {
		exitWithError($e->getMessage());
	}
}
function dbDelete($table, $id, $id_field_name = 'id') {
	if (empty($table) || empty($id)) {
		return;
	}
	$sql = "DELETE FROM {$table} WHERE {$id_field_name}=:{$id_field_name}";
	try {
		$db = getDB();
		$stmt = $db->prepare($sql);
		$stmt->bindValue($id_field_name, $id);
		$stmt->execute();
		$db = null;
		return;
	} catch(PDOException $e) {
		exitWithError($e->getMessage());
	}
}