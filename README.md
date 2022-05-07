# cs353

CREATE TABLE USER(user_id INT PRIMARY KEY AUTO_INCREMENT,username VARCHAR(32) NOT NULL UNIQUE,email VARCHAR(32) NOT NULL UNIQUE,password VARCHAR(32) NOT NULL, phone_no  VARCHAR(32) NOT NULL);
CREATE TABLE student(
             	user_id INT PRIMARY KEY,
             	FOREIGN KEY(user_id) REFERENCES User(user_id)
                                  ON DELETE CASCADE
                                  ON UPDATE CASCADE,
				warningCount INT DEFAULT NULL,
              	department VARCHAR(32) NOT NULL,
              	CGPA INT DEFAULT NULL
);
CREATE TABLE librarian(
             	user_id INT PRIMARY KEY,
             	FOREIGN KEY(user_id) REFERENCES User(user_id)
                                  ON DELETE CASCADE
                                  ON UPDATE CASCADE,
              	salary INT DEFAULT NULL,
              	insuranceType VARCHAR(32) NOT NULL
);

CREATE TABLE instructor(
             	user_id INT PRIMARY KEY,
             	FOREIGN KEY(user_id) REFERENCES User(user_id)
                                  ON DELETE CASCADE
                                  ON UPDATE CASCADE,
              	department VARCHAR(32) NOT NULL,
              	office VARCHAR(32) NOT NULL,
              	salary INT DEFAULT NULL,
				fax VARCHAR(32) NOT NULL
);

insert into user (user_id , username, email, password, phone_no)values(9,"guliny", "guliny@bilkent.com", "Gulin123", "05357776021");

CREATE TABLE LibraryItem(item_id INT PRIMARY KEY, title VARCHAR(32) NOT NULL, genre VARCHAR(32) NOT NULL, itemState VARCHAR(32) NOT NULL); 

CREATE TABLE book( item_id INT PRIMARY KEY, FOREIGN KEY(item_id) REFERENCES libraryitem(item_id) ON DELETE CASCADE ON UPDATE CASCADE, author VARCHAR(256) NOT NULL, p_year VARCHAR(4) NOT NULL );

CREATE TABLE  Borrow(
                               	librarian_id INT NOT NULL,
                               	item_id INT NOT NULL,
                                student_id INT NOT NULL,
                               	date VARCHAR(16) NOT NULL,
                               	PRIMARY KEY(item_id),
								FOREIGN KEY (librarian_id) REFERENCES Librarian(user_id)
                               	ON DELETE CASCADE ON UPDATE CASCADE,
                               	FOREIGN KEY (student_id) REFERENCES Student(user_id)
								ON DELETE CASCADE ON UPDATE CASCADE,
								FOREIGN KEY (item_id) REFERENCES LibraryItem(item_id)
                               	ON DELETE CASCADE ON UPDATE CASCADE	);


CREATE TABLE Movie(
                    	item_id INT NOT NULL,
                    	duration VARCHAR(16) NOT NULL,
                    	director_name VARCHAR(256) NOT NULL,
                    	PRIMARY KEY (item_id),
                        FOREIGN KEY (item_id) REFERENCES LibraryItem(item_id) ON DELETE CASCADE ON UPDATE CASCADE
);










insert into libraryitem (item_id , title, genre, itemState)values(777,"your name", "romance", "returned");
insert into movie (item_id , duration, director_name)values(777,"02:30", "Makoto Shinkai");









