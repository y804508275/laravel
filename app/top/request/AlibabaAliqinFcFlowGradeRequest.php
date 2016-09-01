<?php
/**
 * TOP API: alibaba.aliqin.fc.flow.grade request
 * 
 * @author auto create
 * @since 1.0, 2016.07.21
 */
namespace App\top\request;
class AlibabaAliqinFcFlowGradeRequest
{
	
	private $apiParas = array();
	
	public function getApiMethodName()
	{
		return "alibaba.aliqin.fc.flow.grade";
	}
	
	public function getApiParas()
	{
		return $this->apiParas;
	}
	
	public function check()
	{
		
	}
	
	public function putOtherTextParam($key, $value) {
		$this->apiParas[$key] = $value;
		$this->$key = $value;
	}
}
