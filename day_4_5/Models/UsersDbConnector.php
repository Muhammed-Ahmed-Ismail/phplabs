<?php
use Illuminate\Database\Capsule\Manager as DbConnector;
class UsersDbConnector
{
private $udbc;
public function __construct()
{
    $this->udbc=new DbConnector();
    $this->udbc->addConnection(
        [
            "driver" => _driver_,
            "host" => _host_,
            "database" => _usersdb_,
            "username" => _username_,
            "password" => _password_
        ]
    );
    $this->udbc->setAsGlobal();
    $this->udbc->bootEloquent();
}

    /**
     * @return DbConnector
     */
    public function getUdbc(): DbConnector
    {
        return $this->udbc;
    }
}