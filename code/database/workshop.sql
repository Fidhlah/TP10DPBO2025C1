CREATE DATABASE IF NOT EXISTS workshop_db;
USE workshop_db;

CREATE TABLE IF NOT EXISTS vehicles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    plate_number VARCHAR(20) NOT NULL,
    brand VARCHAR(50) NOT NULL,
    model VARCHAR(50) NOT NULL,
    year INT NOT NULL,
    owner_name VARCHAR(100) NOT NULL,
    owner_phone VARCHAR(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS mechanics (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    specialization VARCHAR(50) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    experience_years INT NOT NULL
);

CREATE TABLE IF NOT EXISTS services (
    id INT PRIMARY KEY AUTO_INCREMENT,
    vehicle_id INT NOT NULL,
    mechanic_id INT NOT NULL,
    service_date DATE NOT NULL,
    description TEXT NOT NULL,
    cost DECIMAL(10,2) NOT NULL,
    status ENUM('pending', 'in_progress', 'completed') NOT NULL,
    FOREIGN KEY (vehicle_id) REFERENCES vehicles(id) ON DELETE CASCADE,
    FOREIGN KEY (mechanic_id) REFERENCES mechanics(id) ON DELETE CASCADE
);

INSERT INTO vehicles (plate_number, brand, model, year, owner_name, owner_phone) VALUES
('B1234CD', 'Toyota', 'Avanza', 2020, 'Assalamualaikum', '08123456789'),
('D5678EF', 'Honda', 'Jazz', 2019, 'Waalaikumsalam', '08234567890');

INSERT INTO mechanics (name, specialization, phone, experience_years) VALUES
('Hafidh', 'Engine', '08345678901', 5),
('Fadhilah', 'Electrical', '08456789012', 3);

INSERT INTO services (vehicle_id, mechanic_id, service_date, description, cost, status) VALUES
(1, 1, '2023-05-20', 'Regular maintenance and oil change', 500000, 'completed'),
(2, 2, '2023-05-21', 'Electrical system check', 300000, 'pending');
