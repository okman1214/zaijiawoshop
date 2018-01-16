<?php
/**
 * 前台品牌分类
 */
defined('InShopNC') or exit('Access Invalid!');
class workControl extends BaseHomeControl {
    public function __construct(){
        parent::__construct();
        $key = $_POST['key'];
        if(empty($key)) {
            $key = $_COOKIE['key'];
        }
        //var_dump($key);die;
        $model_mb_user_token  = Model('mb_user_token');
        $mb_user_token_info = $model_mb_user_token->getMbUserTokenInfoByToken($key);
        if($mb_user_token_info){
          $model_member = Model('member');
          $this->member_info = $model_member->getMemberInfoByID($mb_user_token_info['member_id']);
          $this->member_info['client_type'] = $mb_user_token_info['client_type'];
        }
        if(isset($_GET['special_id'])){
            $model = Model();
            $ord['special_id'] = intval($_GET['special_id']);
            $ord['item_type'] = 'adv_list';
            $adv_list1 = $model->table('mb_special_item')->where($ord)->select();
            $title = $model->table('mb_special')->where(array('special_id'=>$_GET['special_id']))->find();
            $title = $title['special_desc'];
            foreach ($adv_list1 as $ke => $value) {
              $unserarr=unserialize($value['item_data']);
            }
            foreach ($unserarr as $k => $val) {
              foreach ($val as $key => $value) {
                $i = substr($value['image'],0,2);
                $value['i'] = $i;
                $adv_list[] = $value;
              }
            }
            Tpl::output('ord',$ord['special_id']);
            Tpl::output('title',$title);
            Tpl::output('adv_list',$adv_list);

            //获取小圆行图标
            $ord2['special_id'] = intval($_GET['special_id']);
            $ord2['item_type'] = 'home3';

            $tubiao_list1 = $model->table('mb_special_item')->where($ord2)->select();
            foreach ($tubiao_list1 as $ke => $value) {         
               $tubiao = unserialize($value['item_data']);
            }
            $list=$tubiao['item'];
            if(!empty($list)){
              foreach ($list as $ke1 => $valu1) {
                  $i = substr($valu1['image'],0,2);
                  $valu1['i'] = $i;
                  $tubiao_list[] = $valu1;

              }
            }

            Tpl::output('tubiao_list',$tubiao_list);
        }
    }
	public function indexOp(){
        $ord2['special_id'] = intval($_GET['special_id']);
        $ord2['item_type'] = 'home2';
        $model_mb = Model();
        $tubiao_list1 = $model_mb->table('mb_special_item')->where($ord2)->select();
        foreach ($tubiao_list1 as $ke => $value) {         
           $tubiao = unserialize($value['item_data']);
        }
        $home2_list=$tubiao;
        $i = substr($home2_list['square_image'],0,2);
        $home2_list['i'] = $i;
 
        Tpl::output('home2_list',$home2_list);

		 $model = Model('classify_category');
		//获取求职分类       
		 $work_list = $model->table('classify_category')->where(array("gc_parent_id"=>0))->select();
        foreach ($work_list as $k => $v) {
            $work_list[$k]=$v;
            $work_list[$k]['son']=$model->table('classify_category')->where(array("gc_parent_id"=>$v['gc_id']))->select();
        }
        Tpl::output('work_list',$work_list);

        $attrs_list = $model->table('life_cate_attr')->where($dataattr)->select();
		$link_list = $model->table('link')->order('link_id')->limit(12)->select();
		Tpl::output('link_list',$link_list);        
		Tpl::output('attrs_list',$attrs_list);
		Tpl::showpage('work');
    }
    
    
    public function work_listOp(){
        $model = Model();
        $title = "招聘职位";
        $model_classify = Model('classify_category');
        if($_GET['type'] == "one" ){    	   
                     
            $condition['topid'] = $_GET['gcid'];           
        }else if($_GET['type'] == "two" ){           
            $condition['fcid'] = $_GET['gcid'];
        }else if($_GET['type'] == "three"){
            $condition['cid'] = $_GET['gcid'];
        }
        if(isset($_POST['keyword'])){            
            $condition['title'] = array('like',"%{$_POST['keyword']}%");
        }
        
        //获取子分类
        if(isset($condition['fcid'])){

            $worker_class_list = $model->table('classify_category')->where(array('gc_parent_id'=>$condition['fcid']))->select();
            //var_dump($worker_class_list);die;
            Tpl::output('worker_class_list',$worker_class_list);
        }
    	
    	$worker_list = $model->table('class_input')->where($condition)->order('work_addtime DESC')->select();
        Tpl::output('title',$title);
        Tpl::output('worker_list',$worker_list);
    	Tpl::showpage('work_list');
    }

    public function work_detailOp(){
        $title = "招聘详情";
        $data['id'] = $_GET['mid'];
        $model_l = Model('class_input');
        $clsaai_list = $model_l->where($data)->order('')->select();
        Tpl::output('title', $title);
        Tpl::output('clsaai_list', $clsaai_list);
        foreach ($clsaai_list as $key => $value) {
            $condition['bus'] = $value['bus'];
            $clsaai_list1 = $model_l->where($condition)->order('')->limit('8')->select();
            Tpl::output('clsaai_list1', $clsaai_list1); 
        }
        //var_dump($clsaai_list);

        Tpl::showpage('work_detail');
    }

