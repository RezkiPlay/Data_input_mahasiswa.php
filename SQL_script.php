CREATE DATABASE IF NOT EXISTS universitas;
USE universitas;

CREATE TABLE IF NOT EXISTS mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    nim VARCHAR(20) NOT NULL UNIQUE,
    nilai INT NOT NULL,
    grade VARCHAR(2) NOT NULL
);
