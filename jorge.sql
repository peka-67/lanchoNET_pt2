CREATE TABLE restaurantes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(255) NOT NULL,
    endereco VARCHAR(255) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    cnpj VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(150) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(20) NOT NULL,
    cargo VARCHAR(100),
    ativo BOOLEAN NOT NULL DEFAULT TRUE,
    efetivado_em DATETIME NOT NULL, 
    id_restaurante INT,
    CONSTRAINT fk_restaunte_usuario
    FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id)
    ON DELETE CASCADE
);

CREATE TABLE categorias (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao VARCHAR(255),
    ativo BOOLEAN NOT NULL DEFAULT TRUE,
    id_restaurante INT,
    CONSTRAINT fk_restaunte_categorias
    FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id)
    ON DELETE CASCADE
);

CREATE TABLE produtos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    categoria_id INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    descricao VARCHAR(255),
    preco DECIMAL(10,2) NOT NULL,
    imagem VARCHAR(255),
    ativo BOOLEAN NOT NULL DEFAULT TRUE,
    id_restaurante INT,

    CONSTRAINT fk_categoria_produto
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
    ON DELETE CASCADE,

    CONSTRAINT fk_restaunte_produto
    FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id)
    ON DELETE CASCADE
);

CREATE TABLE adicionais (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    tipo VARCHAR(40) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    ativo BOOLEAN NOT NULL DEFAULT TRUE,
    id_restaurante INT,
    CONSTRAINT fk_restaunte_adicionais
    FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id)
    ON DELETE CASCADE
);

CREATE TABLE itens_adicionais (
    id INT PRIMARY KEY AUTO_INCREMENT,
    adicionais_id INT NOT NULL,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10,2) DEFAULT 0,
    id_restaurante INT,

    CONSTRAINT fk_itens_adicionais
    FOREIGN KEY (adicionais_id)
        REFERENCES adicionais(id)
    ON DELETE CASCADE,

    CONSTRAINT fk_restaunte_itens_adicionais
    FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id)
    ON DELETE CASCADE
);

CREATE TABLE clientes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(150) UNIQUE,
    criado_em DATETIME NOT NULL,
    id_restaurante INT,
    CONSTRAINT fk_restaunte_clientes
    FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id)
    ON DELETE CASCADE
);

CREATE TABLE pedidos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero_pedido INT NOT NULL,
    usuario_id INT,
    cliente_id INT,
    status VARCHAR(30) NOT NULL,
    subtotal DECIMAL(10,2) NOT NULL,
    desconto DECIMAL(10,2) DEFAULT 0,
    total DECIMAL(10,2) NOT NULL,
    criado_em DATETIME NOT NULL,
    id_restaurante int,

    CONSTRAINT fk_usuarios_pedidos
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
    ON DELETE CASCADE,

    CONSTRAINT fk_clientes_pedidos
    FOREIGN KEY (cliente_id) REFERENCES clientes(id)
    ON DELETE CASCADE,

    CONSTRAINT fk_restaunte_pedidos
    FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id)
    ON DELETE CASCADE
);

CREATE TABLE itens_pedidos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    pedido_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10,2) NOT NULL,
    observacao VARCHAR(255),
    id_restaurante INT,

    CONSTRAINT fk_pedidos_itens_pedidos
    FOREIGN KEY (pedido_id) REFERENCES pedidos(id)
    ON DELETE CASCADE,

    CONSTRAINT fk_produtos_itens_pedidos
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
    ON DELETE CASCADE,

    CONSTRAINT fk_restaunte_itens_pedidos
    FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id)
    ON DELETE CASCADE
);

CREATE TABLE adicional_item_pedidos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_adicional_pedido INT NOT NULL,
    id_adicional_item INT NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    id_restaurante INT,

    CONSTRAINT fk_itens_pedidos_adicional_item_pedidos
    FOREIGN KEY (id_adicional_pedido) REFERENCES itens_pedidos(id)
    ON DELETE CASCADE,

    CONSTRAINT fk_itens_adicionais_adicional_item_pedidos
    FOREIGN KEY (id_adicional_item) REFERENCES itens_adicionais(id)
    ON DELETE CASCADE,

    CONSTRAINT fk_restaunte_adicional_item_pedidos
    FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id)
    ON DELETE CASCADE
);

