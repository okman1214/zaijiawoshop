<?php

/**
 * 核心文件
 *
 * 模型类
 *
 * @package    core
 * @copyright  Copyright (c) 2007-2016 ShopNC Inc. (http://www.shopnc.net)
 * @license    http://www.shopnc.net
 * @link       http://www.shopnc.net
 * @author     ShopNC Team
 * @since      File available since Release v1.1
 */
class watermark{

 public function watermarkOp($id)	{		 //原海报的地址    $touposter_path = BASE_UPLOAD_PATH.'/shop/common/default_wx2.jpg';//原图		    //生成带推广人参数的永久二维码   //  $qr_content =  $this->testtest();	$url = UPLOAD_SITE_URL.'/shop/member/memberqr_'.$id.'.png';//头像    $ch = curl_init ();    curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, 'GET');    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);    curl_setopt ($ch, CURLOPT_URL, $url);    ob_start ();    curl_exec ($ch);    $touqr_content = ob_get_contents();    ob_end_clean ();    $touxiangsize = 120;  //头像尺寸大小 110*110    //缩放二维码大小为需要的大小，并将二维码加入到海报中    $tou_thumb = imagecreatetruecolor($touxiangsize, $touxiangsize);//创建一个120*120图片，返回生成的资源句柄    //获取源文件资源句柄。接收参数为图片流，返回句柄    $tou_source = imagecreatefromstring($touqr_content);       //将源文件剪切全部域并缩小放到目标图片上，前两个为资源句柄    list($touWidth, $touHight, $bgType) = getimagesize($url);    imagecopyresampled($tou_thumb, $tou_source, 0, 0, 0, 0, 120, 120,$touWidth, $touHight);    //创建图片的实例，接收参数为图片    $tou_dst_qr = @imagecreatefromstring(file_get_contents($touposter_path));    //加水印    imagecopy($tou_dst_qr, $tou_thumb, 320, 450, 0, 0, $touxiangsize, $touxiangsize);    //销毁    imagedestroy($tou_thumb);       ob_start();//启用输出缓存，暂时将要输出的内容缓存起来    	imagejpeg($tou_dst_qr,BASE_TPL_PATH.'/shop/member/wxcha/member_2_'.$id.'.jpg', 100);//输出打印图片	    $tou_poster = ob_get_contents();//获取刚才获取的缓存    ob_end_clean();//清空缓存    imagedestroy($tou_dst_qr);    $poster_path = BASE_UPLOAD_PATH.'/shop/member/wxcha/member_2_'.$id.'.jpg';//保存图片 	    //生成带推广人参数的永久二维码			$qr_content =  UPLOAD_SITE_URL.'/shop/member/memberqr_'.$id.'.png';   //30day		$ch = curl_init ();    curl_setopt ($ch, CURLOPT_CUSTOMREQUEST, 'GET');    curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, false);    curl_setopt ($ch, CURLOPT_URL, $qr_content);    ob_start ();    curl_exec ($ch);    $touqr_contentnr = ob_get_contents();    ob_end_clean ();     //缩放二维码大小为需要的大小，并将二维码加入到海报中    $thumb = imagecreatetruecolor(900, 900);//创建一个300x300图片，返回生成的资源句柄    //获取源文件资源句柄。接收参数为图片流，返回句柄    $source = imagecreatefromstring($touqr_contentnr);    //将源文件剪切全部域并缩小放到目标图片上，前两个为资源句柄    imagecopyresampled($thumb, $source, 0, 0, 0, 0, 400, 400, 110, 110);    //创建图片的实例，接收参数为图片    $dst_qr = @imagecreatefromstring(file_get_contents($touposter_path));    //加水印    imagecopy($dst_qr, $thumb, 200, 500, 0, 0, 400, 400);    //销毁    imagedestroy($thumb);    ob_start();//启用输出缓存，暂时将要输出的内容缓存起来    imagejpeg($dst_qr, BASE_UPLOAD_PATH.'/shop/member/wxcha/member_2_'.$id.'.jpg', 100);//输出    $poster = ob_get_contents();//获取刚才获取的缓存    ob_end_clean();//清空缓存    imagedestroy($dst_qr);	}
	
	
}
