DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS reviews;

CREATE TABLE products (
  product_id int AUTO_INCREMENT,    -- Product unique identifier
  product_name varchar(30),         -- Name of the product
  product_desc varchar(255),        -- Decription of product
  --image blob,                     -- Product image
  PRIMARY KEY (product_id)
);

CREATE TABLE reviews (
  num int AUTO_INCREMENT            -- Unique indentifier of review
  date_ date,                       -- Date of posting
  first_name varchar(30) NOT NULL,  -- Reviewer first name
  last_name varchar(30) NOT NULL,   -- Reviewer last name
  message varchar(255),             -- Reviewer commentary
  stars int,                        -- stars out of 5
  PRIMARY KEY (num),
  CHECK (stars <= 5)
);
