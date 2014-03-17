<?php namespace SmallTimeShop\Models;

class GroupModel extends BaseModel 
{
	protected $table = "groups";

	public $timestamps = false;

	public function users()
    {
        return $this->hasMany('SmallTimeShop\Models\UserModel');
    }

    public function permissions()
    {
        return $this->hasMany('SmallTimeShop\Models\PermissionModel');
    }
}