<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'clients';

    /**
     * Primary key is the code of the product
     * @var string
     */
    protected $primaryKey = 'id_num';

    /**
     * Fields for the table
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'address',
        'id_num',
        'email',
        'phone',
        'products'
    ];

    /**
     * Fields with info for the db admin and the developers
     * @var array
     */
    protected $hidden = ['created_at','updated_at'];

}
