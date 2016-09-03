<?php
header("Access-Control-Allow-Origin: *");
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'db.php';
require 'functions.php';

$app = new \Slim\App;


//get all products
$app->get('/Product',function (Request $request, Response $response) {
	$json = getProducts();
	$response->getBody()->write($json);
	return $response;
});
	
// get Product by id
$app->get('/Product/{id}',function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	$json = getProductById($id);
    $response->getBody()->write($json);
    return $response;
});
//create Product
$app->post('/Product',function (Request $request, Response $response) {
	$body = $request->getBody();
	$params = json_decode($body);
	var_dump($params);
	$json = createProduct($params);
	$response->getBody()->write($json);
	return $response;
});

//update Product
$app->put('/Product/{id}',function (Request $request, Response $response) {
	$id = $request->getAttribute('id');
	$body = $request->getBody();
	$params = json_decode($body);
	var_dump($params);
	$json = updateProduct($id,$params);
	$response->getBody()->write($json);
	return $response;
});

// delete Product by id
$app->delete('/Product/{id}',function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	$json = deleteProduct($id);
    $response->getBody()->write($json);
    return $response;
});


//get all Customer
$app->get('/Customer',function (Request $request, Response $response) {
	$json = getCustomer();
	$response->getBody()->write($json);
	return $response;
});
	
// get Customer by id
$app->get('/Customer/{id}',function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	$json = getCustomerById($id);
    $response->getBody()->write($json);
    return $response;
});
//create Customer
$app->post('/Customer',function (Request $request, Response $response) {
	$body = $request->getBody();
	$params = json_decode($body);
	var_dump($params);
	$json = createCustomer($params);
	$response->getBody()->write($json);
	return $response;
});

// delete Customer by id
$app->delete('/Customer/{id}',function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	$json = deleteCustomer($id);
    $response->getBody()->write($json);
    return $response;
});

//update Customer
$app->put('/Customer/{id}',function (Request $request, Response $response) {
	$id = $request->getAttribute('id');
	$body = $request->getBody();
	$params = json_decode($body);
	var_dump($params);
	$json = updateCustomer($id,$params);
	$response->getBody()->write($json);
	return $response;
});


//get all Staff
$app->get('/Staff',function (Request $request, Response $response) {
	$json = getStaff();
	$response->getBody()->write($json);
	return $response;
});
	
// get Staff by id
$app->get('/Staff/{id}',function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	$json = getStaffById($id);
    $response->getBody()->write($json);
    return $response;
});
//create Staff
$app->post('/Staff',function (Request $request, Response $response) {
	$body = $request->getBody();
	$params = json_decode($body);
	var_dump($params);
	$json = createStaff($params);
	$response->getBody()->write($json);
	return $response;
});

// delete Staff by id
$app->delete('/Staff/{id}',function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	$json = deleteStaff($id);
    $response->getBody()->write($json);
    return $response;
});

//update Staff
$app->put('/Staff/{id}',function (Request $request, Response $response) {
	$id = $request->getAttribute('id');
	$body = $request->getBody();
	$params = json_decode($body);
	var_dump($params);
	$json = updateStaff($id,$params);
	$response->getBody()->write($json);
	return $response;
});



//get all Category
$app->get('/Category',function (Request $request, Response $response) {
	$json = getCategory();
	$response->getBody()->write($json);
	return $response;
});
	
// get Category by id
$app->get('/Category/{id}',function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	$json = getCategoryById($id);
    $response->getBody()->write($json);
    return $response;
});
//create Category
$app->post('/Category',function (Request $request, Response $response) {
	$body = $request->getBody();
	$params = json_decode($body);
	var_dump($params);
	$json = createCategory($params);
	$response->getBody()->write($json);
	return $response;
});

// delete Category by id
$app->delete('/Category/{id}',function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	$json = deleteCategory($id);
    $response->getBody()->write($json);
    return $response;
});

//update Category
$app->put('/Category/{id}',function (Request $request, Response $response) {
	$id = $request->getAttribute('id');
	$body = $request->getBody();
	$params = json_decode($body);
	var_dump($params);
	$json = updateCategory($id,$params);
	$response->getBody()->write($json);
	return $response;
});


//-----Orders

//get all Orders
$app->get('/Orders',function (Request $request, Response $response) {
	$json = getOrders();
	$response->getBody()->write($json);
	return $response;
});
	
// get Orders by id
$app->get('/Orders/{id}',function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	$json = getOrdersById($id);
    $response->getBody()->write($json);
    return $response;
});
//create Orders
$app->post('/Orders',function (Request $request, Response $response) {
	$body = $request->getBody();
	$params = json_decode($body);
	var_dump($params);
	$json = createOrders($params);
	$response->getBody()->write($json);
	return $response;
});

// delete Orders by id
$app->delete('/Orders/{id}',function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	$json = deleteOrders($id);
    $response->getBody()->write($json);
    return $response;
});

//update Orders
$app->put('/Orders/{id}',function (Request $request, Response $response) {
	$id = $request->getAttribute('id');
	$body = $request->getBody();
	$params = json_decode($body);
	var_dump($params);
	$json = updateOrders($id,$params);
	$response->getBody()->write($json);
	return $response;
});


//____Comment

//get all Comment
$app->get('/Comment',function (Request $request, Response $response) {
	$json = getComment();
	$response->getBody()->write($json);
	return $response;
});
	
// get Comment by id
$app->get('/Comment/{id}',function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	$json = getCommentById($id);
    $response->getBody()->write($json);
    return $response;
});
//create Comment
$app->post('/Comment',function (Request $request, Response $response) {
	$body = $request->getBody();
	$params = json_decode($body);
	var_dump($params);
	$json = createComment($params);
	$response->getBody()->write($json);
	return $response;
});

// delete Comment by id
$app->delete('/Comment/{id}',function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	$json = deleteComment($id);
    $response->getBody()->write($json);
    return $response;
});

//update Comment
$app->put('/Comment/{id}',function (Request $request, Response $response) {
	$id = $request->getAttribute('id');
	$body = $request->getBody();
	$params = json_decode($body);
	var_dump($params);
	$json = updateComment($id,$params);
	$response->getBody()->write($json);
	return $response;
});

//____Rating


//get all Rating
$app->get('/Rating',function (Request $request, Response $response) {
	$json = getRating();
	$response->getBody()->write($json);
	return $response;
});
	
// get Rating by id
$app->get('/Rating/{id}',function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	$json = getRatingById($id);
    $response->getBody()->write($json);
    return $response;
});
//create Rating
$app->post('/Rating',function (Request $request, Response $response) {
	$body = $request->getBody();
	$params = json_decode($body);
	var_dump($params);
	$json = createRating($params);
	$response->getBody()->write($json);
	return $response;
});

// delete Rating by id
$app->delete('/Rating/{id}',function (Request $request, Response $response) {
    $id = $request->getAttribute('id');
	$json = deleteRating($id);
    $response->getBody()->write($json);
    return $response;
});

//update Rating
$app->put('/Rating/{id}',function (Request $request, Response $response) {
	$id = $request->getAttribute('id');
	$body = $request->getBody();
	$params = json_decode($body);
	var_dump($params);
	$json = updateRating($id,$params);
	$response->getBody()->write($json);
	return $response;
});



$app->run();
