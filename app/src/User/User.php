<?php

namespace App\User;

class User {

    use PersistUser;
    use UnrelatedTrait;

    private $name;
    private $age;
    private $email;

    public function __construct( $name, $age, $email )
    {
        $this->name  = $name;
        $this->age   = $age;
        $this->email = $email;
    }

}