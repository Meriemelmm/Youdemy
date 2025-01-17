<?php 
include_once '../classes/cour.php';
class cour_vedio extends course{
    private $content;
    public function __construct() {
         parent::  __construct() ;
    }
    public function addCour($tagid,$Categorieid,$title,$content ,$description,$teacherid){
        $data=[':tagid'=>$tagid,':categorieid'=>$Categorieid,':title'=>$title,':description'=>$description,':teacherid'=>$teacherid,':content'=>$content];
    $cour_vedio=$this->db->prepare("INSERT INTO cours (tag_id,category_id,cours_title,cours_description,teacher_id, vedio_content) 
    VALUES(:tagid,:categorieid,:title,:description,:teacherid,:content)");
    $cour_vedio->execute($data);
    }}

   

?>