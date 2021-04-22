<?php


class MySqlException extends Exception
{

    public static function wrongInsert()
    {
        return new static("Insert Gone Wrong");
    }

    public static function wrongDelete($idContact)
    {
        return new static("Delete gone wrong for id contact: " . $idContact);
    }

}