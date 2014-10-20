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
-- Create and seed SCRIPTURES table.
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
, 'And the light shineth in darkness; and the darkness comprehended it not.');

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
, 'Man was also in the beginning with God. Intelligence, or the light of truth, was not created or made, neither indeed can be.');

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


-- ------------------------------------------------------------------
-- Create and seed TOPICS table.
-- ------------------------------------------------------------------
SELECT 'TOPICS' AS "Create Table";

CREATE TABLE topics
( id             	      INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, name			      CHAR(30)     NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO topics
( id
, name)
VALUES
( NULL
, 'Faith');

INSERT INTO topics
( id
, name)
VALUES
( NULL
, 'Sacrifice');

INSERT INTO topics
( id
, name)
VALUES
( NULL
, 'Charity');

INSERT INTO topics
( id
, name)
VALUES
( NULL
, 'Light');


-- ------------------------------------------------------------------
-- Create SCRIPTURE_TOPIC_LOOKUP table.
-- ------------------------------------------------------------------
SELECT 'SCRIPTURE_TOPIC_LOOKUP' AS "Create Table";

CREATE TABLE scripture_topic_lookup
( id             	      INT UNSIGNED PRIMARY KEY AUTO_INCREMENT
, scripture_id                INT UNSIGNED NOT NULL
, topic_id                    INT UNSIGNED NOT NULL
, KEY scripture_topic_fk1 (scripture_id)
, CONSTRAINT scripture_topic_fk1 FOREIGN KEY (scripture_id) REFERENCES scriptures (id)
, KEY scripture_topic_fk2 (topic_id)
, CONSTRAINT scripture_topic_fk2 FOREIGN KEY (topic_id) REFERENCES topics (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO scripture_topic_lookup
( id 
, scripture_id 
, topic_id )
VALUES
( NULL
, 1
, (SELECT id FROM topics WHERE name = 'Light'));

INSERT INTO scripture_topic_lookup
( id 
, scripture_id 
, topic_id )
VALUES
( NULL
, 2
, (SELECT id FROM topics WHERE name = 'Light'));

INSERT INTO scripture_topic_lookup
( id 
, scripture_id 
, topic_id )
VALUES
( NULL
, 3
, (SELECT id FROM topics WHERE name = 'Light'));

INSERT INTO scripture_topic_lookup
( id 
, scripture_id 
, topic_id )
VALUES
( NULL
, 4
, (SELECT id FROM topics WHERE name = 'Light'));
-- Commit inserts.
COMMIT;

-- Display tables.
SHOW TABLES;

-- Display table specific information.
SELECT * FROM scriptures;

SELECT * FROM topics;

SELECT * FROM scripture_topic_lookup;

