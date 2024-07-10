<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class Notes extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'desc',
        'link',
        // 'file',
     
    ];

    protected $table = 'notes';
    protected $primaryKey = 'id';

    // public function setLikesAttribute($val)
    // {
    //     $likes = Like::where('note_id',$this->id)->count();
    //     $this->attributes['likes'] = $likes;

    // }
    public function getLikesAttribute($val)
    {
        $likes = Like::where('note_id',$this->id)->count();
        // $this->attributes['likes'] = $likes;
        return $likes;

    }
    // public function getCreatedAtAttribute($time)
    // {
    //     $date = date("d,M Y", strtotime($time));
    //     return $date;

    // }
    
}
