-- --------------------------------------------------------------------------------
--  Program Name:   create_scripture_db.sql
--  Program Author: Chris Vergaray
--  Creation Date:  12-Oct-2014
-- --------------------------------------------------------------------------------

use scriptures_db;

-- This enables dropping tables with foreign key dependencies.
-- It is specific to the InnoDB Engine.
SET FOREIGN_KEY_CHECKS = 0; 

-- Conditionally drop objects.
SELECT 'SCRIPTURES' AS "Drop Table";
DROP TABLE IF EXISTS scriptures;

-- ------------------------------------------------------------------
-- Create SCRIPTURES table.
-- ------------------------------------------------------------------
SELECT 'SCRIPTURES' AS "Create Table";

CREATE TABLE scriptures
( id             	      INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, book			      CHAR(30)     NOT NULL
, chapter                     INT UNSIGNED NOT NULL
, verse               	      INT UNSIGNED NOT NULL
, content		      CHAR (255)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO scriptures
( id
, book
, chapter
, verse
, content)
VALUES
( NULL
, 'John'
, 1
, 5
, 'And the alight shineth in bdarkness; and the darkness ccomprehended it not.');

INSERT INTO scriptures
( id
, book
, chapter
, verse
, content)
VALUES
( NULL
, 'Doctorine and Covenants'
, 88
, 49
, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

INSERT INTO scriptures
( id
, book
, chapter
, verse
, content)
VALUES
( NULL
, 'Doctorine and Covenants'
, 93
, 28
, 'Man was also in the beginning with God. Intelligence, or the clight of truth, was not created or made, neither indeed can be.');

INSERT INTO scriptures
( id
, book
, chapter
, verse
, content)
VALUES
( NULL
, 'Mosiah'
, 16
, 9
, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more eath.');

-- Commit inserts.
COMMIT;

-- Display tables.
SHOW TABLES;

-- Display table specific information.
SELECT * FROM scriptures;


