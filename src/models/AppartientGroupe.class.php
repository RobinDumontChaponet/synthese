<?php
    require_once(MODELS_INC.'Groupe.class.php');
    
    class AppartientGroupe{
        private $groupe; // var de type Groupe
        private $membres; //array de type Personne
        
        public function __construct($groupe,$membres){
            $this->setGroupe($groupe);
            $this->setMembres($membres);
        }
        
        public function getGroupe(){
            return $this->groupe;   
        }
        
        public function getMembres(){
            return $this->membres;   
        }
        
        public function setGroupe($groupe){
            if($groupe!=null && get_class($groupe)=="Groupe"){
                $this->groupe=$groupe;
            }else{
                throw new Exception("Groupe dans appartientGroupe non correct !");
            }
        }
        
        public function setMembres($mem){
            if($mem!=null && gettype($mem)=="array"){
                $this->membres=$mem;
            }else{
                throw new Exception("membres dans appartientGroupe non correct !");
            }
        }
    }
?>