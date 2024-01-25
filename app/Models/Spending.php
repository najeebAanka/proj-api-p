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
class Spending extends Model
{
	protected $table = 'spendings';

	
}
