<?php
return [
	'mode'                 => '',
	'format'               => 'A4',
	'default_font_size'    => '12',
	'default_font'         => 'sans-serif',
	'margin_left'          => 10,
	'margin_right'         => 10,
	'margin_top'           => 10,
	'margin_bottom'        => 10,
	'margin_header'        => 0,
	'margin_footer'        => 0,
	'orientation'          => 'P',
	'title'                => 'Dilip Gauswami',
	'author'               => 'NIC',
	'watermark'            => 'Test',
	'show_watermark'       => true,
	'watermark_font'       => 'sans-serif',
	'display_mode'         => 'fullpage',
	'watermark_text_alpha' => 0.1,
	'custom_font_dir'      => base_path('resources/fonts/'),
	'custom_font_data' 	   => [
				"dejavusanscondensed" => [
					'R' => "DejaVuSansCondensed.ttf",
					'B' => "DejaVuSansCondensed-Bold.ttf",
					'I' => "DejaVuSansCondensed-Oblique.ttf",
					'BI' => "DejaVuSansCondensed-BoldOblique.ttf",
					'useOTL' => 0xFF,
					'useKashida' => 75,
				],
				"dejavusans" => [
					'R' => "DejaVuSans.ttf",
					'B' => "DejaVuSans-Bold.ttf",
					'I' => "DejaVuSans-Oblique.ttf",
					'BI' => "DejaVuSans-BoldOblique.ttf",
					'useOTL' => 0xFF,
					'useKashida' => 75,
				],
				"dejavuserif" => [
					'R' => "DejaVuSerif.ttf",
					'B' => "DejaVuSerif-Bold.ttf",
					'I' => "DejaVuSerif-Italic.ttf",
					'BI' => "DejaVuSerif-BoldItalic.ttf",
				],
				"dejavuserifcondensed" => [
					'R' => "DejaVuSerifCondensed.ttf",
					'B' => "DejaVuSerifCondensed-Bold.ttf",
					'I' => "DejaVuSerifCondensed-Italic.ttf",
					'BI' => "DejaVuSerifCondensed-BoldItalic.ttf",
				],
				"dejavusansmono" => [
					'R' => "DejaVuSansMono.ttf",
					'B' => "DejaVuSansMono-Bold.ttf",
					'I' => "DejaVuSansMono-Oblique.ttf",
					'BI' => "DejaVuSansMono-BoldOblique.ttf",
					'useOTL' => 0xFF,
					'useKashida' => 75,
				],
				"freesans" => [
					'R' => "FreeSans.ttf",
					'B' => "FreeSansBold.ttf",
					'I' => "FreeSansOblique.ttf",
					'BI' => "FreeSansBoldOblique.ttf",
					'useOTL' => 0xFF,
				],
				"freeserif" => [
					'R' => "FreeSerif.ttf",
					'B' => "FreeSerifBold.ttf",
					'I' => "FreeSerifItalic.ttf",
					'BI' => "FreeSerifBoldItalic.ttf",
					'useOTL' => 0xFF,
					'useKashida' => 75,
				],
				"shruti" => [
					'R' => "shruti.ttf",
					'B' => "shrutib.ttf",
					'I' => "shruti.ttf",
					'BI' => "shruti.ttf",
					'useOTL' => 0xFF,
					'useKashida' => 75,
				],
				"freemono" => [
					'R' => "FreeMono.ttf",
					'B' => "FreeMonoBold.ttf",
					'I' => "FreeMonoOblique.ttf",
					'BI' => "FreeMonoBoldOblique.ttf",
				],
				/* OCR-B font for Barcodes */
				"ocrb" => [
					'R' => "ocrb10.ttf",
				],
				/* Miscellaneous language font(s) */
				"estrangeloedessa" => [/* Syriac */
					'R' => "SyrCOMEdessa.otf",
					'useOTL' => 0xFF,
				],
				"kaputaunicode" => [/* Sinhala  */
					'R' => "kaputaunicode.ttf",
					'useOTL' => 0xFF,
				],
				"abyssinicasil" => [/* Ethiopic */
					'R' => "Abyssinica_SIL.ttf",
					'useOTL' => 0xFF,
				],
				"aboriginalsans" => [/* Cherokee and Canadian */
					'R' => "AboriginalSansREGULAR.ttf",
				],
				"jomolhari" => [/* Tibetan */
					'R' => "Jomolhari.ttf",
					'useOTL' => 0xFF,
				],
				"sundaneseunicode" => [/* Sundanese */
					'R' => "SundaneseUnicode-1.0.5.ttf",
					'useOTL' => 0xFF,
				],
				"taiheritagepro" => [/* Tai Viet */
					'R' => "TaiHeritagePro.ttf",
				],
				"aegean" => [
					'R' => "Aegean.otf",
					'useOTL' => 0xFF,
				],
				"aegyptus" => [
					'R' => "Aegyptus.otf",
					'useOTL' => 0xFF,
				],
				"akkadian" => [/* Cuneiform */
					'R' => "Akkadian.otf",
					'useOTL' => 0xFF,
				],
				"quivira" => [
					'R' => "Quivira.otf",
					'useOTL' => 0xFF,
				],
				"eeyekunicode" => [/* Meetei Mayek */
					'R' => "Eeyek.ttf",
				],
				"lannaalif" => [/* Tai Tham */
					'R' => "lannaalif-v1-03.ttf",
					'useOTL' => 0xFF,
				],
				"daibannasilbook" => [/* New Tai Lue */
					'R' => "DBSILBR.ttf",
				],
				"garuda" => [/* Thai */
					'R' => "Garuda.ttf",
					'B' => "Garuda-Bold.ttf",
					'I' => "Garuda-Oblique.ttf",
					'BI' => "Garuda-BoldOblique.ttf",
					'useOTL' => 0xFF,
				],
				"khmeros" => [/* Khmer */
					'R' => "KhmerOS.ttf",
					'useOTL' => 0xFF,
				],
				"dhyana" => [/* Lao fonts */
					'R' => "Dhyana-Regular.ttf",
					'B' => "Dhyana-Bold.ttf",
					'useOTL' => 0xFF,
				],
				"tharlon" => [/* Myanmar / Burmese */
					'R' => "Tharlon-Regular.ttf",
					'useOTL' => 0xFF,
				],
				"padaukbook" => [/* Myanmar / Burmese */
					'R' => "Padauk-book.ttf",
					'useOTL' => 0xFF,
				],
				"zawgyi-one" => [/* Myanmar / Burmese */
					'R' => "ZawgyiOne.ttf",
					'useOTL' => 0xFF,
				],
				"ayar" => [/* Myanmar / Burmese */
					'R' => "ayar.ttf",
					'useOTL' => 0xFF,
				],
				"taameydavidclm" => [/* Hebrew with full Niqud and Cantillation */
					'R' => "TaameyDavidCLM-Medium.ttf",
					'useOTL' => 0xFF,
				],
				/* SMP */
				"mph2bdamase" => [
					'R' => "damase_v.2.ttf",
				],
				/* Indic */
				"lohitkannada" => [
					'R' => "Lohit-Kannada.ttf",
					'useOTL' => 0xFF,
				],
				"pothana2000" => [
					'R' => "Pothana2000.ttf",
					'useOTL' => 0xFF,
				],
				/* Arabic fonts */
				"xbriyaz" => [
					'R' => "XB Riyaz.ttf",
					'B' => "XB RiyazBd.ttf",
					'I' => "XB RiyazIt.ttf",
					'BI' => "XB RiyazBdIt.ttf",
					'useOTL' => 0xFF,
					'useKashida' => 75,
				],
				"lateef" => [/* Sindhi, Pashto and Urdu */
					'R' => "LateefRegOT.ttf",
					'useOTL' => 0xFF,
					'useKashida' => 75,
				],
				"kfgqpcuthmantahanaskh" => [/* KFGQPC Uthman Taha Naskh - Koranic */
					'R' => "Uthman.otf",
					'useOTL' => 0xFF,
					'useKashida' => 75,
				],
				/* CJK fonts */
				"sun-exta" => [
					'R' => "Sun-ExtA.ttf",
					'sip-ext' => 'sun-extb', /* SIP=Plane2 Unicode (extension B) */
				],
				"sun-extb" => [
					'R' => "Sun-ExtB.ttf",
				],
				"unbatang" => [/* Korean */
					'R' => "UnBatang_0613.ttf",
				],			
		],
	'fonttrans' => [
				'times' => 'timesnewroman',
				'courier' => 'couriernew',
				'trebuchet' => 'trebuchetms',
				'comic' => 'comicsansms',
				'franklin' => 'franklingothicbook',
				'ocr-b' => 'ocrb',
				'ocr-b10bt' => 'ocrb',
				'damase' => 'mph2bdamase',
				'shruti'=>'shruti',	   
			],
	'auto_language_detection'  => true,
	'temp_dir'               => rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR),
	'pdfa' 			=> false,
        'pdfaauto' 		=> false,
];