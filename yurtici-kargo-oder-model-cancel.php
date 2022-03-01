            <?php
           $istek = new SoapClient('https://ws.yurticikargo.com/KOPSWebServices/NgiShipmentInterfaceServices?wsdl');
		   $data=[
				   'wsUserName'        		=> 'kullaniciadi',
				   'wsPassword'        		=> 'sifre',
				   'wsUserLanguage'      		=> 'TR',
				   'ngiCargoKey'               => $key,
				   'ngiDocumentKey'            => $key,
				   'cancellationDescription'   => 'İPTAL İŞLEMİ MÜŞTERİ İSTEĞİ İLE',
				   
				   ];
		   $response = $istek->cancelNgiShipment($data);
		   if($response->XCancelShipmentResponse->outFlag==0){
				//basarili
		   }else{
			   print_r($response);die;
		   }