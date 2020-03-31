<?php

namespace App;

use App\Traits\MakeGuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Driver extends Model
{
    use MakeGuid;

    protected $fillable = [
        'id',
        'guid',
        'driver_name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cars()
    {
        return $this->belongsToMany('App\Car','car_driver', 'driver_id', 'car_id');
    }

    /**
     * Получить всех водителей
     *
     * @return Driver[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllDrivers(): array
    {
        return $this::all();
    }

    /**
     * @param string $guidOrId
     * @return \Illuminate\Database\Query\Builder|Driver
     */
    public function getDriver(string $guidOrId)
    {
        return DB::table($this->table)->where('id', $guidOrId)->orWhere('guid', $guidOrId);
    }

    public function insert(array $array)
    {
        DB::table($this->table)->insert($array);
    }

    /**
     * @param array $array
     * @return array
     */
    public function prepareParams(array $array): array
    {
        $array['guid'] = $this->makeGuid();

        foreach ($array as $property => $value) {
            if (!in_array((string) $property, $this->fillable, true)) {
                unset($array[$property]);
            }
        }

        return $array;
    }
}