CREATE TABLE pagamento (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_pedidos INT NOT NULL,
    metodo VARCHAR(30) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    pago_em DATETIME NOT NULL,
    status VARCHAR(20) NOT NULL,
    id_restaurante INT,

    CONSTRAINT fk_pedidos_pagamento
    FOREIGN KEY (id_pedidos) REFERENCES pedidos(id)
    ON DELETE CASCADE,

    CONSTRAINT fk_restaunte_pagamento
    FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id)
    ON DELETE CASCADE
);

CREATE TABLE itens_estoque (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    unidade VARCHAR(20) NOT NULL,
    quantidade DECIMAL(10,3) NOT NULL,
    quantidade_minima DECIMAL(10,3) NOT NULL,
    ativo VARCHAR(1) NOT NULL,
    id_restaurante INT,

    CONSTRAINT fk_restaunte_itens_estoque
    FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id)
    ON DELETE CASCADE
);

CREATE TABLE movimento_estoque (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_estoque_item INT NOT NULL,
    tipo VARCHAR(20) NOT NULL,
    quantidade DECIMAL(10,3) NOT NULL,
    motivo VARCHAR(255),
    id_usuario INT,
    criado_em DATETIME NOT NULL,
    id_restaurante INT,

    CONSTRAINT fk_itens_estoque_movimento_estoque
    FOREIGN KEY (id_estoque_item) REFERENCES itens_estoque(id)
    ON DELETE CASCADE,

    CONSTRAINT fk_usuarios_movimento_estoque
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
    ON DELETE CASCADE
);

CREATE TABLE caixa (
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_abertura INT NOT NULL,
    aberto_em DATETIME NOT NULL,
    valor_inicial DECIMAL(10,2) NOT NULL,
    usuario_fechamento INT,
    fechado_em DATETIME,
    valor_final DECIMAL(10,2),
    estado VARCHAR(20) NOT NULL,
    id_restaurante INT,

    CONSTRAINT fk_restaunte_caixa
    FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id)
    ON DELETE CASCADE
);

CREATE TABLE caixa_movimento (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_registro INT NOT NULL,
    tipo VARCHAR(30) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    descricao VARCHAR(255),
    id_usuario INT NOT NULL,
    criado_em DATETIME NOT NULL,
    id_restaurante INT,

    CONSTRAINT fk_caixa_caixa_movimento
    FOREIGN KEY (id_registro) REFERENCES caixa(id)
    ON DELETE CASCADE,

    CONSTRAINT fk_usuarios_caixa_movimento
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
    ON DELETE CASCADE
);

CREATE TABLE auditoria_registro (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT,
    acao VARCHAR(100) NOT NULL,
    entidade VARCHAR(50),
    id_entidade INT,
    criado_em DATETIME NOT NULL,
    id_restaurante INT,

    CONSTRAINT fk_usuarios_auditoria_registro
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
    ON DELETE CASCADE

    CONSTRAINT fk_restaunte_auditoria_registro
    FOREIGN KEY (id_restaurante) REFERENCES restaurantes(id)
    ON DELETE CASCADE
);

-- alterações no banco 

ALTER TABLE movimento_estoque
DROP FOREIGN KEY fk_usuarios_movimento_estoque;

ALTER TABLE caixa_movimento
DROP FOREIGN KEY fk_usuarios_caixa_movimento;

ALTER TABLE auditoria_registro
DROP FOREIGN KEY fk_usuarios_auditoria_registro;

ALTER TABLE pedidos
DROP FOREIGN KEY fk_usuarios_pedidos;

ALTER TABLE movimento_estoque ADD COLUMN id_usuarios INT;

ALTER TABLE movimento_estoque
ADD CONSTRAINT fk_usuarios_movimento_estoque 
FOREIGN KEY (id_usuarios) 
REFERENCES usuarios(id);

ALTER TABLE caixa_movimento ADD COLUMN id_usuarios INT;

ALTER TABLE caixa_movimento
ADD CONSTRAINT fk_usuarios_caixa_movimento
FOREIGN KEY (id_usuarios) 
REFERENCES usuarios(id);

ALTER TABLE pedidos ADD COLUMN id_usuarios INT;

ALTER TABLE pedidos
ADD CONSTRAINT fk_usuarios_pedidos
FOREIGN KEY (id_usuarios) 
REFERENCES usuarios(id);

ALTER TABLE auditoria_registro ADD COLUMN id_usuarios INT;

ALTER TABLE auditoria_registro
ADD CONSTRAINT fk_usuarios_auditoria_registro
FOREIGN KEY (id_usuarios) 
REFERENCES usuarios(id);