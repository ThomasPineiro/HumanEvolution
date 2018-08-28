<?php
/**
 * Created by PhpStorm.
 * User: Lukas Lepez
 * Date: 21/08/2018
 * Time: 14:54
 */
class BddHuman
{
    const DSN = 'pgsql:host=postgresql-simplonpamiers-ariege.alwaysdata.net;dbname=simplonpamiers-ariege_human_evol';
    const USER = 'simplonpamiers-ariege_thomas';
    const PASS = 'Elpinus09';
    protected $_bdd;

    /**
     * Bdd constructor.
     * @param $_bdd
     */
    public function __construct()
    {
        // $this->_bdd = new PDO('pg_connect:host=postgresql-marjorieandrieux.alwaysdata.net;dbname=marjorieandrieux_humanproject;charset=utf8', 'marjorieandrieux_pilou', 'ttbitn32167');
        try {
            $this->_bdd = new PDO(SELF::DSN, SELF::USER, SELF::PASS);
            // echo 'Connexion OK';
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }

    /**
     * @return PDO
     */
    public function getBdd()
    {
        return $this->_bdd;
    }

    /**
     * @param PDO $bdd
     */
    public function setBdd($bdd)
    {
        $this->_bdd = $bdd;
    }

    public function recupererStatsGlobale()
    {

    }
}
new bddHuman();