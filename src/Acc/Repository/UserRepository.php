<?php

namespace Acc\Repository;

class UserRepository extends AbstractRepository {

    protected static $mapping = [
        'id' => 'id'
        , 'name' => 'name'
        , 'canonical' => 'canonical'
        , 'email' => 'email'
        , 'salt' => 'salt'
        , 'password' => 'password'
        , 'created' => 'created'
        , 'lastLogin' => 'last_login'
        , 'enabled' => 'enabled'
    ];

}
