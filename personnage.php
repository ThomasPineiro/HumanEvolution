<?php
/**
 * Created by PhpStorm.
 * User: Lukas Lepez
 * Date: 21/08/2018
 * Time: 11:39
 */

include 'partie.php';

class Personnage extends BddHuman
{
    protected $_espvie;
    protected $_croissance;
    protected $_taille;
    protected $_homme;
    protected $_emplacement;
    protected $_partie;

    /**
     * Personnage constructor.
     * @param $_espvie
     * @param $_croissance
     * @param $_taille
     * @param $_homme
     */
    public function __construct()
    {
        Parent::__construct();
        $idPartie = $this->_bdd->prepare("SELECT max(id_partie) FROM partie");
        $idPartie->execute();
        $resultIdPartie = $idPartie->fetch();
        $this->_partie = $resultIdPartie[0];
        $this->_espvie = mt_rand(0, 100);
        $_croissance = mt_rand(80, 120)/100;
        $this->_croissance = $_croissance;
        $this->_taille = mt_rand(42, 57);
        $hazard =  mt_rand(0, 100);
        if ($hazard < 50)  {
            $_homme = true;
        } else {
            $_homme = false;
        }
        $this->_homme = $_homme;
        $this->_emplacement = mt_rand(1, 100);
    }

    /**
     * @return mixed
     */
    public function getEspvie()
    {
        return $this->_espvie;
    }

    /**
     * @param mixed $espvie
     */
    public function setEspvie($espvie)
    {
        $this->_espvie = $espvie;
    }

    /**
     * @return mixed
     */
    public function getCroissance()
    {
        return $this->_croissance;
    }

    /**
     * @param mixed $croissance
     */
    public function setCroissance($croissance)
    {
        $this->_croissance = $croissance;
    }

    /**
     * @return mixed
     */
    public function getTaille()
    {
        return $this->_taille;
    }

    /**
     * @param mixed $taille
     */
    public function setTaille($taille)
    {
        $this->_taille = $taille;
    }

    /**
     * @return mixed
     */
    public function getHomme()
    {
        return $this->homme;
    }

    /**
     * @param mixed $homme
     */
    public function setHomme($homme)
    {
        if ($this->_homme < 50) {
            $this->_homme = "Femme";
        } else {
            $this->_homme = "Homme";
        }
    }

    /**
     * @return mixed
     */
    public function getEmplacement()
    {
        return $this->_emplacement;
    }

    /**
     * @param mixed $emplacement
     */
    public function setEmplacement($emplacement)
    {
        $this->_emplacement = $emplacement;
    }



    public function enregistrerPerso()
    {
        $enregistre = $this->_bdd->prepare("INSERT INTO personnage(lifespan, growth, birthsize, men, location) VALUES (?, ?, ?, ?, ?);");
        $enregistre->bindParam(1, $this->_espvie, PDO::PARAM_INT);
        $enregistre->bindParam(2, $this->_croissance, PDO::PARAM_STR);
        $enregistre->bindParam(3, $this->_taille, PDO::PARAM_STR);
        $enregistre->bindParam(4, $this->_homme, PDO::PARAM_INT);
        $enregistre->bindParam(5, $this->_emplacement, PDO::PARAM_INT);
        $enregistre->execute();
    }

    public function enregistrerPartiePerso()
    {
        $idPerso = $this->_bdd->prepare("SELECT max(id_perso) FROM personnage");
        $idPerso->execute();
        $resultIdPerso = $idPerso->fetch();

        $liaison = $this->_bdd->prepare("INSERT INTO partie_perso(id_partie, id_perso) VALUES (?, ?)");
        $liaison->bindParam(1, $this->_partie);
        $liaison->bindParam(2, $resultIdPerso[0]);
        $liaison->execute();
    }

}
// assertEmpty , assertEquals instancier object avec methode setUp
// protected $personnage
