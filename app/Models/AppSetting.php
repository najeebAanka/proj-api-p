<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AppSetting
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
class AppSetting extends Model
{
	protected $table = 'app_settings';

	protected $fillable = [
		'code',
		'contents_en',
		'contents_ar'
	];
}
