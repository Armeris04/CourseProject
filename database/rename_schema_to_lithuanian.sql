-- Run this once against the ticket_system database in phpMyAdmin.
-- Back up the database first. This migration assumes the original English
-- table and column names are still present.

RENAME TABLE
    users TO naudotojai,
    user_tickets TO bilietai,
    completed_tickets TO uzbaigti_bilietai,
    locations TO vietos;

ALTER TABLE naudotojai
    RENAME COLUMN id TO naudotojo_id,
    RENAME COLUMN firstName TO vardas,
    RENAME COLUMN lastName TO pavarde,
    RENAME COLUMN email TO el_pastas,
    RENAME COLUMN password TO slaptazodis,
    RENAME COLUMN role TO vaidmuo;

ALTER TABLE bilietai
    RENAME COLUMN ticket_id TO bilieto_id,
    RENAME COLUMN user_id TO naudotojo_id,
    RENAME COLUMN issue TO problema,
    RENAME COLUMN location_id TO vietos_id;

ALTER TABLE uzbaigti_bilietai
    RENAME COLUMN ticket_id TO bilieto_id,
    RENAME COLUMN user_id TO naudotojo_id,
    RENAME COLUMN issue TO problema,
    RENAME COLUMN location_id TO vietos_id;

ALTER TABLE vietos
    RENAME COLUMN id TO vietos_id,
    RENAME COLUMN building TO pastatas,
    RENAME COLUMN floor TO aukstas,
    RENAME COLUMN room TO kabinetas;
