-- Tabel untuk menyimpan tipe user (Admin, Supervisor, Petugas)
CREATE TABLE IF NOT EXISTS tbl_tipe_user (
    id_tipe INT AUTO_INCREMENT PRIMARY KEY,
    nama_tipe VARCHAR(50) NOT NULL UNIQUE
);

-- Tabel untuk menyimpan data user
CREATE TABLE IF NOT EXISTS tbl_users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    id_tipe INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_tipe) REFERENCES tbl_tipe_user(id_tipe) ON DELETE CASCADE
);

-- Insert default tipe user (Admin, Supervisor, Petugas)
INSERT INTO tbl_tipe_user (nama_tipe) VALUES 
('admin'),
('supervisor'),
('petugas');
