
<?php
      
      $errors = array();

      // Check if email has been entered and is valid
      if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'メールアドレスエラー';
      }

      $errorOutput = '';

      if(!empty($errors)){

            $errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
            $errorOutput .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

            $errorOutput  .= '<ul>';

            foreach ($errors as $key => $value) {
                  $errorOutput .= '<li>'.$value.'</li>';
            }

            $errorOutput .= '</ul>';
            $errorOutput .= '</div>';

            echo $errorOutput;
            die();
      }

      $email = $_POST['email'];
      $from = $email;
      $to = 'tokyoart1@gmail.com';  // please change this email id
      $subject = '【クロッキー会】メール配信希望';
      
      $body = "From: E-Mail: $email\n メール配信希望を受信しました。";

      $headers = "From: ".$from;

      //send the email
      $result = '';
      if (mail ($to, $subject, $body, $headers)) {
            $result .= '<div class="alert alert-success alert-dismissible" role="alert">';
            $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
            $result .= 'ご登録ありがとうございました。正常にメール配信希望を受け付けました。';
            $result .= '</div>';

            echo $result;
            die();
      }

      $result = '';
      $result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
      $result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
      $result .= '申し訳ありません。エラーが発生しました。再度お試しいただくか、tokyoart1@gmail.comのアドレスまでメールにてご希望ください。';
      $result .= '</div>';

      echo $result;
