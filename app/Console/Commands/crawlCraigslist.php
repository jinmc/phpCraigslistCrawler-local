<?php

namespace App\Console\Commands;

use App\Models\Book;
use Illuminate\Console\Command;

class crawlCraigslist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:crawlCraigslist';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Book::truncate();
//        \Log::info('cleared database!!!  ' . \Carbon\Carbon::now());

        $this->scrape();

    }

    public static function scrape() {

        $curl = curl_init();

//        $url = 'https://www.geeksforgeeks.org/';
        $url = 'http://newyork.craigslist.org/search/bka';

        // Return Page contents.
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, $url);

        $result = curl_exec($curl);

        $books = array();

        preg_match_all('!<p class=\"result-info\">(.*?)<\/p>!is', $result, $match);

        $data = $match[1];
//        print_r($match[1]);

        for ($i = 0;$i < count($match[1]);$i++) {

            if (preg_match("!<a.*class=.result-title hdrlnk.*>(.*?)<\/a>!", $match[1][$i], $name)) {
                $books['name'][$i] = $name[1];
            } else {
                $books['name'][$i] = '';
            }
//
            if (preg_match('!<span.*class=.result-price.*>(.*?)<\/span>!', $match[1][$i], $price)) {
                $books['price'][$i] = $price[1];
            } else {
                $books['price'][$i] = '';
            }

            // where we make new row in book database
            $bookData = array('name' => $books['name'][$i], 'price' => $books['price'][$i]);
            Book::create($bookData);

        }


//        print_r($books['price']);

//        print_r($match[1]);
//        preg_match_all("!<a.*class=.result-title hdrlnk.*>(.*?)<\/a>!", $result, $match);
//
//        $books['name'] = $match[1];
//
//        $data = $books['name'];
//
////        print_r($data);
//
//        preg_match_all('!<span.*class=.result-price.*>(.*?)<\/span>!', $result, $match2);
//
//        $books['price'] = $match2[1];
//
//        $data2 = array();
//
//        $isFirst = true;
//        $tempPrice = '';
//        dump($books['price']);
//        foreach ($books['price'] as $price) {
//            if ($isFirst) {
//                array_push($data2, $price);
//                $tempPrice = $price;
//            }
//            else {
//                dump($tempPrice);
//                if ($tempPrice != $price) array_push($data2, $tempPrice);
//                $isFirst = true;
//            }
//
//        }

//        print_r($data2);
//        $data = $result . "\n";

        curl_close($curl);

//        $file = dirname(__FILE__) . '/output.txt';

//        file_put_contents($file, $data,FILE_APPEND);

    }


}
