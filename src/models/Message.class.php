<?php

class Message
{
    private $id;
    private $dateMessage;
    private $expediteur;
    private $anciens;
    private $objet;
    private $message;
    private $lu;

    public function __construct($id, $dateMessage, $anciens, $expediteur, $objet, $message, $lu)
    {
        $this->setId($id);
        $this->setDateMessage($dateMessage);
        $this->setAnciens($anciens);
        $this->setExpediteur($expediteur);
        $this->setObjet($objet);
        $this->setMessage($message);
        $this->setLu($lu);
    }

    //-------------------------------------------------GETTERS---------------------------------------------------
    public function getId()
    {
        return $this->id;
    }

    public function getDateMessage()
    {
        return $this->dateMessage;
    }

    public function getAnciens()
    {
        return $this->anciens;
    }

    public function getExpediteur()
    {
        return $this->expediteur;
    }

    public function getObjet()
    {
        return $this->objet;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getLu()
    {
        return $this->lu;
    }

    //-------------------------------------------------SETTERS---------------------------------------------------

    public function setId($id) {
		if ($id >= 0)
			$this->id = $id;
		else
			throw new Exception("Id message incorrect");
	}

    public function setDateMessage($date)
    {
        $this->dateMessage = $date;
    }

    public function setAnciens($anciens)
    {
        if($anciens != null)
            $this->anciens = $anciens;
        else
            throw new Exception("anciens dans message est/sont incorrects");
    }

    public function setExpediteur($expediteur)
    {
        if ($expediteur != null)
            $this->expediteur = $expediteur;
        else
            throw new Exception('expediteur dans message est incorrect');
    }

    public function setObjet($objet)
    {
        if ($objet != '')
            $this->objet = $objet;
        else
            $this->objet = 'Aucun objet';
    }

    public function setMessage($message)
    {
        if ($message != '')
            $this->message = $message;
        else
            throw new Exception('Message dans Message incorrect !');
    }

    public function setLu($lu)
    {
        if(is_numeric($lu) && ($lu >= 0) && ($lu <=1))
            $this->lu = $lu;
        else
            throw new Exception('Lu dans Message est incorrect !');
    }


    //-------------------------------------------------toString---------------------------------------------------
    public function __toString()
    {
        return 'Id : '.$this->id.'Expediteur : '.$this->expediteur.' Ancien(s)'.$this->anciens.' Objet : '.$this->objet.' Message : '.$this->message.' Date : '.$this->dateMessage;
    }
}

?>
