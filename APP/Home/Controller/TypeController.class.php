<?php
namespace Home\Controller;
use Think\Controller;
class TypeController extends Controller {
    public function index(){
    	$Data=M("type")->field(" * ,concat(path,id) pp")->order("pp asc")->select();
//		$this->rep=explode(',', $Data['path']);
//		print_r($Data['path']);
		foreach($Data as $key=>$v){
			
			$Data[$key]['str']=count(explode(',', $v['path']))-2;
		}
		$this->Data=$Data;
    	$this->display('list');
    }
	public function add(){
		$this->pid=I("pid",0);
		$this->display();
	}
	public function addHandler(){
		if(!IS_POST) E("不存在的页面");
		if(M("type")->add($_POST)){
			$this->success("添加成功",U("index"));
		}else{
			$this->error("添加失败");
		}
	}
}