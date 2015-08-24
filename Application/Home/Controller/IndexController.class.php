<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;
use Home\Model\PictureModel;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {

	//系统首页
    public function index(){

        $category = D('Category')->getTree();
        $lists    = D('Document')->lists(null);
        
        $path = $this->getSliderImg($lists);
        
        $this->assign('path',$path[0]);//图片路径
        $this->assign('category',$category);//栏目
        $this->assign('lists',$lists);//列表
        $this->assign('page',D('Document')->page);//分页

                 
        $this->display();
    }

    //取出首页幻灯片的封面图片作为幻灯片轮播,传入lists数组
    public function getSliderImg($lists){

        //先遍历lists数组 取出title为首页幻灯片的项
        $cover = array();
        foreach ($lists as $key => $value) {
        	if($value[title] == "首页幻灯片"){
        		$cover[] = $value[cover_id];
        	}
        }
        $pic = new PictureModel;
        return $pic->getPicture($cover);
    }


}