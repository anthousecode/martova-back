<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('foo');
});

Route::get('/3d', function () {
    return view('3d');
});

Route::get('/360', function () {
    return view('360');
})->name('360p');

Route::get('get-user-info/{key}', function ($key) {
    return \App\User::where('api_token', $key)->first()->except('password')->toArray();
});

Route::get('/display-custom-page', function () {
    $pageSlug = \Request::get('slug');
    if (!$pageSlug) {
       return response()->json(['message' => 'Slug not found'], 404);
    }
    $pageSlug = htmlspecialchars($pageSlug, ENT_NOQUOTES, 'UTF-8');

    $lang = \Request::get('lang') ?? 'ru';

    $columns = [];
    switch ($lang) {
           case 'ru':
            $columns = ['ru_title', 'ru_content', 'ru_meta_description'];
           break;
	   case 'ua':
            $columns = ['ua_title', 'ua_content', 'ua_meta_description'];
           break;
    }

    $data = \App\Models\Page::select($columns)->where('slug', $pageSlug)->first()->toArray();  
    if (!$data) {
       return response()->json(['message' => 'Page not found'], 404);
    }
    $responseData = [
             'title' => $data[$columns[0]],
             'content' => $data[$columns[1]],
             'description' => $data[$columns[2]],
     ];

    # if response content could be full html page - then return only it, otherwise return blade template with provided data
    return (!\Illuminate\Support\Str::contains($data[$columns[1]], "<html>")) 
	    ? view('custom_page', $responseData) 
	    : $data[$columns[1]];
    
});

Route::get('get-drive-file', function (\Illuminate\Http\Request $request) {
    $link = $request->link;

    $link = substr($link, 0, strpos($link, "&export="));
   /* $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $res = curl_exec($ch);

    curl_close($ch);*/
    // $info = curl_getinfo($ch);
    return $link;
    // TODO: $res returns as a boolean, but file needed
    return $res;

});


