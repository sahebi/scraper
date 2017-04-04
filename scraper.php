<?php
namespace Sahebi\Scraper;

require_once 'vendor\autoload.php';
use Symfony\Component\DomCrawler\Crawler;

class Scraper
{
    private $crawler;
    public function __construct($config, $domCrawler){
        // print_r($config);
        if(empty($domCrawler)){
            throw new \Exception('install DomCrawler: composer require Symfony\DomCrawler');
        }
        $this->crawler = $domCrawler;
    }


    public function toArray(){
        $filter = $this->crawler->filter('.service_content .row')->each(function(Crawler $node, $i){
            return array(
                        'url'   => $node->filter('.title_main')->attr('href'),
                        'title' => $node->filter('.title_main')->text(),
                        'body'  => $node->filter('.lead2')->text(),
                        'image' => $node->filter('.img_center_divs')->attr('src'),
                    );
        });
        print_r($filter);

        // $filter = $filter->extract(array('_text', 'class', 'src'));
        // print_r($filter);
    }

    public function nextPageUrl(){

    }
}

