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
class Block extends Model
{
	protected $table = 'blocks';

	protected $casts = [
		'section_id' => 'int'
	];

	protected $fillable = [
		'section_id',
		'thumbnail',
		'title_en',
		'title_ar',
		'publish_date',
		'media_link',
		'subtitle_ar',
		'subtitle_en',
		'target_type',
		'target_id',
		'status'
	];

	// public function buildIcon(){
	// 	return $this->thumbnail!="" ? asset('storage/blocks/'.$this->thumbnail):url('dist/assets/img/empty.png');
	// }
	

	// public function buildImage(){
	// 	return $this->media_link!="" ? asset('storage/blocks/'.$this->media_link):url('dist/assets/img/empty.png');
	// }

	public function buildIcon(){
		return $this->thumbnail!="" ? asset('../storage/app/public/blocks/'.$this->thumbnail):url('dist/assets/img/empty.png');
	}

	public function buildImage(){
		return $this->media_link!="" ? asset('../storage/app/public/blocks/'.$this->media_link):url('dist/assets/img/empty.png');
	}

}
