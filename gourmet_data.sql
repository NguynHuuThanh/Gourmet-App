-- Insert data into users table (combined users and Reviewer)
-- INSERT INTO Reviewer (family_name, last_name, dob, username, password_hash, email, biography, location, num_post, title, level) VALUES
-- ('Nguyen', 'Thanh', '1990-01-01', 'thanh', '$2y$10$O91/WRoH.vJQT7/Tv4lt8OCXmRZqDlY0zaNtl5CGU.2HZCQfxqUD6', 'thanh@example.com', 'Experienced food critic and reviewer.', 'Hanoi', 10, 'Advanced', 'user'),
-- ('Tran', 'Vui', '1985-05-15', 'vui', '$2y$10$O91/WRoH.vJQT7/Tv4lt8OCXmRZqDlY0zaNtl5CGU.2HZCQfxqUD6', 'vui@example.org', 'Enjoys exploring local eateries and sharing reviews.', 'Ho Chi Minh City', 5, 'Immediate', 'user'),
-- ('Le', 'Huwu', '1982-10-20', 'huwu', '$2y$10$O91/WRoH.vJQT7/Tv4lt8OCXmRZqDlY0zaNtl5CGU.2HZCQfxqUD6', 'huwu@test.net', 'Gourmet enthusiast with a passion for fine dining.', 'Danang', 20, 'Expert', 'user'),
-- ('Admin', 'User', '1990-01-01', 'adminuser', '$2y$10$securehash', 'admin@example.com', 'Admin User', 'Admin Location', 0, 'Expert', 'admin');

-- INSERT INTO Reviewer (family_name, last_name, dob, username, password_hash, email, biography, location, num_post, title, level) VALUES
-- ('Admin', 'User', '1990-01-01', 'adminuser', '$2y$10$securehash', 'admin@example.com', 'Admin User', 'Admin Location', 0, 'Expert', 'admin');

-- Insert data into Restaurent table
INSERT INTO Restaurent (ID, Res_name, Res_type, Location) VALUES
('RS001', 'Le Gourmet', 'Fine Dining', 'Hanoi'),
('RS002', 'Burger Joint', 'Fast food', 'Ho Chi Minh City'),
('RS003', 'Sushi Heaven', 'Fine Dining', 'Danang'),
('RS004', 'Pizza Palace', 'Fast food', 'Hanoi'),
('RS005', 'Cafe Bliss', 'Bistro', 'Ho Chi Minh City');

