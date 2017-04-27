<?php
/**
 * 数据结构线性表的顺序存储实现
 * @author      李文瑞 <164798922@qq.com>
 * @date        2017-04-26
 *
 * 链表操作
 * InitList(L)：         初始化链表
 * DestroyList(L)：      删除连接
 * ClearList(L)：        清空链表
 * ListEmpty(L)：        判断是否为空
 * ListLength(L)：       链表长度
 * getElem(L,i)：        取出元素
 * getAllElem(L)：       取出所有元素
 * LocateElem(L,e)：     判断e是否在链表中
 * ListInsert(L,i,e)：   插入元素
 * ListDelete(L,i,)：    删除元素
 */

class linearList{
    const MAXLENGTH = 20;//链表的最大容量

    private $list;
    private $size;

    public function __construct(){

    }


    public function InitList(){
        $this->list = array();
        $this->size = 0;
    }

    public function DestroyList(){
        unset($this->list);
        $this->size = 0;
    }

    public function ClearList(){
        $this->InitList();
    }

    public function ListEmpty(){
        if($this->size == 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function ListLength(){
        return $this->size;
    }

    public function getElem($key){
        if(isset($this->list[$key])){
            return $this->list[$key];
        }else{
            return FALSE;
        }
    }

    public function getAllElem(){
        if($this->size === 0){
            return FALSE;
        }

        return $this->list;
    }

    public function LocateElem($value){
        if(empty($value)){
            return FALSE;
        }

        for ($i=0; $i < $this->size; $i++) {
            if($this->list[$i] === $value){
                return TRUE;
            }
        }
    }

    public function ListInsert($key,$value){
        if(empty($value)){
            return FALSE;
        }

        //限制链表的最大个数
        if($this->size >= self::MAXLENGTH){
            return FALSE;
        }

        //key的位置只能是size后面一位之前的位置
        if($key > $this->size){
            return FALSE;
        }

        if($this->size == 0){
            $this->list[0] = $value;
        }else{
            //将key之后的值向后移动一位
            for ($i=$this->size; $i > $key; $i--) {
                $this->list[$i] = $this->list[$i-1];
            }

            //给key赋值
            $this->list[$key] = $value;
        }

        $this->size++;

        return TRUE;
    }


    public function ListDelete($key){
        if(!isset($this->list[$key])){
            return FALSE;
        }

        //将key之后的值向后移动一位
        for ($i=$key; $i < $this->size-1; $i++) {
            $this->list[$i] = $this->list[$i+1];
        }

        //删除移动后的最后一位
        unset($this->list[$this->size-1]);

        $this->size--;
        return TRUE;
    }

}

$linearList = new linearList();

$x = $linearList->ListInsert(0,'11111');

$x = $linearList->ListInsert(0,'00000');

$x = $linearList->ListInsert(2,'22222');

$x = $linearList->ListDelete(1);

$x = $linearList->getAllElem();
var_dump($x);
/**
 @debug 李文瑞
 */
echo "arr:";
echo "<pre>";
    print_r($linearList);
echo "</pre>";
echo '<hr>';