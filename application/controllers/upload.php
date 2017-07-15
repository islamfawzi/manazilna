<?php

class Upload extends CI_Controller {

    function doUpload(){

        echo "do upload";
    }

    function index(){

        if (isset($_FILES["file"]["name"][0])) {
            $object = $_POST['object'];
            $output = "";
            $this->load->model('upload_model');
            $images = $this->upload_model->upload_image('upload/');
            $uploaded_images = array();

            foreach($images as $k => $img) {
                $image['path'] = $img;
                $image['object'] = $object;
                $this->db->insert('images', $image);
                $insert_id = $this->db->insert_id();

                $uploaded_images[$k]['path'] = $img;
                $uploaded_images[$k]['id'] = $insert_id;

            }
            echo $this->load->view("admincp/partials/images", array("images" => $uploaded_images), true);

            return;
        }else {
           $this->load->view("admincp/partials/upload_images");
        }
    }

    function delete(){

        $image_id = $_POST['image_id'];
        $this->db->select('path');
        $this->db->where("id", $image_id);
        $query = $this->db->get('images');
        $image_path = $query->first_row();

        @unlink('./'.$image_path->path);

        $this->db->where("id", $image_id);
        $this->db->delete("images");
    }
}