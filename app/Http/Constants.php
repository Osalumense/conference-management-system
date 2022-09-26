<?php

/**
 * Class UserType
 *
 * @package App\Http
 */

final class UserType
{

    const SUPER_ADMIN_ID = 1;

    const USER = '10';
    const EVENT_ORGANIZER = '20';
    const SUPER_ADMIN = '30';

    /**
     * Returns respective value.
     *
     * @param $x
     *
     * @return null
     */
    public static function getValue($x)
    {
        $value = null;
        switch ($x) {
            case '10':
                $value = 'User';
                break;
            case '20':
                $value = 'Event Organizer';
                break;
            case '30':
                $value = 'Super Admin';
                break;
        }

        return $value;
    }

}

/**
 * Class ActiveStatus
 */
final class ActiveStatus
{
    const INACTIVE = '0';
    const ACTIVE = '1';

    /**
     * Returns respective value.
     *
     * @param $x
     *
     * @return null
     */
    public static function getValue($x)
    {
        $value = null;
        switch ($x) {
            case '0':
                $value = 'Inactive';
                break;
            case '1':
                $value = 'Active';
                break;
        }

        return $value;
    }

    public static function getAll()
    {
        return [
            self::INACTIVE => ActiveStatus::getValue(self::INACTIVE),
            self::ACTIVE => ActiveStatus::getValue(self::ACTIVE),
        ];
    }

    public static function getValueInHtml($x)
    {
        $value = null;
        switch ($x) {
            case '0':
                $value = '<span class="inline-flex items-center justify-center p-2 text-sm text-white font-bold leading-none rounded bg-red-600"> Inactive </span>';
                break;
            case '1':
                $value = '<span class="inline-flex items-center justify-center p-2 text-sm text-white font-bold leading-none rounded bg-green-600"> Active </span>';
                break;
        }

        return $value;
    }
}

/**
 * Class Gender
 */
final class Gender
{
    CONST MALE = '10';
    CONST FEMALE = '20';
    CONST UNSPECIFIED = '30';

    /**
     * Returns respective value.
     *
     * @param $x
     *
     * @return null
     */
    public static function getValue($x)
    {
        $value = null;
        switch ($x) {
            case '10':
                $value = 'male';
                break;
            case '20':
                $value = 'female';
                break;
            case '30':
                $value = 'unspecified';
                break;
        }

        return $value;
    }

    /**
     * @return array
     */
    public static function getAll()
    {
        return [
            self::MALE => Gender::getValue(self::MALE),
            self::FEMALE => Gender::getValue(self::FEMALE),
        ];
    }
}