<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Blog
 * 
 * @property int $id
 * @property string|null $blog_type
 * @property string|null $title_en
 * @property string|null $author_en
 * @property string|null $publish_date
 * @property string|null $content_en
 * @property string|null $content_ar
 * @property string|null $blog_footer_en
 * @property string|null $blog_footer_ar
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Blog extends Model
{
	protected $table = 'blogs';

	protected $fillable = [
		'blog_type',
		'title_en',
		'author_en',
		'title_ar',
		'author_ar',
		'publish_date',
		'content_en',
		'content_ar',
		'blog_footer_en',
		'blog_footer_ar'
	];
}
