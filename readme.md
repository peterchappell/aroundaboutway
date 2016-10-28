# aroundaboutway.com

This is the Wordpress theme and custom plugins for www.aroundaboutway.com

The 3rd party plugins needed are:
* geo-mashup - https://wordpress.org/plugins/geo-mashup/
* slickr-flickr - https://wordpress.org/plugins/slickr-flickr/
* wp-scss - https://wordpress.org/plugins/wp-scss/

The `docker-compose.yml` file makes it easy to spin up a wordpress site locally. Like really quite easy. With docker installed you can just run `docker-compose up`.

*Note to future Pete:* When it came to pushing the site up, past Pete just downloaded wordpress from the updates section in admin and FTP'd that up and then FTP'd up the stuff from this repo (and the 3rd party plugins and uploads etc). For the database, just export/import it from/to phpmyadmin. Not exactly elegant but it was pretty painless.