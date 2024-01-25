<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Block
 * 
 * @property int $id
 * @property int|null $section_id
 * @property string|null $thumbnail
 * @property string|null $title_en
 * @property string|null $title_ar
 * @property string|null $publish_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $media_link
 * @property string|null $subtitle_ar
 * @property string|null $subtitle_en
 * @property string|null $target_type
 * @property string|null $target_id
 *
 * @package App\Models
 */
class Country extends Model
{
	protected $table = 'countries';
	
	protected $fillable = [
		'name_en',
		'name_ar',
		'flag_pic',
		'order_sn',
		'currency_en',
		'currency_ar'
	];


	public function buildIcon(){
		return $this->flag_pic!="" ? asset('../storage/app/public/countries/'.$this->flag_pic):url('dist/assets/img/empty.png');
	}

	// public function buildIcon(){
	// 	return $this->flag_pic!="" ? asset('storage/countries/'.$this->flag_pic):url('dist/assets/img/empty.png');
	// }


}