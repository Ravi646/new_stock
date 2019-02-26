<?php 
    function substrwords($text, $maxchar, $end='...') {
        if (strlen($text) > $maxchar || $text == '') {
            $words = preg_split('/\s/', $text);      
            $output = '';
            $i      = 0;
            while (1) {
                $length = strlen($output)+strlen($words[$i]);
                if ($length > $maxchar) {
                    break;
                } 
                else {
                    $output .= " " . $words[$i];
                    ++$i;
                }
            }
            $output .= $end;
        } 
        else {
            $output = $text;
        }
        return $output;
    }

    function common_pagination($base_url,$total_rows,$per_page){
        $CI =& get_instance();
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total_rows;
        $config['per_page'] = $per_page;
        // $config['uri_segment'] = 10;
        $config['num_links'] = 9 ; 
        /* Pagination Templating Starts */
        $config['full_tag_open'] = "<ul class='pagination pagination-sm no-margin'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        /* Pagination Templating Ends */
        $CI->pagination->initialize($config);
        return $CI->pagination->create_links();
    }
     function mailer($mailer_settings){
        $CI =& get_instance();
        $CI->load->library('My_PHPMailer');
        $host = (isset($mailer_settings['host']))?$mailer_settings['host']:'ssl://smtp.gmail.com';
        $smtp = (isset($mailer_settings['smtp']))?$mailer_settings['smtp']:'ssl';
        $tcp_port = (isset($mailer_settings['tcp_port']))?$mailer_settings['tcp_port']:'465';
        $from = (isset($mailer_settings['from']))?$mailer_settings['from']:'reshmadeshmukh49@gmail.com';
        $pass = (isset($mailer_settings['pass']))?$mailer_settings['pass']:'ultimatenaruto';
        $to = $mailer_settings['to'];
        $cc = (isset($mailer_settings['cc']))?$mailer_settings['cc']:'';
        $bcc = (isset($mailer_settings['bcc']))?$mailer_settings['bcc']:'';
        if (isset($mailer_settings['attachments'])) {
            if ($mailer_settings['attachments'] != '') {
                $attachments = $mailer_settings['attachments'];
            }
        }
        $subject = $mailer_settings['subject'];
        $body = $mailer_settings['body'];
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From:". $mailer_settings['host'] . "\r\n" .
        "Reply-To: successive.testing@gmail.com" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();
        $mail = new PHPMailer();

        // $mail->isMail();                  // Set mailer to use SMTP
         $mail->Host = $host;// Specify main and backup SMTP servers
        $mail->SMTPAuth = true;           // Enable SMTP authentication
       
       // $mail->SMTPDebug = 4;
        
        $mail->Username = $from; // SMTP username
        $mail->Password = $pass;   // SMTP password
        $mail->SMTPSecure = $smtp; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = $tcp_port;  // TCP port to connect to

        $mail->setFrom($from);

        if(is_array($to)){
            foreach ($to as $recepient) {
                $mail->addAddress($recepient['client_email']);     // for multiple recipient
            }
        }
        else{
            $mail->addAddress($to);     // for single recipient
        }

        // if(is_array($cc)){
        //     foreach ($cc as $ccrecepient) {
        //         $mail->addCC($ccrecepient);     // for multiple cc recipient
        //     }
        // }
        // else{
        //     $mail->addCC($cc);          // for single cc recipient
        // }

        // if(is_array($bcc)){
        //     foreach ($bcc as $bccrecepient) {
        //         $mail->addBCC($bccrecepient);   // for multiple bcc recipient
        //     }
        // }
        // else{
        //     $mail->addBCC($bcc);        // for single bcc recipient
        // }

        if (isset($attachments)) {
            if(is_array($attachments)){
                foreach ($attachments as $fileattached) {
                    $mail->addAttachment($fileattached); 
                }
            }
            else{
                $mail->addAttachment($attachments);
            }
        }

        $mail->Subject = $subject;

        if(preg_match("/([\<])([^\>]{1,})*([\>])/i", $body )){
            $mail->isHTML(true); 
            $mail->Body = $body;
        }
        else{
            $mail->Body = $body;
        }
        

        if($mail->send()){
            return 1;
        }
        else {
             return $mail->ErrorInfo;   //for getting error while mail is sent or not
//          return 0;
        }

    }
    /* Phpmailer Customize Function Ends */

    function sortBy($field, &$array, $direction = 'asc')
    {
        usort($array, create_function('$a, $b, $direction = "asc"', '
            $a = $a["' . $field . '"];
            $b = $b["' . $field . '"];

            if ($a == $b) return 0;

            $direction = strtolower(trim($direction));

            return ($a ' . ($direction == 'desc' ? '>' : '<') .' $b) ? -1 : 1;
        '));

        return true;
    }