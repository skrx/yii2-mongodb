#!/bin/sh -e
#
# install mongodb

pecl install mongodb
echo "extension = mongodb.so" >> ~/.phpenv/versions/$(phpenv version-name)/etc/php.ini

echo "MongoDB Server version:"
mongod --version

echo "MongoDB PHP Extension version:"
php -i |grep mongodb -4 |grep -2 Version

# enable text search
mongo --eval 'db.adminCommand( { setParameter: true, textSearchEnabled : true})'

cat /etc/mongodb.conf
