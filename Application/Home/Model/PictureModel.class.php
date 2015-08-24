<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: dhy<275111108@qq.com>
// +----------------------------------------------------------------------

namespace Home\Model;
use Think\Model;

/**
 * 图片模型
 */
class PictureModel extends Model{
	//根据取出的coverid再去取对应的图片信息
	public function getPicture($cover){		
        $map = array();
        $pic = array();
        foreach ($cover as $value) {
        	$map['id'] = (int)$value	;       	
        	$pic[] = $this->field('path')->where($map)->find();
        }
        return $pic;
	}
}