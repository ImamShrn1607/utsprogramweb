CREATE DATABASE crud_mahasiswa;

USE crud_mahasiswa;

CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    nim VARCHAR(20),
    prodi VARCHAR(50),
    foto VARCHAR(255)
);
