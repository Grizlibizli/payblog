<?php

namespace App\Traits;

/**
 * Class MakeGuid
 * @package App\Traits
 */
trait MakeGuid
{
    /**
     * @return string
     */
    private function makeGuid(): string
    {
        return uniqid();
    }
}

