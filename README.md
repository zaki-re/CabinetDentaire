# Cabinet Dentaire 

A hassle-free system helping expert and user work together.

## Instalation

Required software:
- VSCode
- docker
- docker compose
- node
- yarn

Optional software
- php
- composer

VSCode extensions:
- [phpcs](https://marketplace.visualstudio.com/items?itemName=ikappas.phpcs)
- [ESLint](https://marketplace.visualstudio.com/items?itemName=dbaeumer.vscode-eslint)
- [Prettier](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode)

Clone the repository:

```bash
git clone ***
```

Create .env file in the root folder by using the one on Confluence.

Create docker environment:
```bash
docker-compose up -d
```

Install PHP dependencies:
```bash
docker-compose exec php composer install
```

Make sure you fill out your github token in order to pull from the spark repo

Install node dependencies and run dev command:
```bash
yarn && yarn dev
```

Migrate and seed the database:
```bash
docker-compose exec php php artisan migrate:fresh --seed
```

## Usage

The application will run at: [localhost:8088](localhost:8088)

PHPMyAdmin will run at: [localhost:2204](localhost:2204)

The credentials are:
```
user: root
password: root
```

If you prefer to use another administration tool for MySQL, It is running at:
```
localhost:3318
```
