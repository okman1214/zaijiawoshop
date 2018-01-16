<?php defined('InShopNC') or exit('Access Invalid!');?>
<style type="text/css" rel="stylesheet" href="<?php echo WAP_SITE_URL.'/templates/default/css/flea/member.css';?>"></style>
<div class="main">
<div class="ncm-flow-layout">
  <div class="ncm-flow-container">

    <form id="evalform" method="post" action="index.php?act=evaluate&op=evaluation_add&order_id=<?php echo $_GET['order_id'];?>">




<!--

      <table class="ncm-default-table deliver mb30">
        <thead>
          <tr>
            <th colspan="2">订单详情<?php //echo $lang['member_evaluation_order_desc'];?></th>
            <th>商品评分</th>
            <th>评价详情</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th colspan="20" class="tr"><span class="mr10">
              <input type="checkbox" class="checkbox vm" name="anony">
              &nbsp;匿名<?php echo $lang['member_evaluation_modtoanonymous'];?></span>
              </td>
          </tr>
          <?php if(!empty($output['order_goods'])){?>
          <?php foreach($output['order_goods'] as $goods){?>
          <tr class="bd-line">
            <td valign="top" class="w40"><div class="pic-thumb"><a href="tmpl/product_detail.html?goods_id=<?php echo $goods['goods_id']; ?>" target="_blank"><img src="<?php echo $goods['goods_image_url']; ?>"/></a></span></div></td>
            <td valign="top" class="tl w200"><dl class="goods-name">
                <dt style="width: 190px;"><a href="tmpl/product_detail.html?goods_id=<?php echo $goods['goods_id'];?>" target="_blank"><?php echo $goods['goods_name'];?></a></dt>
                <dd><span class="rmb-price"><?php echo $goods['goods_price'];?></span>&nbsp;*&nbsp;<?php echo $goods['goods_num'];?>&nbsp;件</dd>
              </dl></td>
            <td valign="top" class="w100"><div class="ncgeval mb10">
                <div class="raty">
                  <input nctype="score" name="goods[<?php echo $goods['goods_id'];?>][score]" type="hidden">
                </div>
              </div></td>
            <td valign="top" class="tr"><textarea name="goods[<?php echo $goods['goods_id'];?>][comment]" cols="150" style="width: 280px;"></textarea></td>
          </tr>
          <?php }?>
          <?php }?>
        </tbody>
      </table>
	  -->



<div class="evalu_det">
	<div class="evalu_det_img"><img src="<?php echo $goods['goods_image_url']; ?>"/></div>
	<div class="evalu_det_tit">
		<h5><?php echo $goods['goods_name'];?></h5>
		<p><span>¥<?php echo $goods['goods_price'];?></span>&nbsp;*&nbsp;<?php echo $goods['goods_num'];?>&nbsp;件</p>
	</div>
</div>
<div class="evalu_score">
	<dl><dt>商品评分：</dt>
		<dd><div class="raty"><input nctype="score" name="goods[<?php echo $goods['goods_id'];?>][score]" type="hidden">
                </div></dd></dl>
	<h5>评价详情：</h5>
	<textarea name="goods[<?php echo $goods['goods_id'];?>][comment]" cols="150" ></textarea>
	<span class="mr10">
              <input type="checkbox" class="checkbox vm" name="anony">
              &nbsp;匿名评论<?php echo $lang['member_evaluation_modtoanonymous'];?></span>
</div>








      <?php if (!$output['store_info']['is_own_shop'] && $_GET['op'] != 'add_vr') { ?>
      <?php } ?>
      <div class="ncm-default-form">
      <?php if (!$output['store_info']['is_own_shop'] && $_GET['op'] != 'add_vr') { ?>
        <dl>
          <dt>宝贝与描述相符：</dt>
          <dd>
            <div class="raty-x2">
              <input nctype="score" name="store_desccredit" type="hidden">
            </div>
          </dd>
        </dl>
        <dl>
          <dt>卖家的服务态度：</dt>
          <dd>
            <div class="raty-x2">
              <input nctype="score" name="store_servicecredit" type="hidden">
            </div>
          </dd>
        </dl>
        <dl>
          <dt>卖家的发货速度：</dt>
          <dd>
            <div class="raty-x2">
              <input nctype="score" name="store_deliverycredit" type="hidden">
            </div>
          </dd>
        </dl>
        <?php } ?>
        <div class="bottom">
          <label class="submit-border">
            <input id="btn_submit" type="submit" class="submit" value="立即提交"/>
          </label>
        </div>
      </div>
    </form>
  </div>
  <!-- <div class="ncm-flow-item">
  <?php if (!$output['store_info']['is_own_shop']) { ?>
    <?php require('evaluation.store_info.php');?>
  <?php } ?>
  </div> -->
</div>
</div>
<script type="text/javascript" src="<?php echo RESOURCE_SITE_URL;?>/js/jquery.raty/jquery.raty.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.raty').raty({
            path: "<?php echo RESOURCE_SITE_URL;?>/js/jquery.raty/img",
            click: function(score) {
                $(this).find('[nctype="score"]').val(score);
            }
        });

        $('.raty-x2').raty({
            path: "<?php echo RESOURCE_SITE_URL;?>/js/jquery.raty/img",
            starOff: 'star-off-x2.png',
            starOn: 'star-on-x2.png',
            width: 150,
            click: function(score) {
                $(this).find('[nctype="score"]').val(score);
            }
        });


        $('#btn_submit').on('click', function() {
			ajaxpost('evalform', '', '', 'onerror')
        });
    });
</script>