-- noinspection SqlNoDataSourceInspectionForFile

CREATE table websiteadmins
(
    user_id    int not null auto_increment,
    first_name varchar(255),
    last_name  varchar(255),
    email   varchar(255),
    password   varchar(255),
    primary key (user_id)
);
CREATE table content
(
    ID        int not null auto_increment,
    image     varchar(255),
    name     varchar(255),
    price     double,
    description varchar(255),
    primary key (ID)
);

-- Bobby's bob@gmail.com password is 123456

INSERT into websiteadmins(first_name, last_name, email, password)
VALUES
    ('Ricky', 'Bobby', 'bob@gmail.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413'),
    ('Jane', 'Doe', 'jane@gmail.ca', 'e5a1fcf5dd5c335730a3e5b2eeafa5f92ab9127e0a647b3b91358349077e9f14e1b0d8f27ebeec0698524331b356e74a624ac591dd522bfd5349757c1455c866'),
    ('Jon', 'Doe', 'jon@gmail.ca', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86');