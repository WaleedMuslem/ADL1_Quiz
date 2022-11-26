CREATE or REPLACE DATABASE ADL1_Quiz COLLATE 'utf8_unicode_520_ci';

CREATE or REPLACE TABLE ADL1_Quiz.users
(user_id INT NOT NULL AUTO_INCREMENT ,
user_name VARCHAR(50) NOT NULL ,
password VARCHAR(255) NOT NULL ,
email VARCHAR(100) NOT NULL ,
profile_picture VARCHAR(255),
level_of_user int not null,
PRIMARY KEY (user_id),
UNIQUE (user_name),
UNIQUE (email))
ENGINE = InnoDB;

CREATE or REPLACE TABLE ADL1_Quiz.quizzes
(quiz_id INT NOT NULL AUTO_INCREMENT ,
title VARCHAR(50) NOT NULL ,
category TEXT NOT NULL ,
image VARCHAR(255) NOT NULL ,
user_id INT NOT NULL,
PRIMARY KEY (quiz_id),
FOREIGN KEY (user_id) REFERENCES users(user_id))
ENGINE = InnoDB;

CREATE or REPLACE TABLE ADL1_Quiz.questions
(question_id INT NOT NULL AUTO_INCREMENT ,
content TEXT NOT NULL ,
quiz_id int NOT NULL,
PRIMARY KEY (question_id),
FOREIGN KEY (quiz_id) REFERENCES quizzes(quiz_id))
ENGINE = InnoDB;

CREATE or REPLACE TABLE ADL1_Quiz.answers
(answers_id INT NOT NULL,
content TEXT NOT NULL,
question_id INT NOT NULL,
is_right boolean NOT NULL,
PRIMARY KEY (answers_id),
FOREIGN KEY (question_id) REFERENCES questions(question_id))
ENGINE = InnoDB;
