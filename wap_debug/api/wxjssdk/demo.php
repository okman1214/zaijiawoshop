<?php
//header("Content-Type: text/html;charset=utf-8");
require_once "jssdk.php";
$jssdk = new JSSDK("wxa8277650681f814f", "b82cc730807ddf345b4313a66f2f040d");
$signPackage = $jssdk->GetSignPackage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="gb2312">
  <title>����</title>
</head>
<body>
   111111111111111111111111111111111
   <input type="hidden" value="123" id="uid">
   
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script>
  // ע�⣺���е�JS�ӿ�ֻ���ڹ��ںŰ󶨵������µ��ã����ںſ�������Ҫ�ȵ�¼΢�Ź���ƽ̨���롰���ں����á��ġ��������á�����д��JS�ӿڰ�ȫ�������� 
  // ��������� Android ���ܷ����Զ������ݣ��뵽�����������µİ����ǰ�װ��Android �Զ������ӿ��������� 6.0.2.58 �汾�����ϡ�
  // ���� JS-SDK �ĵ���ַ��http://mp.weixin.qq.com/wiki/7/aaa137b55fb2e0456bf8dd9148dd613f.html
  wx.config({
	debug: false,    //����
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
      // ����Ҫ���õ� API ��Ҫ�ӵ�����б���
	  'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo'
    ]
  });
  wx.ready(function () {
	  
	  var id=document.getElementById('uid').value;
	  //alert(id);
    // ��������� API
	
	//����΢������Ȧ�ӿ�
    wx.onMenuShareTimeline({
        title: '', // �������
        link: location.href+"?uid="+id, // ��������
        imgUrl: '', // ����ͼ��
        success: function () { 
            // �û�ȷ�Ϸ����ִ�еĻص�����
			alert(111);
        },
        cancel: function () { 
            // �û�ȡ�������ִ�еĻص�����
			alert(222);
        }
    });
     
	 //�����΢�Ÿ��˽ӿ�
    wx.onMenuShareAppMessage({
        title: '', // �������
        desc: '', // ��������
        link: location.href+"?uid="+id, // ��������
        imgUrl: '', // ����ͼ��
        type: '', // ��������,music��video��link������Ĭ��Ϊlink
        dataUrl: '', // ���type��music��video����Ҫ�ṩ�������ӣ�Ĭ��Ϊ��
        success: function () { 
            // �û�ȷ�Ϸ����ִ�еĻص�����
			alert(333);
        },
        cancel: function () { 
            // �û�ȡ�������ִ�еĻص�����
			alert(444);
        }
    });
     
	//��΢�ŷ���QQ�ӿ�
    wx.onMenuShareQQ({
        title: '����qq����', // �������
        desc: '΢�Ų���', // ��������
        link: location.href+"?uid="+id, // ��������
        imgUrl: '', // ����ͼ��
        success: function () { 
           // �û�ȷ�Ϸ����ִ�еĻص�����
		   alert(555);
        },
        cancel: function () { 
           // �û�ȡ�������ִ�еĻص�����
		   alert(666);
        }
    });
 
    wx.onMenuShareWeibo({
        title: '����΢��', // �������
        desc: '΢��', // ��������
        link: location.href+"?uid="+id, // ��������
        imgUrl: '', // ����ͼ��
        success: function () { 
           // �û�ȷ�Ϸ����ִ�еĻص�����
		   alert(777);
        },
        cancel: function () { 
            // �û�ȡ�������ִ�еĻص�����
			alert(888);
        }
    });
 
  });
</script>
</html>