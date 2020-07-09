<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitemap extends CI_Controller {

    public function index()
	{
        header("Content-type: text/xml");
        $xml_file = file_get_contents("sitemap.xml");
        echo $xml_file;
	}

}
