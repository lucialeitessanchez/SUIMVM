CREATE TABLE caj_tipo_asistencia (
    caj_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (caj_id, nomenclador_id),
    CONSTRAINT fk_caj FOREIGN KEY (caj_id) REFERENCES caj(id_caj) ON DELETE CASCADE,
    CONSTRAINT fk_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
);

CREATE TABLE caj_asistencia_proporcionada (
    caj_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (caj_id, nomenclador_id),
    CONSTRAINT fk_caj_asistencia_proporcionada_caj FOREIGN KEY (caj_id) REFERENCES caj(id_caj) ON DELETE CASCADE,
    CONSTRAINT fk_caj_asistencia_proporcionada_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
);

CREATE TABLE sdh_accion_asistencia (
    sdh_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (sdh_id, nomenclador_id),
    CONSTRAINT fk_sdh_accion_asistencia_sdh FOREIGN KEY (sdh_id) REFERENCES sdh(id_sdh) ON DELETE CASCADE,
    CONSTRAINT fk_sdh_accion_asistencia_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
);

CREATE TABLE sdh_tipo_proteccion (
    sdh_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (sdh_id, nomenclador_id),
    CONSTRAINT fk_sdh_tipo_proteccion_sdh FOREIGN KEY (sdh_id) REFERENCES sdh(id_sdh) ON DELETE CASCADE,
    CONSTRAINT fk_sdh_tipo_proteccion_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
);
CREATE TABLE sdh_medida_busqueda (
    sdh_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (sdh_id, nomenclador_id),
    CONSTRAINT fk_sdh_medida_busqueda_sdh FOREIGN KEY (sdh_id) REFERENCES sdh(id_sdh) ON DELETE CASCADE,
    CONSTRAINT fk_sdh_medida_busqueda_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
);
CREATE TABLE sdh_institucion_busqueda (
    sdh_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (sdh_id, nomenclador_id),
    CONSTRAINT fk_sdh_institucion_busqueda_sdh FOREIGN KEY (sdh_id) REFERENCES sdh(id_sdh) ON DELETE CASCADE,
    CONSTRAINT fk_sdh_institucion_busqueda_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
);

CREATE TABLE sddnayf_1b (
    sddnayf_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (sddnayf_id, nomenclador_id),
    CONSTRAINT fk_1b_sddnayf FOREIGN KEY (sddnayf_id) REFERENCES sddnayf_new(id) ON DELETE CASCADE,
    CONSTRAINT fk_1b_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE sddnayf_1c (
    sddnayf_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (sddnayf_id, nomenclador_id),
    CONSTRAINT fk_1c_sddnayf FOREIGN KEY (sddnayf_id) REFERENCES sddnayf_new(id) ON DELETE CASCADE,
    CONSTRAINT fk_1c_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE sddnayf_1e (
    sddnayf_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (sddnayf_id, nomenclador_id),
    CONSTRAINT fk_1e_sddnayf FOREIGN KEY (sddnayf_id) REFERENCES sddnayf_new(id) ON DELETE CASCADE,
    CONSTRAINT fk_1e_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
) ENGINE=InnoDB;
//----------------------
CREATE TABLE sddnayf_2b (
    sddnayf_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (sddnayf_id, nomenclador_id),
    CONSTRAINT fk_2b_sddnayf FOREIGN KEY (sddnayf_id) REFERENCES sddnayf_new(id) ON DELETE CASCADE,
    CONSTRAINT fk_2b_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE sddnayf_2c (
    sddnayf_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (sddnayf_id, nomenclador_id),
    CONSTRAINT fk_2c_sddnayf FOREIGN KEY (sddnayf_id) REFERENCES sddnayf_new(id) ON DELETE CASCADE,
    CONSTRAINT fk_2c_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE sddnayf_2e (
    sddnayf_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (sddnayf_id, nomenclador_id),
    CONSTRAINT fk_2e_sddnayf FOREIGN KEY (sddnayf_id) REFERENCES sddnayf_new(id) ON DELETE CASCADE,
    CONSTRAINT fk_2e_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
) ENGINE=InnoDB;


//--------------------
CREATE TABLE sddnayf_3b (
    hijo_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (hijo_id, nomenclador_id),
    CONSTRAINT fk_3b_hijo FOREIGN KEY (hijo_id) REFERENCES sddnayf_hijos_victima(id_vinculado) ON DELETE CASCADE,
    CONSTRAINT fk_3b_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE sddnayf_3c (
    hijo_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (hijo_id, nomenclador_id),
    CONSTRAINT fk_3c_hijo FOREIGN KEY (hijo_id) REFERENCES sddnayf_hijos_victima(id_vinculado) ON DELETE CASCADE,
    CONSTRAINT fk_3c_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE sddnayf_3e (
    hijo_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (hijo_id, nomenclador_id),
    CONSTRAINT fk_3e_hijo FOREIGN KEY (hijo_id) REFERENCES sddnayf_hijos_victima(id_vinculado) ON DELETE CASCADE,
    CONSTRAINT fk_3e_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE sddnayf_3l (
    hijo_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (hijo_id, nomenclador_id),
    CONSTRAINT fk_3l_hijo FOREIGN KEY (hijo_id) REFERENCES sddnayf_hijos_victima(id_vinculado) ON DELETE CASCADE,
    CONSTRAINT fk_3l_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE pgcsj_pgcsj_3 (
    pgcsj_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (pgcsj_id, nomenclador_id),
    CONSTRAINT fk_pgcsj_pgcsj_3_pgcsj FOREIGN KEY (pgcsj_id) REFERENCES pgcsj(id) ON DELETE CASCADE,
    CONSTRAINT fk_pgcsj_pgcsj_3_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
);

CREATE TABLE pgcsj_pgcsj_11 (
    pgcsj_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (pgcsj_id, nomenclador_id),
    CONSTRAINT fk_pgcsj_pgcsj_11_pgcsj FOREIGN KEY (pgcsj_id) REFERENCES pgcsj(id) ON DELETE CASCADE,
    CONSTRAINT fk_pgcsj_pgcsj_11_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
);

CREATE TABLE pgcsj_pgcsj_13 (
    pgcsj_id INT NOT NULL,
    nomenclador_id INT NOT NULL,
    PRIMARY KEY (pgcsj_id, nomenclador_id),
    CONSTRAINT fk_pgcsj_pgcsj_13_pgcsj FOREIGN KEY (pgcsj_id) REFERENCES pgcsj(id) ON DELETE CASCADE,
    CONSTRAINT fk_pgcsj_pgcsj_13_nomenclador FOREIGN KEY (nomenclador_id) REFERENCES nomenclador(id_nomenclador) ON DELETE CASCADE
);