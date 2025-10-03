Go to Docker Hub.

Select Create repository.

On the Create repository page, enter the following information:

Repository name - getting-started-todo-app
Short description - feel free to enter a description if you'd like
Visibility - select Public to allow others to pull your customized to-do app

To get started, either clone or download the project as a ZIP file to your local machine.


 git clone https://github.com/docker/getting-started-todo-app
And after the project is cloned, navigate into the new directory created by the clone:


 cd getting-started-todo-app
Build the project by running the following command, swapping out DOCKER_USERNAME with your username.


 docker build -t DOCKER_USERNAME/getting-started-todo-app .
For example, if your Docker username was mobydock, you would run the following:


 docker build -t mobydock/getting-started-todo-app .
To verify the image exists locally, you can use the docker image ls command:


 docker image ls
You will see output similar to the following:


REPOSITORY                          TAG       IMAGE ID       CREATED          SIZE
mobydock/getting-started-todo-app   latest    1543656c9290   2 minutes ago    1.12GB
...
To push the image, use the docker push command. Be sure to replace DOCKER_USERNAME with your username:


 docker push DOCKER_USERNAME/getting-started-todo-app


## Container

Follow the instructions to run a container using the CLI:

Open your CLI terminal and start a container by using the docker run command:


 docker run -d -p 8080:80 docker/welcome-to-docker
The output from this command is the full container ID.

Congratulations! You just fired up your first container! 🎉

View your running containers
You can verify if the container is up and running by using the docker ps command:


docker ps
You will see output like the following:


 CONTAINER ID   IMAGE                      COMMAND                  CREATED          STATUS          PORTS                      NAMES
 a1f7a4bb3a27   docker/welcome-to-docker   "/docker-entrypoint.…"   11 seconds ago   Up 11 seconds   0.0.0.0:8080->80/tcp       gracious_keldysh
This container runs a web server that displays a simple website. When working with more complex projects, you'll run different parts in different containers. For example, a different container for the frontend, backend, and database.

Tip
The docker ps command will show you only running containers. To view stopped containers, add the -a flag to list all containers: docker ps -a

### stop your container

The docker/welcome-to-docker container continues to run until you stop it. You can stop a container using the docker stop command.

Run docker ps to get the ID of the container

Provide the container ID or name to the docker stop command:


docker stop <the-container-id>
Tip
When referencing containers by ID, you don't need to provide the full ID. You only need to provide enough of the ID to make it unique. As an example, the previous container could be stopped by running the following command:


docker stop a1f


## Images


docker search docker/welcome-to-docker

Search for and download an image
Open a terminal and search for images using the docker search command:


docker search docker/welcome-to-docker
You will see output like the following:


NAME                       DESCRIPTION                                     STARS     OFFICIAL
docker/welcome-to-docker   Docker image for new users getting started w…   20
This output shows you information about relevant images available on Docker Hub.

Pull the image using the docker pull command.


docker pull docker/welcome-to-docker
You will see output like the following:


Using default tag: latest
latest: Pulling from docker/welcome-to-docker
579b34f0a95b: Download complete
d11a451e6399: Download complete
1c2214f9937c: Download complete
b42a2f288f4d: Download complete
54b19e12c655: Download complete
1fb28e078240: Download complete
94be7e780731: Download complete
89578ce72c35: Download complete
Digest: sha256:eedaff45e3c78538087bdd9dc7afafac7e110061bbdd836af4104b10f10ab693
Status: Downloaded newer image for docker/welcome-to-docker:latest
docker.io/docker/welcome-to-docker:latest
Each of line represents a different downloaded layer of the image. Remember that each layer is a set of filesystem changes and provides functionality of the image.

Learn about the image
List your downloaded images using the docker image ls command:


docker image ls
You will see output like the following:


REPOSITORY                 TAG       IMAGE ID       CREATED        SIZE
docker/welcome-to-docker   latest    eedaff45e3c7   4 months ago   29.7MB
The command shows a list of Docker images currently available on your system. The docker/welcome-to-docker has a total size of approximately 29.7MB.

Image size

The image size represented here reflects the uncompressed size of the image, not the download size of the layers.

List the image's layers using the docker image history command:


docker image history docker/welcome-to-docker
You will see output like the following:


IMAGE          CREATED        CREATED BY                                      SIZE      COMMENT
648f93a1ba7d   4 months ago   COPY /app/build /usr/share/nginx/html # buil…   1.6MB     buildkit.dockerfile.v0
<missing>      5 months ago   /bin/sh -c #(nop)  CMD ["nginx" "-g" "daemon…   0B
<missing>      5 months ago   /bin/sh -c #(nop)  STOPSIGNAL SIGQUIT           0B
<missing>      5 months ago   /bin/sh -c #(nop)  EXPOSE 80                    0B

This output shows you all of the layers, their sizes, and the command used to create the layer.

Viewing the full command

