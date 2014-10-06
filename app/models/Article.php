<?php
	class Article extends Eloquent{
		public function topic(){
			return $this->belongsTo('Topic');
		}

		public function comments(){
			return $this->hasMany('Comment');
		}
		
	}

?>