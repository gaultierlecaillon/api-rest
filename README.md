
<div align="center">

  <img src="https://raw.githubusercontent.com/Louis3797/awesome-readme-template/main/assets/logo.png" alt="logo" width="200" height="auto" />
  <h1>Guess the number</h1>

  <p>
    Play and have fun !
  </p>


<h4>
    <a href="https://jolly-plant-0dd118c03.2.azurestaticapps.net">View Demo</a>
  <span> · </span>
    <a href="https://github.com/gaultierlecaillon/api-rest#readme">Documentation</a>
  </h4>
</div>

<br />

<!-- Table of Contents -->
# :notebook_with_decorative_cover: Table of Contents

- [:notebook\_with\_decorative\_cover: Table of Contents](#notebook_with_decorative_cover-table-of-contents)
    - [:star2: About the Project](#star2-about-the-project)
        - [:camera: Screenshots](#camera-screenshots)
        - [:space\_invader: Tech Stack](#space_invader-tech-stack)
        - [:dart: Features](#dart-features)
    - [:toolbox: Getting Started - Frontend Service :desktop\_computer:](#toolbox-getting-started---frontend-service-desktop_computer)
        - [:bangbang: Prerequisites](#bangbang-prerequisites)
        - [:gear: Installation](#gear-installation)
        - [:running: Run Locally](#running-run-locally)
        - [:triangular\_flag\_on\_post: Deployment](#triangular_flag_on_post-deployment)
    - [:compass: Roadmap](#compass-roadmap)
    - [:toolbox: Getting Started - Backend Service :abacus:](#toolbox-getting-started---backend-service-abacus)
        - [:bangbang: Prerequisites](#bangbang-prerequisites-1)
        - [:gear: Installation](#gear-installation-1)
        - [:running: Run Locally](#running-run-locally-1)
        - [:triangular\_flag\_on\_post: Deployment](#triangular_flag_on_post-deployment-1)
    - [:compass: Roadmap](#compass-roadmap-1)
    - [:handshake: Contact](#handshake-contact)

<!-- About the Project -->
## :star2: About the Project

<!-- Screenshots -->
### :camera: Screenshots

<div align="center">
  <img src="https://i.postimg.cc/ncWztRHg/screenshot.png" alt="screenshot" />
</div>

<!-- TechStack -->
### :space_invader: Tech Stack

<details>
  <summary>Client</summary>
  <ul>
    <li><a href="https://reactjs.org/">React.js</a></li>
    <li><a href="https://mui.com/">MUI React</a></li>
  </ul>
</details>

<details>
  <summary>Server</summary>
  <ul>
    <li><a href="https://laravel.com/">Laravel</a></li>
  </ul>
</details>

<details>
<summary>Database</summary>
  <ul>
    <li><a href="https://azure.microsoft.com/en-us/products/mysql/">Azure MySQL server</a></li>
  </ul>
</details>

<details>
<summary>Hosting</summary>
  <ul>
    <li><a href="https://azure.microsoft.com/en-us/products/app-service/static">Azure Static Web App</a></li>
    <li><a href="https://azure.microsoft.com/fr-fr/products/app-service">Azure App Service</a></li>
  </ul>
</details>



<!-- Features -->
### :dart: Features

- You can login via the API
- You can start a game from the client UI
- You can guess the number of the game


<!-- Getting Started -->
## :toolbox: Getting Started - Frontend Service :desktop_computer:

<!-- Prerequisites -->
### :bangbang: Prerequisites

This project uses Node.js

```bash
node -v # Should be more than node 16


```
<!-- Installation -->
### :gear: Installation

Install the project with npm

```bash
  npm install
```


<!-- Run Locally -->
### :running: Run Locally

Start the server

```bash
  npm run start
```

<!-- Deployment -->
### :triangular_flag_on_post: Deployment

The deployment is automatically done with Azure Static Apps and Github Actions on git push over main branch

```bash
  git push
```

<!-- Roadmap -->
## :compass: Roadmap

- [ ] Redo the frontend UI
- [ ] Add Cypress
- [ ] Display leaderboard

<!-- Getting Started -->
## :toolbox: Getting Started - Backend Service :abacus:

<!-- Prerequisites -->
### :bangbang: Prerequisites

This project uses docker :whale2:, compose and php

```bash
php -v # Should be php8
```

```bash
#Install composer
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

<!-- Installation -->
### :gear: Installation

Install the project with npm

```bash
  cd api-rest
  composer install
```

<!-- Run Locally -->
### :running: Run Locally

Start docker compose

```bash
  docker-compose up
```

<!-- Deployment -->
### :triangular_flag_on_post: Deployment

The deployment is done on Azure App Service - docker-compose by using DockerHub registry.
You can use it like so
```bash
  docker build . -t registry/image:tag
```

<!-- Roadmap -->
## :compass: Roadmap

- [ ] Add new features to auto resolve game
- [ ] Add more tests

<!-- Contact -->
## :handshake: Contact

Gaultier Lecaillon


