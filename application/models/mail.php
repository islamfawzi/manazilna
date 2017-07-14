<?php

class Mail extends CI_Model{

    function send_mail($from,$name = '',$to,$subject = '',$message ='',$alt_message = ''){
        
  
        $this->load->library('email');
        $config = Array(
            'protocol'  => 'sendmail',
            'mailtype'  => 'html', 
            'charset'   => 'utf-8',
            'wordwrap'  => TRUE
        );  
        
        $this->email->initialize($config);

		$this->email->from($from, $name);
        
		$this->email->to($to);

        $this->email->subject($subject);

		$this->email->message($message);

		$this->email->set_alt_message($alt_message);
        
      if ( ! $this->email->send())

        {
            return 2;
        }else{

       //   echo $this->email->print_debugger(); exit();

            return 1;

            $this->email->clear();

        }
    
    }

    

    

     function send_multi($from,$name = '',$list_to,$subject = '',$message ='',$alt_message = ''){
        
        $this->load->library('email');

        $config['protocol'] = 'sendmail';

		$config['charset'] = 'utf-8';

		$config['wordwrap'] = TRUE;

		$config['mailtype'] = 'html';

		$config['validate'] = TRUE;

        $this->email->initialize($config);

        

		$this->email->from($from, $name);

		$this->email->to($list_to);



		$this->email->subject($subject);

		$this->email->message($message);

		$this->email->set_alt_message($alt_message);

         

      if ( ! $this->email->send())

        {

            return 2;

        }else{

         // echo $this->email->print_debugger(); exit();

            return 1;

            $this->email->clear();

        }

    }

    

}