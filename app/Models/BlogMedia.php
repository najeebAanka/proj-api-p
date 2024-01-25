<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BlogMedia
 * 
 * @property int $id
 * @property int|null $blog_id
 * @property string|null $media_url
 * @property string|null $media_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class BlogMedia extends Model
{
	protected $table = 'blog_media';

	protected $casts = [
		'blog_id' => 'int'
	];

	protected $fillable = [
		'blog_id',
		'media_url',
		'media_type'
	];

	public function buildIcon(){
		return $this->media_url!="" ? asset('../storage/app/public/blogs-media/'.$this->media_url):url('dist/assets/img/empty.png');
	}
}
