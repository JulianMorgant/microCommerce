<?php
interface interfaceUserDAO {

    function selectAll();
    function selectOne(User $user);
    function update(User $user);
    function delete(User $user);
    function create(User $user);
    function loginValid($log,$psw);




}