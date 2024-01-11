## production 
- copy only these folders and files to hosting `php, public_html, node_modules, vendor ,.env`
- set your db settings in .env file in hosting

## usage
- run `npm i`
- run `npm run build`
- run `composer install`
- react files in `src`
- php api files in `php`

## dev server
run 
`docker composer build` 
once

then you can run every time you need to run script
`docker composer up`

web url is
`localhost:8080`

phpMyAdmin url is 
`localhost:8085`

when you enter phpMyAdmin 
create a database called db and
run the query below in it

```
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel` varchar(255) NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `sender` varchar(255) NOT NULL DEFAULT '',
  `created_at` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
)

```