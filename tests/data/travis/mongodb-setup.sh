#!/bin/sh -e
#
# install mongodb

phpenv config-add mongodb.conf.ini

echo "MongoDB Server version:"
mongod --version

# enable text search
mongo --eval 'db.adminCommand( { setParameter: true, textSearchEnabled : true})'

cat /etc/mongodb.conf
