CREATE TABLE restaurantes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    cnpj VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

ALTER TABLE usuarios ADD COLUMN id_restaurante INT;
ALTER TABLE usuarios ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);

ALTER TABLE produtos ADD COLUMN id_restaurante INT;
ALTER TABLE produtos ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);

ALTER TABLE pedidos ADD COLUMN id_restaurante INT;
ALTER TABLE pedidos ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);

ALTER TABLE pagamento ADD COLUMN id_restaurante INT;
ALTER TABLE pagamento ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);

ALTER TABLE movimento_estoque ADD COLUMN id_restaurante INT;
ALTER TABLE movimento_estoque ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);

ALTER TABLE usuarios ADD COLUMN id_restaurante INT;
ALTER TABLE usuarios ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);

ALTER TABLE usuarios ADD COLUMN id_restaurante INT;
ALTER TABLE usuarios ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);

ALTER TABLE usuarios ADD COLUMN id_restaurante INT;
ALTER TABLE usuarios ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);

ALTER TABLE usuarios ADD COLUMN id_restaurante INT;
ALTER TABLE usuarios ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);

ALTER TABLE usuarios ADD COLUMN id_restaurante INT;
ALTER TABLE usuarios ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);

ALTER TABLE usuarios ADD COLUMN id_restaurante INT;
ALTER TABLE usuarios ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);

ALTER TABLE usuarios ADD COLUMN id_restaurante INT;
ALTER TABLE usuarios ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);

ALTER TABLE usuarios ADD COLUMN id_restaurante INT;
ALTER TABLE usuarios ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);

ALTER TABLE usuarios ADD COLUMN id_restaurante INT;
ALTER TABLE usuarios ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);

ALTER TABLE usuarios ADD COLUMN id_restaurante INT;
ALTER TABLE usuarios ADD FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id);