-- Insert data into Post table
INSERT INTO Post (Price, Postname, Post_datetime, Username, Description, Restaurent_ID, Rating, Image) VALUES
(35.50, 'Exquisite Steak Dinner', '2023-10-26 19:00:00', 'vui', 'The steak was perfectly cooked.', 'RS001',  '5', 'home1.jpg'),
(12.75, 'Ultimate Burger Combo', '2023-10-26 12:30:00', 'vui', 'Best burger I have ever had!', 'RS002',  '5', 'home2.jpg'),
(42.00, 'Fresh Sushi Platter', '2023-10-27 20:00:00', 'vui', 'Amazing fresh sushi!', 'RS003',  '5', 'home3.jpg'),
(9.99, 'Classic Pepperoni Pizza', '2023-10-27 18:00:00', 'vui', 'Quick and delicious pizza.', 'RS004',  '4', 'home4.jpg'),
(8.50, 'Cappuccino and Croissant', '2023-10-28 09:00:00', 'vui', 'Perfect morning treat.', 'RS005',  '5', 'home5.jpg'),
(25.00, 'Tiramisu Delight', '2023-10-28 21:00:00', 'thanh', 'The best tiramisu ever.', 'RS001',  '5', 'home6.jpg'),
(15.00, 'Double Cheese burger', '2023-10-29 13:00:00', 'thanh', 'Delicious and filling', 'RS002',  '4', 'home7.jpg'),
(50.00, 'Omakase Sushi', '2023-10-29 20:30:00', 'thanh', 'Incredible sushi experience.', 'RS003',  '5', 'home1.jpg'),
(11.00, 'Margherita Pizza', '2023-10-30 18:30:00', 'thanh', 'Simple and tasty pizza.', 'RS004',  '4', 'home2.jpg'),
(7.00, 'Latte and Pastry', '2023-10-30 09:30:00', 'thanh', 'Great coffee and pastry selection.', 'RS005',  '4', 'home3.jpg'),
(18.00, 'Spicy Chicken Wings', '2023-11-01 19:30:00', 'thanh', 'Crispy and flavorful wings.', 'RS002',  '4', 'home4.jpg'),
(30.00, 'Seafood Paella', '2023-11-01 20:30:00', 'thanh', 'Rich and satisfying paella.', 'RS001',  '5', 'home5.jpg'),
(10.50, 'Vegetarian Pizza', '2023-11-02 18:45:00', 'thanh', 'Fresh and delicious veggies.', 'RS004',  '4', 'home6.jpg'),
(6.50, 'Iced Caramel Latte', '2023-11-02 10:00:00', 'thanh', 'Perfect for a warm day.', 'RS005',  '4', 'home7.jpg'),
(28.00, 'Tempura Platter', '2023-11-02 21:15:00', 'thanh', 'Light and crispy tempura.', 'RS003',  '5', 'home1.jpg'),
(14.50, 'Chicken Caesar Salad', '2023-11-03 12:00:00', 'huwu', 'Healthy and filling salad.', 'RS005',  '4', 'home2.jpg'),
(22.00, 'BBQ Ribs', '2023-11-03 19:45:00', 'huwu', 'Tender and smoky ribs.', 'RS002',  '4', 'home3.jpg'),
(38.00, 'Lobster Bisque', '2023-11-03 20:45:00', 'huwu', 'Creamy and flavorful soup.', 'RS001',  '5', 'home4.jpg'),
(11.50, 'Hawaiian Pizza', '2023-11-04 18:30:00', 'huwu', 'Sweet and savory pizza.', 'RS004',  '4', 'home5.jpg'),
(7.50, 'Matcha Latte', '2023-11-04 10:30:00', 'huwu', 'Smooth and earthy latte.', 'RS005',  '4', 'home6.jpg'),
(45.00, 'Sashimi Selection', '2023-11-04 21:00:00', 'huwu', 'Finest selection of sashimi.', 'RS003',  '5', 'home7.jpg'),
(16.00, 'Club Sandwich', '2023-11-05 12:30:00', 'huwu', 'Classic and satisfying sandwich.', 'RS005',  '4', 'home1.jpg'),
(24.00, 'Onion Rings', '2023-11-05 20:00:00', 'huwu', 'Crispy and golden onion rings.', 'RS002',  '4', 'home2.jpg'),
(32.00, 'Duck Confit', '2023-11-05 21:00:00', 'huwu', 'Perfectly cooked duck confit.', 'RS001',  '5', 'home3.jpg'),
(12.00, 'Mushroom Pizza', '2023-11-06 18:15:00', 'huwu', 'Earthy and delicious pizza.', 'RS004',  '4', 'home4.jpg'),
(8.00, 'Chocolate Croissant', '2023-11-06 09:45:00', 'huwu', 'Flaky and chocolatey pastry.', 'RS005',  '4', 'home5.jpg'),
(40.00, 'Grilled Salmon', '2023-11-06 20:30:00', 'huwu', 'Perfectly grilled salmon.', 'RS003',  '5', 'home6.jpg'),
(17.50, 'BLT Sandwich', '2023-11-07 12:15:00', 'huwu', 'Classic BLT with crispy bacon.', 'RS005',  '4', 'home7.jpg'),
(26.00, 'Fried Chicken', '2023-11-07 19:15:00', 'huwu', 'Crispy and juicy fried chicken.', 'RS002',  '4', 'home1.jpg'),
(35.00, 'Beef Wellington', '2023-11-07 20:15:00', 'huwu', 'Tender beef wellington.', 'RS001',  '5', 'home2.jpg');
select * from Reviewer;

-- select username, num_post from reviewer;
-- select * from Post where Postname = '3';
-- SELECT ID FROM Post
-- WHERE Postname IN ('10', '1', '2', '3', '4', '5', '6', '12') ORDER BY ID ASC;

-- DELETE FROM Post
-- WHERE ID BETWEEN 37 AND 74;

-- SELECT
--     p.ID AS post_id,
--     p.*,
--     r.*
-- FROM
--     Post p
-- JOIN
--     Restaurent r ON p.Restaurent_ID = r.ID;