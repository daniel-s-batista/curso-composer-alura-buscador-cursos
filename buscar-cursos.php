<?php

require "vendor/autoload.php";

use Alura\BuscadorDeCursos\Buscador;
use \GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client(['verify' => false, 'base_uri' => "https://www.alura.com.br/"]);
$resposta = $client->request("GET", "/cursos-online-programacao/php");

$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar("/cursos-online-programacao/php");

foreach($cursos as $curso) {
    usleep(5 * 1000);
    echo $curso . PHP_EOL;
}
