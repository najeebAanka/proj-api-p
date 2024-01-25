<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GoldUnit
 * 
 * @property int $id
 * @property string|null $code
 * @property string|null $contents_en
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $contents_ar
 *
 * @package App\Models
 */
class GoldUnit extends Model
{
	protected $table = 'gold_units';

	protected $fillable = [
		'name_en',
		'name_ar',
		
	];
}
