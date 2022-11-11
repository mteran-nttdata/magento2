<?php
namespace NTTData\Practice\Block\Test\ProductList;


class Header extends \NTTData\Practice\Block\Test\ProductList{    
  
    public function getBlockProduct()
	{
		echo '<h3>' . get_class($this) . '</h3>' ;
	}
	

}