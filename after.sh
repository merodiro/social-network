#!/bin/sh

# If you would like to do some extra provisioning you may
# add any commands you wish to this file and they will
# be run after the Homestead machine is provisioned.

sudo npm install -g laravel-echo-server

if sudo [ ! -f /etc/supervisor/conf.d/laravel-worker.conf ]; then

  cat << EOF | sudo tee /etc/supervisor/conf.d/laravel-worker.conf >/dev/null
[supervisord]
nodaemon=true
[program:horizon]
process_name=%(program_name)s_%(process_num)02d
command=php /home/vagrant/code/artisan horizon
autostart=true
autorestart=true
user=vagrant
redirect_stderr=true
stdout_logfile=/home/vagrant/code/storage/logs/laravel-worker.log
[program:echo-server]
directory=/home/vagrant/path/to/your/project
command=/usr/bin/laravel-echo-server start
autostart=true
autorestart=true
user=vagrant
redirect_stderr=true
stdout_logfile=/home/vagrant/code/storage/logs/echoserver.log
EOF

  sudo supervisorctl reread
  sudo supervisorctl update

fi