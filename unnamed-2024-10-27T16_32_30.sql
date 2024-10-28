
CREATE TABLE Customer
(
  id_customer        VARCHAR(50)  NOT NULL,
  nama_customer      VARCHAR(100) NOT NULL,
  email_customer     VARCHAR(50)  NOT NULL,
  nohp_customer      VARCHAR(13)  NOT NULL,
  customer_img       VARCHAR(200) NOT NULL,
  totalpoin_customer INT(7)       NOT NULL,
  created_at         DATETIME     NOT NULL,
  updated_at         DATETIME     NULL    ,
  deleted_at         DATETIME     NULL    ,
  PRIMARY KEY (id_customer)
);

ALTER TABLE Customer
  ADD CONSTRAINT UQ_email_customer UNIQUE (email_customer);

ALTER TABLE Customer
  ADD CONSTRAINT UQ_nohp_customer UNIQUE (nohp_customer);

CREATE TABLE Detail_sales
(
  subtotal   FLOAT(10)   NOT NULL,
  quantity   INT(7)      NOT NULL,
  harga      FLOAT(10)   NOT NULL,
  id_nota    VARCHAR(50) NOT NULL,
  id_product VARCHAR(50) NOT NULL
);

CREATE TABLE Pengguna
(
  id_pengguna   VARCHAR(50)  NOT NULL,
  nama_pengguna VARCHAR(100) NOT NULL,
  username      VARCHAR(50)  NOT NULL,
  password      VARCHAR(50)  NOT NULL,
  user_img      VARCHAR(200) NOT NULL,
  created_at    DATETIME     NOT NULL,
  updated_at    DATETIME     NULL    ,
  deleted_at    DATETIME     NULL    ,
  id_role       VARCHAR(50)  NOT NULL,
  PRIMARY KEY (id_pengguna)
);

ALTER TABLE Pengguna
  ADD CONSTRAINT UQ_username UNIQUE (username);

CREATE TABLE Penukaran
(
  id_penukaran        VARCHAR(50) NOT NULL,
  total_penukaranpoin FLOAT(10)   NOT NULL,
  quantity            INT(7)      NOT NULL,
  id_product          VARCHAR(50) NOT NULL,
  id_customer         VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_penukaran)
);

CREATE TABLE Poin
(
  id_poin      VARCHAR(50) NOT NULL,
  created_at   DATETIME    NOT NULL,
  aktivitas    VARCHAR(20) NOT NULL,
  poin         INT(7)      NOT NULL,
  id_customer  VARCHAR(50) NOT NULL,
  id_penukaran VARCHAR(50) NULL    ,
  id_nota      VARCHAR(50) NULL    ,
  PRIMARY KEY (id_poin)
);

CREATE TABLE Product
(
  id_product        VARCHAR(50)  NOT NULL,
  nama_product      VARCHAR(100) NOT NULL,
  harga_product     FLOAT(10)    NOT NULL,
  harga_poinproduct FLOAT(10)    NOT NULL,
  product_img       VARCHAR(200) NOT NULL,
  created_at        DATETIME     NOT NULL,
  updated_at        DATETIME     NULL    ,
  deleted_at        DATETIME     NULL    ,
  PRIMARY KEY (id_product)
);

ALTER TABLE Product
  ADD CONSTRAINT UQ_nama_product UNIQUE (nama_product);

CREATE TABLE Role
(
  id_role   VARCHAR(50)  NOT NULL,
  nama_role VARCHAR(100) NOT NULL,
  PRIMARY KEY (id_role)
);

ALTER TABLE Role
  ADD CONSTRAINT UQ_nama_role UNIQUE (nama_role);

CREATE TABLE Sales
(
  id_nota          VARCHAR(50) NOT NULL,
  total_harga      FLOAT (10)  NOT NULL,
  created_at       DATETIME    NULL     AUTO_INCREMENT,
  total_pembayaran FLOAT(10)   NOT NULL,
  total_kembali    FLOAT(10)   NOT NULL,
  id_pengguna      VARCHAR(50) NOT NULL,
  id_customer      VARCHAR(50) NOT NULL,
  PRIMARY KEY (id_nota)
);

ALTER TABLE Sales
  ADD CONSTRAINT UQ_created_at UNIQUE (created_at);

ALTER TABLE Sales
  ADD CONSTRAINT FK_Pengguna_TO_Sales
    FOREIGN KEY (id_pengguna)
    REFERENCES Pengguna (id_pengguna);

ALTER TABLE Pengguna
  ADD CONSTRAINT FK_Role_TO_Pengguna
    FOREIGN KEY (id_role)
    REFERENCES Role (id_role);

ALTER TABLE Sales
  ADD CONSTRAINT FK_Customer_TO_Sales
    FOREIGN KEY (id_customer)
    REFERENCES Customer (id_customer);

ALTER TABLE Penukaran
  ADD CONSTRAINT FK_Product_TO_Penukaran
    FOREIGN KEY (id_product)
    REFERENCES Product (id_product);

ALTER TABLE Detail_sales
  ADD CONSTRAINT FK_Sales_TO_Detail_sales
    FOREIGN KEY (id_nota)
    REFERENCES Sales (id_nota);

ALTER TABLE Detail_sales
  ADD CONSTRAINT FK_Product_TO_Detail_sales
    FOREIGN KEY (id_product)
    REFERENCES Product (id_product);

ALTER TABLE Poin
  ADD CONSTRAINT FK_Customer_TO_Poin
    FOREIGN KEY (id_customer)
    REFERENCES Customer (id_customer);

ALTER TABLE Penukaran
  ADD CONSTRAINT FK_Customer_TO_Penukaran
    FOREIGN KEY (id_customer)
    REFERENCES Customer (id_customer);

ALTER TABLE Poin
  ADD CONSTRAINT FK_Penukaran_TO_Poin
    FOREIGN KEY (id_penukaran)
    REFERENCES Penukaran (id_penukaran);

ALTER TABLE Poin
  ADD CONSTRAINT FK_Sales_TO_Poin
    FOREIGN KEY (id_nota)
    REFERENCES Sales (id_nota);
