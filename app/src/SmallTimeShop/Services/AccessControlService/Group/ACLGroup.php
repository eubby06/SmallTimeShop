<?php namespace SmallTimeShop\Services\AccessControlService\Group;

use Illuminate\Database\Eloquent\Model;

class ACLGroup extends Model implements ACLGroupInterface
{
	protected $table = "groups";

	public $timestamps = false;

	public function users()
    {
        return $this->belongsToMany('SmallTimeShop\Services\AccessControlService\User\ACLUser', 'group_user', 'group_id', 'user_id');
    }

    public function permissions()
    {
        return $this->belongsToMany('SmallTimeShop\Services\AccessControlService\Permission\ACLPermission'
            , 'group_permission', 'group_id', 'permission_id');
    }

}