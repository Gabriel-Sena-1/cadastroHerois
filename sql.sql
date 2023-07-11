CREATE TABLE heroi (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255),
    descricao VARCHAR(1024),
    path_imagem VARCHAR(1024),
    fav boolean
);