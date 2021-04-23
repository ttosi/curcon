<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
  // dont't send updated_at on updates
  const UPDATED_AT = null;
}
