create database if not exists playlist_share;
use playlist_share;
create or replace table users(id int primary key auto_increment, my_name varchar(240) not null, age int not null, photo_link longtext, email varchar(250) not null unique, my_password  varchar(255) not null, created_at TIMESTAMP not null default CURRENT_TIME) ENGINE=InnoDB DEFAULT CHARSET=latin1;
insert into users (my_name, age, photo_link, email, my_password) values ("admin", 20, "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvQuK69ktD3fOvpzBI9UwzjmbaWq6r0enmbojzvgP-5kbt6783RjNwFUROaSq9jHdJXqA&usqp=CAU", "admin@gmail.com", md5("admin123"));

create or replace table playlist(playlist_id int primary key auto_increment, playlist_name varchar(100) not null, image_link longtext, playlist_description varchar(280) not null, created_by int not null, created_at TIMESTAMP not null default CURRENT_TIME, CONSTRAINT FK_UserID FOREIGN KEY (created_by) REFERENCES users(id) on delete cascade) ENGINE=InnoDB DEFAULT CHARSET=latin1;
create or replace table music(music_id int primary key auto_increment, link varchar(300), type varchar(3), my_playlist_id int not null,created_at TIMESTAMP not null default CURRENT_TIME, CONSTRAINT FK_PlaylistID FOREIGN KEY (my_playlist_id) REFERENCES playlist(playlist_id) on delete cascade) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into playlist (playlist_name, image_link, playlist_description, created_by) values ("Cyberia", "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxgqQixkBP6tVhKDhhJXcUFRobXVadbW4drQ&usqp=CAU", "test", 1);
insert into music(link, type, my_playlist_id) values ("https://www.youtube.com/embed/yfY-lD_wHAA", "you", 1), ("https://www.youtube.com/embed/GiHEX_xSL8A", "you", 1), ("802033372", "sou", 1);

insert into users (my_name, age, photo_link, email, my_password) values ("rusbe", 23, "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTuFuA5heeWuWu76w9D_VL-Naqo6rfne8eC8Q&usqp=CAU", "biridim@ayiuoki.hihi", md5("hihiii"));
insert into playlist (playlist_name, image_link, playlist_description, created_by) values ("BIRIDIM", "https://pbs.twimg.com/media/EYwqhMkXgAEGeQq.png", "Abireee bireeee", 2);
insert into music(link, type, my_playlist_id) values ("https://www.youtube.com/embed/BWf-eARnf6U", "you", 2), ("https://www.youtube.com/embed/Zi_XLOBDo_Y", "you", 2), ("https://www.youtube.com/embed/wT0aRKmokro", "you", 2), ("308950076", "sou", 2);