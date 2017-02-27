 # This will remove any pre-existing container, and then re-create it.
 # You can change 8080 below to a port of your choosing. Change the path to point to wherever your champions-deploy is cloned to.
 PATH_TO_CHAMPIONS_DEPLOY="/home/auenc/Documents/workspace/php/personal-site"
 sh make-new-db.sh
 sudo docker stop personal-site
 sudo docker rm personal-site
 sudo docker build -t personal-site .
 sudo docker run -d -p 8080:80 --name personal-site --link personal-mysql -v $PATH_TO_CHAMPIONS_DEPLOY:/var/www personal-site

 HTTPDUSER="www-data"
 sudo setfacl -R -m u:${HTTPDUSER}:rwx $PATH_TO_CHAMPIONS_DEPLOY/tmp
 sudo setfacl -R -d -m u:${HTTPDUSER}:rwx $PATH_TO_CHAMPIONS_DEPLOY/tmp
 sudo setfacl -R -m u:${HTTPDUSER}:rwx $PATH_TO_CHAMPIONS_DEPLOY/logs
 sudo setfacl -R -d -m u:${HTTPDUSER}:rwx $PATH_TO_CHAMPIONS_DEPLOY/logs

 echo "now run start-container.sh"
