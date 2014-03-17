<?php namespace SmallTimeShop\Models;

class UserModel extends BaseModel 
{
	protected $table = "users";

	 public function groups()
    {
        return $this->belongsToMany('SmallTimeShop\Models\GroupModel', 'group_user', 'group_id', 'user_id');
    }
}