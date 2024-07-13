<?php


 if(! function_exists("CY_SEND_EMAIL")){
    function CY_SEND_EMAIL($from, $to, ) {

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
    
        $CY->email->from('your_email@gmail.com', 'Your Name');
        $CY->email->to('recipient@example.com');
        $CY->email->subject('Email Test');
    
        $data = array(
            'title' => 'Email Title',
            'message' => 'This is an example email with HTML and CSS styling. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.'
        );
        $htmlContent = $CY->load->view('email_template', $data, TRUE);
    
        $CY->email->message($htmlContent);
    
        if ($CY->email->send()) {
            echo 'Email sent successfully!';
        } else {
            echo 'Failed to send email.';
            echo $CY->email->print_debugger();
        }
    }
 }

?>