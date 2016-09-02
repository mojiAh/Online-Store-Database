#Category Table Scripts
insert into Category(Category_Name) Values ("House Holding")
insert into Category(Category_Name) Values ("Gardening")
insert into Category(Category_Name, Category_ParentID) Values ("Kitchen",1)
insert into Category(Category_Name, Category_ParentID) Values ("Dining Room",1)
insert into Category(Category_Name, Category_ParentID) Values 
													("Dish Washer",(select idCategory 
																	from Category 
																	where Category_Name="kitchen"));
insert into Category(Category_Name, Category_ParentID)  select "Dish Washer",idCategory 
														from Category 
														where Category_Name="kitchen"
                                                        
										
Select * from Category


#Staff Table
INSERT INTO `dbc6mahmad62`.`Staff`
(
`Staff_FirstName`,
`Staff_LastName`,
`Staff_Username`,
`Staff_Password`,
`Staff_PhoneNumber`)
VALUES
(
"Mojtaba",
"Ahmadi",
"aaaa",
"123",
"+358466181212");

select * from Staff
 


#Product Table
INSERT INTO `dbc6mahmad62`.`Product`
(`Product_Name`,
`Product_ShortDesc`,
`Product_LongDesc`,
`Product_Stock`,
`Product_Price`,
`Product_Wight`,
`Product_Location`,
`Category_idCategory`,
`Staff_idStaff`)
VALUES
("SPT SD-2224DS Countertop Dishwasher with Delay Start & LED",
"7 wash cycles: Heavy, normal, light, mini party, rinse, speed and soak
Delay start for added convenience : Two, four, six or eight hours
Universal faucet adapter and Quick Connect: For quick and easy connection to most kitchen faucets",
"7 wash cycles: Heavy, normal, light, mini party, rinse, speed and soak
Delay start for added convenience : Two, four, six or eight hours
Universal faucet adapter and Quick Connect: For quick and easy connection to most kitchen faucets
Electronic controls with LED display : LED displays remaining time or current running state
Water supply warning indicator and rinse aid warning indicator",
"In Stock",
"225.99",
15.45,
"TAMPERE",
5,
1);

select * from Product

#Customer Table

INSERT INTO `dbc6mahmad62`.`Customer`
(`Customer_Username`,
`Customer_Password`,
`Customer_Email`,
`Customer_EmailVerfied`,
`Customer_Firstname`,
`Customer_Lastname`,
`Customer_PhoneNumber`,
`Customer_Fax`,
`Customer_Address`,
`Customer_Address2`,
`Customer_Gender`,
`Customer_BirthDate`,
`Customer_Country`,
`Customer_State`,
`Customer_City`,
`Customer_Zip`)
VALUES
("silver",
"123",
"test@test.com",
"test2@test.com",
"Mojtaba",
"Ahmadi",
"+358466181212",
"0213123",
"Yrttikatu 15B",
"",
"M",
1986-06-30,
"Finland",
"Pirkanlma",
"Tampere",
"33710"
);

select * from Customer


#order Table

INSERT INTO `dbc6mahmad62`.`Orders`
(`Customer_idCustomer`,
`Product_idProduct`,
`Product_Staff_idStaff`,
`Order_Amount`,
`Order_ShipName`,
`Order_ShipAddress`,
`Order_Country`,
`Order_State`,
`Order_City`,
`Order_Zip`,
`Order_Phone`,
`Order_Fax`,
`Order_Tax`,
`Order_Email`,
`Order_Date`,
`Order_TrackingNumber`)
VALUES
(1000,
1,
1,
1,
"Tomi",
"Satakunnankatu 12",
"Finland",
"Pirkanmma",
"Tampere",
"33210",
"+354343231213",
"0212333434",
12.0333,
"book@gmail.com",
2016-08-21,
"2123434545G4343");

select * from Orders

#Comment Table

INSERT INTO `dbc6mahmad62`.`Comment`
(`Comment_Msg`,
`Comment_LastModifyDate`,
`Customer_idCustomer`,
`Product_idProduct`)
VALUES
("The warranty is aweful!",
2016-08-20,
1000,
1);

select * from Comment

#Rating table

INSERT INTO `dbc6mahmad62`.`Rating`
(`Rating_Value`,
`Rating_Date`,
`Customer_idCustomer`,
`Product_idProduct`)
VALUES
("5",
2016-08-21,
1000,
1);

select * from Rating


