create user 'test'@'%' identified by 'test';
create database laravel;
grant all on laravel.* to 'test'@'%';
