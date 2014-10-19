USE katie_db;

INSERT INTO `katie_db`.`item` 
(`item_id`
, `item_type`
, `item_name`
, `item_description`
, `item_price`
, `item_picture`
, `creation_date`)
 VALUES 
(NULL
, '1'
, 'Banana Sour Cream Bread'
, 'The sour cream in the recipe creates an amazingly moist and delectable bread that you just can not get enough of!This delicious banana bread comes in a aluminum bread pan and can be made with or without walnuts.'
, '350'
, NULL
, UTC_DATE());

INSERT INTO `katie_db`.`item` 
(`item_id`
, `item_type`
, `item_name`
, `item_description`
, `item_price`
, `item_picture`
, `creation_date`)
 VALUES 
(NULL
, '1'
, 'Pumpkin Bread'
, 'Even those averse to pumpkin will be converted by this delicious bread'
, '350'
, NULL
, UTC_DATE());

INSERT INTO `katie_db`.`item` 
(`item_id`
, `item_type`
, `item_name`
, `item_description`
, `item_price`
, `item_picture`
, `creation_date`)
 VALUES 
(NULL
, '2'
, 'Key Lime Pie'
, 'This rich pie can win anyone\'s heart and stomach. '
, '750'
, NULL
, UTC_DATE());

INSERT INTO `katie_db`.`item` 
(`item_id`
, `item_type`
, `item_name`
, `item_description`
, `item_price`
, `item_picture`
, `creation_date`)
 VALUES 
(NULL
, '1'
, 'Lemon Blueberry Bread'
, 'Made with whole blueberries, this sweet bread is full of wonderful fruit flavor.'
, '350'
, NULL
, UTC_DATE());


INSERT INTO `katie_db`.`item` 
(`item_id`
, `item_type`
, `item_name`
, `item_description`
, `item_price`
, `item_picture`
, `creation_date`)
 VALUES 
(NULL
, '3'
, 'White Chocolate Macadamia nut'
, 'This is the product that has become famous among my friends and coworkers. It is the perfect mix of salty and sweet. I have yet to one anyone who does not succumb to the deliciousness.'
, '500'
, NULL
, UTC_DATE());


INSERT INTO `katie_db`.`item` 
(`item_id`
, `item_type`
, `item_name`
, `item_description`
, `item_price`
, `item_picture`
, `creation_date`)
 VALUES 
(NULL
, '3'
, 'Oatmeal Chocolate Chip'
, 'Oatmeal….that’s healthy, right?'
, '350'
, NULL
, UTC_DATE());


INSERT INTO `katie_db`.`item` 
(`item_id`
, `item_type`
, `item_name`
, `item_description`
, `item_price`
, `item_picture`
, `creation_date`)
 VALUES 
(NULL
, '3'
, 'Almost Oreo Cookie'
, 'Two cake cookies encasing a smooth and creamy layer of vanilla filling, copying the famous Oreo cookie— only better!'
, '350'
, NULL
, UTC_DATE());


INSERT INTO `katie_db`.`item` 
(`item_id`
, `item_type`
, `item_name`
, `item_description`
, `item_price`
, `item_picture`
, `creation_date`)
 VALUES 
(NULL
, '4'
, 'Banana Crumb'
, 'Sprinkled with cinnamon and sugar, these large muffins makes a great breakfast or a great treat!'
, '550'
, NULL
, UTC_DATE());


INSERT INTO `katie_db`.`item` 
(`item_id`
, `item_type`
, `item_name`
, `item_description`
, `item_price`
, `item_picture`
, `creation_date`)
 VALUES 
(NULL
, '4'
, 'Blueberry'
, 'Can’t go wrong with the classics.'
, '350'
, NULL
, UTC_DATE());


INSERT INTO `katie_db`.`item` 
(`item_id`
, `item_type`
, `item_name`
, `item_description`
, `item_price`
, `item_picture`
, `creation_date`)
 VALUES 
(NULL
, '4'
, 'Lemon Raspberry'
, 'These two fruit flavors were made for each other. And these muffins are made for you!'
, '450'
, NULL
, UTC_DATE());


INSERT INTO `katie_db`.`item` 
(`item_id`
, `item_type`
, `item_name`
, `item_description`
, `item_price`
, `item_picture`
, `creation_date`)
 VALUES 
(NULL
, '5'
, 'Orange Roll'
, 'I use the Lionhouse recipe, famous in Utah. These rolls are risen twice before baking, but definitely worth the wait!'
, '500'
, NULL
, UTC_DATE());


INSERT INTO `katie_db`.`item` 
(`item_id`
, `item_type`
, `item_name`
, `item_description`
, `item_price`
, `item_picture`
, `creation_date`)
 VALUES 
(NULL
, '1'
, 'Fruit Pizza'
, 'Customizable with your favorite fruits, these fruit pizzas are a one of a kind piece of edible art.'
, '1800'
, NULL
, UTC_DATE());

COMMIT;

SELECT * FROM item;