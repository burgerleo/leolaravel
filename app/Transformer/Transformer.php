<?php

namespace App\Transformer;

abstract class Transformer
{
	public function TransformCollection($items){
		return array_map([$this, 'transform'], $items);

	}
	abstract public function transform($item);
}