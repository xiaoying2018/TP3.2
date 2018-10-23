<?php

if( !function_exists('str2array') ){

    function str2array($str,$delimiter=',')
    {
        if( !is_string($str) )  return false;
        if( $str === "" )   return [];
        return explode($delimiter, $str);
    }
}

if (!function_exists('mailsend')) {
    /**
     * @param $to
     * @param $title
     * @param $content
     * @param string $back
     * @return array
     * use    mailsend('jialongfeicn@gmail.com','测试','测试')
     */
    function mailsend($to, $title, $content, $back='')
    {

    	require('./ThinkPHP/Library/Vendor/phpmailer/class.phpmailer.php');
    	try {
    		$mail = new \PHPMailer(true);
    		$mail->IsSMTP();
    		$mail->SMTPSecure = 'ssl';
    		$mail->CharSet = 'UTF-8';
            $mail->SMTPAuth = true; // 开启认证
            $mail->Port = 465;    // 网易为25
            $mail->Host = "smtp.163.com";
            $mail->Username = "zgs5999@163.com";    //qq此处为邮箱前缀名
            $mail->Password = "laozhou616888"; //开启qq邮箱SMTP服务时获得
            if ($back)// 回复地址
            {
            	$mail->AddReplyTo($back, "小莺出国");
            }else{
                $mail->AddReplyTo("zgs5999@163.com", "小莺出国");//回复地址
            }
            $mail->From = "zgs5999@163.com";
            $mail->FromName = '小莺出国';
            $mail->AddAddress($to);
            $mail->Subject = $title;
            $mail->Body = $content;
            $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示
            $mail->WordWrap = 80; // 设置每行字符串的长度
//$mail->AddAttachment("f:/test.png"); // 添加附件
            $mail->IsHTML(true);
            $mail->Send();
            return ['status'=>true,'msg'=>'success'];
        } catch (phpmailerException $e) {
        	return ['status'=>false,'msg'=>$e->errorMessage()];
        }
    }

}

if( !function_exists('check_email') ){
    /**
     * @param $email
     * @return int
     */
    function check_email($email)
    {
        // Create the syntactical validation regular expression
    	$regexp = "^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$";

        // Presume that the email is invalid
    	$valid = 0;

        // Validate the syntax
    	if (eregi($regexp, $email))
    	{
    		list($username,$domaintld) = split("@",$email);
            // Validate the domain
    		if (getmxrr($domaintld,$mxrecords))
    			$valid = 1;
    	} else {
    		$valid = 0;
    	}

    	return $valid;
    }
}

/**
 * 通过curl发送http post 请求
 *  - $header 数组形式 $header=['Content-Type:text/json','Authorization:xxxxxxx'];
 *  - $data 数组形式 $data=['param'=>$value];
 * @param $url string
 * @param $header array
 * @param $data array
 * @return array
 */
function curlPost($url,$header,$data){
	try{
		$ch = curl_init();

		if (substr($url, 0, 5) == 'https') {
            // 跳过证书检查
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // 从证书中检查SSL加密算法是否存在
            // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);// 设置请求的url
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);// 设置请求的HTTP Header
        // 设置允许查看请求头信息
        // curl_setopt($ch,CURLINFO_HEADER_OUT,true);
        curl_setopt($ch, CURLOPT_POST, true);// 请求方式是POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));// 设置发送的data
        $response = curl_exec($ch);
        // 查看请求头信息
        // dump(curl_getinfo($ch,CURLINFO_HEADER_OUT));
        if ($error = curl_error($ch)) {
            // 如果发生错误返回错误信息
        	curl_close($ch);
        	$ret=['status'=>false,'msg'=>$error];
        	return $ret;
        } else {
            // 如果发生正确则返回response
        	curl_close($ch);
        	$ret=['status'=>true,'msg'=>$response];
        	return $ret;
        }
    }catch (\Exception $exception){
    	$ret=['status'=>false,'msg'=>$exception->getMessage()];
    	return $ret;
    }
}

/**
 * 发送http POST请求 部分内容需要发送文件
 *  - 发送文件中 CURLOPT_POSTFIELDS  没有使用 http_build_query()
 *  - 如果只是发送数据请求不传送文件，使用 http_build_query()可以减少发送请求数据包大小
 *  $data 数据构造 $data['fileParam'=>curl_file_create($path,'image/jpeg'),'fileParam2'=>curl_file_create($path,'image/jpeg')]
 *      - path 必须是绝对路径，如果不是绝对路径必须使用 realpath($path)使用
 * @param $url
 * @param $header
 * @param $data
 * @return array
 */
function curlPostWithFile($url,$header,$data){
	try{
		$ch = curl_init();
		if (substr($url, 0, 5) == 'https') {
            // 跳过证书检查
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // 从证书中检查SSL加密算法是否存在
            // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);// 设置请求的url
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);// 设置请求的HTTP Header
        // 设置允许查看请求头信息
        // curl_setopt($ch,CURLINFO_HEADER_OUT,true);
        curl_setopt($ch, CURLOPT_POST, true);// 请求方式是POST
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);// 设置发送的data 使用的 multipart/form-data
        $response = curl_exec($ch);
        // 查看请求头信息
        // dump(curl_getinfo($ch,CURLINFO_HEADER_OUT));
        if ($error = curl_error($ch)) {
            // 如果发生错误返回错误信息
        	curl_close($ch);
        	$ret=['status'=>false,'msg'=>$error];
        	return $ret;
        } else {
            // 如果发生正确则返回response
        	curl_close($ch);
        	$ret=['status'=>true,'msg'=>$response];
        	return $ret;
        }
    }catch (\Exception $exception){
    	$ret=['status'=>false,'msg'=>$exception->getMessage()];
    	return $ret;
    }
}

/**
 * 发送http get请求
 * @param $url
 * @param $header
 * @param $data
 * @return array
 */
function curlGet($url,$header,$data){
	try{
		$ch = curl_init();
		if (substr($url, 0, 5) == 'https') {
            // 跳过证书检查
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // 从证书中检查SSL加密算法是否存在
            // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);// 设置请求的url
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);// 设置请求的HTTP Header
        // 设置允许查看请求头信息
        // curl_setopt($ch,CURLINFO_HEADER_OUT,true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));// 设置发送的data 使用的 multipart/form-data
        $response = curl_exec($ch);
        // 查看请求头信息
        // dump(curl_getinfo($ch,CURLINFO_HEADER_OUT));
        if ($error = curl_error($ch)) {
            // 如果发生错误返回错误信息
        	curl_close($ch);
        	$ret=['status'=>false,'msg'=>$error];
        	return $ret;
        } else {
            // 如果发生正确则返回response
        	curl_close($ch);
        	$ret=['status'=>true,'msg'=>$response];
        	return $ret;
        }
    }catch (\Exception $exception){
    	$ret=['status'=>false,'msg'=>$exception->getMessage()];
    	return $ret;
    }
}


/**
 * 获取客户端IP
 * @return array|false|string
 */
function getClientIP()
{
	global $ip;
	if (getenv("HTTP_CLIENT_IP"))
		$ip = getenv("HTTP_CLIENT_IP");
	else if(getenv("HTTP_X_FORWARDED_FOR"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if(getenv("REMOTE_ADDR"))
		$ip = getenv("REMOTE_ADDR");
	else $ip = "Unknow";
	return $ip;
}

