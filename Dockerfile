FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
    fetchmail \
    procmail \
    uudeview \
    wget \
    cron \
    sudo \
 && rm -rf /var/lib/apt/lists/*

ENV DOCKERIZE_VERSION v0.6.1
RUN wget https://github.com/jwilder/dockerize/releases/download/$DOCKERIZE_VERSION/dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && tar -C /usr/local/bin -xzvf dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz \
    && rm dockerize-linux-amd64-$DOCKERIZE_VERSION.tar.gz

ADD src/scripts/fetchmailrc.tmpl /etc/fetchmailrc.tmpl
ADD src/scripts/procmailrc /etc/procmailrc
ADD src/scripts/fetchAushang.sh /opt/
ADD src/scripts/startFetchAushang.sh /opt/
ADD src/scripts/entrypoint.sh /opt/

ADD --chown=www-data:www-data src/website/ /var/www/html/

RUN mkdir --parents /data/from_mail /data/live && \
    touch /var/log/aushang.log && \
    chmod 755 /opt/fetchAushang.sh /opt/startFetchAushang.sh /opt/entrypoint.sh && \
    ln -s /data/live/ /var/www/html/data && \
    ln -s /opt/startFetchAushang.sh /etc/cron.hourly/ && \
    adduser -q --disabled-password --gecos "" aushang

CMD dockerize -template /etc/fetchmailrc.tmpl:/etc/fetchmailrc -stdout /var/log/aushang.log /opt/entrypoint.sh