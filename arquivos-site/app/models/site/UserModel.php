<?php

namespace app\models\site;

class UserModel extends \Eloquent{

    protected $table = 'tb_users';
    protected $guarded = [];
    public $timestamps = false;
}