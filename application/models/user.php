<?php
class User extends CI_Model{

	function get_user($username, $password){

		$query = "SELECT id FROM  users WHERE username = '".$username."' AND password = '".md5($password)."' AND user_type = 1 LIMIT 1";
        $query = $this->db->query($query);
        if($query->num_rows() > 0){
        	return $query->first_row()->id;
        }else{
        	return 0;
        }
}

	function get_logged($mac){

		$query = "SELECT logged,fullname,id  FROM  users WHERE mac = '".$mac."' AND user_type = 1 ";

        $query = $this->db->query($query);

        if($query->num_rows() > 0){

        	return $query->first_row();

        }else{

        	return 0;

        }

	}



	function get_user_fullname($userid){

		$query = "SELECT fullname FROM  users WHERE id = ".$userid;

        $query = $this->db->query($query);

        if($query->num_rows() > 0){

        	return $query->first_row()->fullname;

        }

	}



    function get_user_privacy($userid){

        $query = "SELECT privacy FROM  users WHERE id = ".$userid;

        $query = $this->db->query($query);

        if($query->num_rows() > 0){

        	$privacy = explode(',',$query->first_row()->privacy);

            return $privacy;

        }

    }

	function get_users_count(){

        return $this->db->count_all('users');;

	}

	function set_lastvisit($userid){

		$query = "UPDATE users SET lastvisit = NOW() WHERE id = ".$userid;

        $query = $this->db->query($query);

	}



	function set_remmber($userid,$mac){

		$data = array('mac' => $mac,

			          'logged' => 1);

		$this->db->where('id',$userid);

		$this->db->update('users',$data);

	}



    function logout($userid){

      $query = "UPDATE users SET logged = 0 WHERE id = ".$userid;

      $query = $this->db->query($query);

    }







    function add_user($data){

        $this->db->insert('users',$data);

        if($this->db->affected_rows() > 0){

            return 1;

        }else{

            return 0;

        }

    }



    function get_users($id = ''){

        $where = '';

        if($id != ''){

            $where = ' WHERE id = '.$id;

        }



        $query = $this->db->query("SELECT * FROM users ".$where." ORDER BY id DESC");

        if($query->num_rows() > 0){

            if($id != ''){

                return $query->first_row('array');

            }else{

                return $query->result();

            }

        }

    }



    function update_user($id,$data){

        $this->db->where('id',$id);

        $this->db->update('users',$data);

        if($this->db->affected_rows() > 0){

            return 1;

        }else{

            return 0;

        }

    }



    function del_user($id){

        $this->db->where('id',$id);

        $this->db->delete('users');

        if($this->db->affected_rows() > 0){

            return 1;

        }else{

            return 0;

        }

    }


  /** ************************************************ **/

  function signin($username, $password){

        $query = $this->db->query("SELECT id,fullname FROM  site_users WHERE username = '".$username."' AND password = '".md5($password)."'");

        if($query->num_rows() > 0){
            setcookie('aljannat_username', $username, time()*7200);
            setcookie('aljannat_fullname',$query->first_row()->fullname,time()*7200);
        	return $query->first_row()->fullname;

        }else{

        	return 0;

        }
  }

  function register($data){

        $this->db->insert('site_users',$data);

        if($this->db->affected_rows() > 0){
            setcookie('aljannat_fullname',$data['fullname'],time()*7200);
            return $data['fullname'];

        }else{

            return 2;

        }

  }

}

?>
