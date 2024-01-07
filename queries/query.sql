CREATE TABLE mas_category 
( cat_id integer PRIMARY KEY,
  cat_name character varying(20));

INSERT INTO mas_category values (1,'Books'),(2,'Mobiles'),(3,'Clothes'),(4,'AC'),(5,'TV'),(6,'Bag');
drop table mas_category

SELECT * FROM mas_category;

CREATE TABLE items
( item_id integer PRIMARY KEY,
  item_name character varying(50),
  item_desc character varying(500),
  item_cat integer ,
  item_img character varying(100));

  INSERT INTO items values (1,'Harry','Story..', 1,''),(2,'Phy','study',1,''),(3,'samsung','mobile',2,'');
 DROP TABLE items
 
SELECT * FROM items;

SELECT * FROM items WHERE item_cat = 1;


----INSERT
-- Insert 5 books
INSERT INTO items VALUES
  (1, 'The Great Gatsby', 'Classic novel by F. Scott Fitzgerald', 1, ''),
  (2, 'To Kill a Mockingbird', 'Harper Lees timeless exploration of racial injustice', 1, ''),
  (3, '1984', 'Dystopian novel by George Orwell', 1, ''),
  (4, 'The Catcher in the Rye', 'J.D. Salingers influential coming-of-age novel', 1, ''),
  (5, 'Pride and Prejudice', 'Jane Austens classic romantic novel', 1, '');
-- Insert 5 mobiles
INSERT INTO items VALUES
   (6,'Samsung Galaxy S21', 'Flagship smartphone with advanced features', 2, ''),
  (7, 'iPhone 13', 'Latest iPhone model with powerful performance', 2, ''),
  (8, 'Xiaomi Mi 11', 'Affordable flagship with impressive specifications', 2, ''),
  (9, 'Google Pixel 6', 'High-quality camera and pure Android experience', 2, ''),
  (10,'OnePlus 9 Pro', 'Premium Android device with fast charging', 2, '');
-- Insert 5 clothes
INSERT INTO items VALUES
  (11, 'Cotton Shirt', 'Comfortable cotton shirt for daily wear', 3, ''),
  (12, 'Denim Jeans', 'Classic denim jeans for a casual look', 3, ''),
  (13, 'Silk Dress', 'Elegant silk dress for special occasions', 3, ''),
  (14, 'Wool Sweater', 'Warm wool sweater for chilly days', 3, ''),
  (15, 'Athletic Shorts', 'Breathable athletic shorts for sports and exercise', 3, '');
-- Insert 5 ACs
INSERT INTO items VALUES
   (16, 'LG AC', 'Highly efficient air conditioner with advanced cooling technology', 4, ''),
  (17, 'Samsung AC', 'Energy-efficient AC with smart features', 4, ''),
  (18, 'Daikin AC', 'Japanese brand known for reliable and durable air conditioners', 4, ''),
  (19, 'Carrier AC', 'Trusted brand with a focus on performance and innovation', 4, ''),
  (20, 'Hitachi AC', 'Innovative air conditioning solutions for home and business', 4, '');


-- Insert 5 TVs
INSERT INTO items VALUES
   (21, 'Sony TV', 'High-quality televisions with cutting-edge display technology', 5, ''),
  (22, 'Samsung TV', 'Smart TVs with vibrant colors and immersive viewing experience', 5, ''),
  (23, 'LG TV', 'Innovative TVs known for sleek design and superior picture quality', 5, ''),
  (24, 'TCL TV', 'Affordable smart TVs with Roku integration for streaming', 5, ''),
  (25, 'Panasonic TV', 'Japanese brand offering a range of televisions with great features', 5, '');

-- Insert 5 bags
INSERT INTO items VALUES
  (26, 'Louis Vuitton', 'Luxury bags with iconic monogram and elegant design', 6, ''),
  (27, 'Gucci', 'Fashion-forward bags known for their quality and style', 6, ''),
  (28, 'Michael Kors', 'Designer bags with a blend of fashion and functionality', 6, ''),
  (29, 'Herschel', 'Casual and trendy bags suitable for everyday use', 6, ''),
  (30, 'Samsonite', 'Durable and reliable bags, especially for travel', 6, '');

Alter table items add column avg_rating decimal(2,1) default 0.0

  CREATE TABLE ratings (
  rating_id SERIAL PRIMARY KEY,
  item_id INTEGER REFERENCES items(item_id),
  item_name character varying(50),
  site_name character varying(50),
  rating_value DECIMAL(2,1) CHECK (rating_value >= 1 AND rating_value <= 5),
  price decimal(10,2)
  
);


DROP table ratings
SELECT * FROM ratings


-- Insert ratings for books


INSERT INTO ratings (item_id, item_name,site_name, rating_value, price)
SELECT r.item_id,i.item_name, r.site_name, r.rating_value, r.price
FROM (
  VALUES
    (1, 'Amazon', 4, 400),
    (1, 'Flipkart', 3.5, 600),
    (2, 'Amazon', 3.8, 250),
    (2, 'Flipkart', 2.9, 260),
    (3, 'Amazon', 3.5, 800),
    (3, 'Flipkart', 4, 430),
    (4, 'Amazon', 4.5, 540),
    (4, 'Flipkart', 3, 460),
    (5, 'Amazon', 4.2, 300),
    (5, 'Flipkart', 3.7, 280)
) AS r(item_id, site_name, rating_value, price)
JOIN items i ON r.item_id = i.item_id;

