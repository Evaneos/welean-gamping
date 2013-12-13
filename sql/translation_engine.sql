CREATE TABLE IF NOT EXISTS translation_engine (
    id int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    md5key varchar(32) NOT NULL,
    lang varchar(16) NOT NULL,
    k text NOT NULL,
    val text NOT NULL
);