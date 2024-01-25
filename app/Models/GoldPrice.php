<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class GoldPrice
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
class GoldPrice extends Model
{
	protected $table = 'gold_price';

	protected $fillable = [
		'country_id',
		'unit_id',
		'amount',
		
	];
}
