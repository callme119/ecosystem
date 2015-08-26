<?php
namespace Home\Widget;
use Think\Controller;
use Home\Model;
use Home\Model\DocumentModel;
use Home\Model\PictureModel;

/**
 * 图片widget
 * 用于动态调用图片地址
 */

class PictureWidget extends Controller{
	
	/* 显示指定图片的URL */
	public function getPictureUrl($id){
		//根据传入的分类信息取文档信息
		$document = array();
		$documentModel = new DocumentModel;
		$document = $documentModel->lists($id);
		//var_dump($document);

		//根据文档信息取图片信息
		$picture = array();
		$key = array();
		foreach ($document as $key => $value) {
			$pic = new Model\PictureModel;
			$picture[$key][path] = $pic->getPictureUrlById($value['cover_id']);
			$picture[$key][title] = $value['description'];
			$picture[$key][key] = $key;
		}
		$this->assign('picture', $picture);
		$this->display('Public/sliderShow');
	}

	public function getPictureUrlById($id)
        {
                $map['id'] = $id;
                $pic = new PictureModel;
                $data = $pic->field('path')->where($map)->find();
                echo $data['path'];
        }
	
}
