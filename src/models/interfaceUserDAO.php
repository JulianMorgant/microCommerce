<?php
interface interfaceUserDAO {

    function selectAll();
    function selectOne($user);
    function update($user);
    function delete($user);
    function create($user);
    function loginValid($log,$psw);




}