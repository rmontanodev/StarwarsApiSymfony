<?php

namespace App\Command;

// ...

use App\Entity\Character;
use App\Entity\Movie;
use App\Entity\MovieCharacter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ImportStarWarsDataCommand extends Command
{
    /**
     * Default command name
     * @var HttpClientInterface
     */
    private $httpClient;
    /**
     * Default command name
     * @var string
     */
    /**
     * @var EntityManagerInterface
     */
    private $em;
    protected static $defaultName = 'starwars:import';

    public function __construct(HttpClientInterface $httpClient,EntityManagerInterface $em)
    {
        $this->httpClient = $httpClient;
        $this->em = $em;
        // El constructor debe invocar al constructor de la clase base
        parent::__construct();
    }

    // ...

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Importing data from the Star Wars API...');

        // Realiza las solicitudes a la API de Star Wars aquí utilizando $this->httpClient

        // Ejemplo de solicitud para obtener datos de películas
        $response = $this->httpClient->request('GET', 'https://swapi.dev/api/films/');
        $filmsData = $response->toArray();

        // Procesa los datos de películas aquí
        foreach ($filmsData['results'] as $film) {
            $output->writeln('Title: ' . $film['title']);
            $movie = new Movie();
        // Mapea los campos de la API a las propiedades de la entidad Movie
            $movie->setTitle($film['title']);
            $movie->setDirector($film['director']);
            $movie->setReleaseDate(new \DateTime($film['release_date']));
            $movie->setUrl($film['url']);
            $this->em->persist($movie);
            $this->em->flush();
        }

        // Ejemplo de solicitud para obtener datos de personajes
        $characterResponse = $this->httpClient->request('GET', 'https://swapi.dev/api/people/');
        $charactersData = $characterResponse->toArray();

        // Procesa los datos de personajes aquí
        foreach ($charactersData['results'] as $characterData) {
            // Crea una entidad Character y establece sus propiedades
            $character = new Character();
            // Mapea los campos de la API a las propiedades de la entidad Character
            $character->setName($characterData['name']);
            $character->setHeight($characterData['height']);
            $character->setMass($characterData['mass']);
            $character->setGender($characterData['gender']);
            $character->setUrl($characterData['url']);


            // Guarda el personaje en la base de datos
            $this->em->persist($character);
        }

        // Ejemplo de solicitud para obtener datos de relaciones entre películas y personajes
        $movieCharacterResponse = $this->httpClient->request('GET', 'https://swapi.dev/api/films/');
        $moviesData = $movieCharacterResponse->toArray();

        // Procesa los datos de películas y personajes aquí
        foreach ($moviesData['results'] as $movieData) {
            foreach ($movieData['characters'] as $characterUrl) {
                // Busca el personaje en la base de datos según su URL en la API
                $character = $this->em->getRepository(Character::class)->findOneBy(['url' => $characterUrl]);

                if ($character) {
                    // Crea una entidad MovieCharacter y establece sus propiedades
                    $movieCharacter = new MovieCharacter();
                    $movieCharacter->setMovie($movieData['title']);
                    $movieCharacter->setCharacter($character);

                    // Guarda la relación entre película y personaje en la base de datos
                    $this->em->persist($movieCharacter);
                }
            }
        }

        // Guarda los cambios en la base de datos
        $this->em->flush();

        $output->writeln('Data imported successfully.');

        return Command::SUCCESS;
    }
}
