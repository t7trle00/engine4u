<?php
/**
 *
 */
class Host_model extends CI_model
{

  public function listing_show()
  {
    $this->db->select('carID,title,description,cover_photo,type_of_car,year,cancellation_policy') ;
    $this->db->from('cars') ;
    return $this->db->get()->result_array() ;
  }

  public function get_car_id($select_id)
  {
    $this->db->select('cars.carID, title,description, cover_photo,type_of_car,year,cancellation_policy,photo') ;
    $this->db->from('cars') ;
    $this->db->join('images','cars.carID = images.carID') ;
    $this->db->where('images.carID',$select_id) ;
    return $this->db->get()->result_array() ;
  }

public function get_delete_images($carID)
{
  $this->db->where('images.carID',$carID) ;
  // chmod("./cover_gallery/".$cover_photo,0777) ;
  // unlink("./other_gallery/".$other_photo) ;
  return $this->db->delete('images') ;
}
public function get_delete_listing($carID,$cover_photo)
{
  $this->db->select('cover_photo') ;
  $this->db->from('cars') ;
  $this->db->where('cover_photo',$cover_photo) ;
  return $this->db->get()->result_array() ;
  echo "<script type='text/javascript'>alert('.$cover_photo.')</script>";
  $this->db->where('carID',$carID) ;
  // $this->load->helper('file') ;
  // $path = base_url().'cover_gallery/'.$cover_photo ;
  // echo "<script type='text/javascript'>alert(".$path.")</script>";
  // echo "<script type='text/javascript'>alert(".$cover_photo.")</script>";
  // unlink($path) ;

  return $this->db->delete('cars') ;
}

  public function add_new_listing($insert_data)
  {
    return $this->db->insert('cars',$insert_data) ;
  }

  public function add_other_photo($images_list)
  {
    return $this->db->insert_batch('images',$images_list) ;
  }

  public function getImage($last_insert_id)
  {
    $this->db->select('photo') ;
    $this->db->from('images') ;
    $this->db->where('carID',$last_insert_id) ;
    return $this->db->get()->result_array() ;
  }

 }
