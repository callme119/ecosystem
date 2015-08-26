<?php
namespace Home\Widget;
use Think\Controller;
use Home\Model;
use Home\Model\DocumentModel;

/**
 * 实验室简介widgets
 * 用于动态调用实验室简介文档
 */

class InfoWidget extends Controller{
	public function getInfoArticle($id){
		//获取实验室简介分类的一篇文章info
		$document = array();
		$documentModel = new DocumentModel;
		$documentId = $documentModel->lists($id);
		$Info = $documentModel->detail($documentId[0][id]);
		
		//获取文章封面图片
		$pic = new Model\PictureModel;
		$path = $pic->getPictureUrlById($documentId[0][cover_id]);
		$this->assign('path',$path);
		$this->assign('info',$Info);
		$this->display('Public/intro');


	}
}