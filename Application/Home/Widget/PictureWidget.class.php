<?php
namespace Home\Widget;
use Think\Controller;
use Home\Model;

/**
 * 图片widget
 * 用于动态调用图片地址
 */

class PictureWidget extends Controller{
	
	/* 显示指定图片的URL */
	public function getPictureUrl($id){
		$pic = new Model\PictureModel;
		echo $pic->getPictureUrlById($id);
		return "hello";
	}
	
}
