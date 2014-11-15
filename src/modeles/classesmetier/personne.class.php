	public function setIdAncien($idAncien)
	{
		if(($idAncien != null) and ($idAncien > 0))
		{
			$this->idAncien = $idAncien;
		}else
		{
			throw new Exception("Id ancien invalide");
		}
	}
