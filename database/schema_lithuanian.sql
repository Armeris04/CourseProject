CREATE DATABASE IF NOT EXISTS ticket_system
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE ticket_system;

CREATE TABLE IF NOT EXISTS naudotojai (
    naudotojo_id INT NOT NULL AUTO_INCREMENT,
    vardas VARCHAR(50) NOT NULL,
    pavarde VARCHAR(50) NOT NULL,
    el_pastas VARCHAR(300) NOT NULL,
    slaptazodis VARCHAR(255) NOT NULL,
    vaidmuo VARCHAR(20) NOT NULL DEFAULT 'user',
    PRIMARY KEY (naudotojo_id),
    UNIQUE KEY uq_naudotojai_el_pastas (el_pastas)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS vietos (
    vietos_id INT NOT NULL AUTO_INCREMENT,
    pastatas VARCHAR(10) NOT NULL,
    aukstas TINYINT NOT NULL,
    kabinetas VARCHAR(10) NOT NULL,
    PRIMARY KEY (vietos_id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS bilietai (
    bilieto_id INT NOT NULL AUTO_INCREMENT,
    naudotojo_id INT NOT NULL,
    problema TEXT NOT NULL,
    vietos_id INT NOT NULL,
    PRIMARY KEY (bilieto_id),
    KEY ix_bilietai_naudotojo_id (naudotojo_id),
    KEY ix_bilietai_vietos_id (vietos_id),
    CONSTRAINT fk_bilietai_naudotojai
        FOREIGN KEY (naudotojo_id) REFERENCES naudotojai (naudotojo_id),
    CONSTRAINT fk_bilietai_vietos
        FOREIGN KEY (vietos_id) REFERENCES vietos (vietos_id)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS uzbaigti_bilietai (
    bilieto_id INT NOT NULL AUTO_INCREMENT,
    problema TEXT NOT NULL,
    vietos_id INT NOT NULL,
    naudotojo_id INT NOT NULL,
    PRIMARY KEY (bilieto_id),
    KEY ix_uzbaigti_bilietai_naudotojo_id (naudotojo_id),
    KEY ix_uzbaigti_bilietai_vietos_id (vietos_id),
    CONSTRAINT fk_uzbaigti_bilietai_naudotojai
        FOREIGN KEY (naudotojo_id) REFERENCES naudotojai (naudotojo_id),
    CONSTRAINT fk_uzbaigti_bilietai_vietos
        FOREIGN KEY (vietos_id) REFERENCES vietos (vietos_id)
) ENGINE=InnoDB;
