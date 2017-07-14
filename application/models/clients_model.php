<?php
class Clients_model extends CI_Model {

    function add_client($data) {
        $this->db->insert('clients', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function clientSignIn($data) {

        extract($data);
        $result = $this->db->get_where('clients', array('email' => $email));

        if ($result->num_rows() > 0) {
            $user = $result->first_row();
            if ($user->password === $password) {
                $this->session->set_userdata(array(
                    'loggedIn' => TRUE,
                    'user' => $user
                ));
                $_token = '';
                if ($remember_me == 'on') {
                    $_token = uniqid(time());
                    setcookie('remember_me_token', $_token, time()+604800);
                }
                $this->db->query("UPDATE `clients` SET `visits` = `visits` + 1, `remember_me_token` = '$_token' WHERE `id` = " . $user->id);
            } else {
                $this->session->set_userdata(array(
                    'loggedIn' => FALSE
                ));
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getRememberedUser(){
      if($token = $_COOKIE['remember_me_token']){
          $user = $this->db->get_where('clients', array('remember_me_token' => $token))->first_row();
          $this->clientSignIn(array(
            'email' => $user->email,
            'password' => $user->password,
            'remember_me' => 'on'
          ));
      }
    }

    function get_clients($id = '') {
        $where = '';
        if ($id != '') {
            $and = ' WHERE clients.id = ' . $id;
        }
        $query = $this->db->query("SELECT clients.*,gallery.image as img "
                . " FROM clients LEFT JOIN gallery "
                . "ON clients.image = gallery.id  " . $and . " ORDER BY id DESC ");
        if ($query->num_rows() > 0) {
            if ($id != '') {
                return $query->first_row('array');
            } else {
                return $query->result();
            }
        }
    }

    function get_client() {
        $query = $this->db->query("SELECT clients.*,gallery.image as img FROM clients LEFT JOIN gallery ON clients.image = gallery.id WHERE clients.active = 1 ORDER BY id DESC");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function get_clients_where($where = '') {
        if ($where != '') {
            $where = 'WHERE ' . $where;
        }
        $query = $this->db->query("SELECT * FROM clients " . $where . " ORDER BY id DESC LIMIT 2 ");
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    function update_client($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('clients', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function del_client($id) {
        $this->db->where('id', $id);
        $this->db->delete('clients');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

}
