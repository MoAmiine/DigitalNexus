-- Active: 1764776011492@@127.0.0.1@3306@digitalnexus
CREATE DATABASE digitalnexus;
USE digitalnexus;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL
    );

ALTER TABLE users ADD COLUMN Lastname VARCHAR(50);
ALTER TABLE users ADD COLUMN ROLE ENUM('admin', 'client') NOT NULL DEFAULT 'client';

CREATE TABLE produits (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prix DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    categorie VARCHAR(50) NOT NULL
    );
    CREATE TABLE commandes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    date_commande DATETIME NOT NULL,
    id_utilisateur INT);

INSERT INTO produits (nom, prix, stock, categorie) VALUES
('Ordinateur Portable', 799.99, 50, 'Electronique'),
('Smartphone', 599.99, 100, 'Electronique');

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL UNIQUE
);
INSERT INTO categories (nom) VALUES
('Electronique');

ALTER TABLE produits ADD COLUMN categories_id INT;
ALTER TABLE produits ADD FOREIGN KEY (categories_id) REFERENCES categories(id);

