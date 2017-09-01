<?php
namespace Home\Controller;
use Think\Controller;
Class SliderController extends Controller {
	Public function __construct()
    {
    	parent::__construct();
		//实例化数据库
		$this->db=M("slider");
    }
	//轮播图列表
	Public function index(){
		$this->data=$this->db->order("sort asc")->select();
		$this->display();
	}
	//添加轮播图
	Public function addSlider(){
		if(!empty($_GET['id'])){
			$id=$_GET['id'];
			$this->data=$this->db->where(['id'=>$id])->find();
		}
		$this->display('add');
	}
	//添加轮播图列表方法
	Public function addSliderHandler(){
		if($this->db->add($_POST)){
			$this->success("添加成功",U('index'));
		}else{
			$this->error("添加失败");
		}
	}
	Public function Upload(){
		$load=new \Think\Upload();
		$load->autoSub=false;
		$load->exts=array('jpg','gif','jpeg','png');
		$upload->rootPath = './Uploads/';
		$this->saveName=array('date','Ymd');
		$info=$load->Upload();
		if(!$info){
			echo "error";
		}else{
			echo json_encode($info);
		}
	}
	//排序
	Public function newSort(){
		$id=$_POST['id'];
		$sort=$_POST['sort'];
		$is=$this->db->where(['id'=>$id])->setField("sort",$sort);
		if(!$is){
			$data['error']=1;
			$data['msg']='操作失败';
		}else{
			$data['error']=0;
			$data['msg']='操作成功';
		}
		$this->ajaxReturn($data,'json');
	}
	Public function delData(){
		$id=$_GET['id'];
		if($this->db->delete($id)){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
}
?>