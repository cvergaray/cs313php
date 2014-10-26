-- --------------------------------------------------------------------------------
--  Program Name:   create_katie_db.sql
--  Program Author: Chris Vergaray
--  Creation Date:  06-Oct-2014
-- --------------------------------------------------------------------------------

use katie_db;

-- This enables dropping tables with foreign key dependencies.
-- It is specific to the InnoDB Engine.
SET FOREIGN_KEY_CHECKS = 0; 

-- Conditionally drop objects.
SELECT 'SYSTEM_USER' AS "Drop Table";
DROP TABLE IF EXISTS system_user;

-- ------------------------------------------------------------------
-- Create SYSTEM_USER_LAB table.
-- ------------------------------------------------------------------
SELECT 'SYSTEM_USER' AS "Create Table";

CREATE TABLE system_user
( system_user_id              INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, system_user_name            CHAR(20)     NOT NULL
, system_user_password        CHAR(20)     NOT NULL
, is_administrator	      BOOLEAN      NOT NULL
, first_name                  CHAR(20)
, middle_name                 CHAR(20)
, last_name                   CHAR(20)
, creation_date               DATE         NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Conditionally drop objects.
SELECT 'ADDRESS' AS "Drop Table";
DROP TABLE IF EXISTS address;

-- ------------------------------------------------------------------
-- Create ADDRESS table.
-- ------------------------------------------------------------------
SELECT 'ADDRESS' AS "Create Table";

CREATE TABLE address
( address_id                  INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, system_user_id 	      INT UNSIGNED NOT NULL
, street_address              CHAR(30)     NOT NULL
, city                        CHAR(30)     NOT NULL
, state_province              CHAR(30)     NOT NULL
, postal_code                 CHAR(20)     NOT NULL
, creation_date               DATE         NOT NULL
, KEY address_fk1 (system_user_id)
, CONSTRAINT address_fk1 FOREIGN KEY (system_user_id) REFERENCES system_user (system_user_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Conditionally drop objects.
SELECT 'TELEPHONE' AS "Drop Table";
DROP TABLE IF EXISTS telephone;

-- ------------------------------------------------------------------
-- Create TELEPHONE table.
-- ------------------------------------------------------------------
SELECT 'TELEPHONE' AS "Create Table";

CREATE TABLE telephone
( telephone_id                INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, system_user_id              INT UNSIGNED NOT NULL
, address_id                  INT UNSIGNED
, country_code                CHAR(3)      NOT NULL
, area_code                   CHAR(6)      NOT NULL
, telephone_number            CHAR(10)     NOT NULL
, creation_date               DATE         NOT NULL
, KEY telephone_lab_fk1 (system_user_id)
, CONSTRAINT telephone_lab_fk1 FOREIGN KEY (system_user_id) REFERENCES system_user (system_user_id)
, KEY telephone_lab_fk2 (address_id)
, CONSTRAINT telephone_lab_fk2 FOREIGN KEY (address_id) REFERENCES address (address_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Conditionally drop objects.
SELECT 'ORDERS' AS "Drop Table";
DROP TABLE IF EXISTS orders;

-- ------------------------------------------------------------------
-- Create ORDER table.
-- ------------------------------------------------------------------
SELECT 'ORDERS' AS "Create Table";

CREATE TABLE orders
( order_id                    INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, system_user_id              INT UNSIGNED NOT NULL
, order_date                  DATE         NOT NULL
, fulfilled_date              DATE         NOT NULL
, creation_date               DATE         NOT NULL
, Message		      BLOB
, KEY orders_fk1 (system_user_id)
, CONSTRAINT orders_fk1 FOREIGN KEY (system_user_id) REFERENCES system_user (system_user_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Conditionaly drop object
SELECT 'BAKED_GOOD' AS "Drop Table";
DROP TABLE IF EXISTS baked_good;


-- ------------------------------------------------------------------
-- Create BAKED_GOOD table.
-- ------------------------------------------------------------------
SELECT 'BAKED_GOOD' AS "Create Table";

CREATE TABLE baked_good
( baked_good_id               INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, item_name                   CHAR(60)     NOT NULL
, creation_date               DATE         NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO baked_good
( baked_good_id
, item_name
, creation_date)
VALUES
(NULL, 'Breads', UTC_DATE());

INSERT INTO baked_good
( baked_good_id
, item_name
, creation_date)
VALUES
(NULL, 'Pies', UTC_DATE());

INSERT INTO baked_good
( baked_good_id
, item_name
, creation_date)
VALUES
(NULL, 'Cookies', UTC_DATE());

INSERT INTO baked_good
( baked_good_id
, item_name
, creation_date)
VALUES
(NULL, 'Muffins', UTC_DATE());

INSERT INTO baked_good
( baked_good_id
, item_name
, creation_date)
VALUES
(NULL, 'Other', UTC_DATE());



-- Conditionally drop objects.
SELECT 'IMAGE' AS "Drop Table";
DROP TABLE IF EXISTS image;

-- ------------------------------------------------------------------
-- Create ITEM table.
-- ------------------------------------------------------------------
SELECT 'IMAGE' AS "Create Table";

CREATE TABLE image
( image_id                    INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, image_name                  CHAR(60)     NOT NULL
, image_data		      BLOB         NOT NULL
, creation_date               DATE         NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Conditionally drop objects.
SELECT 'ITEM' AS "Drop Table";
DROP TABLE IF EXISTS item;

-- ------------------------------------------------------------------
-- Create ITEM table.
-- ------------------------------------------------------------------
SELECT 'ITEM' AS "Create Table";

CREATE TABLE item
( item_id                     INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, item_type                   INT UNSIGNED NOT NULL
, item_name                   CHAR(60)     NOT NULL
, item_description            TEXT         NOT NULL
, item_price                  INT UNSIGNED NOT NULL
, item_picture		      INT UNSIGNED
, creation_date               DATE         NOT NULL
, KEY item_fk1 (item_type)
, CONSTRAINT item_lab_fk1 FOREIGN KEY (item_type) REFERENCES baked_good (baked_good_id)
, KEY item_fk2 (item_picture)
, CONSTRAINT item_lab_fk2 FOREIGN KEY (item_picture) REFERENCES image (image_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- Conditionally drop objects.
SELECT 'ORDER_ITEM' AS "Drop Table";
DROP TABLE IF EXISTS order_item;

-- ------------------------------------------------------------------
-- Create ORDER_ITEM table.
-- This is to associate items to an order so that a single order may 
-- have multiple items
-- ------------------------------------------------------------------
SELECT 'ORDER_ITEM' AS "Create Table";

CREATE TABLE order_item
( order_item_id              INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, order_id                   INT UNSIGNED NOT NULL
, item_id                    INT UNSIGNED NOT NULL
, creation_date              DATE         NOT NULL
, KEY rental_item_lab_fk1 (order_id)
, CONSTRAINT rental_item_lab_fk1 FOREIGN KEY (order_id) REFERENCES orders (order_id)
, KEY rental_item_lab_fk2 (item_id)
, CONSTRAINT rental_item_lab_fk2 FOREIGN KEY (item_id) REFERENCES item (item_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Commit inserts.
COMMIT;

-- Display tables.
SHOW TABLES;

DESCRIBE system_user;
DESCRIBE address;
DESCRIBE telephone;
DESCRIBE orders;
DESCRIBE item;
DESCRIBE baked_good;
DESCRIBE order_item;