-- Insert ratings for mobiles
  
  INSERT INTO ratings (item_id, item_name,site_name, rating_value, price)
SELECT r.item_id,i.item_name, r.site_name, r.rating_value, r.price
FROM (
  VALUES
    (6, 'Amazon', 3.2, 14400),
    (6, 'Croma', 4.5,12600),
    (7, 'Amazon', 4.8, 11250),
    (7, 'Croma', 4.9, 11260),
    (8, 'Amazon', 3.5, 12800),
    (8, 'Croma', 4, 13430),
    (9, 'Amazon', 4, 12540),
    (9, 'Croma', 3, 13460),
    (10, 'Amazon', 4.7, 18300),
    (10, 'Croma', 4.2, 12280)
) AS r(item_id, site_name, rating_value, price)
JOIN items i ON r.item_id = i.item_id;

-- Insert ratings for clothes
INSERT INTO ratings (item_id, item_name,site_name, rating_value, price)
SELECT r.item_id,i.item_name, r.site_name, r.rating_value, r.price
FROM (
  VALUES
  (11, 'Myntra', 4.8,1200),
  (11, 'Meesho', 4.3,540),
  (12, 'Myntra', 3.5,2000),
  (12, 'Meesho', 4,1100),
  (13, 'Myntra', 2.3,2400),
  (13, 'Meesho', 3.5,1800),
  (14, 'Myntra', 3,700),
  (14, 'Meesho', 3.2,600),
  (15, 'Myntra', 3.8,450),
  (15, 'Meesho', 3.5,500)
  ) AS r(item_id, site_name, rating_value, price)
JOIN items i ON r.item_id = i.item_id;

-- Insert ratings for ACs
INSERT INTO ratings (item_id, item_name,site_name, rating_value, price)
SELECT r.item_id,i.item_name, r.site_name, r.rating_value, r.price
FROM (
  VALUES
  (16, 'Flipkart', 4, 42576),
  (16, 'Croma', 4.2, 35450),
  (17, 'Flipkart', 3.8,27740),
  (17, 'Croma', 3.5,28800),
  (18, 'Flipkart', 3.8,35000),
  (18, 'Croma', 3.2,36500),
  (19, 'Flipkart',3.7,46000),
  (19, 'Croma', 4.3,37500),
  (20, 'Flipkart', 3.6,35000),
  (20, 'Croma', 5,28500)
   ) AS r(item_id, site_name, rating_value, price)
JOIN items i ON r.item_id = i.item_id;
alter table ratings add column cart integer ;

alter table ratings add column buy integer;
UPDATE ratings SET cart = 0;
UPDATE ratings SET buy = 0;


-- Insert ratings for TVs
INSERT INTO ratings (item_id, item_name,site_name, rating_value, price)
SELECT r.item_id,i.item_name, r.site_name, r.rating_value, r.price
FROM (
  VALUES
  (21, 'Amazon', 5,21999),
  (21, 'Flipkart', 4.8, 23000),
  (22, 'Amazon', 3.6, 18499),
  (22, 'Flipkart', 4.3,16500),
  (23, 'Amazon', 4.5,24999),
  (23, 'Flipkart', 4,28450),
  (24, 'Amazon', 3.4,11999),
  (24, 'Flipkart', 4.3,15000),
  (25, 'Amazon', 2.8, 49000),
  (25, 'Flipkart', 4,43000)
   ) AS r(item_id, site_name, rating_value, price)
JOIN items i ON r.item_id = i.item_id;

 
-- Insert ratings for bags
INSERT INTO ratings (item_id, item_name,site_name, rating_value, price)
SELECT r.item_id,i.item_name, r.site_name, r.rating_value, r.price
FROM (
  VALUES
  (26, 'Myntra', 4.2, 1250),
  (26, 'Nykaa', 3.8,1500),
  (27, 'Myntra', 4,3200),
  (27, 'Nykaa', 3.7,3400),
  (28, 'Myntra', 4.6,2300),
  (28, 'Nykaa', 3.4,1800),
  (29, 'Myntra', 4.5,1630),
  (29, 'Nykaa', 3.8,1400),
  (30, 'Myntra', 4.7,4300),
  (30, 'Nykaa', 4.5,3500)
   ) AS r(item_id, site_name, rating_value, price)
JOIN items i ON r.item_id = i.item_id;

Alter table ratings add column sales integer default 1
Alter table ratings drop column cart;
Alter table ratings drop column buy;
Alter table ratings add column url character varying(250)
Alter table ratings drop column url 



SELECT * FROM ratings

CREATE TABLE mas_user
(
  uname character varying(20) NOT NULL,
  upass character varying(20),
  eid integer NOT NULL,
  CONSTRAINT user_pkey PRIMARY KEY (uname)
)

select * from mas_user

Insert INTO mas_user values('roshni','123',100),('shraddha','234',101)
alter table mas_user add column access_lvl integer
alter table mas_user add column uid integer
alter table mas_user drop column eid

 


CREATE TABLE customers
(
  cus_uid SERIAL NOT NULL,
  cus_name character varying(50),
  email character varying(20),
  ph_no character varying(10),
  gender character(2),
  bdate date,
  address character varying(50),
  upass character varying(10),
  CONSTRAINT pkey_customers PRIMARY KEY (cus_uid)
);
select * from customers
drop table customers

alter table customers drop column upass
alter table customers add column uid integer


CREATE TABLE employee
(
  emp_id SERIAL PRIMARY KEY,
  emp_name character varying(50),
  uid integer,
  email character varying(20)
  
);







