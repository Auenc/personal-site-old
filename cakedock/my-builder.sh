 # This will remove any pre-existing container, and then re-create it.
 # You can change 8080 below to a port of your choosing. Change the path to point to wherever your champions-deploy is cloned to.
 sudo docker stop champions-container
 sudo docker rm champions-container
 sudo docker build -t champions-cakephp .
 sudo docker run -d -p 8080:80 --name champions-container -v /home/auenc/Documents/univertsity/year\ 4/group/champions-deploy:/var/www champions-cakephp
