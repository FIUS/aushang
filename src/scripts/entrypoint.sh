#!/usr/bin/env sh
chmod 600 /etc/fetchmailrc
chown aushang /etc/fetchmailrc
cron &
apache2-foreground