<?php
	class Comment extends Eloquent{
		public function article(){
			return $this->belongsTo('Article');
		}
	}
?>