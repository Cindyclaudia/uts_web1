CREATE DATABASE IF NOT EXISTS uts_web;
USE uts_web;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE informasi(
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255),
    deskripsi TEXT,
    gambar VARCHAR(255)
);

-- User default
INSERT INTO users (username, password) VALUES
('admin', '12345');

-- Informasi Boneka
INSERT INTO informasi (judul, deskripsi, gambar) VALUES
('Boneka Teddy Coklat', 'Boneka teddy warna coklat yang lucu dan lembut.', 'https://cdn.pixabay.com/photo/2023/02/08/22/41/teddy-bear-7777659_1280.jpg'),
('Boneka Putih Lucu', 'Boneka putih lucu dengan pita pink, sangat imut.', 'https://www.istana-boneka.com/asset/foto_produk/113.png'),
('Boneka Karakter Anak', 'Boneka karakter anak-anak yang menggemaskan.', 'https://down-id.img.susercontent.com/file/id-11134207-7r990-lniw4yugx5s6f9');
