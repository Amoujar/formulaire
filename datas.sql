CREATE TABLE members(
                      id INT NOT NULL AUTO_INCREMENT,
                      name VARCHAR(255) NOT NULL,
                      email VARCHAR(255) NOT NULL,
                      password VARCHAR(255) NOT NULL,

                      CONSTRAINT pk_users_id PRIMARY KEY (id)

)ENGINE=InnoDB default charset =utf8;
-- se connecter au serveur Mysql avec le user root
mysql -u root -p
ALTER TABLE members
    ADD COLUMN AGE NUMERIC;