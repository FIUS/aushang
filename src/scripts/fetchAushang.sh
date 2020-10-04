#!/bin/bash
if [ "$EUID" -ne 0 ]
  then echo "Please run as root"
  exit
fi
sudo -Hu aushang fetchmail -f /etc/fetchmailrc
find /data/from_mail/ -type f -iname "*.pdf" -exec mv {} /data/live/ \;
rm -rf /data/from_mail/*

touch /data/timeref -d "1 month ago"
find /data/live/ -not -newer /data/timeref -delete

chown -R www-data:www-data /data/live/
chmod -R u=rwX,g=rX,o=rX /data/live/