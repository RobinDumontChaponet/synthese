<?php
    class Groupe{
        
        private $id;
        private $nom;
        private $createur;
        private $type;
        
        public function __construct($id,$nom,$createur,$type){
            $this->setId($id);
            $this->setNom($nom);
            $this->setCreateur($createur);
            $this->setType($type);
        }
        
        // Getters
        public function getId(){
            return $this->id;   
        }
        
        public function getNom(){
            return $this->nom;
        }
        
        public function getCreateur(){
            return $this->createur;   
        }
        
        public function getType(){
            return $this->type;   
        }
        
        //setters
        
        public function setId($id){
            if($id!=null && $id>-1 && is_numeric($id)){
                $this->id=$id;   
            }else{
                throw new Exception('groupe.class.php -> id incorrect : '.'"'.$id.'"');   
            }
        }
        
        public function setNom($nom){
            if($nom!=null && is_string($nom) && trim($nom)!=""){
                $this->nom=$nom;
            }else{
                throw new Exception('groupe.class.php -> nom incorrect : '.'"'.$nom.'"');   
            }
        }
        
        public function setCreateur($c){
            if(get_class($c)=="Personne"){
                $this->createur=$c;   
            }else{
                $this->createur=null;   
            }
        }
        
        public function setType($t){
            if($t!=null && is_string($t) && trim($t)!=""){
                $this->type=$t;   
            }else{
                throw new Exception('groupe.class.php -> type incorrect : '.'"'.$t.'"');
            }   
        }
    }
?>