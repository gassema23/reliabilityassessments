<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class FullName implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function get( $model , string $key , $value , array $attributes )
    {
        return new \MichaelRubel\ValueObjects\Collection\Complex\FullName($attributes[ 'f_name' ] . ' ' . $attributes[ 'l_name' ]);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $key
     * @param mixed $value
     * @param array $attributes
     * @return mixed
     */
    public function set( $model , string $key , $value , array $attributes )
    {
        return $value;
    }
}
