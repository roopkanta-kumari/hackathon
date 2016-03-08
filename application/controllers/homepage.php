<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {
    
    public function __construct(){  
        parent::__construct();
        $this->load->model('homepage_model');
    }

    public function index()
    {
        /*Define single page content as usual*/
        $toView['page_content'] = date("H:i:s");
        $toView['other_data'] = "<p>See you!</p>";
//        --example 7th march roop
//        $result = $this->homepage_model->list_table('table1'); 
        
        $this->load->view('pages/homepage',$toView);

    }
}

/*End of file homepage.php*/
/*Location .application/controllers/example.php*/