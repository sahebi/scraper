<?php
require_once 'vendor\autoload.php';
require_once 'scraper.php';

use Sahebi\Scraper\Scraper;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\DomCrawler\Crawler;


try {
    $config  = "config/tabnak.yml";
    $config  = Yaml::parse(file_get_contents($config));

    $html    = file_get_contents('config/tabnak.html');
    // $html    = file_get_contents($config['url']);

    $crawler = new Crawler($html);

    $Scraper = new Scraper($config, $crawler);
    $Scraper->toArray();
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
