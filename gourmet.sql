drop database if exists GOURMET;
create database GOURMET;
USE GOURMET;

CREATE TABLE Reviewer(
    id INT AUTO_INCREMENT PRIMARY KEY,
    family_name VARCHAR(50),
    last_name VARCHAR(50),
    dob DATE,
    username VARCHAR(255) UNIQUE NOT NULL, -- Adjusted username VARCHAR length
    password_hash VARCHAR(255) NOT NULL,
    email LONGTEXT UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    -- Reviewer-specific columns
    biography LONGTEXT,
    location TEXT,
    num_post INT CHECK (num_post >= 0),
    title ENUM('Amateur', 'Immediate', 'Advanced', 'Expert') DEFAULT 'Amateur',
    -- User Level
    level ENUM('user', 'admin') DEFAULT 'user' -- Added 'level' attribute
);

CREATE TABLE Restaurent(
	ID CHAR(5) UNIQUE,
    Res_name VARCHAR(255),
    Res_type ENUM('Fine Dining', 'Fast food', 'Bistro', 'Buffet', 'Bakery') NOT NULL DEFAULT 'Fine Dining',
    Location TEXT NOT NULL
);

CREATE TABLE Post (
	ID INT AUTO_INCREMENT PRIMARY KEY,
    Price FLOAT CHECK (Price > 0),
    Image VARCHAR(255),
    Postname VARCHAR(255) ,
    Post_datetime DATETIME DEFAULT CURRENT_TIMESTAMP,
    Username VARCHAR(255) ,
    Description LONGTEXT ,
    Rating ENUM('1','2','3','4','5') DEFAULT '1',
    Restaurent_ID CHAR(5)
);

ALTER TABLE Post 
ADD CONSTRAINT fk_Post_Username 
FOREIGN KEY (Username) 
REFERENCES Reviewer(Username) 
ON DELETE CASCADE 
ON UPDATE CASCADE;

ALTER TABLE Post 
ADD CONSTRAINT fk_Post_Restaurent_ID
FOREIGN KEY (Restaurent_ID) 
REFERENCES Restaurent(ID) 
ON DELETE CASCADE 
ON UPDATE CASCADE;

ALTER TABLE Reviewer MODIFY num_post INT DEFAULT 0;
DELIMITER //

CREATE TRIGGER increment_num_post
AFTER INSERT ON Post
FOR EACH ROW
BEGIN
  UPDATE Reviewer
  SET num_post = num_post + 1
  WHERE username = NEW.Username;
END;
//

CREATE TRIGGER decrement_num_post
AFTER DELETE ON Post
FOR EACH ROW
BEGIN
  UPDATE Reviewer
  SET num_post = num_post - 1
  WHERE username = OLD.Username;
END;
//

DELIMITER ;


-- SELECT Post.*, Restaurent.*, Post.ID as postID FROM Post JOIN Restaurent ON Post.Restaurent_ID = Restaurent.ID WHERE 1=1 ORDER BY Post_datetime DESC LIMIT 12 OFFSET 1;
-- SELECT COUNT(*) AS total FROM Post JOIN Restaurent ON Post.Restaurent_ID = Restaurent.ID WHERE 1=1;
-- select * from Reviewer;
-- delete from Review	