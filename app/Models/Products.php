<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'products';

    /**
     * Primary key is the code of the product
     * @var string
     */
    protected $primaryKey = 'code';

    /**
     * Fields for the table
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'description'
    ];

    /**
     * Fields with info for the db admin and the developers
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];

}
