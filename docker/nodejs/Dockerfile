FROM node:11.15


RUN npm -g i @vue/cli

#
# Configure user
#
ENV DOCKER_USER=www

ENV DOCKER_UID=1000


#
# Add host user and group into container
#
RUN set -xe \
		&& deluser node \
		&& adduser --gecos "web user" --shell /bin/sh --disabled-password --uid $DOCKER_UID $DOCKER_USER \
		&& echo "$DOCKER_USER:$DOCKER_USER" | chpasswd

WORKDIR /www

#
# Do not stop container, and handle SIGTERM from docker stop or down
#
CMD node -e 'setInterval(() => {}, 60000); process.on("SIGTERM", () => { process.exit(0); });'
