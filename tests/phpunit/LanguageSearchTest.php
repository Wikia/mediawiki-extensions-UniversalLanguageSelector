<?php
/**
 * PHPUnit tests for UniversalLanguageSelector extension.
 *
 * Copyright (C) 2012 Alolita Sharma, Amir Aharoni, Arun Ganesh, Brandon Harris,
 * Niklas Laxström, Pau Giner, Santhosh Thottingal, Siebrand Mazeland and other
 * contributors. See CREDITS for a list.
 *
 * UniversalLanguageSelector is dual licensed GPLv2 or later and MIT. You don't
 * have to do anything special to choose one license or the other and you don't
 * have to notify anyone which license you are using. You are free to use
 * UniversalLanguageSelector in commercial projects as long as the copyright
 * header is left intact. See files GPL-LICENSE and MIT-LICENSE for details.
 *
 * @file
 * @ingroup Extensions
 * @licence GNU General Public Licence 2.0 or later
 * @licence MIT License
 */
require_once __DIR__ . '/../../data/LanguageNameSearch.php';
class LanguageSearchTest extends PHPUnit_Framework_TestCase {
	/**
	 * @dataProvider searchDataProvider
	 */
	public function testSearch( $searchKey, $expected ) {
		$actual = LanguageNameSearch::search( $searchKey, 1 );
		$this->assertEquals( $expected, $actual );
	}

	public function searchDataProvider() {
		return [
			[ 'ഹിന്ദി', [
				'hi' => 'ഹിന്ദി'
			]
			],
			[ 'മല', [
				'ml' => 'മലയാളം',
				'mg' => 'മലഗാസി',
				'ms' => 'മലെയ്',
			]
			],
			[ 'Φινλαν', [
				'fi' => 'φινλανδικά',
			]
			],
			[ 'blah', []
			],
			[ 'الفرنسية', [
				'fr' => 'الفرنسية',
				'fr-ca' => 'الفرنسية الكندية',
				'fr-ch' => 'الفرنسية السويسرية',
				'frm' => 'الفرنسية الوسطى',
				'fro' => 'الفرنسية القديمة',
				'crs' => 'الفرنسية الكريولية السيشيلية'
			]
			],
			[ 'മലയളം', [
				'ml' => 'മലയാളം',
			]
			],
			[ 'punja', [
				'pa' => 'punjabi <èdè punjabi>',
				'pnb' => 'punjabi western',
			]
			],
			[ 'kartuli', [
				'ka' => 'kartuli',
			]
			],
			[ 'valencia', [
				'ca' => 'valencia',
			]
			],
			[ 'chinese', [
				'zh-hans' => 'chinese simplified',
				'zh-hant' => 'chinese traditional',
				'zh' => 'chinesesch',
				'zh-cn' => 'chinese (china)',
				'zh-hk' => 'chinese (hong kong)',
				'zh-min-nan' => 'chinese (min nan)',
				'zh-sg' => 'chinese (singapore)',
				'zh-tw' => 'chinese (taiwan)',
				'cdo' => 'chinese <min dong chinese>',
				'gan' => 'chinese <isi-gan chinese>',
				'hak' => 'chinese <isi-hakka chinese>',
				'lzh' => 'chinesesch <klassescht chinesesch>',
				'nan' => 'chinese <isi-min nan chinese>',
				'wuu' => 'chinese <isi-wu chinese>',
				'zh-classical' => 'chinese <classical chinese>',
				'hsn' => 'chinese <isi-xiang chinese>',
			]
			],
			[ 'finish', [
				'fi' => 'finnish'
			]
			],
		];
	}
}
