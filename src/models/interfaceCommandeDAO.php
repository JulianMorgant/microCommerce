<?php
interface interfaceCommandeDAO {

    function selectAll();
    function selectOne(Commande $Commande);
    function update(Commande $Commande);
    function delete(Commande $Commande);
    function create(Commande $Commande);

}