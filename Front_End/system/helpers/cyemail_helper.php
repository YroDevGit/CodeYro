<?php


 if(! function_exists("CY_SEND_EMAIL")){
    function CY_SEND_EMAIL($sender_name, $from , $to, $subject="No Subject", $email_view="cy_email", $data = ["title" => "Welcome to CY mailer", "message" => "This is just a test codeyro mailer."]) {
        /** => Integer
         * 200 when success (CY_SUCCESS, CY_SUCCESS_CODE).
         * -1 when fail sending email.
         */
        include_once "Front_End\SystemData\Email_config.php";
        $ret = -1;
        $CY =& get_instance();
    
        $config = array(
            'protocol' => cy_protocol,
            'smtp_host' => cy_smtp_host,
            'smtp_port' => cy_smtp_port, 
            'smtp_user' => cy_smtp_user,
            'smtp_pass' => cy_smtp_pass,
            'mailtype'  => cy_mail_type, 
            'charset'   => cy_charset
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