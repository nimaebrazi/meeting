create table users
(
    id         bigint unsigned not null auto_increment,
    username   varchar(100)    not null,
    created_at timestamp       not null default now(),
    primary key (id)
);

create table meetings
(
    id          bigint unsigned not null auto_increment,
    title       varchar(255)    null,
    description mediumtext      null,
    start_time  time            not null,
    end_time    time            not null,
    date        date            not null,
    user_id     bigint unsigned not null,
    created_at  timestamp       not null default now(),
    primary key (id),
    CONSTRAINT fk_meeting_user FOREIGN KEY (user_id) REFERENCES users (id)
);


insert into users (username) values ('nimaebrazi')