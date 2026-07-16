CREATE DATABASE IF NOT EXISTS hungrypeople DEFAULT CHARSET=utf8;
USE hungrypeople;

DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(150) UNIQUE,
  password VARCHAR(255),
  reset_token VARCHAR(64) DEFAULT NULL
);

DROP TABLE IF EXISTS bookings;
CREATE TABLE bookings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(150),
  phone VARCHAR(50),
  people INT,
  bdate VARCHAR(50),
  btime VARCHAR(50),
  created DATETIME
);

DROP TABLE IF EXISTS contacts;
CREATE TABLE contacts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(150),
  phone VARCHAR(50),
  msg TEXT,
  created DATETIME
);

DROP TABLE IF EXISTS static;
CREATE TABLE static (
  id INT AUTO_INCREMENT PRIMARY KEY,
  block VARCHAR(50),
  title VARCHAR(150),
  subtitle VARCHAR(255),
  text TEXT,
  image VARCHAR(150)
);

DROP TABLE IF EXISTS specialities;
CREATE TABLE specialities (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150),
  subtitle VARCHAR(255),
  text TEXT,
  image VARCHAR(150)
);

DROP TABLE IF EXISTS menu;
CREATE TABLE menu (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150),
  subtitle VARCHAR(255),
  price DECIMAL(6,2),
  category VARCHAR(50),
  on_main TINYINT DEFAULT 1
);

DROP TABLE IF EXISTS events;
CREATE TABLE events (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(150),
  subtitle VARCHAR(255),
  text TEXT,
  image VARCHAR(150)
);

INSERT INTO static (block, title, subtitle, text, image) VALUES
('about', 'About Us', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at velit maximus, molestie est a, tempor magna.', 'Integer ullamcorper neque eu purus euismod, ac faucibus mauris posuere. Morbi non ultrices ligula. Sed dictum, enim sed ullamcorper feugiat, dui odio vehicula eros, a sollicitudin lorem quam nec sem. Mauris tincidunt feugiat diam convallis pharetra. Nulla facilisis semper laoreet.', 'about.jpg'),
('team', 'Our Team', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at velit maximus, molestie est a, tempor magna.', 'Integer ullamcorper neque eu purus euismod, ac faucibus mauris posuere. Morbi non ultrices ligula.', 'chef.jpg');

INSERT INTO specialities (title, subtitle, text, image) VALUES
('Chocolate Pancakes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis at velit maximus, molestie est a, tempor magna.', 'Integer ullamcorper neque eu purus euismod, ac faucibus mauris posuere. Morbi non ultrices ligula. Sed dictum, enim sed ullamcorper feugiat, dui odio vehicula eros, a sollicitudin lorem quam nec sem. Mauris tincidunt feugiat diam.', 'specialties.jpg'),
('Grilled Salmon', 'Sed dictum enim sed ullamcorper feugiat, dui odio vehicula eros, a sollicitudin lorem quam nec sem.', 'Integer ullamcorper neque eu purus euismod, ac faucibus mauris posuere. Morbi non ultrices ligula. Nulla facilisis semper laoreet. Duis at velit maximus, molestie est a, tempor magna.', 'booking.jpg'),
('Beef Steak', 'Morbi non ultrices ligula, sed dictum enim sed ullamcorper feugiat dui odio vehicula.', 'Integer ullamcorper neque eu purus euismod, ac faucibus mauris posuere. Duis at velit maximus, molestie est a, tempor magna. Mauris tincidunt feugiat diam convallis pharetra.', 'about.jpg');

INSERT INTO events (title, subtitle, text, image) VALUES
('Weddings', '', 'For private events please call us.', 'weddings.jpg'),
('Corporate Parties', '', 'For private events please call us.', 'corporate.jpg');

INSERT INTO menu (title, subtitle, price, category, on_main) VALUES
('DESERT DESERT DESERT', 'Integer ullamcorper neque eu purus euismod', 48.99, 'desert', 1),
('WINE WINE WINE', 'Integer ullamcorper neque eu purus euismod', 39.55, 'wine', 1),
('BEER BEER BEER', 'Integer ullamcorper neque eu purus euismod', 41.39, 'beer', 1),
('DRINKS DRINKS DRINKS', 'Integer ullamcorper neque eu purus euismod', 47.89, 'drinks', 1),
('SOUPE SOUPE SOUPE', 'Integer ullamcorper neque eu purus euismod', 55.00, 'soupe', 1),
('PASTA PASTA PASTA', 'Integer ullamcorper neque eu purus euismod', 49.55, 'pasta', 1),
('DESERT DESERT DESERT', 'Integer ullamcorper neque eu purus euismod', 48.99, 'desert', 1),
('WINE WINE WINE', 'Integer ullamcorper neque eu purus euismod', 39.55, 'wine', 1),
('BEER BEER BEER', 'Integer ullamcorper neque eu purus euismod', 41.39, 'beer', 1),
('DRINKS DRINKS DRINKS', 'Integer ullamcorper neque eu purus euismod', 47.89, 'drinks', 1),
('SOUPE SOUPE SOUPE', 'Integer ullamcorper neque eu purus euismod', 55.00, 'soupe', 1),
('PASTA PASTA PASTA', 'Integer ullamcorper neque eu purus euismod', 49.55, 'pasta', 1),
('DESERT DESERT DESERT', 'Integer ullamcorper neque eu purus euismod', 48.99, 'desert', 1),
('WINE WINE WINE', 'Integer ullamcorper neque eu purus euismod', 39.55, 'wine', 1),
('BEER BEER BEER', 'Integer ullamcorper neque eu purus euismod', 41.39, 'beer', 1),
('DRINKS DRINKS DRINKS', 'Integer ullamcorper neque eu purus euismod', 47.89, 'drinks', 1),
('SOUPE SOUPE SOUPE', 'Integer ullamcorper neque eu purus euismod', 55.00, 'soupe', 1),
('PASTA PASTA PASTA', 'Integer ullamcorper neque eu purus euismod', 49.55, 'pasta', 1),
('DESERT DESERT DESERT', 'Integer ullamcorper neque eu purus euismod', 48.99, 'desert', 1),
('WINE WINE WINE', 'Integer ullamcorper neque eu purus euismod', 39.55, 'wine', 1),
('BEER BEER BEER', 'Integer ullamcorper neque eu purus euismod', 41.39, 'beer', 1),
('PIZZA PIZZA PIZZA', 'Integer ullamcorper neque eu purus euismod', 50.00, 'pizza', 0),
('PIZZA PIZZA PIZZA', 'Integer ullamcorper neque eu purus euismod', 50.00, 'pizza', 0),
('PIZZA PIZZA PIZZA', 'Integer ullamcorper neque eu purus euismod', 50.00, 'pizza', 0),
('PIZZA PIZZA PIZZA', 'Integer ullamcorper neque eu purus euismod', 50.00, 'pizza', 0);