If you add the --no-trunc flag to the command, you will see the full command. Note that, since the output is in a table-like format, longer commands will cause the output to be very difficult to navigate.



## registry

Clone the GitHub repository using the following command:


git clone https://github.com/dockersamples/helloworld-demo-node
Navigate into the newly created directory.


cd helloworld-demo-node
Run the following command to build a Docker image, swapping out YOUR_DOCKER_USERNAME with your username.


docker build -t YOUR_DOCKER_USERNAME/docker-quickstart .
Note
Make sure you include the dot (.) at the end of the docker build command. This tells Docker where to find the Dockerfile.

Run the following command to list the newly created Docker image:


docker images
You will see output like the following:


REPOSITORY                                 TAG       IMAGE ID       CREATED         SIZE
YOUR_DOCKER_USERNAME/docker-quickstart   latest    476de364f70e   2 minutes ago   170MB
Start a container to test the image by running the following command (swap out the username with your own username):


docker run -d -p 8080:8080 YOUR_DOCKER_USERNAME/docker-quickstart 
You can verify if the container is working by visiting http://localhost:8080 with your browser.

Use the docker tag command to tag the Docker image. Docker tags allow you to label and version your images.


docker tag YOUR_DOCKER_USERNAME/docker-quickstart YOUR_DOCKER_USERNAME/docker-quickstart:1.0 
Finally, it's time to push the newly built image to your Docker Hub repository by using the docker push command:


docker push YOUR_DOCKER_USERNAME/docker-quickstart:1.0
Open Docker Hub and navigate to your repository. Navigate to the Tags section and see your newly pushed image.


## docker compose

In this hands-on, you will learn how to use a Docker Compose to run a multi-container application. You'll use a simple to-do list app built with Node.js and MySQL as a database server.

Start the application
Follow the instructions to run the to-do list app on your system.

Download and install Docker Desktop.

Open a terminal and clone this sample application.


git clone https://github.com/dockersamples/todo-list-app 
Navigate into the todo-list-app directory:


cd todo-list-app
Inside this directory, you'll find a file named compose.yaml. This YAML file is where all the magic happens! It defines all the services that make up your application, along with their configurations. Each service specifies its image, ports, volumes, networks, and any other settings necessary for its functionality. Take some time to explore the YAML file and familiarize yourself with its structure.

Use the docker compose up command to start the application:


docker compose up -d --build
When you run this command, you should see an output like this:


[+] Running 5/5
✔ app 3 layers [⣿⣿⣿]      0B/0B            Pulled          7.1s
  ✔ e6f4e57cc59e Download complete                          0.9s
  ✔ df998480d81d Download complete                          1.0s
  ✔ 31e174fedd23 Download complete                          2.5s
  ✔ 43c47a581c29 Download complete                          2.0s
[+] Running 4/4
  ⠸ Network todo-list-app_default           Created         0.3s
  ⠸ Volume "todo-list-app_todo-mysql-data"  Created         0.3s
  ✔ Container todo-list-app-app-1           Started         0.3s
  ✔ Container todo-list-app-mysql-1         Started         0.3s
A lot happened here! A couple of things to call out:

Two container images were downloaded from Docker Hub - node and MySQL
A network was created for your application
A volume was created to persist the database files between container restarts
Two containers were started with all of their necessary config
If this feels overwhelming, don't worry! You'll get there!

With everything now up and running, you can open http://localhost:3000 in your browser to see the site. Feel free to add items to the list, check them off, and remove them.


Tear it down
Since this application was started using Docker Compose, it's easy to tear it all down when you're done.

In the CLI, use the docker compose down command to remove everything:


docker compose down
You'll see output similar to the following:


[+] Running 3/3
✔ Container todo-list-app-mysql-1  Removed        2.9s
✔ Container todo-list-app-app-1    Removed        0.1s
✔ Network todo-list-app_default    Removed        0.1s
Volume persistence

By default, volumes aren't automatically removed when you tear down a Compose stack. The idea is that you might want the data back if you start the stack again.

If you do want to remove the volumes, add the --volumes flag when running the docker compose down command:


docker compose down --volumes
[+] Running 1/0
✔ Volume todo-list-app_todo-mysql-data  Removed



# docker start existing container
docker compose start

docker start -ai base-container



##

docker container commit -m "Add node" base-container node-base

## View the layers of your image using the docker image history command:
 docker image history node-base


## remove container

docker rm -f base-container


# Build an app image

Start a new container using the newly created node-base image:


 docker run --name=app-container -ti node-base
Inside of this container, run the following command to create a Node program:


 echo 'console.log("Hello from an app")' > app.js
To run this Node program, you can use the following command and see the message printed on the screen:


 node app.js
In another terminal, run the following command to save this container’s changes as a new image:


 docker container commit -c "CMD node app.js" -m "Add app" a



# docker run container

docker build .

### connect created mysql

docker exec -it getting-started-todo-app-mysql-1 mysql -u root -p
