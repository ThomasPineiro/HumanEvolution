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
    /**
     * @var int
     */
    protected $_espvie;
    /**
     * @var float|int
     */
    protected $_croissance;
    /**
     * @var int
     */
    protected $_taille;
    /**
     * @var bool
     */
    protected $_homme;
    /**
     * @var int
     */
    protected $_emplacement;
    /**
     * @var
     */
    protected $_partie;

    /**
     * Personnage constructor.
     */
    public function __construct()
    {
        Parent::__construct();

        // Query of the party id;
        $idPartie = $this->_bdd->prepare("SELECT max(id_partie) FROM partie");
        $idPartie->execute();

        // Fetch of the data in an array
        $resultIdPartie = $idPartie->fetch();
        $this->_partie = $resultIdPartie[0];

        // Randomization of the lifespan
        $this->_espvie = mt_rand(0, 100);

        //  Randomization of the value of growth factor
        $_croissance = number_format(mt_rand(80, 120)/100,  2, '.', '');
        $this->_croissance = $_croissance;

        //  Randomization of the value of the size at birth
        $this->_taille = mt_rand(42, 57);

        //  Randomization of the gender of the personnage
        $hazard =  mt_rand(0, 100);
        if ($hazard < 50)  {
            $_homme = true;
        } else {
            $_homme = false;
        }
        $this->_homme = $_homme;

        //  Randomization of the location of the personnage
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
        return $this->_homme;
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

        return print_r($enregistre->execute());
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

        return print_r($liaison->execute());

    }

}
