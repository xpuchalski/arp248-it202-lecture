CREATE TABLE GUITAR.guitar_categories (
 category_id       INT            NOT NULL,
 category_code     VARCHAR(10)    NOT NULL,
 category_name     VARCHAR(255)   NOT NULL,
 PRIMARY KEY (category_id)
);

INSERT INTO GUITAR.guitar_categories (category_id, category_code, category_name) VALUES
(1, 'ELEC', 'Electric Guitars'),
(2, 'ACOU', 'Acoustic Guitars'),
(3, 'BASS', 'Bass Guitars');