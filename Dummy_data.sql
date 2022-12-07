INSERT INTO `users` (`user_id`, `user_name`, `password`, `email`, `profile_picture`, `level_of_user`)
VALUES
('10', 'Maxim', 'Somebody', 'Maxim@gmail.com', 'https://en-academic.com/pictures/enwiki/72/Homo_sapiens_neanderthalensis.jpg', '0'),
('11', 'Waleed', 'That', 'Waleed@gmail.com', 'https://expandfurniture.com/wp-content/uploads/2020/09/Junior-Giant-Revolution-in-grano-panel-console-extends-to-seat-12-or-build-it-to-size-510x652.jpg', '1'),
('12', 'Hanna', 'I', 'Hanna@gmail.com', 'https://hh.ru/employer-logo/3550292.jpeg', '1'),
('13', 'Oleg', 'Used', 'Oleg@gmail.com', 'https://img.freepik.com/free-vector/human-body-shape-background-design_1319-56.jpg?w=2000', '1'),
('14', 'Admin', 'To', 'Admin@gmail.com', 'https://a-z-animals.com/media/2021/06/Mexican-Alligator-Lizard-on-leaf.jpg', '0'),
('15', 'Lizard', 'Know', 'Lizard@gmail.com','https://images.unsplash.com/photo-1504450874802-0ba2bcd9b5ae?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8bGl6YXJkfGVufDB8fDB8fA%3D%3D&w=1000&q=80', '2');

INSERT INTO `quizzes` (`quiz_id`, `title`, `category`, `image`, `user_id`)
VALUES ('10', 'Birds', 'Animals', 'https://upload.wikimedia.org/wikipedia/commons/3/32/House_sparrow04.jpg', '14'),
('11', 'Cats', 'Animals', 'https://play-lh.googleusercontent.com/jkpabs01pnEU5Jc9U3MuWdwwoWi8v7x33RZNYyLP2T8a2j1csnjOy3_-KI6JU8JntlNW', '10'),
('12', 'Dogs', 'Animals', 'https://i.kym-cdn.com/photos/images/newsfeed/002/418/818/49a.jpg', '13'),
('13', 'Crocs', 'Equipment', 'https://media.crocs.com/images/t_pdphero/f_auto%2Cq_auto/products/206991_001_ALT110/crocs', '11'),
('14', 'Fish', 'Animals', 'https://www.teclasap.com.br/wp-content/uploads/2014/09/fish.jpg', '12');

INSERT INTO `questions` (`question_id`, `content`, `quiz_id`)
VALUES ('10','Are there any birds that do not fly?','10'),
('11','Are there any birds that do fly?','10'),
('12','How does a cat look','11'),
('13','Can a cat bark?','11'),
('14','What do dogs do for a living?','12'),
('15','How many dog breeds are there in the world','12'),
('16','How many modes do crocs have?','13'),
('17','Are crocs related to dinosaurs?','13'),
('18','Can any fish fly?','14'),
('19','What is the natural habitat of a fish?','14');

INSERT INTO `answers` (`answers_id`, `content`, `question_id`, `is_right`)
VALUES ('11','Nope, certainly not','10','0'),
('12','Flightless birds do exist','10','1'),
('13','Birds can not fly','11','0'),
('14','Birds are known for their flying capabilities. Most of them can fly','11','1'),
('15','Like a chair','12','0'),
('16','Funny','12','1'),
('17','Yes','13','0'),
('18','No','13','1'),
('19','Compose songs of different genres','14','0'),
('20','Protect the house','14','1'),
('21','Like one or two or something','15','0'),
('22','350 recognized breeds and others','15','1'),
('23','Only one, the croc mode','16','0'),
('24','Two modes, attack and defense ones','16','1'),
('25','Of course they are. It can be seen in the name','17','0'),
('26','No, crocs are shoes, after all','17','1'),
('27','No, they are completely flightless','18','0'),
('28','There exists some fish that can fly for a small amount of time','18','1'),
('29','The endless universe','19','0'),
('30','Oceans and other watter-related things','19','1');