<?php

class DAOAccount extends DAO{
  private $account;
  
  public function __construct($A) {
    $this->account = $A;
	$this->connexion = null;
  }
  
  public function connect(){
	  
	try{
		$this->connexion = new PDO("mysql:host=" . PDO_HOST . ";"."dbname=" . PDO_DBBASE, PDO_USER, PDO_PW);
	}catch (PDOException $e){
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}  	  
  }

  public function getAccount() {
     return $this->account;
  }
  
  public function setAccount($A) {
       $this->account = $A;
  }

  public function add() {
      
	try{
		$this->connect();
		$query = " INSERT INTO Account values(:id,:firstname, :lastname, username:, :birthdate, :mail, :password, :createAt,
        :lastconnexion, :pictureURL, :role_id)"; 
		$data = array( 
		':id'=>$this->account->getId(),
		':firstname'=> $this->account->getFirstname(), 
		':lastname'=>$this->account->getLastname()
		':username'=>$this->account->getUsername()
		':birthdate'=>$this->account->getBirthdate()
		':mail'=>$this->account->getMail()
		':createAt'=>$this->account->getCreateAt()
		':lastconnexion'=>$this->account->getLastconnexion()
		':pictureURL'=>$this->account->getPictureURL()
		':role_id'=>$this->account->getRole_id()


		);
		$sth = $this->connexion->prepare( $query );
		$res=$sth->execute( $data );
		$this->connexion = null;
		//pour ajouter
		$resaccount=true;
		foreach($this->account->getAccount() as $account){
			$undaoaccount=new DAOAccount($account);
			$resaccount=$resadresse and $undaoaccount->add();
		}
		return $res and $resaccount;
	}catch (PDOException $e){
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}
  }
  
   public function delete() {
      
	try{
		$this->connect();
		$query = " delete from account where id=:id "; 
		$data = array( 
		':id'=>$this->account->getId(),
		);
		$sth = $this->connexion->prepare( $query );
		$res=$sth->execute( $data );
		$this->connexion = null;
		//pour supprimer tous les adresses de la bdd
		$resaccount=true;
		foreach($this->personne->getAccount() as $account){
			$undaoaccount=new DAOAccount($account);
			$resaccount=$resaccount and $undaoaccount->delete();
		}	
		return $res and $resaccount;
	}catch (PDOException $e){
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}
  }
  
     public function update() {
      
	try{
		$this->connect();
		$query = " update Personne set id =:id, firstname=:firstname , lastname = :lastname, username=:username,
        birthdate =:birthdate, mail =:mail, createAt =:createAt, lastconnexion =:lastconnexion,
        pictureURL =:pictureURL, role_id =:role_id where id=:id "; 
		$data = array( 
            ':id'=>$this->account->getId(),
            ':firstname'=> $this->account->getFirstname(), 
            ':lastname'=>$this->account->getLastname()
            ':username'=>$this->account->getUsername()
            ':birthdate'=>$this->account->getBirthdate()
            ':mail'=>$this->account->getMail()
            ':createAt'=>$this->account->getCreateAt()
            ':lastconnexion'=>$this->account->getLastconnexion()
            ':pictureURL'=>$this->account->getPictureURL()
            ':role_id'=>$this->account->getRole_id()
		);
		$sth = $this->connexion->prepare( $query );
		$res=$sth->execute( $data );
		$this->connexion = null;
		//pour modifier tous les adresses de la bdd
		$resadresse=true;
		foreach($this->account->getAccount() as $account){
			$undaoaccount=new DAOAccount($account);
			$resaccount=$resaccount and $undaoaccount->update();
		}	
		return $res and $resaccount;
	}catch (PDOException $e){
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}
  }
  
}


?>
