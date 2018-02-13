<?php

namespace App\Inter;

interface userInterface
{
    public function inserts($num);
    public function deletes($num);
    public function updates($num);
    public function selects($num);

}
