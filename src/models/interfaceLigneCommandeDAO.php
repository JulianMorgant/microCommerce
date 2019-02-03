<?php
interface interfaceLigneCommandeDAO {

    function selectAll();
    function selectOne(LigneCommande $ligneCommande);
    function update(LigneCommande $ligneCommande);
    function delete(LigneCommande $ligneCommande);
    function create(LigneCommande $ligneCommande);

}