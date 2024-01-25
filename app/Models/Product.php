<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * 
 * @property int $id
 * @property string|null $title_en
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $thumb_url
 * @property string|null $contents_en
 * @property string|null $title_ar
 * @property string|null $contents_ar
 *
 * @package App\Models
 */
class Product extends Model
{
	protected $table = 'products';

	protected $fillable = [
		'title_en',
		'thumb_url',
		'contents_en',
		'title_ar',
		'contents_ar'
	];


	public function buildIcon(){
		return $this->thumb_url!="" ? asset('../storage/app/public/products/'.$this->thumb_url):url('dist/assets/img/empty.png');
	}

	// public function buildIcon(){
	// 	return $this->flag_pic!="" ? asset('storage/countries/'.$this->flag_pic):url('dist/assets/img/empty.png');
	// }
}
