<?php

use BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

require "vendor/autoload.php";

$client = new Client();
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar("https://www.alura.com.br/cursos-online-programacao/php");

foreach ($cursos as $curso) {
  echo exibeMensagem($curso);
}
