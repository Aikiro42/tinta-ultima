USE gcp_9f815153a8777c73d699;

DROP TABLE IF EXISTS Images;
DROP TABLE IF EXISTS Articles;
DROP TABLE IF EXISTS Authors;
DROP TABLE IF EXISTS ArticleTypes;

CREATE TABLE Authors(
	author_id INT NOT NULL PRIMARY KEY,
	firstName VARCHAR(255) NOT NULL,
	lastName VARCHAR(255) NOT NULL,
	role VARCHAR(255) NOT NULL
);

CREATE TABLE ArticleTypes(
	article_type_id INT NOT NULL PRIMARY KEY,
	article_type_name VARCHAR(255)
);

CREATE TABLE Articles(
	article_id INT NOT NULL PRIMARY KEY,
	article_type_id INT NOT NULL,
	author_id INT NOT NULL,
	header VARCHAR(512) NOT NULL,
	content TEXT NOT NULL,
	priority INT NOT NULL,
	FOREIGN KEY (author_id) REFERENCES Authors(author_id),
	FOREIGN KEY (article_type_id) REFERENCES ArticleTypes(article_type_id)
);

CREATE TABLE Images(
	image_id INT NOT NULL PRIMARY KEY,
	article_id INT NOT NULL,
	image_dir TEXT NOT NULL,
	FOREIGN KEY (article_id) REFERENCES Articles(article_id)
);

/*Priority determines how frequent a link to that article appears in any page. 0 is the lowest priority*/

INSERT INTO Authors
VALUES
(0, 'Blank', 'Blank', 'Blank'),
(1, 'Aira', 'Salvador', 'Manunulat ng Editoryal'),
(2, 'Diana', 'Alejandrino', 'Mannunulat ng Balita'),
(3, 'RF', 'Agcaoili', 'Manunulat ng Isports'),
(4, 'Raven', 'Arellano', 'Manunulat ng Lathalain');


INSERT INTO ArticleTypes
VALUES
(1, 'Editoryal'),
(2, 'Isports'),
(3, 'Lathalain'),
(4, 'Balita');
