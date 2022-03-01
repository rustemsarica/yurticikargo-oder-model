            <?php
            $istek = new SoapClient('https://ws.yurticikargo.com/KOPSWebServices/NgiShipmentInterfaceServices?wsdl');
			
			$shipmentData=[
				'ngiDocumentKey' 		=> $uniqno,
				'cargoType' 			=> 2,
				'totalCargoCount' 		=> 1,
				'totalDesi' 			=> 4,
				'totalWeight' 			=> 0,
				'personGiver' 			=> 'DEPO OPERASYON SORUMLUSU',
				'description' 			=> 'ENTEGRASYON TEST KAYDI',
				'selectedArrivalUnitId' => null,
				'selectedArrivalTransferUnitId' => null,
				'productCode' 			=> 'STA',
				'complementaryProductDataArray' => array('complementaryProductCode' =>null),
				'docCargoDataArray' => array(
					'ngiCargoKey' =>$uniqno,
					'cargoType' =>2,
					'cargoDesi' =>3,
					'cargoWeight' =>0,
					'cargoCount' =>1,
					'length' =>null,
					'width' =>null,
					'height' =>null,
					'docCargoSpecialFieldDataArray' =>null,
				),
				'specialFieldDataArray' => array(
					'specialFieldName' => '54',
					'specialFieldValue' => $uniqno,
				),
				'codData' => array(
					'ttInvoiceAmount' =>null,
					'dcSelectedCredit' =>null,
				),
			];

			$XSenderCustAddress=[
				'senderCustName'		=> "gonderici ad-soyad",
				'senderAddress'			=> "gonderici adres",
				'cityId'				=> "gonderici il plaka kodu",
				'townName'				=> "gonderici ilce",
				'senderMobilePhone'		=> "gonderici telefon no",
			];

			$XConsigneeCustAddress=[
				'consigneeCustName'		=> "alıcı ad-soyad",
				'consigneeAddress'		=> "alıcı adres",
				'cityId'				=> "alıcı plaka kodu",
				'townName'				=> "alıcı ilce",
				'consigneeMobilePhone'	=> "gonderici telefon no",
			];
			
			$XPayerCustData=[
				'invCustId'				=> "müsterikodu",
				'invAddressId'			=> null,
			];
			
			$data=[
				'wsUserName'        	=> 'kullaniciadi',
				'wsPassword'        	=> 'sifre',
				'wsUserLanguage'      	=> 'TR',
				'shipmentData'			=> $shipmentData,
				'XSenderCustAddress'	=> $XSenderCustAddress,
				'XConsigneeCustAddress'	=> $XConsigneeCustAddress,
				'payerCustData'			=> $XPayerCustData,
			];
			
			
            $response = $istek->createNgiShipmentWithAddress($data);
           
            if($response->XShipmentDataResponse->outFlag==0){
		//basarılı
            }elseif($response->XShipmentDataResponse->outFlag==2){
                 print_r($response);die;
            }
         
