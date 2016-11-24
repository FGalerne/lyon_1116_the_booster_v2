<?php
/**
 * Created by PhpStorm.
 * User: moimeme
 * Date: 24/10/16
 * Time: 10:05
 */

namespace BoosterBundle\Services;

use Symfony\Component\DependencyInjection\Container;

class UserGenerator{
    private $quantity;

    public function __construct($container, $quantity){
        $this->quantity = $quantity;
        $this->container = $container;
    }

    public function getUsers(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.randomuser.me/?nat=fr&results='.$this->quantity);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = json_decode(curl_exec($ch));
        curl_close($ch);

        return $output->results;
    }
}