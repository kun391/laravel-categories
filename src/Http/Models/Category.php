<?php

namespace Kun\Categories\Http\Models;

use Kalnoy\Nestedset\Node as Node;

class Category extends Node
{
    CONST STATUS_PUBLISH = 1;
    CONST STATUS_UNPUBLISH = 0;

    CONST PAGE_TYPE = 'category';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'name', 'description', 'alias', 'order'
    ];

    public function saveData($attributes, $parentCategory = null)
    {
        if ($this->id) {
            $this->update($attributes);
            $model = $this;
        } else {
            $model = $this->create($attributes, $parentCategory);
        }
    }
}
