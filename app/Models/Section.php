<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Section
 * 
 * @property int $id
 * @property string|null $title_en
 * @property string|null $subtitle_en
 * @property string|null $publish_date
 * @property string|null $thumbnail
 * @property string|null $section_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int|null $col_count
 * @property string|null $title_ar
 * @property string|null $subtitle_ar
 *
 * @package App\Models
 */
class Section extends Model
{
	protected $table = 'sections';

	protected $casts = [
		'col_count' => 'int'
	];

	protected $fillable = [
		'title_en',
		'subtitle_en',
		'publish_date',
		'thumbnail',
		'section_type',
		'col_count',
		'title_ar',
		'subtitle_ar',
		'section_model',
		'status'
	];


	public function buildIcon(){
		 return $this->thumbnail!="" ? asset('storage/sections/'.$this->thumbnail):url('dist/assets/img/empty.png');
	 }
}
