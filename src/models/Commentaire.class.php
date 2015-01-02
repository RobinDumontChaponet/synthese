<?php
    class Commentaire{
        
        private $id;
        private $pers;
        private $post;
        private $date;
        private $contenu;
        
        public function __construct($id,$pers,$post,$date,$contenu){
            $this->setId($id);
            $this->setPers($pers);
            $this->setPost($post);
            $this->setDate($date);
            $this->setContenu($contenu);
        }
        
        // Getters
        public function getId(){
            return $this->id;   
        }
        
        public function getPers(){
            return $this->pers;
        }
        
        public function getPost(){
            return $this->post;   
        }
        
        public function getDate(){
            return $this->date;   
        }
        
        public function getContenu(){
            return $this->contenu;   
        }
        
        //setters
        
        public function setId($id){
            if($id!=null && $id>-1 && is_numeric($id)){
                $this->id=$id;   
            }else{
                throw new Exception('groupe.class.php -> id incorrect : '.'"'.$id.'"');   
            }
        }
        
        public function setPers($pers){
            if($pers!=null){
                $this->pers=$pers;
            }else{
                 throw new Exception('Personne dans commentaire null');  
            }
        }
        
        public function setPost($post){
            $this->post=$post;   
        }
        
        public function setDate($date){
            $this->date=$date;   
        }
        
        public function setContenu($contenu){
            $this->contenu=$contenu;   
        }
    }
?>