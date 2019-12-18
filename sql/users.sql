CREATE TABLE users (
  user_id int(11) not null AUTO_INCREMENT PRIMARY KEY,
	user_name varchar(256) not null,
	user_type varchar(256) default 1,
  user_email varchar(256) not null,
  user_pwd varchar(256) not null
);


/* Just to have one user in users table use query down bellow */
