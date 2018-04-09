<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_page extends CI_Controller {
  public function first_page()
  {
    $data['page']='welcome_page/first_page' ;
    $this->load->view('menu_content/content',$data) ;
  }




}
