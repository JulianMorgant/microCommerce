<?php
interface interfaceClientDAO {

    function selectAll();
    function selectOne(Client $client);
    function update(Client $client);
    function delete(Client $client);
    function create(Client $client);




}