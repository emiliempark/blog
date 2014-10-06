<?php
	class Topic extends Eloquent{
		public function articles(){
			return $this->hasMany('Article');
		}
	}
?>