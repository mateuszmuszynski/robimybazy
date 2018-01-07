CREATE SEQUENCE authors_seq START WITH 1;
CREATE SEQUENCE books_seq START WITH 1;
CREATE SEQUENCE clients_seq START WITH 1;
CREATE SEQUENCE loans_seq START WITH 1;

CREATE TABLE Authors (
  author_id number(10),
  first_name varchar(50) not null,
  last_name varchar(50) not null,
  CONSTRAINT author_id_pk PRIMARY KEY (author_id)
);

CREATE TABLE Books (
  book_id number,
  author_id number not null,
  isbn varchar(20) not null,
  title varchar(100) not null,
  CONSTRAINT book_id_pk PRIMARY KEY (book_id)
);

CREATE TABLE Clients (
  client_id number,
  first_name varchar(50) not null,
  last_name varchar(50) not null,
  gender varchar(1) not null,
  date_of_birth date not null,
  CONSTRAINT client_id_pk PRIMARY KEY (client_id)
);

CREATE TABLE Loans (
  loan_id number,
  book_id number not null,
  client_id number not null,
  CONSTRAINT loan_id_pk PRIMARY KEY (loan_id)
);

INSERT INTO AUTHORS(AUTHOR_ID, first_name, last_name) VALUES (authors_seq.NEXTVAL, 'First', 'Last');
INSERT INTO BOOKS(BOOK_ID, AUTHOR_ID, ISBN, TITLE) VALUES (books_seq.NEXTVAL, 1, '11111', 'Title2');
/*
DROP TABLE Clients;
DROP TABLE Books;
DROP TABLE Authors;
DROP TABLE Loans;
*/

-- 7 stycznia
DECLARE
     dataUrodzin  CLIENTS.DATE_OF_BIRTH%TYPE;
BEGIN
  SELECT add_months( trunc(sysdate), -12*20 ) INTO dataUrodzin FROM dual;
  INSERT INTO CLIENTS VALUES (clients_seq.NEXTVAL, 'Franek', 'Kimono', 0, dataUrodzin);
END;