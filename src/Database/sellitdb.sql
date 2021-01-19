use sellitdb;

DROP TABLE IF EXISTS customer;
CREATE TABLE  customer (
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  firstName VARCHAR(64)  NOT NULL,
  lastName  VARCHAR(64)  NOT NULL,
  userName  VARCHAR(64)  NOT NULL,
  email     VARCHAR(128) NOT NULL,
  password  VARCHAR(40)  NOT NULL,
  date date NOT NULL,
  kanton  VARCHAR(64)  NOT NULL,
  ort  VARCHAR(64)  NOT NULL,
  plz  int(64)  NOT NULL,
  profilePicture VARCHAR(40) NOT NULL,
  PRIMARY KEY  (id)
);

DROP TABLE IF EXISTS category;
CREATE TABLE  category (
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  category  VARCHAR(40)  NOT NULL,
  PRIMARY KEY  (id)
);

DROP TABLE IF EXISTS product;
CREATE TABLE  product (
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  customer_id INT UNSIGNED,
  category_id INT UNSIGNED,
  productName VARCHAR(64)  NOT NULL,
  picture1 VARCHAR(40)  NOT NULL,
  beschriebungSmall VARCHAR(64)  NOT NULL,
  beschriebungBig VARCHAR(64)  NOT NULL,
  preis VARCHAR(64)  NOT NULL,
  PRIMARY KEY  (id),
  FOREIGN KEY (customer_id) REFERENCES customer (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS shoppingCart;
CREATE TABLE  shoppingCart (
  id        INT UNSIGNED NOT NULL AUTO_INCREMENT,
  product_id INT UNSIGNED,
  customer_id INT UNSIGNED,
  PRIMARY KEY  (id),
  FOREIGN KEY (customer_id) REFERENCES customer (id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE ON UPDATE CASCADE
);
  
INSERT INTO category (category) VALUES ('Electronic');
INSERT INTO category (category) VALUES ('Furniture');
INSERT INTO category (category) VALUES ('Pet');
INSERT INTO category (category) VALUES ('Toy');
INSERT INTO category (category) VALUES ('Jewellery');
INSERT INTO category (category) VALUES ('Movies');
INSERT INTO category (category) VALUES ('Sport');
INSERT INTO category (category) VALUES ('Automobile');
INSERT INTO category (category) VALUES ('Baby');
INSERT INTO category (category) VALUES ('Business');
INSERT INTO category (category) VALUES ('Holidays');

INSERT INTO customer (userName, email, password) VALUES ('test', 'test@test.ch', sha1('test'));

DELETE FROM product WHERE preis = '15';