# Modular Laravel

## Introduction
***

This app has been created to showcase building laravel apps, using a modular approach.

It uses docker-compose to build everything, so its all you need to install.

The app is built ontop of the Laravel framework for backend support, and Material for frontend support.


## Installing Docker Compose
***

Docker and the associated package management tool, docker-compose are now widely supported across all major platforms. To install simply follow the instructions [here][docker_install].


## Getting started
***

First you will need to create a `.env` file in the `app/` dir, following the same structure as the `.env.example` file, filling in the blanks where applicable.

With [Docker][docker] installed, the next step is to build the frontend assets. You can do this by running:

    $ make build-fe

Once the assets are built, to start your application should be as simple
as:

    $ make run

Then visit the running application [http://localhost](http://localhost).
While the app is running, as well as watching changes to the server code, the frontend code will also be watched for updates, and automatically applied when found.

To open a bash shell inside the container environment, use:

    $ make attach

**Note:** When you want to run the shell you must have already started
`make run` in another shell.

[docker_install]: https://docs.docker.com/compose/install/  "Docker Installation"