Route::get('/api/upload-files-for-areas/{num}/{key}', function ($num, $key) {
	if ($key != 'd6b2d6df-b269-4575-88bd-395bff78edd6') {
             return null;
	}
	$dirs = \Illuminate\Support\Facades\Storage::disk('ren')->directories('RENDER');
        $pathFolderNeeded = '';
	foreach ($dirs as $dir) {
		if (str_replace('RENDER/', '', $dir) == $num) {
			$pathFolderNeeded = $dir;
			break;
		}
	}
	if (strlen($pathFolderNeeded) == 0) {
		  return json_encode(['message' => 'No directory found for this area number'], 404);
	}
	$path = storage_path() . '/' . $pathFolderNeeded;
	$images = \File::files($path);
	$files = [];
	foreach ($images as $img) {
          $files[] = url('/') . '/storage/RENDER/' . $num . '/' . $img->getFileName();
	}
	
	return json_encode(['data' => $files], 200);
});
/*
Route::get('get-iframe-source-link', function () {
     $src = \Illuminate\Support\Facades\Request::input('link');
     if (!$src) {
        return response()->json(['message' => 'Input error'], 422);
     }
     $originalContent = file_get_contents($src);

    $script = "<script>window.onload = function () { document.getElementById('buttons_block').style.display='none !important'; document.getElementById('top_navbar').style.display='none !important';                      document.getElementById('tour_logo_sferika_id').style.display='none !important'; document.getElementsByTagName('audio')[0].style.display='none !important';  }</script>";
    
     $fixedContent = str_replace('</body>', $script . '</body>', $originalContent);

     $fixedContent = str_replace('"/', sprintf('"%s/', 'https://sferika.ru'), $fixedContent);
     $fixedContent = str_replace('"/', sprintf('"%s/', 'https://sferika.ru'), $fixedContent);

     echo $fixedContent;
});
 
Route::get('/clear-unused-images', function () {
    $googleDrive = new \App\Services\Cloud\GoogleDrive();
    $files = $googleDrive->fetchAllFiles();

    $areas = \App\Models\Area::all();
    $galleries = \App\Models\Gallery::all();
    $infrastructures = \App\Models\Infrastructure::all();
    $news = \App\Models\News::all();

    $urlsOfFilesToNotDelete = [];
    $urlsOfFilesToDelete = [];

    foreach ($areas as $area) {
        if ($area->plan) {
            if (in_array($area->plan, $files)) {
                $urlsOfFilesToNotDelete[] = $area->plan;
            }
        }
        if ($area->survey) {
            if (in_array($area->survey, $files)) {
                $urlsOfFilesToNotDelete[] = $area->survey;
            }
        }
        if ($area->image) {
            if (in_array($area->image, $files)) {
                $urlsOfFilesToNotDelete[] = $area->image;
            }
        }
    }
    foreach ($galleries as $gallery) {
        if ($gallery->image) {
            if (in_array($gallery->image, $files)) {
                $urlsOfFilesToNotDelete[] = $gallery->image;
            }
        }
    }
    foreach ($infrastructures as $infrastructure) {
        if ($infrastructure->image) {
            if (in_array($infrastructure->image, $files)) {
                $urlsOfFilesToNotDelete[] = $infrastructure->images;
            }
        }
        if ($infrastructure->video) {
            if (in_array($infrastructure->video, $files)) {
                $urlsOfFilesToNotDelete[] = $infrastructure->video;
            }
        }
    }
    foreach ($news as $newsItem) {
        if ($newsItem->image) {
            if (in_array($newsItem->image, $files)) {
                $urlsOfFilesToNotDelete[] = $newsItem->image;
            }
        }
    }

    foreach ($urlsOfFilesToNotDelete as $url) {
        if (!is_array($url, $files)) {
            $urlsOfFilesToDelete[] = $url;
        }
    }

    $idsToDelete = [];
    foreach ($files as $fileId => $fileurl) {
        if (in_array($fileurl, $urlsOfFilesToDelete)) {
            $idsToDelete[] = $fileId;
        }
    }

    foreach ($idsToDelete as $idToDelete) {
        $check = $googleDrive->deleteFileById($idToDelete);
        if ($check !== true) {
            dd($check);
        }
    }

});

Route::get('/fillDataNeeded', function () {
    dd(1);
    $numbers = [1,
        2,
        3,
        4,
        5,
        6,
        7,
        8,
        9,
        10,
        11,
        12,
        13,
        14,
        15,
        16,
        17,
        18,
        19,
        20,
        21,
        22,
        23,
        24,
        25,
        26,
        27,
        28,
        29,
        30,
        31,
        32,
        33,
        34,
        35,
        36,
        37,
        38,
        39,
        40,
        41,
        42,
        43,
        44,
        45,
        46,
        47,
        48,
        49,
        50,
        51,
        52,
        53,
        54,
        55,
        56,
        57,
        58,
        59,
        60,
        61,
        62,
        63,
        64,
        65,
        66,
        67,
        68,
        69,
        70,
        71,
        72,
        73,
        74,
        75,
        76,
        77,
        78,
        79,
        80,
        81,
        82,
        83,
        84,
        85,
        86,
        87,
        88,
        89,
        90,
        91,
        92,
        93,
        94,
        95,
        96,
        97,
        98,
        99,
        100,
        101,
        102];

    $polygons = [

        ["182,452,150,443,17,397,27,358,31,354,130,394,208,422"], ["182,412,130,394,32,354,64,325,210,381"],
        ["210,381,64,325,89,313,109,305,127,305,210,341,237,350"], ["237,350,210,341,125,305,155,302,175,283,265,316"],
        ["265,316,175,283,210,253,240,265,292,283"], ["238,469,195,455,182,452,232,396,285,418"],
        ["285,418,243,402,232,396,276,345,329,366"], ["329,366,276,345,276,345,320,294,374,312"],
        ["383,386,329,366,332,364,374,312,428,333"], ["339,438,285,417,329,366,383,386"],
        ["311,491,238,469,286,417,3385,438,313,468,327,473"], ["385,510,311,4915,327,473,341,480,360,459,416,477"],
        ["416,477,360,459,3825,435,438,453"], ["438,453,3825,435,405,408,460,429"], ["460,429,405,408,428,381,484,402"],
        ["484,402,427,382,461,342,520,359"], ["544,415,488,397,518,359,5805,374"], ["521,443,466,422,488,397,544,415"],
        ["500,467,444,448,466,422,521,443"], ["420,473,477,4925,500,467,444,448"],
        ["460,529,385,509,421,473,477,492,460,507,478,513"], ["535,5485,461,529,476,513,491,517,516,490,572,508"],
        ["572,508,516,490,539,466,595,484"], ["595,484,539,466,560,441,617,460"], ["617,460,560,441,584,415,6405,435"],
        ["6405,435,584,415,6155,381,6785,392"], ["7035,446,648,427,678,392,745,402"], ["680,471,624,453,648,427,7035,446"],
        ["658,495,602,477,624,453,680,471"], ["578,501,634,520,658,495,602,477"],
        ["607,568,535,548,578,501,634,520,613,542,627,548"], ["682,5875,607,568,627,548,641,553,656,5385,713,5565"],
        ["713,5565,656,5385,6795,5135,735,5325"], ["734,5325,6795,5135,702,4895,757,5075"],
        ["757,5075,702,4895,725,467,781,4835"], ["748,440,725,4665,781,4835,803,4595"], ["803,4595,749,440,778,407,843,4135"],
        ["8705,4625,816,4455,843,4135,913,4185"], ["846,487,790,4715,816,4455,8705,4625"],
        ["823,512,768,4955,790,4715,846,487"], ["799,5375,745,5205,768,4955,823,512"],
        ["721,5455,7755,5625,799,5375,745,5205"], ["757,607,720,598,682,587,721,5455,7755,5625,759,5812,7735,5855"],
        ["826,625,758,6075,773,5855,788,5905,803,5755,857,5935"], ["857,5935,803,5755,8265,549,880,568"],
        ["880,568,8265,549,849,525,905,542"], ["905,542,849,525,872,4995,928,519"], ["897,4725,872,499,927,520,952,495"],
        ["952,495,897,4725,921,450,975,469"], ["975,469,921,450,948,420,1018,4255"], ["10205,497,965,481,990,453,1045,471"],
        ["1045,471,990,453,1020,425,1090,423"], ["996,521,941,504,965,481,10205,497"], ["972,5455,919,528,942,504,996,521"],
        ["949,571,895,554,919,528,972,5455"], ["9255,595,872,578,895,553,949,571"],
        ["902,6465,850,6325,827,6255,872,578,926,595,906,620,9205,625"],
        ["972,666,902,6465,920,6255,934,6295,950,6135,1003,6315"], ["1003,6315,950,613,9725,586,1026,605"],
        ["1026,605,9725,586,999,559,1050,579"], ["1050,579,999,559,1022,5345,1076,5515"],
        ["1076,5515,1022,5345,1047,508,1100,525"], ["1100,525,1047,508,1072,4815,1124,4985"],
        ["1124,4985,1072,4815,1095,4555,1149,4715"], ["1149,4715,1095,4555,1123,4245,1194,425"],
        ["336,247,251,198,295,168,383,218"], ["383,218,295,168,342,140,430,190"], ["430,190,342,140,388,113,476,163"],
        ["476,163,388,113,435,85,524,134"], ["545,148,436,84,483,56,565,105,585,118"], ["462,299,363,257,412,227,498,271"],
        ["498,271,412,227,456,200,533,242"], ["532,242,456,201,500,174,572,210"], ["572,210,499,175,545,148,609,181,587,200"],
        ["637,194,590,173,545,148,585,118,682,157"], ["741,221,645,188,683,157,767,190"], ["642,242,598,226,645,188,685,202"],
        ["599,281,550,265,598,226,642,242"], ["553,326,497,310,550,265,599,281"], ["688,257,642,242,685,202,724,215"],
        ["650,297,599,281,642,242,688,257"], ["611,340,553,326,599,281,650,297"], ["811,243,741,220,767,190,836,215"],
        ["788,271,732,251,754,225,811,243"], ["764,297,708,277,731,251,788,271"], ["741,323,684,303,708,277,764,297"],
        ["719,347,661,328,684,303,741,323"], ["708,358,645,346,661,328,719,347"], ["773,370,708,358,749,315,804,335"],
        ["804,335,749,315,774,288,830,307"], ["830,307,774,288,797,261,854,279"],
        ["854,279,797,261,836,215,905,242,889,262,872,257"], ["904,267,874,300,930,320,974,270,905,242,889,262"],
        ["907,347,850,328,874,300,930,320"], ["875,381,809,375,850,328,907,347"], ["941,388,875,381,918,334,975,353"],
        ["975,353,918,334,942,306,997,326"], ["998,326,941,306,974,270,1043,297,1026,316,1012,311"],
        ["1041,321,1022,342,1079,359,1114,325,1043,297,1026,316"], ["1050,391,981,389,1022,342,1079,359"],
        ["1120,391,1050,391,1087,352,1141,369"], ["1141,369,1087,352,1114,324,1167,344"],
    ];

    $areas = \App\Models\Area::all();
    $areasCount = count($areas);
    for ($i = 0; $i < $areasCount; $i++) {
        $areas[$i]->polygon = implode(',', $polygons[$i]);
        $areas[$i]->number = $numbers[$i];
        $areas[$i]->save();
    }
    dd('OK');
});
*/
