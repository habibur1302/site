<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use APP\Http\Models\InsertOnDuplicateKey;

class Site extends Model
{
	 
    protected $fillable = ['site_name', 'website_type', 'check_update'];
  
}