    //add by xzx   添加发布工作岗位展示页面
    public function work_addOp(){
        $title= "发布信息";
        $model=Model('classify_category');
        //岗位的一级分类
        $work_list = $model->select();
        $tree=$model->getSubs($work_list);
        //var_dump($work_list);
        Tpl::output('tree',$tree);
        //职位区域-省
        $area=Model('area');
        $area_list=$area->where(array('area_parent_id'=>0))->select();
        Tpl::output('work_list',$work_list);
        Tpl::output('title',$title);
        Tpl::output('area_list',$area_list);
        Tpl::showpage('work_list_add');

    }

    //add by xzx  处理发布工作岗位
    public function do_work_addOp(){
        if($_SESSION['work_token'] == $_POST['work_token']){

        
        $data['title']= isset($_POST['title']) ? $_POST['title'] : 0;
        $data['lxname']= isset($_POST['lxname']) ? $_POST['lxname'] : 0;
        $data['lxtel']= isset($_POST['lxtel']) ? $_POST['lxtel'] : 0;
        $data['uid'] = $this->member_info['member_id'];
        $ar=explode(',',$_POST['cid']);
        $data['topid'] = $ar['0'];
        $data['fcid'] = isset($ar['1'])?$ar['1']:"";
        $data['cid'] = isset($ar['2'])?$ar['2']:"";
        //$data['cid']= isset($_POST['cid']) ? $_POST['cid'] : 0;
        $data['work_money']= isset($_POST['work_money']) ? $_POST['work_money'] : 0;
        $data['work_name']= isset($_POST['work_name']) ? $_POST['work_name'] : 0;
        $data['bus']= isset($_POST['bus']) ? $_POST['bus'] : 0;
        $data['work_address']= isset($_POST['work_address']) ? $_POST['work_address'] : 0;
        $data['description']= isset($_POST['description']) ? $_POST['description'] : 0;
        $data['size']= isset($_POST['size']) ? $_POST['size'] : 0;
        $data['property']= isset($_POST['property']) ? $_POST['property'] : 0;
        $data['area']= isset($_POST['area']) ? $_POST['area'] : 0;
        $data['tell_description']= isset($_POST['tell_description']) ? $_POST['tell_description'] : 0;
        $data['work_addtime'] = time();
        $goods=isset($_POST['box']) ? $_POST['box'] : 0;
        
        //var_dump($data);
        if(empty($data['title'])){
            showMessage('标题为空');
        }
        if(empty($data['lxname'])){
            showMessage('联系人姓名为空');
        }
        if(empty($data['lxtel'])){
            showMessage('联系人手机号为空');
        }
        if(empty($data['cid']) && empty($data['topid']) && empty($data['fcid'])){
            showMessage('选择分类为空');
        }
        if(empty($data['work_money'])){
            showMessage('薪资为空');
        }
        if(empty($data['work_name'])){
            showMessage('职位为空');
        }
        if(empty($data['bus'])){
            showMessage('公司名称为空');
        }
        if(empty($data['work_address'])){
            showMessage('工作地址为空');
        }
        if(empty($goods)){
            showMessage('公司福利为空');
        }
        if(empty($data['size'])){
            showMessage('公司规模为空');
        }
        if(empty($data['property'])){
            showMessage('公司性质为空');
        }
        if(empty($data['area'])){
            showMessage('区域为空');
        }
        foreach ($goods as $v) {
            $data['goods'].=$v.',';
        }
        //var_dump($data);die;
        $model=Model('class_input');
        $result=$model->insert($data);
        // echo "<pre>";
        // var_dump($data);
        // var_dump($result);die;
        if($result){
            unset($_SESSION['work_token']);
            showMessage('发布成功',"index.php?act=work&op=work_list&gcid=44&type=one");
        }else{
            showMessage('发布失败');
        }
        }else{
            header("Location: index.php?act=work&op=work_list&gcid=44&type=one");
        }
    }
    //简历展示
    public function work_jianli_listOp(){
        
        $model_classify_category    = Model('classify_category');
        $model_classify_member_info = Model('classify_member_info');
        $jianli_class = $model_classify_category->where(array('gc_parent_id'=>0))->select();
        foreach ($jianli_class as $k => $v) {
            $jianli_class[$k]=$v;
            $jianli_class[$k]['son']=$model_classify_category->where(array("gc_parent_id"=>$v['gc_id']))->field('gc_id,gc_name')->select();
        }
        // echo "<pre>";
        // var_dump($jianli_class);
        Tpl::output('jianli_class',$jianli_class);
        Tpl::output('title','简历分类');
        
        $jianli_list = $model_classify_member_info->where($where)->order('jl_id')->select();

        Tpl::showpage('work_jianli_list');
    }
    //某类下的简历
    public function work_jianli_class_listOp(){
        $model_classify_member_info = Model('classify_member_info');
        if($_GET['type'] == 'one'){
            $where['topid'] = $_GET['gcid']; 
        }
        if($_GET['type'] == 'two'){
            $where['fcid'] = $_GET['gcid'];
        }
        $jianli_list = $model_classify_member_info->where($where)->order('jl_addtime DESC')->select();
        Tpl::output('title','简历信息');
        Tpl::output('jianli_list',$jianli_list);
        Tpl::showpage('work_jianli_class_list');
    }
    //简历详情
    public function work_jianli_detailOp(){
        $model_classify_member_info = Model('classify_member_info');
        $where['jl_id'] = $_GET['jlid'];
        $jianli_list = $model_classify_member_info->where($where)->order('jl_addtime DESC')->select();
        Tpl::output('title','简历详情');
        Tpl::output('jianli_list',$jianli_list);
        Tpl::showpage('work_jianli_detail');

    }
    //生成f发布简历页面
    public function jianliOp(){
        $title= "简历信息";
        $model=Model('classify_category');
        $work_list = $model->select();       
        $tree=$model->getSubs($work_list);
        Tpl::output('tree',$tree);

        //职位区域-省
        $area=Model('area');
        //$data2['area_parent_id'] = 
        $area_list1=$area->where(array("area_deep"=>'1'))->select();
        $area_list2=$area->where(array("area_deep"=>'2'))->select();
        $area_list3=$area->where(array("area_deep"=>'3'))->select();
        foreach ($area_list2 as $k2 => $v2) {
            foreach ($area_list3 as $k3 => $v3) {
               if($v2['area_id'] ==$v3['area_parent_id']){
                $area_list2[$k2]['son'][] = $v3;
               }
            }
        }
        Tpl::output('work_list',$work_list);
        Tpl::output('title',$title);
        Tpl::output('area_list2',$area_list2);        
        Tpl::showpage('work_jianli');

    }
    //添加简历
    public function do_work_jianliOp(){
        if(!($_SESSION['jl_token'] == $_POST['jl_token'])){
            header("Location: index.php?act=work&op=work_jianli_class_list");
        }else{
            $data['uid'] = $this->member_info['member_id'];
            $data['mem_name'] = $this->member_info['member_name'];
            $data['title']= isset($_POST['title']) ? $_POST['title'] : 0;
            $ar=explode(',',$_POST['cid']);
            $data['topid'] = $ar['0'];
            $data['fcid'] = isset($ar['1'])?$ar['1']:"";
            $data['cid'] = isset($ar['2'])?$ar['2']:"";              
            $data['askmoney']= isset($_POST['askmoney']) ? $_POST['askmoney'] : 0;
            $data['jingyan']= isset($_POST['jingyan']) ? $_POST['jingyan'] : 0;
            $data['xuewei']= isset($_POST['xuewei']) ? $_POST['xuewei'] : 0;
            $data['work_name']= isset($_POST['work_name']) ? $_POST['work_name'] : 0;
            $data['name']= isset($_POST['membername']) ? $_POST['membername'] : "";
            $data['mphone']= isset($_POST['mphone']) ? $_POST['mphone'] : "";
            $data['phone']= isset($_POST['phone']) ? $_POST['phone'] : "";
            $data['sex'] = isset($_POST['box']) ? $_POST['box'] : 0;
            $data['btime'] = isset($_POST['time']) ? $_POST['time'] : 0;
            $data['s_province']= isset($_POST['s_province']) ? $_POST['s_province'] : 0;
            $data['s_city']= isset($_POST['s_city']) ? $_POST['s_city'] : 0;
            $data['s_county']= isset($_POST['s_county']) ? $_POST['s_county'] : 0;
            $data['xxarea']= isset($_POST['area_r']) ? $_POST['area_r'] : 0;
            $data['jl_addtime'] = time();
            
            $data['des_self']= isset($_POST['self_description']) ? $_POST['self_description'] : 0;
            //echo "<pre>";
           //var_dump($data);die;
            //var_dump($data);
            if(empty($data['title'])){
                showMessage('标题为空');
            }
            if(empty($data['name'])){
                showMessage('联系人姓名为空');
            }
            if(empty($data['mphone'])){
                showMessage('联系人手机号为空');
            }
            if(empty($data['cid']) && empty($data['topid']) && empty($data['fcid'])){
                showMessage('选择分类为空');
            }
            if(empty($data['askmoney'])){
                showMessage('薪资为空');
            }
            if(empty($data['work_name'])){
                showMessage('职位为空');
            }
            
            if(empty($data['s_province']) && empty($data['s_city']) && empty($data['s_county'])){
                showMessage('工作地址为空');
            }
            $model=Model('classify_member_info');
            $result=$model->insert($data);
            if($result){
                unset($_SESSION['jl_token']);
                showMessage('发布成功',"index.php?act=work&op=work_jianli_class_list");
            }else{
                showMessage('发布失败');
            }
        }
    }


}