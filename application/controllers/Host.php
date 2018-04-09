<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Host extends CI_Controller
{
  var $data_images = array() ;

  public function __construct()
  {
    parent::__construct() ;
    $this->load->model('Host_model') ;
  }
  public function get_listing()
  {
    $data['images']=$this->Host_model->listing_show();
    $data['page'] ='host/get_listing' ;
    $this->load->view('menu_content/content',$data) ;
  }

  public function add_listing()
  {
    $data['page'] = 'host/add_listing' ;
    $this->load->view('menu_content/content',$data) ;
  }

  public function create_listing()
  {
      //data to send to cars table

      $config['upload_path'] ='./cover_gallery/' ;
      $config['allowed_types'] = 'jpg|jpeg|png|gif' ;
      $config['file_name'] = $_FILES['cover_photo']['name'] ;

      //Load upliad library and initialize configuration
      $this->load->library('upload',$config) ;
      $this->upload->initialize($config) ;

      $this->upload->do_upload('cover_photo') ;
      $data_upload_file = $this->upload-> data() ;

      $image = $data_upload_file['file_name'] ;

      $insert_data = array(
        'title' => $this->input->post('title') ,
        'description' => $this->input->post('description') ,
        'cover_photo' => $image ,
        'type_of_car' => $this->input->post('type_of_car') ,
        'year' => $this->input->post('year') ,
        'cancellation_policy' => $this->input->post('cancellation_policy')

      ) ;

      //data to send to images table
      $number_of_files = sizeof($_FILES['other_photo']['tmp_name']) ;
      //echo "<script type='text/javascript'>alert('".$number_of_files."')</script>";
      $files = $_FILES['other_photo'] ;

      $config['upload_path'] = './other_gallery' ;
      $config['allowed_types'] = 'jpg|jpeg|png|gif' ;

      for ($i = 0 ; $i < $number_of_files ; $i ++)
      {
        $_FILES['other_photo']['name'] =$files['name'][$i] ;
        $_FILES['other_photo']['type'] =$files['type'][$i] ;
        $_FILES['other_photo']['tmp_name'] =$files['tmp_name'][$i] ;
        $_FILES['other_photo']['error'] =$files['error'][$i] ;
        $_FILES['other_photo']['size'] =$files['size'][$i] ;

        $this->upload->initialize($config) ;
        $this->upload->do_upload('other_photo') ;
        $data = $this->upload->data() ;
        $other_photo[$i]['photo'] = $data['file_name'] ;
      }

      $success_1 = $this->Host_model->add_new_listing($insert_data) ;

      $last_insert_id = $this->db->insert_id() ;

      $images_list=array_map( function($addID) use ($last_insert_id)
      {
        $addID['carID']=$last_insert_id ;
        return $addID ;
      },$other_photo) ;

      $success_2 = $this->Host_model->add_other_photo($images_list) ;
      if($success_1 && $success_2)
      {
        $data['message'] = 'Preview your listing' ;
        // print_r($insert_data) ;
        // echo '<br><br>' ;
        // print_r($images_list) ;
        $data['title'] = $insert_data['title'] ;
        $data['description'] =$insert_data['description'] ;
        $data['cover_photo'] = base_url().'cover_gallery/'.$image ;
        $data['images'] = $this->Host_model->getImage($last_insert_id) ;
        $data['type_of_car'] = $insert_data['type_of_car'] ;
        $data['year'] = $insert_data['year'] ;
        $data['cancellation_policy'] = $insert_data['cancellation_policy'] ;
      }
      else {

        $data['message'] = 'Some error.' ;
      } ;
      $data['page'] = 'host/create_listing' ;
      $this->load->view('menu_content/content',$data) ;

  }

  public function show_specific_listing($select_id)
  {
    $data['carID'] =$select_id ;
    $data['id_get_edit'] = $this->Host_model->get_car_id($select_id) ;

    $data['page'] ='host/show_specific_listing' ;
    $this->load->view('menu_content/content',$data) ;
  }
public function delete_listing($carID)
{
  // $cover_photo = $this->input->post('cover_photo') ;
  $success_1 = $this->Host_model->get_delete_images($carID) ;
  $cover_photo = $this->input->post('cover_photo') ;
  $success_2 = $this->Host_model->get_delete_listing($carID) ;
  if($success_1 && $success_2)
  {
    $data['message'] = 'Your listing has been deleted.'.$cover_photo ;
  }
  else {
    $data['message'] = 'Some error.' ;
  }
  $data['page'] = 'host/message' ;
  $this->load->view('menu_content/content',$data) ;
}


  }
