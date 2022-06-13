<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use App\Models\District;
use Illuminate\Support\Facades\DB;

class Season extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'seasons';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['informan','district_id','longitude','latitude','bulan','tahun','season','remark','gambar1','gambar2','gambar3','gambar4'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function district(){
        return $this->belongsTo(District::class); 
     }
    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function getLongitudeAttribute($value)
    {

        $district_id = $this->attributes['district_id'];
        $district = District::find($district_id);
        $value = $district->longitude;
        $id = $this->attributes['id'];
        $affected = DB::table('seasons')
              ->where('id', $id)
              ->update(['longitude' => $value]);
        return $value;


    // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }

    public function getLatitudeAttribute($value)
    {

        $district_id = $this->attributes['district_id'];
        $district = District::find($district_id);
        $value = $district->latitude;
        $id = $this->attributes['id'];
        $affected = DB::table('seasons')
              ->where('id', $id)
              ->update(['latitude' => $value]);
        return $value;


    // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }

    public function getKabupatenAttribute($value)
    {

        $district_id = $this->attributes['district_id'];
        $district = District::find($district_id);
        $value = $district->kabupaten;
        $id = $this->attributes['id'];
        $affected = DB::table('seasons')
              ->where('id', $id)
              ->update(['kabupaten' => $value]);
        return $value;


    // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }


    public function setGambar1Attribute($value)
    {
        $attribute_name = "gambar1";
        $disk = "public";
        $destination_path = "seasons";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

    // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }

    public function setGambar2Attribute($value)
    {
        $attribute_name = "gambar2";
        $disk = "public";
        $destination_path = "seasons";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

    // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }

    public function setGambar3Attribute($value)
    {
        $attribute_name = "gambar3";
        $disk = "public";
        $destination_path = "seasons";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

    // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }

    public function setGambar4Attribute($value)
    {
        $attribute_name = "gambar4";
        $disk = "public";
        $destination_path = "seasons";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

    // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }

}
