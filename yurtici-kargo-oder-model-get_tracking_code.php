            <?php
           $istek = new SoapClient('https://ws.yurticikargo.com/KOPSWebServices/WsReportWithReferenceServices?wsdl');
		   $data=[
				   'userName'        		=> 'kullaniciadi',
				   'password'        		=> 'sifre',
				   'language'      		=> 'TR',
				   'custParamsVO'				=> array(
					   'invCustIdArray' => "musteri kodu" ),
				   'fieldName'      		=> 54,
				   'fieldValue'      		=> $shipping_key,
				   'startDate'      		=> null,
				   'endDate'      			=> null,
				   'dateParamType'      	=> null,
				   'withCargoLifeCycle'    => 0,
				   ];
		   $response = $istek->listInvDocumentInterfaceByReference($data);
		   
		   if($response->ShippingDataResponseVO->outFlag==0){
			   $tracking_number=$response->ShippingDataResponseVO->shippingDataDetailVOArray->docId; //kargo takip numarası
			   $tracking_url=$response->ShippingDataResponseVO->shippingDataDetailVOArray->trackingUrl; //kargo takip linki
		   }else{
			   //basarisiz
		   }