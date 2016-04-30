<?php
/**
 * @CreateTime: 2016/4/30 17:11
 * @Author: iteny <8192332@qq.com>
 * @blog: http://itenyblog.com
 */
namespace Hemalib;
class Functions{
    /*
     *格式化打印数组
     */
    public function p($arr){
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }
    /**
     * [doReturn 返回前端ajax处理数据结果]
     * @param  string $success [成功信息]
     * @param  string $error   [失败信息]
     * @param  [type] $status  [处理数据结果]
     * @return [type]          [description]
     */
    public function returnMsg($success = '成功',$error = '失败',$status){
        if($status !== false){
            $msg = array(
                "status" => true,
                "info" => $success
            );
            \Intendant\Model\RecordModel::record($success,1);
        } else {
            $msg = array(
                "status" => false,
                "info" => $error
            );
            \Intendant\Model\RecordModel::record($error,0);
        }
        return $msg;
    }

}