# StarwarsApiSymfony

Documentación de Instalación y Uso de Proyecto Symfony
Instalación
Siga estos pasos para instalar y configurar el proyecto Symfony desde GitHub:

Clone el repositorio desde GitHub:

git clone https://github.com/rmontanodev/StarwarsApiSymfony.git
Navegue al directorio del proyecto:

cd StarwarsApiSymfony
Instale las dependencias de Composer:

composer install
Cree el archivo .env.local para configurar las variables de entorno locales. Puede copiar el archivo .env y personalizarlo según sea necesario.

cp .env .env.local
Configure la conexión de la base de datos en .env.local según sus necesidades.

Ejecute las migraciones de la base de datos para crear las tablas:

php bin/console doctrine:migrations:migrate
Inicie el servidor web local de Symfony:

php bin/console server:start
Acceda a su aplicación en el navegador a través de la URL proporcionada por el servidor de desarrollo Symfony (por defecto, suele ser http://localhost:8000).

Entidades
Character
La entidad Character representa a un personaje en la base de datos. Tiene las siguientes propiedades:

id: Identificador único del personaje.
name: Nombre del personaje.
mass: Masa del personaje.
height: Altura del personaje.
gender: Género del personaje.
picture: Imagen del personaje (personalizada).
Movie
La entidad Movie representa una película en la base de datos. Tiene las siguientes propiedades:

id: Identificador único de la película.
name: Nombre de la película.
MovieCharacter
La entidad MovieCharacter representa la relación entre una película y un personaje. Tiene las siguientes propiedades:

movie_id: Identificador de la película relacionada.
character_id: Identificador del personaje relacionado.
Comando starwars:import
Puede utilizar el siguiente comando para descargar datos desde la API de Star Wars y llenar la base de datos con personajes y películas:

bash
Copy code
php bin/console starwars:import
Este comando descargará datos de la API y los almacenará en las tablas Character y Movie de la base de datos. Asegúrese de que la configuración de la API de Star Wars esté correctamente definida en el código del comando antes de ejecutarlo.

// TODO
Puede acceder a la lista de personajes en la página de inicio de la aplicación.
Use la función de búsqueda para encontrar personajes por nombre.
Haga clic en un personaje listado para acceder a la página de edición, donde puede modificar los datos del personaje y cargar una imagen personalizada.
También puede eliminar un personaje desde la página de inicio o desde la página de edición.
  Esperamos que esta documentación te ayude a instalar y utilizar el proyecto Symfony de manera efectiva. Si tienes alguna pregunta o necesitas más detalles, no dudes en contactarnos.
