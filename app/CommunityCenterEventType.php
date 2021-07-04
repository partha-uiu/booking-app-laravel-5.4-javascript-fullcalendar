<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityCenterEventType extends Model
{
    protected $table = 'community_center_event_type';

    public function eventTypes()
    {
        return $this->belongsToMany('App\EventType', 'community_center_event_type');
    }

    public function communityCenters()
    {
        return $this->belongsToMany('App\CommunityCenter');
    }

}
