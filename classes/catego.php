<?php require_once '../classes/database.php';



 class categories {
    private $categorie_name;
    private $categorie_id;
    private $db;
    public function __construct() {
        $this->db = (new database) ->getconnect();
    }
    public function showCategorie(){
        try{
             $categories=$this->db->prepare("SELECT * FROM categories ");
        $categories->execute();
        return $categories->fetchALL(PDO::FETCH_ASSOC);
     }  
        
        catch(PDOException $e){
            return "ereur".$e->getMessage();
        }
       
 }}






?>