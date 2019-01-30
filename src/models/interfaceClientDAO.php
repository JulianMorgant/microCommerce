<?php
interface interfaceClientDAO {

    function selectAll();
    function selectOne($client);
    function update($client);
    function delete($client);
    function create($client);




}