CREATE TABLE Usuario (
    Nickname VARCHAR(20) PRIMARY KEY,
    Email VARCHAR(50),
    Idade INTEGER,
    Nacionalidade VARCHAR(20),
    Instituicao_Ensino VARCHAR(30),
    Tamanho_Camiseta VARCHAR(2),
    CEP INTEGER,
    Rua VARCHAR(20),
    Bairro VARCHAR(20),
    Cidade VARCHAR(20),
    Senha VARCHAR(32),
);

CREATE TABLE Exercicio (
    Codigo_Exercicio INTEGER PRIMARY KEY,
    Nome_Exercicio VARCHAR(20),
    Tema VARCHAR(20),
    Enunciado TEXT,
    Dificuldade INTEGER,
    Tags VARCHAR(50)
);
ALTER TABLE `exercicio` CHANGE `Codigo_Exercicio` `Codigo_Exercicio` INT NOT NULL AUTO_INCREMENT;

CREATE TABLE Contest (
    Codigo_Contest INTEGER PRIMARY KEY,
    Tempo_duracao FLOAT(2),
    Dificuldade INTEGER,
    Tempo_penalidade FLOAT(2),
    Editorial TEXT,
    fk_Assinante_fk_Usuario_Nickname VARCHAR(20)
);
ALTER TABLE `contest` CHANGE `Codigo_Contest` `Codigo_Contest` INT NOT NULL AUTO_INCREMENT;

CREATE TABLE Assinante (
    Tempo_Assinatura INTEGER, 
    fk_Usuario_Nickname VARCHAR(20) PRIMARY KEY
);

CREATE TABLE E_Amigo (
    fk_Usuario_Nickname VARCHAR(20),
    fk_Usuario_Nickname_ VARCHAR(20)
);

CREATE TABLE Registra (
    fk_Usuario_Nickname VARCHAR(20),
    fk_Contest_Codigo INTEGER
);

CREATE TABLE Possui (
    fk_Exercicio_Codigo INTEGER,
    fk_Contest_Codigo INTEGER
);

CREATE TABLE SubmeteResolucao (
    fk_Exercicio_Codigo INTEGER,
    fk_Usuario_Nickname VARCHAR(20),
    DataHora TIMESTAMP PRIMARY KEY,
    Linguagem VARCHAR(10),
    Situacao VARCHAR(20),
    TempoExecucao FLOAT(2),
    CodigoTexto TEXT
);

ALTER TABLE Contest ADD CONSTRAINT FK_Contest_2
    FOREIGN KEY (fk_Assinante_fk_Usuario_Nickname)
    REFERENCES Assinante (fk_Usuario_Nickname)
    ON DELETE CASCADE; -- Gatilho que garante que o valor seja excluido em todas as tabelas filhas que usam a foreign key
 
ALTER TABLE Assinante ADD CONSTRAINT FK_Assinante_2
    FOREIGN KEY (fk_Usuario_Nickname)
    REFERENCES Usuario (Nickname)
    ON DELETE CASCADE;
 
ALTER TABLE E_Amigo ADD CONSTRAINT FK_E_Amigo_1
    FOREIGN KEY (fk_Usuario_Nickname)
    REFERENCES Usuario (Nickname)
    ON DELETE CASCADE;
 
ALTER TABLE E_Amigo ADD CONSTRAINT FK_E_Amigo_2
    FOREIGN KEY (fk_Usuario_Nickname_)
    REFERENCES Usuario (Nickname)
    ON DELETE CASCADE;
 
ALTER TABLE Registra ADD CONSTRAINT FK_Registra_1
    FOREIGN KEY (fk_Usuario_Nickname)
    REFERENCES Usuario (Nickname)
    ON DELETE RESTRICT;
 
ALTER TABLE Registra ADD CONSTRAINT FK_Registra_2
    FOREIGN KEY (fk_Contest_Codigo)
    REFERENCES Contest (Codigo_Contest)
    ON DELETE SET NULL;
 
ALTER TABLE Possui ADD CONSTRAINT FK_Possui_1
    FOREIGN KEY (fk_Exercicio_Codigo)
    REFERENCES Exercicio (Codigo_Exercicio)
    ON DELETE RESTRICT;
 
ALTER TABLE Possui ADD CONSTRAINT FK_Possui_2
    FOREIGN KEY (fk_Contest_Codigo)
    REFERENCES Contest (Codigo_Contest)
    ON DELETE SET NULL;
 
ALTER TABLE SubmeteResolucao ADD CONSTRAINT FK_SubmeteResolucao_2
    FOREIGN KEY (fk_Exercicio_Codigo)
    REFERENCES Exercicio (Codigo_Exercicio)
    ON DELETE SET NULL;
 
ALTER TABLE SubmeteResolucao ADD CONSTRAINT FK_SubmeteResolucao_3
    FOREIGN KEY (fk_Usuario_Nickname)
    REFERENCES Usuario (Nickname)
    ON DELETE SET NULL;



