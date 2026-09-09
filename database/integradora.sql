-- Base de datos: integradora
-- Proyecto: Sistema de Gimnasio (MVC con PHP y MySQL)

CREATE DATABASE IF NOT EXISTS integradora
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE integradora;

CREATE TABLE IF NOT EXISTS socios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    cedula VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20) NOT NULL,
    tipo_membresia VARCHAR(50) NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Datos de ejemplo (opcional, se puede borrar)
INSERT INTO socios (nombre, cedula, email, telefono, tipo_membresia, fecha_inicio) VALUES
('Ana Rosales', '131415161820', 'ana.rosales@correo.com', '0991234567', 'Premium', '2026-01-15'),
('Isabella Rosales', '1315161718', 'isa.rosales@correo.com', '0987654321', 'Básica', '2026-02-01');
