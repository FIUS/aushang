#!/usr/bin/env sh
chmod 600 /etc/fetchmailrc
chown aushang /etc/fetchmailrc
mkdir --parents /data/from_mail /data/live
cron &
apache2-foreground