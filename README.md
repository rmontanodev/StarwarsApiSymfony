# StarwarsApiSymfony

## Installation and Usage Documentation for Symfony Project
## Installation
Follow these steps to install and set up the Symfony project from GitHub:

### Clone the repository from GitHub:

```bash
git clone https://github.com/rmontanodev/StarwarsApiSymfony.git
```

### Navigate to the project directory:

```bash
cd StarwarsApiSymfony
```

### Install Composer dependencies:

```bash
composer install
```

### Create the .env.local file to configure local environment variables. You can copy the .env file and customize it as needed:

```bash
cp .env .env.example
```

Configure the database connection in .env.local according to your requirements.

### Execute database migrations to create tables:

```bash
php bin/console doctrine:migrations:migrate
```

### Start the local Symfony web server:

```bash
php bin/console server:start
```

Access your application in the browser via the URL provided by the Symfony development server (usually http://localhost:8000 by default).

## Entities
### Character
The `Character` entity represents a character in the database. It has the following properties:

#### id: Unique identifier of the character.
#### name: Name of the character.
#### mass: Character's mass.
#### height: Character's height.
#### gender: Character's gender.
#### picture: Character's image (customized).

### Movie
The `Movie` entity represents a movie in the database. It has the following properties:

#### id: Unique identifier of the movie.
#### name: Name of the movie.

### MovieCharacter
The `MovieCharacter` entity represents the relationship between a movie and a character. It has the following properties:

#### movie_id: Identifier of the related movie.
#### character_id: Identifier of the related character.

### starwars:import Command
You can use the following command to download data from the Star Wars API and populate the database with characters and movies:

```bash
php bin/console starwars:import
```

This command will download data from the Star Wars API and store it in the `Character` and `Movie` tables of the database. Ensure that the Star Wars API configuration is correctly defined in the command's code before running it.
