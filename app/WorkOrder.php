<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class WorkOrder extends Model
{
    /**
     * Specify model's table binding
     * @var string
     */
    protected $table = 'work_orders';

    /**
     * Specify fillable attribute
     * @var array
     */
    protected $fillable = [
        'order_date',
        'customer_name',
        'customer_address',
        'phone_number',
        'sto',
        'source',
        'ref_id',
        'surveyor',
        'surveyor_partner'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'surveyed_at' => 'datetime'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function surveyorDetail()
    {
        return $this->belongsTo(User::class, 'surveyor', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function surveyorPartner()
    {
        return $this->belongsTo(User::class, 'surveyor_partner', 'id');
    }
}
