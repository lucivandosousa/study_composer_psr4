<?php

namespace BuscadorDeCursos;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
  private $httpClient;
  private $crawler;

  public function __construct(Client $httpClient, Crawler $crawler) {
    $this->httpClient = $httpClient;
    $this->crawler = $crawler;
  }

  public function buscar($url)
  {
    $response = $this->httpClient->request('GET', $url);

    $html = $response->getBody();

    $this->crawler->addHtmlContent($html);

    $elementosCursos = $this->crawler->filter("span.card-curso__nome");
    $cursos = [];

    foreach ($elementosCursos as $elemento) {
      $cursos[] = $elemento->textContent;
    }

    return $cursos;
  }
}