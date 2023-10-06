-- Create the database
CREATE DATABASE IF NOT EXISTS db_web_com;
USE db_web_com;

-- Define the tables

-- Table to store user information
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table to store admin users
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin','admin@example.com', MD5('admin'));

-- Table to store the relationship between admin users and regular users
CREATE TABLE IF NOT EXISTS admin_user_relationship (
    id INT AUTO_INCREMENT PRIMARY KEY,
    admin_id INT NOT NULL,
    user_id INT NOT NULL,
    action_type ENUM('add', 'modify', 'remove') NOT NULL,
    action_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (admin_id) REFERENCES admins(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Table to store products
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    thumb VARCHAR(255),
    det_img1 VARCHAR(255),
    det_img2 VARCHAR(255),
    det_img3 VARCHAR(255),
    feat_img VARCHAR(255),
    is_feat ENUM('Y', 'N', 'N/A') NOT NULL DEFAULT 'N/A',
    total_downloads INT DEFAULT 0,
    average_rating DECIMAL(3, 2) DEFAULT 0.00,
    num_reviews INT DEFAULT 0,
    category ENUM('Games', 'Softwares'), -- Added 'category' column as ENUM
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Table to store product reviews
CREATE TABLE IF NOT EXISTS product_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    rating INT NOT NULL,
    review_text TEXT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Table to store user orders
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('pending', 'completed', 'canceled') NOT NULL DEFAULT 'pending',
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Table to store order items (products within an order)
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Table to store payment transactions
CREATE TABLE IF NOT EXISTS payment_transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    payment_gateway VARCHAR(50) NOT NULL,
    transaction_id VARCHAR(255) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    status ENUM('success', 'failure') NOT NULL,
    transaction_timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id)
);

-- Table to store the relationship between users and their associated products
CREATE TABLE IF NOT EXISTS user_products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Create sample categories (Games and Softwares)
INSERT INTO `products` (`id`, `name`, `description`, `price`, `thumb`, `det_img1`, `det_img2`, `det_img3`, `feat_img`, `is_feat`, `total_downloads`, `average_rating`, `num_reviews`, `category`, `created_at`, `updated_at`) VALUES
(6, 'rt4w45t3w5t', '34t35t34t', 1500.00, '../images/popular-01.jpg', '../images/details-01.jpg', '../images/feature-right.jpg', '../images/clip-04.jpg', '../images/featured-01.jpg', 'Y', 0, 0.00, 0, 'Games', '2023-10-06 18:24:13', '2023-10-06 18:24:13');

-- View total orders by category
SELECT category, COUNT(orders.id) AS total_orders
FROM products
LEFT JOIN order_items ON products.id = order_items.product_id
LEFT JOIN orders ON order_items.order_id = orders.id
GROUP BY category;

-- End of SQL script
