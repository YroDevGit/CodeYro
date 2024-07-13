<?php


 if(! function_exists("CY_SEND_EMAIL")){
    function CY_SEND_EMAIL($sender_name, $from , $to, $subject="No Subject", $email_view="cy_email", $data = ["title" => "Welcome to CY mailer", "message" => "This is just a test codeyro mailer."]) {
        /** => Integer
         * 200 when success (CY_SUCCESS, CY_SUCCESS_CODE).
         * -1 when fail sending email.
         */

        $ret = -1;
        $CY =& get_instance();
    
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587, // or 465 for SSL
            'smtp_user' => 'your_email@gmail.com',
            'smtp_pass' => 'your_email_password',
            'mailtype'  => 'html', 
            'charset'   => 'iso-8859-1'
        );
    
        $CY->email->initialize($config);
    
        $CY->email->from($from, $sender_name);
        $CY->email->to($to);
        $CY->email->subject($subject);
    
        $htmlContent = $CY->load->view('emails/'.$email_view, $data, TRUE);
    
        $CY->email->message($htmlContent);
    
        if ($CY->email->send()) {
            $ret = CY_SUCCESS_CODE;
        } else {
            $ret = -1;
            //echo $CY->email->print_debugger();
        }
        return $ret;
    }
 }

?>