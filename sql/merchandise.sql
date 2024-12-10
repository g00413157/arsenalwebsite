-- Create the database (if not already created)
CREATE DATABASE IF NOT EXISTS arsenalwebsitedb;
USE arsenalwebsitedb;

-- Create the merchandise table
CREATE TABLE merchandise (
    id INT AUTO_INCREMENT PRIMARY KEY,
    merch_name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL,
    status VARCHAR(100) NOT NULL,
    image_url VARCHAR(20) NOT NULL,
    created_at TIMESTAMP NOT NULL
    
);
INSERT INTO merchandise (merch_name, description, price, stock, status, image_url, created_at) VALUES
('Arsenal Women Home Jersey 2024/25', 'Official Arsenal Women home jersey for the 2024/25 season. Features the club crest and Adidas logo.', 89.99, 120, 'Available', 'merch/home.jpg', NOW()),
('Arsenal Women Away Jersey 2024/25', 'Official Arsenal Women away jersey for the 2024/25 season. Lightweight and breathable design.', 89.99, 80, 'Available', 'merch/away.jpg', NOW()),
('Arsenal Women Scarf', 'Red and white Arsenal Women supporters scarf. Perfect for matchdays.', 19.99, 200, 'Available', 'merch/scarf.jpg', NOW()),
('Katie McCabe Signed Poster', 'Limited edition poster signed by Katie McCabe. Great for collectors.', 29.99, 50, 'Limited Stock', 'merch/kmsigned.jpg', NOW()),
('Leah Williamson Captain Armband', 'Replica captain armband as worn by Leah Williamson in matches.', 14.99, 150, 'Available', 'merch/capband.jpg', NOW()),
('Arsenal Women Beanie', 'Warm beanie featuring the Arsenal Womens logo. Ideal for winter matches.', 24.99, 100, 'Available', 'merch/hat.jpg', NOW()),
('Matchday Program - Arsenal vs Chelsea', 'Commemorative matchday program for the Arsenal vs Chelsea fixture. Includes player profiles and exclusive interviews.', 9.99, 30, 'Limited Stock', 'merch/chelseapro.jpg', NOW()),
('Arsenal Women Backpack', 'Stylish and durable backpack featuring the Arsenal Women logo.', 49.99, 75, 'Available', 'merch/backpack.jpg', NOW()),
('Leah Williamson Action Figure', 'Mini collectible action figure of Leah Williamson in Arsenal kit.', 19.99, 50, 'Available', 'merch/lwfigure.jpg', NOW()),
('Arsenal Women Water Bottle', 'Eco-friendly water bottle with Arsenal Women logo. Perfect for training.', 12.99, 200, 'Available', 'merch/bottle.jpg', NOW()),
('Arsenal Women Training Kit', 'Complete training kit set including shirt, shorts, and socks.', 69.99, 60, 'Available', 'merch/training.jpg', NOW()),
('Leah Williamson Biography', 'Autobiography of Leah Williamson detailing her football journey.', 24.99, 40, 'Available', 'merch/leahwbook.jpg', NOW()),
('Arsenal Women Third Jersey 2024/25', 'Official Arsenal Women third jersey for the 2024/25 season. Designed for performance and style.', 89.99, 90, 'Available', 'merch/third.jpg', NOW()),
('Arsenal Women Socks Pack', 'Pack of 3 Arsenal Women branded socks in club colors.', 14.99, 120, 'Available','merch/socks.jpg' , NOW()),
('Leah Williamson Signed Poster', 'Official Poster signed by England captain Leah Williamson.', 119.99, 20, 'Limited Stock', 'merch/lwsigned.jpg', NOW()),
('Arsenal Women Keychain', 'Metal keychain with the Arsenal Womens logo.', 7.99, 300, 'Available', 'merch/keyring.jpg', NOW()),
('Stina Blackstenius Poster', 'Exclusive poster of Stina Blackstenius.', 19.99, 80, 'Available', 'merch/sbposter.jpg', NOW()),
('Arsenal Women Training Jacket', 'Lightweight training jacket with Arsenal Women branding.', 59.99, 50, 'Available', 'merch/jacket.jpg', NOW()),
('Katie McCabe Autographed Jersey', 'Limited edition home jersey signed by Katie McCabe.', 149.99, 10, 'Limited Stock', 'merch/kmjersey.jpg', NOW()),
('Matchday Poster - Arsenal vs Man City', 'High-quality print commemorating Arsenal Womens match against Man City.', 14.99, 30, 'Limited Stock', 'merch/mancitypro.jpg', NOW()),
('Arsenal Women Tote Bag', 'Eco-friendly tote bag with Arsenal Women graphics.', 16.99, 100, 'Available', 'merch/totebag.jpg', NOW()),
('Beth Mead Poster', 'Poster with a graphic print of Beth Mead.', 24.99, 60, 'Available', 'merch/bmposter.jpg', NOW()),
('Arsenal Women Annual', 'Countdown to the holidays with this Arsenal Women-themed annual.', 29.99, 25, 'Limited Stock', 'merch/annual.jpg', NOW()),
('Arsenal Womens Notebook', 'Hardcover notebook with Arsenal Women graphics. Great for school or work.', 14.99, 80, 'Available', 'merch/notebook.jpg', NOW()),
('Arsenal Womens Stadium Tour Voucher', 'Voucher for an exclusive guided tour of Emirates Stadium with Arsenal Women highlights.', 37.00, 100, 'Available', 'merch/emirates.jpg', NOW()),
('Arsenal Women Pen Set', 'Set of 3 pens with Arsenal Women branding.', 9.99, 150, 'Available', 'merch/pen.jpg', NOW());
