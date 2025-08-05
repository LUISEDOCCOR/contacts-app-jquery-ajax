-- Active: 1749252434297@@127.0.0.1@3306@contacts_app_v
CREATE DATABASE contacts_app_v;
CREATE TABLE IF NOT EXISTS contacts (
    id INT  PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    number VARCHAR(25),
    notes VARCHAR(255)
)