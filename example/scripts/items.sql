USE GUITAR;
CREATE TABLE GUITAR.guitar_items (
  item_id      INT            NOT NULL,
  item_name    VARCHAR(255)   NOT NULL,
  category_id  INT            DEFAULT NULL,
  list_price   DECIMAL(10,2)  NOT NULL,
  PRIMARY KEY (item_id),
  FOREIGN KEY (category_id)
    REFERENCES GUITAR.guitar_categories(category_id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
);

INSERT INTO GUITAR.guitar_items (item_id, item_name, category_id, list_price) 
VALUES
(1, 'Fender Stratocaster', 1, 1200.00);