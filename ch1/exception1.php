<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mario
 * Date: 2018/11/25
 * Time: 21:30
 */

class ForbiddenException extends Exception
{
    public function __toString()
    {
        return "有问题的文本";
    }
}

try {
    throw new ForbiddenException();
} catch (Exception $exception) {
    echo $exception;
}