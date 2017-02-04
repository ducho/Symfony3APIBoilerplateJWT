<?php

namespace AppBundle\Utils;

class PasswordGenerator implements PasswordGeneratorInterface
{
    public function generatePassword()
    {
       return bin2hex(random_bytes(30));
    }
}
