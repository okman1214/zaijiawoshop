<?php
/**
 * ��Ա����
 *
 * @���̳� (c) 2015-2018 33HAO Inc. (http://www.33hao.com)
 * @license    http://www.33 hao.c om
 * @link       ����Ⱥ�ţ�138182377
 * @since      ���̳��ṩ����֧�� ��Ȩ�빺��shopnc��Ȩ
 */




class member_evaluateControl extends mobileMemberControl {

    public function __construct(){
        parent::__construct();
    }
    
    /**
     * ����
     */
    public function indexOp() {
        $order_id = intval($_GET['order_id']);
        $return = Logic('member_evaluate')->validation($order_id, $this->member_info['member_id']);
        if (!$return['state']) {
            output_error($return['msg']);
        }
        extract($return['data']);
        $store = array();
        $store['store_id'] = $store_info['store_id'];
        $store['store_name'] = $store_info['store_name'];
        $store['is_own_shop'] = $store_info['is_own_shop'];

        output_data(array('store_info' => $store, 'order_goods' => $order_goods));
    }
    
    /**
     * ���۱���
     */
    public function saveOp() {
        $order_id = intval($_POST['order_id']);
        $return = Logic('member_evaluate')->validation($order_id, $this->member_info['member_id']);
        if (!$return['state']) {
            output_error($return['msg']);
        }
        extract($return['data']);
        $return = Logic('member_evaluate')->save($_POST, $order_info, $store_info, $order_goods, $this->member_info['member_id'], $this->member_info['member_name']);

        if(!$return['state']) {
            output_data($return['msg']);
        } else {
            output_data('1');
        }
    }
    
    /**
     * ׷��
     */
    public function againOp() {
        $order_id = intval($_GET['order_id']);
        $return = Logic('member_evaluate')->validationAgain($order_id, $this->member_info['member_id']);
        if (!$return['state']) {
            output_error($return['msg']);
        }
        extract($return['data']);
        $store = array();
        $store['store_id'] = $store_info['store_id'];
        $store['store_name'] = $store_info['store_name'];
        $store['is_own_shop'] = $store_info['is_own_shop'];
        
        output_data(array('store_info' => $store, 'evaluate_goods' => $evaluate_goods));
    }

    /**
     * ׷�����۱���
     */
    public function save_againOp() {
        $order_id = intval($_POST['order_id']);
        $return = Logic('member_evaluate')->validationAgain($order_id, $this->member_info['member_id']);
        if (!$return['state']) {
            output_error($return['msg']);
        }
        extract($return['data']);

        $return = Logic('member_evaluate')->saveAgain($_POST, $order_info, $evaluate_goods);
        if(!$return['state']) {
            output_data($return['msg']);
        } else {
            output_data('1');
        }
    }
    
    /**
     * ���ⶩ������
     */
    public function vrOp() {
        $order_id = intval($_GET['order_id']);
        $return = Logic('member_evaluate')->validationVr($order_id, $this->member_info['member_id']);
        if (!$return['state']) {
            output_error($return['msg']);
        }
        extract($return['data']);
        output_data(array('order_info' => $order_info));
    }
    
    /**
     * ���ⶩ�����۱���
     */
    public function save_vrOp() {
        $order_id = intval($_POST['order_id']);
        $return = Logic('member_evaluate')->validationVr($order_id, $this->member_info['member_id']);
        if (!$return['state']) {
            output_error($return['msg']);
        }
        extract($return['data']);

        $return = Logic('member_evaluate')->saveVr($_POST, $order_info, $store_info, $this->member_info['member_id'], $this->member_info['member_name']);
        if(!$return['state']) {
            output_data($return['msg']);
        } else {
            output_data('1');
        }
    }
}
