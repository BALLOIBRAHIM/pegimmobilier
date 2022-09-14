

<?php

require 'erreur.php';

class message{
    
    public $id_envoyeur;
    public $id_envoyer;
    public $id_receveur;
    public $objet_msg;
    public $contenu_msg;
    public $date_msg;
    public $statuts;

  
    function __construct($id_envoyer,$id_envoyeur,$id_receveur,$objet_msg,$contenu_msg,$date_msg,$statuts){
        $this->id_envoyer=$id_envoyer;
        $this->id_envoyeur=$id_envoyeur;
        $this->id_receveur=$id_receveur;
        $this->objet_msg=$objet_msg;
        $this->contenu_msg=$contenu_msg;
        $this->date_msg=$date_msg;
        $this->statuts=$statuts;
        
    }

    //message envoyé dans la table message <message>
    public function insert_message(){
        $cnx=new PDO('mysql:host=localhost;dbname=pegimmobiliere','root','');
        $req="INSERT INTO `message` (`id`,`id_envoyer`, `id_envoyeur`, `id_receveur`, `objet`, `contenu`, `date`, `statuts`)
        VALUES (NULL, '$this->id_envoyer', '$this->id_envoyeur','$this->id_receveur', '$this->objet_msg', '$this->contenu_msg', '$this->date_msg', '$this->statuts')
        ";
       $pre=$cnx->prepare($req);
       
       $ex=$pre->execute(array());
      
    }
    //message envoyé dans la table message <m_envoi>
    public function envoi_message(){
        $cnx=new PDO('mysql:host=localhost;dbname=pegimmobiliere','root','');
        $req="INSERT INTO `m_envoi`(`id`,`id_envoyer`,`id_envoyeur`, `id_receveur`, `objet`, `contenu`, `date`, `statut`)
        VALUES (NULL,'$this->id_envoyer', '$this->id_envoyeur', '$this->id_receveur', '$this->objet_msg', '$this->contenu_msg', '$this->date_msg', '$this->statuts')
        ";
       $pre=$cnx->prepare($req);
       
       $ex=$pre->execute(array());
      
    }

    public function reponse_message(){
        $cnx=new PDO('mysql:host=localhost;dbname=pegimmobiliere','root','');
        $req="INSERT INTO `m_reponse`(`id`, `id_envoyer`, `id_envoyeur`, `id_receveur`, `objet`, `contenu`, `date`, `statut`)
        VALUES (NULL,'$this->id_envoyer', '$this->id_envoyeur', '$this->id_receveur', '$this->objet_msg', '$this->contenu_msg', '$this->date_msg', '$this->statuts')
        ";
        var_dump($this->id_envoyeur);
       $pre=$cnx->prepare($req);
       
       $ex=$pre->execute(array());
      
    }
    
}




?>