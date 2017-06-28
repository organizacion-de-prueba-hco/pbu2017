<?php

use Illuminate\Database\Seeder;

class DistritosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(
        		'CHACHAPOYAS', 
				'ASUNCION', 
				'BALSAS', 
				'CHETO', 
				'CHILIQUIN', 
				'CHUQUIBAMBA', 
				'GRANADA', 
				'HUANCAS', 
				'LA JALCA', 
				'LEIMEBAMBA',
				'LEVANTO',
				'MAGDALENA',
				'MARISCAL CASTILLA',
				'MOLINOPAMPA',
				'MONTEVIDEO',
				'OLLEROS',
				'QUINJALCA',
				'SAN FRANCISCO DE DAGUAS',
				'SAN ISIDRO DE MAINO',
				'SOLOCO',
				'SONCHE',
				'LA PECA',
				'ARAMANGO',
				'COPALLIN',
				'EL PARCO',
				'IMAZA',
				'JUMBILLA',
				'CHISQUILLA',
				'CHURUJA',
				'COROSHA',
				'CUISPES',
				'FLORIDA',
				'JAZAN',
				'RECTA',
				'SAN CARLOS',
				'SHIPASBAMBA',
				'VALERA',
				'YAMBRASBAMBA',
				'NIEVA',
				'EL CENEPA',
				'RIO SANTIAGO',
				'LAMUD',
				'CAMPORREDONDO',
				'COCABAMBA',
				'COLCAMAR',
				'CONILA',
				'INGUILPATA',
				'LONGUITA',
				'LONYA CHICO',
				'LUYA',
				'LUYA VIEJO',
				'MARIA',
				'OCALLI',
				'OCUMAL',
				'PISUQUIA',
				'PROVIDENCIA',
				'SAN CRISTOBAL',
				'SAN FRANCISCO DEL YESO',
				'SAN JERONIMO',
				'SAN JUAN DE LOPECANCHA',
				'SANTA CATALINA',
				'SANTO TOMAS',
				'TINGO',
				'TRITA',
				'SAN NICOLAS',
				'CHIRIMOTO',
				'COCHAMAL',
				'HUAMBO',
				'LIMABAMBA',
				'LONGAR',
				'MARISCAL BENAVIDES',
				'MILPUC',
				'OMIA',
				'SANTA ROSA',
				'TOTORA',
				'VISTA ALEGRE',
				'BAGUA GRANDE',
				'CAJARURO',
				'CUMBA',
				'EL MILAGRO',
				'JAMALCA',
				'LONYA GRANDE',
				'YAMON',
				'HUARAZ',
				'COCHABAMBA',
				'COLCABAMBA',
				'HUANCHAY',
				'INDEPENDENCIA',
				'JANGAS',
				'LA LIBERTAD',
				'OLLEROS',
				'PAMPAS',
				'PARIACOTO',
				'PIRA',
				'TARICA',
				'AIJA',
				'CORIS',
				'HUACLLAN',
				'LA MERCED',
				'SUCCHA',
				'LLAMELLIN', 
				'ACZO', 
				'CHACCHO',
				'CHINGAS',
				'MIRGAS',
				'SAN JUAN DE RONTOY',
				'CHACAS',
				'ACOCHACA',
				'CHIQUIAN',
				'ABELARDO PARDO LEZAMETA',
				'ANTONIO RAYMONDI',
				'AQUIA',
				'CAJACAY',
				'CANIS',
				'COLQUIOC',
				'HUALLANCA',
				'HUASTA',
				'HUAYLLACAYAN',
				'LA PRIMAVERA',
				'MANGAS',
				'PACLLON',
				'SAN MIGUEL DE CORPANQUI',
				'TICLLOS',
				'CARHUAZ',
				'ACOPAMPA',
				'AMASHCA',
				'ANTA',
				'ATAQUERO',
				'MARCARA',
				'PARIAHUANCA',
				'SAN MIGUEL DE ACO',
				'SHILLA',
				'TINCO',
				'YUNGAR',
				'SAN LUIS',
				'SAN NICOLAS',
				'YAUYA',
				'CASMA',
				'BUENA VISTA ALTA',
				'COMANDANTE NOEL',
				'YAUTAN',
				'CORONGO',
				'ACO',
				'BAMBAS',
				'CUSCA',
				'LA PAMPA',
				'YANAC',
				'YUPAN',
				'HUARI',
				'ANRA',
				'CAJAY',
				'CHAVIN DE HUANTAR',
				'HUACACHI',
				'HUACCHIS',
				'HUACHIS',
				'HUANTAR',
				'MASIN',
				'PAUCAS',
				'PONTO',
				'RAHUAPAMPA',
				'RAPAYAN',
				'SAN MARCOS',
				'SAN PEDRO DE CHANA',
				'UCO',
				'HUARMEY',
				'COCHAPETI',
				'CULEBRAS',
				'HUAYAN',
				'MALVAS',
				'CARAZ',
				'HUALLANCA',
				'HUATA',
				'HUAYLAS',
				'MATO',
				'PAMPAROMAS',
				'PUEBLO LIBRE',
				'SANTA CRUZ',
				'SANTO TORIBIO',
				'YURACMARCA',
				'PISCOBAMBA',
				'CASCA',
				'ELEAZAR GUZMAN BARRON',
				'FIDEL OLIVAS ESCUDERO',
				'LLAMA',
				'LLUMPA',
				'LUCMA',
				'MUSGA',
				'OCROS',
				'ACAS',
				'CAJAMARQUILLA',
				'CARHUAPAMPA',
				'COCHAS',
				'CONGAS',
				'LLIPA',
				'SAN CRISTOBAL DE RAJAN',
				'SAN PEDRO',
				'SANTIAGO DE CHILCAS',
				'CABANA',
				'BOLOGNESI',
				'CONCHUCOS',
				'HUACASCHUQUE',
				'HUANDOVAL',
				'LACABAMBA',
				'LLAPO',
				'PALLASCA',
				'PAMPAS',
				'SANTA ROSA',
				'TAUCA',
				'POMABAMBA',
				'HUAYLLAN',
				'PAROBAMBA',
				'QUINUABAMBA',
				'RECUAY',
				'CATAC',
				'COTAPARACO',
				'HUAYLLAPAMPA',
				'LLACLLIN',
				'MARCA',
				'PAMPAS CHICO',
				'PARARIN',
				'TAPACOCHA',
				'TICAPAMPA',
				'CHIMBOTE',
				'CACERES DEL PERU',
				'COISHCO',
				'MACATE',
				'MORO',
				'NEPEÑA',
				'SAMANCO',
				'SANTA',
				'NUEVO CHIMBOTE',
				'SIHUAS',
				'ACOBAMBA',
				'ALFONSO UGARTE',
				'CASHAPAMPA',
				'CHINGALPO',
				'HUAYLLABAMBA',
				'QUICHES',
				'RAGASH',
				'SAN JUAN',
				'SICSIBAMBA',
				'YUNGAY',
				'CASCAPARA',
				'MANCOS',
				'MATACOTO',
				'QUILLO',
				'RANRAHIRCA',
				'SHUPLUY',
				'YANAMA',
				'ABANCAY',
				'CHACOCHE',
				'CIRCA',
				'CURAHUASI',
				'HUANIPACA',
				'LAMBRAMA',
				'PICHIRHUA',
				'SAN PEDRO DE CACHORA',
				'TAMBURCO',
				'ANDAHUAYLAS',
				'ANDARAPA',
				'CHIARA',
				'HUANCARAMA',
				'HUANCARAY',
				'HUAYANA',
				'KISHUARA',
				'PACOBAMBA',
				'PACUCHA',
				'PAMPACHIRI',
				'POMACOCHA',
				'SAN ANTONIO DE CACHI',
				'SAN JERONIMO',
				'SAN MIGUEL DE CHACCRAMPA',
				'SANTA MARIA DE CHICMO',
				'TALAVERA',
				'TUMAY HUARACA',
				'TURPO',
				'KAQUIABAMBA',
				'ANTABAMBA',
				'EL ORO',
				'HUAQUIRCA',
				'JUAN ESPINOZA MEDRANO',
				'OROPESA',
				'PACHACONAS',
				'SABAINO',
				'CHALHUANCA',
				'CAPAYA',
				'CARAYBAMBA',
				'CHAPIMARCA',
				'COLCABAMBA',
				'COTARUSE',
				'HUAYLLO',
				'JUSTO APU SAHUARAURA',
				'LUCRE',
				'POCOHUANCA',
				'SAN JUAN DE CHACÑA',
				'SAÑAYCA',
				'SORAYA',
				'TAPAIRIHUA',
				'TINTAY',
				'TORAYA',
				'YANACA',
				'TAMBOBAMBA',
				'COTABAMBAS',
				'COYLLURQUI',
				'HAQUIRA',
				'MARA',
				'CHALLHUAHUACHO',
				'CHINCHEROS',
				'ANCO-HUALLO',
				'COCHARCAS',
				'HUACCANA',
				'OCOBAMBA',
				'ONGOY',
				'URANMARCA',
				'RANRACANCHA',
				'CHUQUIBAMBILLA',
				'CURPAHUASI',
				'GAMARRA',
				'HUAYLLATI',
				'MAMARA',
				'MICAELA BASTIDAS',
				'PATAYPAMPA',
				'PROGRESO',
				'SAN ANTONIO',
				'SANTA ROSA',
				'TURPAY',
				'VILCABAMBA',
				'VIRUNDO',
				'CURASCO',
				'AREQUIPA',
				'ALTO SELVA ALEGRE',
				'CAYMA',
				'CERRO COLORADO',
				'CHARACATO',
				'CHIGUATA',
				'JACOBO HUNTER',
				'LA JOYA',
				'MARIANO MELGAR',
				'MIRAFLORES',
				'MOLLEBAYA',
				'PAUCARPATA',
				'POCSI',
				'POLOBAYA',
				'QUEQUEÑA',
				'SABANDIA',
				'SACHACA',
				'SAN JUAN DE SIGUAS',
				'SAN JUAN DE TARUCANI',
				'SANTA ISABEL DE SIGUAS',
				'SANTA RITA DE SIGUAS',
				'SOCABAYA',
				'TIABAYA',
				'UCHUMAYO',
				'VITOR',
				'YANAHUARA',
				'YARABAMBA',
				'YURA',
				'JOSE LUIS BUSTAMANTE Y RIVERO',
				'CAMANA',
				'JOSE MARIA QUIMPER',
				'MARIANO NICOLAS VALCARCEL',
				'MARISCAL CACERES',
				'NICOLAS DE PIEROLA',
				'OCOÑA',
				'QUILCA',
				'SAMUEL PASTOR',
				'CARAVELI',
				'ACARI',
				'ATICO',
				'ATIQUIPA',
				'BELLA UNION',
				'CAHUACHO',
				'CHALA',
				'CHAPARRA',
				'HUANUHUANU',
				'JAQUI',
				'LOMAS',
				'QUICACHA',
				'YAUCA',
				'APLAO',
				'ANDAGUA',
				'AYO',
				'CHACHAS',
				'CHILCAYMARCA',
				'CHOCO',
				'HUANCARQUI',
				'MACHAGUAY',
				'ORCOPAMPA',
				'PAMPACOLCA',
				'TIPAN',
				'UÑON',
				'URACA',
				'VIRACO',
				'CHIVAY',
				'ACHOMA',
				'CABANACONDE',
				'CALLALLI',
				'CAYLLOMA',
				'COPORAQUE',
				'HUAMBO',
				'HUANCA',
				'ICHUPAMPA',
				'LARI',
				'LLUTA',
				'MACA',
				'MADRIGAL',
				'SAN ANTONIO DE CHUCA',
				'SIBAYO',
				'TAPAY',
				'TISCO',
				'TUTI',
				'YANQUE',
				'MAJES',
				'CHUQUIBAMBA',
				'ANDARAY',
				'CAYARANI',
				'CHICHAS',
				'IRAY',
				'RIO GRANDE',
				'SALAMANCA',
				'YANAQUIHUA',
				'MOLLENDO',
				'COCACHACRA',
				'DEAN VALDIVIA',
				'ISLAY',
				'MEJIA',
				'PUNTA DE BOMBON',
				'COTAHUASI',
				'ALCA',
				'CHARCANA',
				'HUAYNACOTAS',
				'PAMPAMARCA',
				'PUYCA',
				'QUECHUALLA',
				'SAYLA',
				'TAURIA',
				'TOMEPAMPA',
				'TORO',
				'AYACUCHO',
				'ACOCRO',
				'ACOS VINCHOS',
				'CARMEN ALTO',
				'CHIARA',
				'OCROS',
				'PACAYCASA',
				'QUINUA',
				'SAN JOSE DE TICLLAS',
				'SAN JUAN BAUTISTA',
				'SANTIAGO DE PISCHA',
				'SOCOS',
				'TAMBILLO',
				'VINCHOS',
				'JESUS NAZARENO',
				'CANGALLO',
				'CHUSCHI',
				'LOS MOROCHUCOS',
				'MARIA PARADO DE BELLIDO',
				'PARAS',
				'TOTOS',
				'SANCOS',
				'CARAPO',
				'SACSAMARCA',
				'SANTIAGO DE LUCANAMARCA',
				'HUANTA',
				'AYAHUANCO',
				'HUAMANGUILLA',
				'IGUAIN',
				'LURICOCHA',
				'SANTILLANA',
				'SIVIA',
				'LLOCHEGUA',
				'SAN MIGUEL',
				'ANCO',
				'AYNA',
				'CHILCAS',
				'CHUNGUI',
				'LUIS CARRANZA',
				'SANTA ROSA',
				'TAMBO',
				'PUQUIO',
				'AUCARA',
				'CABANA',
				'CARMEN SALCEDO',
				'CHAVIÑA',
				'CHIPAO',
				'HUAC-HUAS',
				'LARAMATE',
				'LEONCIO PRADO',
				'LLAUTA',
				'LUCANAS',
				'OCAÑA',
				'OTOCA',
				'SAISA',
				'SAN CRISTOBAL',
				'SAN JUAN',
				'SAN PEDRO',
				'SAN PEDRO DE PALCO',
				'SANCOS',
				'SANTA ANA DE HUAYCAHUACHO',
				'SANTA LUCIA',
				'CORACORA',
				'CHUMPI',
				'CORONEL CASTAÑEDA',
				'PACAPAUSA',
				'PULLO',
				'PUYUSCA',
				'SAN FRANCISCO DE RAVACAYCO',
				'UPAHUACHO',
				'PAUSA',
				'COLTA',
				'CORCULLA',
				'LAMPA',
				'MARCABAMBA',
				'OYOLO',
				'PARARCA',
				'SAN JAVIER DE ALPABAMBA',
				'SAN JOSE DE USHUA',
				'SARA SARA',
				'QUEROBAMBA',
				'BELEN',
				'CHALCOS',
				'CHILCAYOC',
				'HUACAÑA',
				'MORCOLLA',
				'PAICO',
				'SAN PEDRO DE LARCAY',
				'SAN SALVADOR DE QUIJE',
				'SANTIAGO DE PAUCARAY',
				'SORAS',
				'HUANCAPI',
				'ALCAMENCA',
				'APONGO',
				'ASQUIPATA',
				'CANARIA',
				'CAYARA',
				'COLCA',
				'HUAMANQUIQUIA',
				'HUANCARAYLLA',
				'HUAYA',
				'SARHUA',
				'VILCANCHOS',
				'VILCAS HUAMAN',
				'ACCOMARCA',
				'CARHUANCA',
				'CONCEPCION',
				'HUAMBALPA',
				'INDEPENDENCIA',
				'SAURAMA',
				'VISCHONGO',
				'CAJAMARCA',
				'CAJAMARCA',
				'ASUNCION',
				'CHETILLA',
				'COSPAN',
				'ENCAÑADA',
				'JESUS',
				'LLACANORA',
				'LOS BAÑOS DEL INCA',
				'MAGDALENA',
				'MATARA',
				'NAMORA',
				'SAN JUAN',
				'CAJABAMBA',
				'CACHACHI',
				'CONDEBAMBA',
				'SITACOCHA',
				'CELENDIN',
				'CHUMUCH',
				'CORTEGANA',
				'HUASMIN',
				'JORGE CHAVEZ',
				'JOSE GALVEZ',
				'MIGUEL IGLESIAS',
				'OXAMARCA',
				'SOROCHUCO',
				'SUCRE',
				'UTCO',
				'LA LIBERTAD DE PALLAN',
				'CHOTA',
				'ANGUIA',
				'CHADIN',
				'CHIGUIRIP',
				'CHIMBAN',
				'CHOROPAMPA',
				'COCHABAMBA',
				'CONCHAN',
				'HUAMBOS',
				'LAJAS',
				'LLAMA',
				'MIRACOSTA',
				'PACCHA',
				'PION',
				'QUEROCOTO',
				'SAN JUAN DE LICUPIS',
				'TACABAMBA',
				'TOCMOCHE',
				'CHALAMARCA',
				'CONTUMAZA',
				'CHILETE',
				'CUPISNIQUE',
				'GUZMANGO',
				'SAN BENITO',
				'SANTA CRUZ DE TOLED',
				'TANTARICA',
				'YONAN',
				'CUTERVO',
				'CALLAYUC',
				'CHOROS',
				'CUJILLO',
				'LA RAMADA',
				'PIMPINGOS',
				'QUEROCOTILLO',
				'SAN ANDRES DE CUTERVO',
				'SAN JUAN DE CUTERVO',
				'SAN LUIS DE LUCMA',
				'SANTA CRUZ',
				'SANTO DOMINGO DE LA CAPILLA',
				'SANTO TOMAS',
				'SOCOTA',
				'TORIBIO CASANOVA',
				'BAMBAMARCA',
				'CHUGUR',
				'HUALGAYOC',
				'JAEN',
				'BELLAVISTA',
				'CHONTALI',
				'COLASAY',
				'HUABAL',
				'LAS PIRIAS',
				'POMAHUACA',
				'PUCARA',
				'SALLIQUE',
				'SAN FELIPE',
				'SAN JOSE DEL ALTO',
				'SANTA ROSA',
				'SAN IGNACIO',
				'CHIRINOS',
				'HUARANGO',
				'LA COIPA',
				'NAMBALLE',
				'SAN JOSE DE LOURDES',
				'TABACONAS',
				'PEDRO GALVEZ',
				'CHANCAY',
				'EDUARDO VILLANUEVA',
				'GREGORIO PITA',
				'ICHOCAN',
				'JOSE MANUEL QUIROZ',
				'JOSE SABOGAL',
				'SAN MIGUEL',
				'SAN MIGUEL',
				'BOLIVAR',
				'CALQUIS',
				'CATILLUC',
				'EL PRADO',
				'LA FLORIDA',
				'LLAPA',
				'NANCHOC',
				'NIEPOS',
				'SAN GREGORIO',
				'SAN SILVESTRE DE COCHAN',
				'TONGOD',
				'UNION AGUA BLANCA',
				'SAN PABLO',
				'SAN BERNARDINO',
				'SAN LUIS',
				'TUMBADEN',
				'SANTA CRUZ',
				'ANDABAMBA',
				'CATACHE',
				'CHANCAYBAÑOS',
				'LA ESPERANZA',
				'NINABAMBA',
				'PULAN',
				'SAUCEPAMPA',
				'SEXI',
				'UTICYACU',
				'YAUYUCAN',
				'CALLAO',
				'BELLAVISTA',
				'CARMEN DE LA LEGUA REYNOSO',
				'LA PERLA',
				'LA PUNTA',
				'VENTANILLA',
				'CUSCO',
				'CCORCA',
				'POROY',
				'SAN JERONIMO',
				'SAN SEBASTIAN',
				'SANTIAGO',
				'SAYLLA',
				'WANCHAQ',
				'ACOMAYO',
				'ACOPIA',
				'ACOS',
				'MOSOC LLACTA',
				'POMACANCHI',
				'RONDOCAN',
				'SANGARARA',
				'ANTA',
				'ANCAHUASI',
				'CACHIMAYO',
				'CHINCHAYPUJIO',
				'HUAROCONDO',
				'LIMATAMBO',
				'MOLLEPATA',
				'PUCYURA',
				'ZURITE',
				'CALCA',
				'COYA',
				'LAMAY',
				'LARES',
				'PISAC',
				'SAN SALVADOR',
				'TARAY',
				'YANATILE',
				'YANAOCA',
				'CHECCA',
				'KUNTURKANKI',
				'LANGUI',
				'LAYO',
				'PAMPAMARCA',
				'QUEHUE',
				'TUPAC AMARU',
				'SICUANI',
				'CHECACUPE',
				'COMBAPATA',
				'MARANGANI',
				'PITUMARCA',
				'SAN PABLO',
				'SAN PEDRO',
				'TINTA',
				'SANTO TOMAS',
				'CAPACMARCA',
				'CHAMACA',
				'COLQUEMARCA',
				'LIVITACA',
				'LLUSCO',
				'QUIÑOTA',
				'VELILLE',
				'ESPINAR',
				'CONDOROMA',
				'COPORAQUE',
				'OCORURO',
				'PALLPATA',
				'PICHIGUA',
				'SUYCKUTAMBO',
				'ALTO PICHIGUA',
				'SANTA ANA',
				'ECHARATE',
				'HUAYOPATA',
				'MARANURA',
				'OCOBAMBA',
				'QUELLOUNO',
				'KIMBIRI',
				'SANTA TERESA',
				'VILCABAMBA',
				'PICHARI',
				'PARURO',
				'ACCHA',
				'CCAPI',
				'COLCHA',
				'HUANOQUITE',
				'OMACHA',
				'PACCARITAMBO',
				'PILLPINTO',
				'YAURISQUE',
				'PAUCARTAMBO',
				'CAICAY',
				'CHALLABAMBA',
				'COLQUEPATA',
				'HUANCARANI',
				'KOSÑIPATA',
				'URCOS',
				'ANDAHUAYLILLAS',
				'CAMANTI',
				'CCARHUAYO',
				'CCATCA',
				'CUSIPATA',
				'HUARO',
				'LUCRE',
				'MARCAPATA',
				'OCONGATE',
				'OROPESA',
				'QUIQUIJANA',
				'URUBAMBA',
				'CHINCHERO',
				'HUAYLLABAMBA',
				'MACHUPICCHU',
				'MARAS',
				'OLLANTAYTAMBO',
				'YUCAY',
				'HUANCAVELICA',
				'ACOBAMBILLA',
				'ACORIA',
				'CONAYCA',
				'CUENCA',
				'HUACHOCOLPA',
				'HUAYLLAHUARA',
				'IZCUCHACA',
				'LARIA',
				'MANTA',
				'MARISCAL CACERES',
				'MOYA',
				'NUEVO OCCORO',
				'PALCA',
				'PILCHACA',
				'VILCA',
				'YAULI',
				'ASCENSION',
				'HUANDO',
				'ACOBAMBA',
				'ANDABAMBA',
				'ANTA',
				'CAJA',
				'MARCAS',
				'PAUCARA',
				'POMACOCHA',
				'ROSARIO',
				'LIRCAY',
				'ANCHONGA',
				'CALLANMARCA',
				'CCOCHACCASA',
				'CHINCHO',
				'CONGALLA',
				'HUANCA-HUANCA',
				'HUAYLLAY GRANDE',
				'JULCAMARCA',
				'SAN ANTONIO DE ANTAPARCO',
				'SANTO TOMAS DE PATA',
				'SECCLLA',
				'CASTROVIRREYNA',
				'ARMA',
				'AURAHUA',
				'CAPILLAS',
				'CHUPAMARCA',
				'COCAS',
				'HUACHOS',
				'HUAMATAMBO',
				'MOLLEPAMPA',
				'SAN JUAN',
				'SANTA ANA',
				'TANTARA',
				'TICRAPO',
				'CHURCAMPA',
				'ANCO',
				'CHINCHIHUASI',
				'EL CARMEN',
				'LA MERCED',
				'LOCROJA',
				'PAUCARBAMBA',
				'SAN MIGUEL DE MAYOCC',
				'SAN PEDRO DE CORIS',
				'PACHAMARCA',
				'HUAYTARA',
				'AYAVI',
				'CORDOVA',
				'HUAYACUNDO ARMA',
				'LARAMARCA',
				'OCOYO',
				'PILPICHACA',
				'QUERCO',
				'QUITO-ARMA',
				'SAN ANTONIO DE CUSICANCHA',
				'SAN FRANCISCO DE SANGAYAICO',
				'SAN ISIDRO',
				'SANTIAGO DE CHOCORVOS',
				'SANTIAGO DE QUIRAHUARA',
				'SANTO DOMINGO DE CAPILLAS',
				'TAMBO',
				'PAMPAS',
				'ACOSTAMBO',
				'ACRAQUIA',
				'AHUAYCHA',
				'COLCABAMBA',
				'DANIEL HERNANDEZ',
				'HUACHOCOLPA',
				'HUARIBAMBA',
				'ÑAHUIMPUQUIO',
				'PAZOS',
				'QUISHUAR',
				'SALCABAMBA',
				'SALCAHUASI',
				'SAN MARCOS DE ROCCHAC',
				'SURCUBAMBA',
				'TINTAY PUNCU',
				'HUANUCO',
				'AMARILIS',
				'CHINCHAO',
				'CHURUBAMBA',
				'MARGOS',
				'QUISQUI',
				'SAN FRANCISCO DE CAYRAN',
				'SAN PEDRO DE CHAULAN',
				'SANTA MARIA DEL VALLE',
				'YARUMAYO',
				'PILLCO MARCA',
				'AMBO',
				'CAYNA',
				'COLPAS',
				'CONCHAMARCA',
				'HUACAR',
				'SAN FRANCISCO',
				'SAN RAFAEL',
				'TOMAY KICHWA',
				'LA UNION',
				'CHUQUIS',
				'MARIAS',
				'PACHAS',
				'QUIVILLA',
				'RIPAN',
				'SHUNQUI',
				'SILLAPATA',
				'YANAS',
				'HUACAYBAMBA',
				'CANCHABAMBA',
				'COCHABAMBA',
				'PINRA',
				'LLATA',
				'ARANCAY',
				'CHAVIN DE PARIARCA',
				'JACAS GRANDE',
				'JIRCAN',
				'MIRAFLORES',
				'MONZON',
				'PUNCHAO',
				'PUÑOS',
				'SINGA',
				'TANTAMAYO',
				'RUPA-RUPA',
				'DANIEL ALOMIA ROBLES',
				'HERMILIO VALDIZAN',
				'JOSE CRESPO Y CASTILLO',
				'LUYANDO',
				'MARIANO DAMASO BERAUN',
				'HUACRACHUCO',
				'CHOLON',
				'SAN BUENAVENTURA',
				'PANAO',
				'CHAGLLA',
				'MOLINO',
				'UMARI',
				'PUERTO INCA',
				'CODO DEL POZUZO',
				'HONORIA',
				'TOURNAVISTA',
				'YUYAPICHIS',
				'JESUS',
				'BAÑOS',
				'JIVIA',
				'QUEROPALCA',
				'RONDOS',
				'SAN FRANCISCO DE ASIS',
				'SAN MIGUEL DE CAURI',
				'CHAVINILLO',
				'CAHUAC',
				'CHACABAMBA',
				'APARICIO POMARES',
				'JACAS CHICO',
				'OBAS',
				'PAMPAMARCA',
				'CHORAS',
				'ICA',
				'LA TINGUIÑA',
				'LOS AQUIJES',
				'OCUCAJE',
				'PACHACUTEC',
				'PARCONA',
				'PUEBLO NUEVO',
				'SALAS',
				'SAN JOSE DE LOS MOLINOS',
				'SAN JUAN BAUTISTA',
				'SANTIAGO',
				'SUBTANJALLA',
				'TATE',
				'YAUCA DEL ROSARIO',
				'CHINCHA ALTA',
				'ALTO LARAN',
				'CHAVIN',
				'CHINCHA BAJA',
				'EL CARMEN',
				'GROCIO PRADO',
				'PUEBLO NUEVO',
				'SAN JUAN DE YANAC',
				'SAN PEDRO DE HUACARPANA',
				'SUNAMPE',
				'TAMBO DE MORA',
				'NAZCA', 
				'CHANGUILLO', 
				'EL INGENIO', 
				'MARCONA', 
				'VISTA ALEGRE', 
				'PALPA', 
				'LLIPATA', 
				'RIO GRANDE', 
				'SANTA CRUZ', 
				'TIBILLO', 
				'PISCO', 
				'HUANCANO', 
				 'HUMAY', 
				 'INDEPENDENCIA', 
				 'PARACAS', 
				 'SAN ANDRES', 
				 'SAN CLEMENTE', 
				 'TUPAC AMARU INCA', 
				 'HUANCAYO', 
				 'CARHUACALLANGA', 
				 'CHACAPAMPA', 
				 'CHICCHE', 
				 'CHILCA', 
				 'CHONGOS ALTO', 
				 'CHUPURO', 
				 'COLCA', 
				 'CULLHUAS', 
				 'EL TAMBO', 
				 'HUACRAPUQUIO', 
				 'HUALHUAS', 
				 'HUANCAN', 
				 'HUASICANCHA', 
				 'HUAYUCACHI', 
				 'INGENIO', 
				 'PARIAHUANCA', 
				 'PILCOMAYO', 
				 'PUCARA', 
				 'QUICHUAY', 
				 'QUILCAS', 
				 'SAN AGUSTIN', 
				 'SAN JERONIMO DE TUNAN', 
				 'SAÑO', 
				 'SAPALLANGA', 
				 'SICAYA', 
				 'SANTO DOMINGO DE ACOBAMBA', 
				 'VIQUES', 
				 'CONCEPCION', 
				 'ACO', 
				 'ANDAMARCA', 
				 'CHAMBARA', 
				 'COCHAS', 
				 'COMAS', 
				 'HEROINAS TOLEDO', 
				 'MANZANARES', 
				 'MARISCAL CASTILLA', 
				 'MATAHUASI', 
				 'MITO', 
				 'NUEVE DE JULIO', 
				 'ORCOTUNA', 
				 'SAN JOSE DE QUERO', 
				 'SANTA ROSA DE OCOPA', 
				 'CHANCHAMAYO', 
				 'PERENE', 
				 'PICHANAQUI', 
				 'SAN LUIS DE SHUARO', 
				 'SAN RAMON', 
				 'VITOC', 
				 'JAUJA', 
				 'ACOLLA', 
				 'APATA', 
				 'ATAURA', 
				 'CANCHAYLLO', 
				 'CURICACA', 
				 'EL MANTARO', 
				 'HUAMALI', 
				 'HUARIPAMPA', 
				 'HUERTAS', 
				 'JANJAILLO', 
				 'JULCAN', 
				 'LEONOR ORDOÑEZ', 
				 'LLOCLLAPAMPA', 
				 'MARCO', 
				 'MASMA', 
				 'MASMA CHICCHE', 
				 'MOLINOS', 
				 'MONOBAMBA', 
				 'MUQUI', 
				 'MUQUIYAUYO', 
				 'PACA', 
				 'PACCHA', 
				 'PANCAN', 
				 'PARCO', 
				 'POMACANCHA', 
				 'RICRAN', 
				 'SAN LORENZO', 
				 'SAN PEDRO DE CHUNAN', 
				 'SAUSA', 
				 'SINCOS', 
				 'TUNAN MARCA', 
				 'YAULI', 
				 'YAUYOS', 
				 'JUNIN', 
				 'CARHUAMAYO', 
				 'ONDORES', 
				 'ULCUMAYO', 
				 'SATIPO', 
				 'COVIRIALI', 
				 'LLAYLLA', 
				 'MAZAMARI', 
				 'PAMPA HERMOSA', 
				 'PANGOA', 
				 'RIO NEGRO', 
				 'RIO TAMBO', 
				 'TARMA', 
				 'ACOBAMBA', 
				 'HUARICOLCA', 
				 'HUASAHUASI', 
				 'LA UNION', 
				 'PALCA', 
				 'PALCAMAYO', 
				 'SAN PEDRO DE CAJAS', 
				 'TAPO', 
				 'LA OROYA', 
				 'CHACAPALPA', 
				 'HUAY-HUAY', 
				 'MARCAPOMACOCHA', 
				 'MOROCOCHA', 
				 'PACCHA', 
				 'SANTA BARBARA DE CARHUACAYAN', 
				 'SANTA ROSA DE SACCO', 
				 'SUITUCANCHA', 
				 'YAULI', 
				 'CHUPACA', 
				 'AHUAC', 
				 'CHONGOS BAJO', 
				 'HUACHAC', 
				 'HUAMANCACA CHICO', 
				 'SAN JUAN DE ISCOS', 
				 'SAN JUAN DE JARPA', 
				 'TRES DE DICIEMBRE', 
				 'YANACANCHA', 
				 'TRUJILLO', 
				 'EL PORVENIR', 
				 'FLORENCIA DE MORA', 
				 'HUANCHACO', 
				 'LA ESPERANZA', 
				 'LAREDO', 
				 'MOCHE', 
				 'POROTO', 
				 'SALAVERRY', 
				 'SIMBAL', 
				 'VICTOR LARCO HERRERA', 
				 'ASCOPE', 
				 'CHICAMA', 
				 'CHOCOPE', 
				 'MAGDALENA DE CAO', 
				 'PAIJAN', 
				 'RAZURI', 
				 'SANTIAGO DE CAO', 
				 'CASA GRANDE', 
				 'BOLIVAR', 
				 'BAMBAMARCA', 
				 'CONDORMARCA', 
				 'LONGOTEA', 
				 'UCHUMARCA', 
				 'UCUNCHA', 
				 'CHEPEN', 
				 'PACANGA', 
				 'PUEBLO NUEVO', 
				 'JULCAN', 
				 'CALAMARCA', 
				 'CARABAMBA', 
				 'HUASO', 
				 'OTUZCO', 
				 'AGALLPAMPA', 
				 'CHARAT', 
				 'HUARANCHAL', 
				 'LA CUESTA', 
				 'MACHE', 
				 'PARANDAY', 
				 'SALPO', 
				 'SINSICAP', 
				 'USQUIL', 
				 'SAN PEDRO DE LLOC', 
				 'GUADALUPE', 
				 'JEQUETEPEQUE', 
				 'PACASMAYO', 
				 'SAN JOSE', 
				 'TAYABAMBA', 
				 'BULDIBUYO', 
				 'CHILLIA', 
				 'HUANCASPATA', 
				 'HUAYLILLAS', 
				 'HUAYO', 
				 'ONGON', 
				 'PARCOY', 
				 'PATAZ', 
				 'PIAS', 
				 'SANTIAGO DE CHALLAS', 
				 'TAURIJA', 
				 'URPAY', 
				 'HUAMACHUCO', 
				 'CHUGAY', 
				 'COCHORCO', 
				 'CURGOS', 
				 'MARCABAL', 
				 'SANAGORAN', 
				 'SARIN', 
				 'SARTIMBAMBA', 
				 'SANTIAGO DE CHUCO', 
				 'ANGASMARCA', 
				 'CACHICADAN', 
				 'MOLLEBAMBA', 
				 'MOLLEPATA', 
				 'QUIRUVILCA', 
				 'SANTA CRUZ DE CHUCA', 
				 'SITABAMBA', 
				 'GRAN CHIMU', 
				 'CASCAS', 
				 'LUCMA', 
				 'MARMOT', 
				 'SAYAPULLO', 
				 'VIRU', 
				 'CHAO', 
				 'GUADALUPITO', 
				 'CHICLAYO', 
				 'CHONGOYAPE', 
				 'ETEN', 
				 'ETEN PUERTO', 
				 'JOSE LEONARDO ORTIZ', 
				 'LA VICTORIA', 
				 'LAGUNAS', 
				 'MONSEFU', 
				 'NUEVA ARICA', 
				 'OYOTUN', 
				 'PICSI', 
				 'PIMENTEL', 
				 'REQUE', 
				 'SANTA ROSA', 
				 'SAÑA', 
				 'CAYALTI', 
				 'PATAPO', 
				 'POMALCA', 
				 'PUCALA', 
				 'TUMAN', 
				 'FERREÑAFE', 
				 'CAÑARIS', 
				 'INCAHUASI', 
				 'MANUEL ANTONIO MESONES MURO', 
				 'PITIPO', 
				 'PUEBLO NUEVO', 
				 'LAMBAYEQUE', 
				 'CHOCHOPE', 
				 'ILLIMO', 
				 'JAYANCA', 
				 'MOCHUMI', 
				 'MORROPE', 
				 'MOTUPE', 
				 'OLMOS', 
				 'PACORA', 
				 'SALAS', 
				 'SAN JOSE', 
				 'TUCUME', 
				 'LIMA', 
				 'ANCON', 
				 'ATE', 
				 'BARRANCO', 
				 'BREÑA', 
				 'CARABAYLLO', 
				 'CHACLACAYO', 
				 'CHORRILLOS', 
				 'CIENEGUILLA', 
				 'COMAS', 
				 'EL AGUSTINO', 
				 'INDEPENDENCIA', 
				 'JESUS MARIA', 
				 'LA MOLINA', 
				 'LA VICTORIA', 
				 'LINCE', 
				 'LOS OLIVOS', 
				 'LURIGANCHO', 
				 'LURIN', 
				 'MAGDALENA DEL MAR', 
				 'MAGDALENA VIEJA', 
				 'MIRAFLORES', 
				 'PACHACAMAC', 
				 'PUCUSANA', 
				 'PUENTE PIEDRA', 
				 'PUNTA HERMOSA', 
				 'PUNTA NEGRA', 
				 'RIMAC', 
				 'SAN BARTOLO', 
				 'SAN BORJA', 
				 'SAN ISIDRO', 
				 'SAN JUAN DE LURIGANCHO', 
				 'SAN JUAN DE MIRAFLORES', 
				 'SAN LUIS', 
				 'SAN MARTIN DE PORRES', 
				 'SAN MIGUEL', 
				 'SANTA ANITA', 
				 'SANTA MARIA DEL MAR', 
				 'SANTA ROSA', 
				 'SANTIAGO DE SURCO', 
				 'SURQUILLO', 
				 'VILLA EL SALVADOR', 
				 'VILLA MARIA DEL TRIUNFO', 
				 'BARRANCA', 
				 'PARAMONGA', 
				 'PATIVILCA', 
				 'SUPE', 
				 'SUPE PUERTO', 
				 'CAJATAMBO', 
				 'COPA', 
				 'GORGOR', 
				 'HUANCAPON', 
				 'MANAS', 
				 'CANTA', 
				 'ARAHUAY', 
				 'HUAMANTANGA', 
				 'HUAROS', 
				 'LACHAQUI', 
				 'SAN BUENAVENTURA', 
				 'SANTA ROSA DE QUIVES', 
				 'SAN VICENTE DE CAÑETE', 
				 'ASIA', 
				 'CALANGO', 
				 'CERRO AZUL', 
				 'CHILCA', 
				 'COAYLLO', 
				 'IMPERIAL', 
				 'LUNAHUANA', 
				 'MALA', 
				 'NUEVO IMPERIAL', 
				 'PACARAN', 
				 'QUILMANA', 
				 'SAN ANTONIO', 
				 'SAN LUIS', 
				 'SANTA CRUZ DE FLORES', 
				 'ZUÑIGA', 
				 'HUARAL', 
				 'ATAVILLOS ALTO', 
				 'ATAVILLOS BAJO', 
				 'AUCALLAMA', 
				 'CHANCAY', 
				 'IHUARI', 
				 'LAMPIAN', 
				 'PACARAOS', 
				 'SAN MIGUEL DE ACOS', 
				 'SANTA CRUZ DE ANDAMARCA', 
				 'SUMBILCA', 
				 'VEINTISIETE DE NOVIEMBRE', 
				 'MATUCANA', 
				 'ANTIOQUIA', 
				 'CALLAHUANCA', 
				 'CARAMPOMA', 
				 'CHICLA', 
				 'CUENCA', 
				 'HUACHUPAMPA', 
				 'HUANZA', 
				 'HUAROCHIRI', 
				 'LAHUAYTAMBO', 
				 'LANGA', 
				 'LARAOS', 
				 'MARIATANA', 
				 'RICARDO PALMA', 
				 'SAN ANDRES DE TUPICOCHA', 
				 'SAN ANTONIO', 
				 'SAN BARTOLOME', 
				 'SAN DAMIAN', 
				 'SAN JUAN DE IRIS', 
				 'SAN JUAN DE TANTARANCHE', 
				 'SAN LORENZO DE QUINTI', 
				 'SAN MATEO', 
				 'SAN MATEO DE OTAO', 
				 'SAN PEDRO DE CASTA', 
				 'SAN PEDRO DE HUANCAYRE', 
				 'SANGALLAYA', 
				 'SANTA CRUZ DE COCACHACRA', 
				 'SANTA EULALIA', 
				 'SANTIAGO DE ANCHUCAYA', 
				 'SANTIAGO DE TUNA', 
				 'SANTO DOMINGO DE LOS OLLEROS', 
				 'SURCO', 
				 'HUACHO', 
				 'AMBAR', 
				 'CALETA DE CARQUIN', 
				 'CHECRAS', 
				 'HUALMAY', 
				 'HUAURA', 
				 'LEONCIO PRADO', 
				 'PACCHO', 
				 'SANTA LEONOR', 
				 'SANTA MARIA', 
				 'SAYAN', 
				 'VEGUETA', 
				 'OYON', 
				 'ANDAJES', 
				 'CAUJUL', 
				 'COCHAMARCA', 
				 'NAVAN', 
				 'PACHANGARA', 
				 'YAUYOS', 
				 'ALIS', 
				 'AYAUCA', 
				 'AYAVIRI', 
				 'AZANGARO', 
				 'CACRA', 
				 'CARANIA', 
				 'CATAHUASI', 
				 'CHOCOS', 
				 'COCHAS', 
				 'COLONIA', 
				 'HONGOS', 
				 'HUAMPARA', 
				 'HUANCAYA', 
				 'HUANGASCAR', 
				 'HUANTAN', 
				 'HUAÑEC', 
				 'LARAOS', 
				 'LINCHA', 
				 'MADEAN', 
				 'MIRAFLORES', 
				 'OMAS', 
				 'PUTINZA', 
				 'QUINCHES', 
				 'QUINOCAY', 
				 'SAN JOAQUIN', 
				 'SAN PEDRO DE PILAS', 
				 'TANTA', 
				 'TAURIPAMPA', 
				 'TOMAS', 
				 'TUPE', 
				 'VIÑAC', 
				 'VITIS', 
				 'IQUITOS', 
				 'ALTO NANAY', 
				 'FERNANDO LORES', 
				 'INDIANA', 
				 'LAS AMAZONAS', 
				 'MAZAN', 
				 'NAPO', 
				 'PUNCHANA', 
				 'PUTUMAYO', 
				 'TORRES CAUSANA', 
				 'BELEN', 
				 'SAN JUAN BAUTISTA', 
				 'YURIMAGUAS', 
				 'BALSAPUERTO', 
				 'BARRANCA', 
				 'CAHUAPANAS', 
				 'JEBEROS', 
				 'LAGUNAS', 
				 'MANSERICHE', 
				 'MORONA', 
				 'PASTAZA', 
				 'SANTA CRUZ', 
				 'TENIENTE CESAR LOPEZ ROJAS', 
				 'NAUTA', 
				 'PARINARI', 
				 'TIGRE', 
				 'TROMPETEROS', 
				 'URARINAS', 
				 'RAMON CASTILLA', 
				 'PEBAS', 
				 'YAVARI', 
				 'SAN PABLO', 
				 'REQUENA', 
				 'ALTO TAPICHE', 
				 'CAPELO', 
				 'EMILIO SAN MARTIN', 
				 'MAQUIA', 
				 'PUINAHUA', 
				 'SAQUENA', 
				 'SOPLIN', 
				 'TAPICHE', 
				 'JENARO HERRERA', 
				 'YAQUERANA', 
				 'CONTAMANA', 
				 'INAHUAYA', 
				 'PADRE MARQUEZ', 
				 'PAMPA HERMOSA', 
				 'SARAYACU', 
				 'VARGAS GUERRA', 
				 'TAMBOPATA', 
				 'INAMBARI', 
				 'LAS PIEDRAS', 
				 'LABERINTO', 
				 'MANU', 
				 'FITZCARRALD', 
				 'MADRE DE DIOS', 
				 'HUEPETUHE', 
				 'IÑAPARI', 
				 'IBERIA', 
				 'TAHUAMANU', 
				 'MOQUEGUA', 
				 'CARUMAS', 
				 'CUCHUMBAYA', 
				 'SAMEGUA', 
				 'SAN CRISTOBAL', 
				 'TORATA', 
				 'OMATE', 
				 'CHOJATA', 
				 'COALAQUE', 
				 'ICHUÑA', 
				 'LA CAPILLA', 
				 'LLOQUE', 
				 'MATALAQUE', 
				 'PUQUINA', 
				 'QUINISTAQUILLAS', 
				 'UBINAS', 
				 'YUNGA', 
				 'ILO', 
				 'EL ALGARROBAL', 
				 'PACOCHA', 
				 'CHAUPIMARCA', 
				 'HUACHON', 
				 'HUARIACA', 
				 'HUAYLLAY', 
				 'NINACACA', 
				 'PALLANCHACRA', 
				 'PAUCARTAMBO', 
				 'SAN FCO.DE ASIS DE YARUSYACAN', 
				 'SIMON BOLIVAR', 
				 'TICLACAYAN', 
				 'TINYAHUARCO', 
				 'VICCO', 
				 'YANACANCHA', 
				 'YANAHUANCA', 
				 'CHACAYAN', 
				 'GOYLLARISQUIZGA', 
				 'PAUCAR', 
				 'SAN PEDRO DE PILLAO', 
				 'SANTA ANA DE TUSI', 
				 'TAPUC', 
				 'VILCABAMBA', 
				 'OXAPAMPA', 
				 'CHONTABAMBA', 
				 'HUANCABAMBA', 
				 'PALCAZU', 
				 'POZUZO', 
				 'PUERTO BERMUDEZ', 
				 'VILLA RICA', 
				 'PIURA', 
				 'CASTILLA', 
				 'CATACAOS', 
				 'CURA MORI', 
				 'EL TALLAN', 
				 'LA ARENA', 
				 'LA UNION', 
				 'LAS LOMAS', 
				 'TAMBO GRANDE', 
				 'AYABACA', 
				 'FRIAS', 
				 'JILILI', 
				 'LAGUNAS', 
				 'MONTERO', 
				 'PACAIPAMPA', 
				 'PAIMAS', 
				 'SAPILLICA', 
				 'SICCHEZ', 
				 'SUYO', 
				 'HUANCABAMBA', 
				 'CANCHAQUE', 
				 'EL CARMEN DE LA FRONTERA', 
				 'HUARMACA', 
				 'LALAQUIZ', 
				 'SAN MIGUEL DE EL FAIQUE', 
				 'SONDOR', 
				 'SONDORILLO', 
				 'CHULUCANAS', 
				 'BUENOS AIRES', 
				 'CHALACO', 
				 'LA MATANZA', 
				 'MORROPON', 
				 'SALITRAL', 
				 'SAN JUAN DE BIGOTE', 
				 'SANTA CATALINA DE MOSSA', 
				 'SANTO DOMINGO', 
				 'YAMANGO', 
				 'PAITA', 
				 'AMOTAPE', 
				 'ARENAL', 
				 'COLAN', 
				 'LA HUACA', 
				 'TAMARINDO', 
				 'VICHAYAL', 
				 'SULLANA', 
				 'BELLAVISTA', 
				 'IGNACIO ESCUDERO', 
				 'LANCONES', 
				 'MARCAVELICA', 
				 'MIGUEL CHECA', 
				 'QUERECOTILLO', 
				 'SALITRAL', 
				 'PARIÑAS', 
				 'EL ALTO', 
				 'LA BREA', 
				 'LOBITOS', 
				 'LOS ORGANOS', 
				 'MANCORA', 
				 'SECHURA', 
				 'BELLAVISTA DE LA UNION', 
				 'BERNAL', 
				 'CRISTO NOS VALGA', 
				 'VICE', 
				 'RINCONADA LLICUAR', 
				 'PUNO', 
				 'ACORA', 
				 'AMANTANI', 
				 'ATUNCOLLA', 
				 'CAPACHICA', 
				 'CHUCUITO', 
				 'COATA', 
				 'HUATA', 
				 'MAÑAZO', 
				 'PAUCARCOLLA', 
				 'PICHACANI', 
				 'PLATERIA', 
				 'SAN ANTONIO', 
				 'TIQUILLACA', 
				 'VILQUE', 
				 'AZANGARO', 
				 'ACHAYA', 
				 'ARAPA', 
				 'ASILLO', 
				 'CAMINACA', 
				 'CHUPA', 
				 'JOSE DOMINGO CHOQUEHUANCA', 
				 'MUÑANI', 
				 'POTONI', 
				 'SAMAN', 
				 'SAN ANTON', 
				 'SAN JOSE', 
				 'SAN JUAN DE SALINAS', 
				 'SANTIAGO DE PUPUJA', 
				 'TIRAPATA', 
				 'MACUSANI', 
				 'AJOYANI', 
				 'AYAPATA', 
				 'COASA', 
				 'CORANI', 
				 'CRUCERO', 
				 'ITUATA', 
				 'OLLACHEA', 
				 'SAN GABAN', 
				 'USICAYOS', 
				 'JULI', 
				 'DESAGUADERO', 
				 'HUACULLANI', 
				 'KELLUYO', 
				 'PISACOMA', 
				 'POMATA', 
				 'ZEPITA', 
				 'ILAVE', 
				 'CAPAZO', 
				 'PILCUYO', 
				 'SANTA ROSA', 
				 'CONDURIRI', 
				 'HUANCANE', 
				 'COJATA', 
				 'HUATASANI', 
				 'INCHUPALLA', 
				 'PUSI', 
				 'ROSASPATA', 
				 'TARACO', 
				 'VILQUE CHICO', 
				 'LAMPA', 
				 'CABANILLA', 
				 'CALAPUJA', 
				 'NICASIO', 
				 'OCUVIRI', 
				 'PALCA', 
				 'PARATIA', 
				 'PUCARA', 
				 'SANTA LUCIA', 
				 'VILAVILA', 
				 'AYAVIRI', 
				 'ANTAUTA', 
				 'CUPI', 
				 'LLALLI', 
				 'MACARI', 
				 'NUÑOA', 
				 'ORURILLO', 
				 'SANTA ROSA', 
				 'UMACHIRI', 
				 'MOHO', 
				 'CONIMA', 
				 'HUAYRAPATA', 
				 'TILALI', 
				 'PUTINA', 
				 'ANANEA', 
				 'PEDRO VILCA APAZA', 
				 'QUILCAPUNCU', 
				 'SINA', 
				 'JULIACA', 
				 'CABANA', 
				 'CABANILLAS', 
				 'CARACOTO', 
				 'SANDIA', 
				 'CUYOCUYO', 
				 'LIMBANI', 
				 'PATAMBUCO', 
				 'PHARA', 
				 'QUIACA', 
				 'SAN JUAN DEL ORO', 
				 'YANAHUAYA', 
				 'ALTO INAMBARI', 
				 'YUNGUYO', 
				 'ANAPIA', 
				 'COPANI', 
				 'CUTURAPI', 
				 'OLLARAYA', 
				 'TINICACHI', 
				 'UNICACHI', 
				 'MOYOBAMBA', 
				 'CALZADA', 
				 'HABANA', 
				 'JEPELACIO', 
				 'SORITOR', 
				 'YANTALO', 
				 'BELLAVISTA', 
				 'ALTO BIAVO', 
				 'BAJO BIAVO', 
				 'HUALLAGA', 
				 'SAN PABLO', 
				 'SAN RAFAEL', 
				 'SAN JOSE DE SISA', 
				 'AGUA BLANCA', 
				 'SAN MARTIN', 
				 'SANTA ROSA', 
				 'SHATOJA', 
				 'SAPOSOA', 
				 'ALTO SAPOSOA', 
				 'EL ESLABON', 
				 'PISCOYACU', 
				 'SACANCHE', 
				 'TINGO DE SAPOSOA', 
				 'LAMAS', 
				 'ALONSO DE ALVARADO', 
				 'BARRANQUITA', 
				 'CAYNARACHI', 
				 'CUÑUMBUQUI', 
				 'PINTO RECODO', 
				 'RUMISAPA', 
				 'SAN ROQUE DE CUMBAZA', 
				 'SHANAO', 
				 'TABALOSOS', 
				 'ZAPATERO', 
				 'JUANJUI', 
				 'CAMPANILLA', 
				 'HUICUNGO', 
				 'PACHIZA', 
				 'PAJARILLO', 
				 'PICOTA', 
				 'BUENOS AIRES', 
				 'CASPISAPA', 
				 'PILLUANA', 
				 'PUCACACA', 
				 'SAN CRISTOBAL', 
				 'SAN HILARION', 
				 'SHAMBOYACU', 
				 'TINGO DE PONASA', 
				 'TRES UNIDOS', 
				 'RIOJA', 
				 'AWAJUN', 
				 'ELIAS SOPLIN VARGAS', 
				 'NUEVA CAJAMARCA', 
				 'PARDO MIGUEL', 
				 'POSIC', 
				 'SAN FERNANDO', 
				 'YORONGOS', 
				 'YURACYACU', 
				 'TARAPOTO', 
				 'ALBERTO LEVEAU', 
				 'CACATACHI', 
				 'CHAZUTA', 
				 'CHIPURANA', 
				 'EL PORVENIR', 
				 'HUIMBAYOC', 
				 'JUAN GUERRA', 
				 'LA BANDA DE SHILCAYO', 
				 'MORALES', 
				 'PAPAPLAYA', 
				 'SAN ANTONIO', 
				 'SAUCE', 
				 'SHAPAJA', 
				 'TOCACHE', 
				 'NUEVO PROGRESO', 
				 'POLVORA', 
				 'SHUNTE', 
				 'UCHIZA', 
				 'TACNA', 
				 'ALTO DE LA ALIANZA', 
				 'CALANA', 
				 'CIUDAD NUEVA', 
				 'INCLAN', 
				 'PACHIA', 
				 'PALCA', 
				 'POCOLLAY', 
				 'SAMA', 
				 'CORONEL GREGORIO ALBARRACIN LANCHIPA', 
				 'CANDARAVE', 
				 'CAIRANI', 
				 'CAMILACA', 
				 'CURIBAYA', 
				 'HUANUARA', 
				 'QUILAHUANI', 
				 'LOCUMBA', 
				 'ILABAYA', 
				 'ITE', 
				 'TARATA', 
				 'CHUCATAMANI', 
				 'ESTIQUE', 
				 'ESTIQUE-PAMPA', 
				 'SITAJARA', 
				 'SUSAPAYA', 
				 'TARUCACHI', 
				 'TICACO', 
				 'TUMBES', 
				 'CORRALES', 
				 'LA CRUZ', 
				 'PAMPAS DE HOSPITAL', 
				 'SAN JACINTO', 
				 'SAN JUAN DE LA VIRGEN', 
				 'ZORRITOS', 
				 'CASITAS', 
				 'ZARUMILLA', 
				 'AGUAS VERDES', 
				 'MATAPALO', 
				 'PAPAYAL', 
				 'CALLERIA', 
				 'CAMPOVERDE', 
				 'IPARIA', 
				 'MASISEA', 
				 'YARINACOCHA', 
				 'NUEVA REQUENA', 
				 'RAYMONDI', 
				 'SEPAHUA', 
				 'TAHUANIA', 
				 'YURUA', 
				 'PADRE ABAD', 
				 'IRAZOLA', 
				 'CURIMANA', 
				 'PURUS'
        	);

    	for ($i=1; $i<=21; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "1",
             ]);
    	}
    	for ($i=22; $i<=26; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "2",
             ]);
    	}
    	for ($i=27; $i<=38; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "3",
             ]);
    	}
    	for ($i=39; $i<=41; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "4",
             ]);
    	}
    	for ($i=42; $i<=64; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "5",
             ]);
    	}
    	for ($i=65; $i<=76; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "6",
             ]);
    	}
    	for ($i=77; $i<=83; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "7",
             ]);
    	}
    	for ($i=84; $i<=95; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "8",
             ]);
    	}
    	for ($i=96; $i<=100; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "9",
             ]);
    	}
    	for ($i=101; $i<=106; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "10",
             ]);
    	}
    	for ($i=107; $i<=108; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "11",
             ]);
    	}
    	for ($i=109; $i<=123; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "12",
             ]);
    	}
    	for ($i=124; $i<=134; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "13",
             ]);
    	}
    	for ($i=135; $i<=137; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "14",
             ]);
    	}
    	for ($i=138; $i<=141; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "15",
             ]);
    	}
    	for ($i=142; $i<=148; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "16",
             ]);
    	}
    	for ($i=149; $i<=164; $i++) { 
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "17",
             ]);
    	}
    	for ($i=165; $i<=169; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "18",
             ]);
    	}
    	for ($i=170; $i<=179; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "19",
             ]);
    	}
    	for ($i=180; $i<=187; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "20",
             ]);
    	}
    	for ($i=188; $i<=197; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "21",
             ]);
    	}
    	for ($i=198; $i<=208; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "22",
             ]);
    	}
    	for ($i=209; $i<=212; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "23",
             ]);
    	}
    	for ($i=213; $i<=222; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "24",
             ]);
    	}
    	for ($i=223; $i<=231; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "25",
             ]);
    	}
    	for ($i=232; $i<=241; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "26",
             ]);
    	}
    	for ($i=242; $i<=249; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "27",
             ]);
    	}
    	for ($i=250; $i<=258; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "28",
             ]);
    	}
    	for ($i=259; $i<=277; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "29",
             ]);
    	}
    	for ($i=278; $i<=284; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "30",
             ]);
    	}
    	for ($i=285; $i<=301; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "31",
             ]);
    	}
    	for ($i=302; $i<=307; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "32",
             ]);
    	}
    	for ($i=308; $i<=315; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "33",
             ]);
    	}
    	for ($i=316; $i<=329; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "34",
             ]);
    	}
    	for ($i=330; $i<=358; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "35",
             ]);
    	}
    	for ($i=359; $i<=366; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "36",
             ]);
    	}
    	for ($i=367; $i<=379; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "37",
             ]);
    	}
    	for ($i=380; $i<=393; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "38",
             ]);
    	}
    	for ($i=394; $i<=413; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "39",
             ]);
    	}
    	for ($i=414; $i<=421; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "40",
             ]);
    	}
    	for ($i=422; $i<=427; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "41",
             ]);
    	}
    	for ($i=428; $i<=438; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "42",
             ]);
    	}
    	for ($i=439; $i<=453; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "43",
             ]);
    	}
    	for ($i=454; $i<=459; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "44",
             ]);
    	}
    	for ($i=460; $i<=463; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "45",
             ]);
    	}
    	for ($i=464; $i<=471; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "46",
             ]);
    	}
    	for ($i=472; $i<=479; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "47",
             ]);
    	}
    	for ($i=480; $i<=500; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "48",
             ]);
    	}
    	for ($i=501; $i<=508; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "49",
             ]);
    	}
    	for ($i=509; $i<=518; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "50",
             ]);
    	}
    	for ($i=519; $i<=529; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "51",
             ]);
    	}
    	for ($i=530; $i<=541; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "52",
             ]);
    	}
    	for ($i=542; $i<=549; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "53",
             ]);
    	}
    	for ($i=550; $i<=562; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "54",
             ]);
    	}
    	for ($i=563; $i<=566; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "55",
             ]);
    	}
    	for ($i=567; $i<=578; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "56",
             ]);
    	}
    	for ($i=579; $i<=597; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "57",
             ]);
    	}
    	for ($i=598; $i<=605; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "58",
             ]);
    	}
    	for ($i=606; $i<=620; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "59",
             ]);
    	}
    	for ($i=621; $i<=623; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "60",
             ]);
    	}
    	for ($i=624; $i<=635; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "61",
             ]);
    	}
    	for ($i=636; $i<=642; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "62",
             ]);
    	}
    	for ($i=643; $i<=649; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "63",
             ]);
    	}
    	for ($i=650; $i<=663; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "64",
             ]);
    	}
    	for ($i=664; $i<=667; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "65",
             ]);
    	}
    	for ($i=668; $i<=678; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "66",
             ]);
    	}
    	for ($i=679; $i<=692; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "67",
             ]);
    	}
    	for ($i=693; $i<=699; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "68",
             ]);
    	}
    	for ($i=700; $i<=708; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "69",
             ]);
    	}
    	for ($i=709; $i<=716; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "70",
             ]);
    	}
    	for ($i=717; $i<=724; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "71",
             ]);
    	}
    	for ($i=725; $i<=732; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "72",
             ]);
    	}
    	for ($i=733; $i<=740; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "73",
             ]);
    	}
    	for ($i=741; $i<=748; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "74",
             ]);
    	}
    	for ($i=749; $i<=758; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "75",
             ]);
    	}
    	for ($i=759; $i<=767; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "76",
             ]);
    	}
    	for ($i=768; $i<=773; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "77",
             ]);
    	}
    	for ($i=774; $i<=785; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "78",
             ]);
    	}
    	for ($i=786; $i<=792; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "79",
             ]);
    	}
    	for ($i=793; $i<=811; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "80",
             ]);
    	}
    	for ($i=812; $i<=819; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "81",
             ]);
    	}
    	for ($i=820; $i<=831; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "82",
             ]);
    	}
    	for ($i=832; $i<=844; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "83",
             ]);
    	}
    	for ($i=845; $i<=854; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "84",
             ]);
    	}
    	for ($i=855; $i<=870; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "85",
             ]);
    	}
    	for ($i=871; $i<=886; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "86",
             ]);
    	}
    	for ($i=887; $i<=897; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "87",
             ]);
    	}
    	for ($i=898; $i<=905; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "88",
             ]);
    	}
    	for ($i=906; $i<=914; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "89",
             ]);
    	}
    	for ($i=915; $i<=918; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "90",
             ]);
    	}
    	for ($i=919; $i<=929; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "91",
             ]);
    	}
    	for ($i=930; $i<=935; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "92",
             ]);
    	}
    	for ($i=936; $i<=938; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "93",
             ]);
    	}
    	for ($i=939; $i<=942; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "94",
             ]);
    	}
    	for ($i=943; $i<=947; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "95",
             ]);
    	}
    	for ($i=948; $i<=954; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "96",
             ]);
    	}
    	for ($i=955; $i<=962; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "97",
             ]);
    	}
    	for ($i=963; $i<=976; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "98",
             ]);
    	}
    	for ($i=977; $i<=987; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "99",
             ]);
    	}
    	for ($i=988; $i<=992; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "100",
             ]);
    	}
    	for ($i=993; $i<=997; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "101",
             ]);
    	}
    	for ($i=998; $i<=1005; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "102",
             ]);
    	}
    	for ($i=1006; $i<=1035; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "103",
             ]);
    	}
    	for ($i=1036; $i<=1048; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "104",
             ]);
    	}
    	for ($i=1049; $i<=1054; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "105",
             ]);
    	}
    	for ($i=1055; $i<=1088; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "106",
             ]);
    	}
    	for ($i=1089; $i<=1092; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "107",
             ]);
    	}
    	for ($i=1093; $i<=1100; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "108",
             ]);
    	}
    	for ($i=1101; $i<=1109; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "109",
             ]);
    	}
    	for ($i=1110; $i<=1119; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "110",
             ]);
    	}
    	for ($i=1120; $i<=1128; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "111",
             ]);
    	}
    	for ($i=1129; $i<=1139; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "112",
             ]);
    	}
    	for ($i=1140; $i<=1147; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "113",
             ]);
    	}
    	for ($i=1148; $i<=1153; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "114",
             ]);
    	}
    	for ($i=1154; $i<=1156; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "115",
             ]);
    	}
    	for ($i=1157; $i<=1160; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "116",
             ]);
    	}
    	for ($i=1161; $i<=1170; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "117",
             ]);
    	}
    	for ($i=1171; $i<=1175; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "118",
             ]);
    	}
    	for ($i=1176; $i<=1188; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "119",
             ]);
    	}
    	for ($i=1189; $i<=1196; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "120",
             ]);
    	}
    	for ($i=1197; $i<=1204; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "121",
             ]);
    	}
    	for ($i=1205; $i<=1209; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "122",
             ]);
    	}
    	for ($i=1210; $i<=1212; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "123",
             ]);
    	}
    	for ($i=1213; $i<=1232; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "124",
             ]);
    	}
    	for ($i=1233; $i<=1238; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "125",
             ]);
    	}
    	for ($i=1239; $i<=1250; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "126",
             ]);
    	}
    	for ($i=1251; $i<=1293; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "127",
             ]);
    	}
    	for ($i=1294; $i<=1298; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "128",
             ]);
    	}
    	for ($i=1299; $i<=1303; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "129",
             ]);
    	}
    	for ($i=1304; $i<=1310; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "130",
             ]);
    	}
    	for ($i=1311; $i<=1326; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "131",
             ]);
    	}
    	for ($i=1327; $i<=1338; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "132",
             ]);
    	}
    	for ($i=1339; $i<=1370; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "133",
             ]);
    	}
    	for ($i=1371; $i<=1382; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "134",
             ]);
    	}
    	for ($i=1383; $i<=1388; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "135",
             ]);
    	}
    	for ($i=1389; $i<=1421; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "136",
             ]);
    	}
    	for ($i=1422; $i<=1433; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "137",
             ]);
    	}
    	for ($i=1434; $i<=1444; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "138",
             ]);
    	}
    	for ($i=1445; $i<=1449; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "139",
             ]);
    	}
    	for ($i=1450; $i<=1453; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "140",
             ]);
    	}
    	for ($i=1454; $i<=1464; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "141",
             ]);
    	}
    	for ($i=1465; $i<=1470; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "142",
             ]);
    	}
    	for ($i=1471; $i<=1474; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "143",
             ]);
    	}
    	for ($i=1475; $i<=1478; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "144",
             ]);
    	}
    	for ($i=1479; $i<=1481; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "145",
             ]);
    	}
    	for ($i=1482; $i<=1487; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "146",
             ]);
    	}
    	for ($i=1488; $i<=1498; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "147",
             ]);
    	}
    	for ($i=1499; $i<=1501; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "148",
             ]);
    	}
    	for ($i=1502; $i<=1514; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "149",
             ]);
    	}
    	for ($i=1515; $i<=1522; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "150",
             ]);
    	}
    	for ($i=1523; $i<=1529; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "151",
             ]);
    	}
    	for ($i=1530; $i<=1538; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "152",
             ]);
    	}
    	for ($i=1539; $i<=1548; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "153",
             ]);
    	}
    	for ($i=1549; $i<=1556; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "154",
             ]);
    	}
    	for ($i=1557; $i<=1567; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "155",
             ]);
    	}
    	for ($i=1568; $i<=1573; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "156",
             ]);
    	}
    	for ($i=1574; $i<=1581; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "157",
             ]);
    	}
    	for ($i=1582; $i<=1587; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "158",
             ]);
    	}
    	for ($i=1588; $i<=1593; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "159",
             ]);
    	}
    	for ($i=1594; $i<=1608; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "160",
             ]);
    	}
    	for ($i=1509; $i<=1623; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "161",
             ]);
    	}
    	for ($i=1624; $i<=1633; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "162",
             ]);
    	}
    	for ($i=1634; $i<=1640; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "163",
             ]);
    	}
    	for ($i=1641; $i<=1645; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "164",
             ]);
    	}
    	for ($i=1646; $i<=1653; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "165",
             ]);
    	}
    	for ($i=1654; $i<=1663; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "166",
             ]);
    	}
    	for ($i=1664; $i<=1672; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "167",
             ]);
    	}
    	for ($i=1673; $i<=1676; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "168",
             ]);
    	}
    	for ($i=1677; $i<=1681; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "169",
             ]);
    	}
    	for ($i=1682; $i<=1685; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "170",
             ]);
    	}
    	for ($i=1686; $i<=1694; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "171",
             ]);
    	}
    	for ($i=1695; $i<=1701; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "172",
             ]);
    	}
    	for ($i=1702; $i<=1707; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "173",
             ]);
    	}
    	for ($i=1708; $i<=1713; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "174",
             ]);
    	}
    	for ($i=1714; $i<=1718; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "175",
             ]);
    	}
    	for ($i=1719; $i<=1724; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "176",
             ]);
    	}
    	for ($i=1725; $i<=1735; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "177",
             ]);
    	}
    	for ($i=1736; $i<=1740; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "178",
             ]);
    	}
    	for ($i=1741; $i<=1750; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "179",
             ]);
    	}
    	for ($i=1751; $i<=1759; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "180",
             ]);
    	}
    	for ($i=1760; $i<=1773; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "181",
             ]);
    	}
    	for ($i=1774; $i<=1778; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "182",
             ]);
    	}
    	for ($i=1779; $i<=1788; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "183",
             ]);
    	}
    	for ($i=1789; $i<=1794; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "184",
             ]);
    	}
    	for ($i=1795; $i<=1797; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "185",
             ]);
    	}
    	for ($i=1798; $i<=1805; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "186",
             ]);
    	}
    	for ($i=1806; $i<=1811; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "187",
             ]);
    	}
    	for ($i=1812; $i<=1813; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "188",
             ]);
    	}
    	for ($i=1814; $i<=1817; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "189",
             ]);
    	}
    	for ($i=1818; $i<=1823; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "190",
             ]);
    	}
    	for ($i=1824; $i<=1827; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "191",
             ]);
    	}
    	for ($i=1828; $i<=1830; $i++) {
    		DB::table('distritos')->insert([
                'distrito' => $array[$i-1],
                'provincia_id' => "192",
             ]);
    	}
    		DB::table('distritos')->insert([
                'distrito' => $array[1831-1],
                'provincia_id' => "193",
             ]);
    		DB::table('distritos')->insert([
                'distrito' => 'Extranjero',
                'provincia_id' => "194",
             ]);
    }
}