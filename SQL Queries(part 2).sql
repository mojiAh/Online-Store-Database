#Show all customers with all details
select * from Customer

#Show all product with all details
select * from Product

#show all commnets related to special product
select * from Comment
where product_idProduct= Product.idProduct

#show all comment related to each customer
select * from Comment
where Customer_idCustomer= Customer.idCustomer

#show ratings related to each product
select * from Rating
where Product_idProduct= Product.idProduct

#show ratings related to each Customer
select * from Rating
where Customer_idCustomer= Customer.idCustomer

#show orders are registered for each customer
select * form Order
where Customer_idCustomer= Customer.idCustomer

#show order are registered for each product
select * from Order
where Product_idProduct= Product.idProduct

#show product based on thier category
select * from product 
where Category_idCategory= Category.idCategory

#show product based on the creator
select * from Product
where Staff_idStaff= Staff.idStaff

#show modification on a special product by staff
select * from staff_modify_product
where Staff_idStaff= Staff.idStaff and Product_idProduct= Product.idProduct





