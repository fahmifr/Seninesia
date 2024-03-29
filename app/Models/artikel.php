<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class artikel extends Model
{
    protected $table = 'seni';
    protected $fillable = [
        'name', 'description', 'thumbnail'
    ];

    public function resolveRouteBinding($id)
    {
        return $this->where('id', $id)->first() ?? abort(404, 'Document not found.');
    }
}
