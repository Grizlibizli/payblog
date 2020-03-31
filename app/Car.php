<?php

namespace App;

use App\Traits\MakeGuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Car extends Model
{
    use MakeGuid;

    protected $fillable = [
        'id',
        'guid',
        'model',
        'number',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function drivers()
    {
        return $this->belongsToMany('App\Driver','car_driver', 'car_id', 'driver_id');
    }

    /**
     * Получить все автомобили
     *
     * @return Car[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllCars(): array
    {
        return $this::all();
    }

    /**
     * @param string $guidOrId
     * @return \Illuminate\Database\Query\Builder|Car
     */
    public function getCar(string $guidOrId)
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
