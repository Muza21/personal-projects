<?php

namespace laramz\mvcphp;

use laramz\mvcphp\DB\DbModel;

abstract class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}
