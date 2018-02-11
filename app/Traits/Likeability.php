<?php
/**
 * Created by PhpStorm.
 * User: Guy
 * Date: 12/21/17
 * Time: 1:42 PM
 */

namespace App\Traits;

use App\Like;
use Illuminate\Support\Facades\Auth;

trait Likeability
{
	 public function likes()
	 {
		  return $this->morphMany(Like::class, 'likeable');
	 }

	 public function like()
	 {
		  $like = new Like(['user_id' => Auth::id()]);

		  $this->likes()->save($like);
	 }

	 public function unlike()
	 {
		  $this->likes()->where('user_id', Auth::id())->delete();
	 }

	 public function toggle()
	 {
		  if ( $this->isLiked() ) {
				$this->unlike();
		  }
		  else {
				$this->like();
		  }
	 }

	 public function isLiked()
	 {
		  return (bool) $this->likes()
				->where('user_id', Auth::id())
				->count();
	 }

	 public function getLikesCountAttribute()
	 {
		  return $this->likes()->count();
	 }
}