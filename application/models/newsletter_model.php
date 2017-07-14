<?php
class Newsletter_model extends CI_Model{

    function subscribe($data, $active = 1){
      $query = $this->db->get_where('newsletter_mails', ['email' => $data['email']]);
        if($query->num_rows() == 0){
          $this->db->insert('newsletter_mails', [
            'email' => $data['email'],
            'active' => $data['active']
          ]);

        if($this->db->affected_rows() > 0){
           return 1;
        }else{
           return 0;
         }
      }else{
          return 2;
      }
    }

    function get_mailList($id = ''){
        $where = '';
        if($id != ''){
            $where = ' WHERE id = '.$id;
        }
        $query = $this->db->query("SELECT * FROM newsletter_mails ".$where." ORDER BY time DESC");
        if($query->num_rows() > 0){
            if($id != ''){
               return $query->first_row('array');
            }else{
               return $query->result();
            }

        }else{
            return 0;
        }
    }

    function exists($email = ''){
        $query = $this->db->query("SELECT * FROM newsletter_mails WHERE email = '".$email."' LIMIT 1");
        if($query->num_rows() > 0){
           return 1;
        }else{
           return 0;
        }

    }

   function update_mail($id,$data){
     $this->db->where('id',$id);
     $this->db->update('newsletter_mails',$data);
     if($this->db->affected_rows() > 0){
        return 1;
     }else{
        return 0;
     }
   }

   function del_mail($id){
    $this->db->where('id',$id);
    $this->db->delete('newsletter_mails');
    if($this->db->affected_rows() > 0){
        return 1;
    }else{
        return 0;
    }
   }


   function set_newsletter_message($title = '',$message = '',$mail_list = ''){
    if(is_array($mail_list)){
        $mail_list = implode(',',$mail_list);
    }
    $data = array('title'=>$title,
                  'message'=>$message,
                  'mails'=>$mail_list);
    $this->db->set('last_updated', 'NOW()', FALSE);
    $this->db->insert('newsletter_messages',$data);
    if($this->db->affected_rows() > 0){
        return 1;
    }else{
        return 0;
    }
   }

   function get_newsletter_message($id = ''){
    $where = '';
    if($id != ''){
        $where = ' WHERE id = '.$id;
    }
    $query = $this->db->query("SELECT * FROM newsletter_messages ".$where." ORDER BY id DESC");
    if($query->num_rows() > 0){
        if($id != ''){
            return $query->first_row('array');
        }else{
            return $query->result();
        }
    }
   }


   function update_message($id = '',$title = '',$message = '',$mail_list = ''){
    if(is_array($mail_list)){
        $mail_list = implode(',',$mail_list);
    }
    $data = array('title'=>$title,
                  'message'=>$message,
                  'mails'=>$mail_list);
    $this->db->set('last_updated', 'NOW()', FALSE);
    $this->db->where('id',$id);
    $this->db->update('newsletter_messages',$data);
    if($this->db->affected_rows() > 0){
        return 1;
    }else{
        return 0;
    }
   }


   function del_message($id){
     $this->db->where('id',$id);
     $this->db->delete('newsletter_messages');
     if($this->db->affected_rows() > 0){
        return 1;
     }else{
        return 0;
     }
   }
}
