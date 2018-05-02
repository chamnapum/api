<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * @package App
 *
 * @property int id
 * @property int author_id
 * @property string title
 * @property string slug
 * @property longtext body
 * @property carbon created_at
 * @property carbon updated_at
 */

class Article extends Model
{
    protected $table = 'articles';

    public function author () {
        return $this->belongTo(User::class, 'author_id', 'id');
    }
}
