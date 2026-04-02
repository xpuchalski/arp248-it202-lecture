USE exercise_arp248;
-- Xander Puchalski, it202, Exercise 9, xdp248@njit.edu

CREATE TABLE exercise_arp248.contacts_arp248 (
   id         INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
   name       VARCHAR(60)  NOT NULL,
   email      VARCHAR(100) NOT NULL,
   message    TEXT         NOT NULL,
   created_at TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
);
