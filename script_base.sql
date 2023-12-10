CREATE TABLE carros ( 
  id int AUTO_INCREMENT NOT NULL, 
  cor varchar(20) NOT NULL,
  preco decimal(10,2) NOT NULL,
  automatico varchar(1) NOT NULL,
  ano_fabricacao int NOT NULL,
  modelo varchar(20) NOT NULL,
  marca varchar(20) NOT NULL,
  CONSTRAINT pk_carros PRIMARY KEY (id) 
);

