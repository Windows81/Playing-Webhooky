<?php
if($_SERVER['REQUEST_METHOD']!='POST'){
	$links=array(
		'https://github.com/Windows81/Playing-Webhooky',
	);
	echo'<script type="text/javascript">';
	echo'alert("That\'s what you '.$_SERVER['REQUEST_METHOD'].' for using the wrong HTTP method!  If you\'re interested in taking a look at the source code, get in touch with @Windows8point1 on Twitter.");';
	echo'window.location="'.$links[random_int(0,count($links)-1)].'";';
	echo'</script>';
	return;
}

function convert($s){return preg_replace('/.*(.{18})\/(.{68})/','$1/$2',$s);}
$id=intval(apache_request_headers()['Roblox-Id']??0);
$stuff=json_decode($sS=file_get_contents('php://input'),true);
$ua=$_SERVER['HTTP_USER_AGENT'];
$is=$ua==='Roblox/WinInet'?1:0;

if(isset($stuff['embeds']))$contentSQL=json_encode($stuff['embeds']);
else$contentSQL=$stuff['content'];
//$contentSQL=preg_replace("/([^\\\\]|^)[']/","$1\'",$contentSQL);
$contentSQL=preg_replace("/`/","``",$contentSQL);

$main=convert(
	$stuff['url']??
	$stuff['webhook']??
	array_values($_GET)[0]??'');

if(!isset($stuff['category'])){
	if(in_array($id,array(//Do-not-track list.
		3295803346,
		1542355302,
		1464784256,
		2099117697,
		2066546286,
		2175590126,
		610172644,
		934477751,
		452778997,
		2800976893)))
		$cat=4;
	elseif($main=='421862396034809859/8JOf5tY9aC28AsVQnDskJyJbzQJu4Mo_lOk3PtdMBi5q-9h9UOKmfz_cmgcDckGNJvba')
		$cat=1;
	elseif($id==1234584644)
		$cat=2;
	elseif(in_array($main,array(
		'532316432193814548'.'/ORyumOFm2kSBbnUx0N493hNfnuxOmH670KxhXygfC9jDlblZ-Wn3qJ90EnXAKFEdzS8D',
		'531882662345048066'.'/knSKOgwkQokcvBAeITe5xGau98rh01uGrOqek2mYPZTGVrpue3VgM6PVgSRdfpVmrNeK',
		'508532197179916288'.'/iuBs1Lj1-0mX8md9EXbSMtybo5mchs7gLs-WOZ_sUbxkasO8tlFu1MtO0PvA0lhZtUTL',
		'504070645655797793'.'/ZG7J0MSAWngBaQX_0T92gCheAtRIDt252TavtCXOM3iEJw3ZvV06jlTW7VLe79Vd2Xl-',
		'483039416445566976'.'/s8uZH98AdM8IKSHR_HhIgT4gFkgL3E3z-pVcHHKpU6BjJWgc21D2ZViP5-do2gAysyxW',
		'479064464881090590'.'/T_aztaap7ZCv-0CJoEEG7HTCoWM7YVqaXZano2Q5VB4eNeftPcIAdh9a2-O7jn-uWzV6',
		'566378589902340097'.'/okeJh5CFo0beqPojrBy3XA-FLdvLSpT6C67qHpBP6GSv4WyKBQ2VHtDBWhf62x59ZKE-',
		'474278985916743700'.'/d0szKR2KBv9GDyirbvnDP6BjT7PDJkxMdVd1HQwFfEb0T7xEJsadDug0nrNl79Obx88P',
		'476503432212250645'.'/UCgRNPAjYhL2qHKw12nIbsciKyXKaFLos2MU2G_BLpyTCtR8eAhAInbDyIxNWKpnuSXu')))
		$cat=3;
	elseif($main=='474894006308962324'.'/i3Wnw6Jdf7Y9kGkkf2ObKFu1xIcPcam1scBQvGXMrvEt_iSgdkepqJOFyyOFkvBy9XTY')
		$cat=5;
	elseif($main=='482683846962184192'.'/CcMmSrGgfNa-8MY_xSGHbVjl0eZZNCT30ygIhk5vHIr4D436JuXCoQINieXmsYj1pIPZ')
		$cat=6;
	elseif(in_array($main,array(
		'474788896379633674'.'/63DOibELoJwqwlUrAyecaN7lt3FLmq9-emqcNZ8i7RCxWNfVALCFFhLeNzBS-si4kGBa',
		'417423705090818072'.'/WO2wwPvRhPUwTb4BB11C1eA0TGcLvfkZz1_CvwPRb_9NZu43zN_5Jy3lbTW55pA2PFSM',
		'417425596629647360'.'/v7OTt4hLtnU7J-K0S6eBEa-fnEpHkLmXgwlfgjepjwygNSQVSgdx3xiou7p1sKPsu9n7',
		'418178105740492802'.'/9NsjDi7cH7SxWiNpos796d2NxCNXPAeGUafzS0h3V9hB5nl_7Qtcr5x8HEMDExxyXsO6',
		'428030478042398720'.'/L1fpjYqqNWk1iUPF7kxH_6OTfz1888HMLyMycUJOY7e_qoCBJ-9OsLzm4CkzdQLxeHWf',
		'473644865838776320'.'/AIBaolKwslGsLl4Ijsp4gwFlVYsYHVCb0sT-r6IVgI4fEpg5wh6KhwLFdTwqpYViX1Ky',
		'473645568493748225'.'/s5xLE3sI-baFghnB2ZqnMmF6sIl_03j_YweHwXRg1jZ9nerJi_-OK07TtwDqdvF8PUkh',
		'479099956540735488'.'/wCa5TPE2Ffp5EcwT3ClEpGS1o8KoXrw2ZvvW5fCgM85bxkAxbfES9ZXoF-y4lXQwXl7y')))
		$cat=7;
	elseif(in_array($id,array(
		2446896283,
		2173356585)))
		$cat=8;
	elseif(in_array($id,array(
		2301333872,
		2301378331)))
		$cat=9;
	elseif($main=='488335820747702292'.'/KoEFDRogbfJJnjWTsESPhJAjeDQEu6qx7dyNcfGR6PbmD8NVT5gEsDaOdaXqShbHA_cB')
		$cat=10;
	elseif(in_array($main,array(
		'505710000610476043'.'/rGlrZr_ORgiFytMJU3ZKYjUBKzxxdtno4ACt4D6jWEknq9N21S4zO0iMd3ohk9emyjI4',
		'526006051737174027'.'/Dq8PmfJnq2zScydMsQR_aB089cCa7KP0DaFxO8rkGsbSgsPUPPkzp0lyZYOKFvLfXAL-',
		'549929550545420299'.'/f0IzbcTe3-4VpPn_zUfX89jns8a2XbwoDpWUnXRHhxGKqkBgujpCLFRzt0r6tsZmotxi',
		'508242073967656960'.'/FFvyY4QJUjWOGoKz_EXTX4XFpCUMOivfofCpzhrLkZLDeck_x81tawM7wb1piuw8rwiL')))
		$cat=11;
	elseif(in_array($id,array(
		2024101481,
		2471612800,
		2714542731,
		422960210)))
		$cat=12;
	elseif(in_array($id,array(
		2418677660,
		2404625701,
		2418681569)))
		$cat=13;
	elseif(in_array($main,array(
		'515988329205071895'.'/SIboaalKFezHXkv5zuQ3zoDycwSFRS9sdmVg9_v5BsDZ_hTBWZKS0tOfiYCtF7IXrMaD',
		'515993888347914313'.'/PD30gKbD7fcPdyWxsBWZJ_uV2d96ZLBko08_QiDPVfoxACzAfcjfn21QBom3UQA29bVK')))
		$cat=15;
	elseif($main=='480390992315416596'.'/qrL3T8YrXzyI7wRxYk_yK5LR2KWBzHNhQjTjhNfNu8tWWpIqOk5Om482Yqd4fCbaP00c')
		$cat=16;
	elseif(in_array($main,array(
		'500847448478973982'.'/0_K53L5AsUwRN4FwIf7H-a9xJx4olH2-plqOG3_aPC4CB1HyskBN5rGHUB0RsjvcfX5d',
		'520279931360641035'.'/d6GjrCRrmWkbpTBxnnsF5xnWI-qpnchOmthhmb-8lvtVMwJ5Wz1Em7enyQ2rq1Vht5Ba',
		'525795062135652362'.'/gdxF4s0k9DFiuwfN66kq2I4N11Hq74w6411tkPNiw8z0GD6B8UXQ43W2gKVeNKFr2RiZ')))
		$cat=17;
	elseif(in_array($main,array(
		'521025782995222528'.'/OD82Upoh2PdtACtn1oqeQlz1CQU3IM8EBx-QxNJY4XWQIBoLUhXQ-RdTzlO7kJvfraQr',
		'526943422636883968'.'/ci0Z6quJH__sdc4vRU6eJRSu6DAFjeZWTQooHxO5-bABRyXwjhxcCg7_2E0zaantER9O',
		'526966685845028876'.'/YobEvigMQ5v5mrwa3lmwoGHDkLpcSsB3AA6bsmwzIQvflviKRQWaRAjDQ7aibmhWcQff',
		'531286190901428225'.'/mhajkDII8dYr7HuND0eflXgdiXOYVKNx3gK3lMChLfeLI2NNvLzRGyG3gRSHE3TCuqCi',
		'547996363552587798'.'/46lrqwhZlRY7shcDqFmzvS6RjAh5C0Y-FB3o0yR81r98_ZhDdolhrQXBxU6ZlM-BqH9u',
		'549764095096782858'.'/07tWhIsCDrRqQglsXsvRA4ciVmznlhRdCuMmlHKFt4a19VmCYehIssAsdhpU-FJJUP-S',
		'549765976065835028'.'/1vXLez81jhckCN2gOGnD0M5-S0STKfRhU9WOUnLuOq9ysF0Br34a775GfhTqnebKEHUJ',
		'521025782995222528'.'/OD82Upoh2PdtACtn1oqeQlz1CQU3IM8EBx-QxNJY4XWQIBoLUhXQ-RdTzlO7kJvfraQr',
		'526935904724582411'.'/43PyRfb3Usu7BtZu6y253OSaKp6tK0kpYsB9UKivSEwkNlKo97_meclr9BAHlyXE8g-5')))
		$cat=18;
	elseif($id==2616551764)
		$cat=19;
	elseif($main=='526502370809479188'.'/yMMmAT39fWppCGO4U0XzK51tBDhSg4s_98863WzWrJeKEDcgr6pdrpcxlF_6cfgjtnOf')
		$cat=20;
	elseif($main=='505163825809457163'.'/qX5_hDHK_LYt6gV2e50kGcmlNHiTGknP7rdjP6a1SikQdqRxUHgkcTarbz-V-QfAC1cR')
		$cat=21;
	elseif(in_array($main,array(
		'518619982637039637'.'/jC74B0TPOpDvdV2x0gPVGUuyKT9nZxRrNQPnuubS1WVnyjCNIK3bCd_bFI_2mImbVLSE',
		'555527425275068423'.'/5k4uxHt6Al69HhRcHBzgvyyFeyRxJxjCKrGL7cRQROoG5ipf2ISzMUi80584-YqvNQE_',
		'525703404660457482'.'/dPoXGcIta5F9mPtkiWYv45tlzgoLpGRsIo_g4vkzA1ciNMK49iLB6vFMvBBrV5T6j6gY',
		'543844714458382358'.'/LlYjmOd7O0gWjO5M5OEnSwji_xubltUwJCUYkrq1sIYqF9AGAl-iE6ZXiQ0DFR9o8zW7',
		'543878708285538314'.'/VIlEad6L7tFMe_KLOcRTE4XuFo3Ks_Qo4akGVelE9Ewv0uV4k3DHPz1Au9UT6W0avamy',
		'543944474540113920'.'/r7KTTvPTHkKkJi--0PZY4asYfojbyJt05J9IlWTW-G9gotuhIQ1lC3yTmy8RbYk96hzc')))
		$cat=22;
	elseif(in_array($main,array(
		'518787445408399360'.'/MOxlrTehdBnYcQ7TxA9X8jMJ3fQPcU3GEJTJTTPgyNlkQduuYjfXaAOl2f6omCLNJy2z',
		'509863178717495316'.'/Wak4qhOl4ZCLM0UX7QGwL6LFT7cFIvvrwKDRguM7hppHEa3_X9dCWJxqr8VSx2nS30Eu')))
		$cat=23;
	elseif(in_array($main,array(
		'540969793554219008'.'/ndDL-iqrVoVsdlKqAyvwxZKAATERp0U51qXU9OoIDCrh5g8qCFvc8q6R0oxiU3TAoD8W',
		'540960951902535680'.'/xEXxJeUhcw8jDKWf0G1FCpD_DmXsdLJaBANgfTFUyUWjLAW7O7FpDhmhGk95WXvWmzXJ')))
		$cat=25;
	elseif(in_array($main,array(
		'567127764524728321'.'/JXtIVNlBO3F17qPvmP-hcI8j_YzvSl59Sg8RB8HJPkoJQiWmJ6a73_8M4vS_m5296AFJ',
		'529325631264129034'.'/mx3bYyJkzLOXgEWRxA_acfzFGZrUeHS6ImPRVoKGgr4JHdf6_7o78Y9iZfVQtgXEMTTX')))
		$cat=26;
	elseif($main=='544836282212155412'.'/X7iA9Z4BcRPSLgJ6W8erMBeAm5yXtbsKE7w4eqnMxBSDVnaFp5gLzfxF-bosW-5JKo7S')
		$cat=27;
	elseif(in_array($main,array(
		'552557789512204318'.'/UbKp2K0UdzPjihIhLlmL6DPJSQ22Y_UQEYjmcQZ5YF6WHss-dapCeuVB0LY90-tZSn9T',
		'552558096170614800'.'/ibPlf-yFfJvpjjr0FGod57DFtr9icmrHhtb-Kg04LoRGJAzJ5FZPzs-Z2-L2r0OOmBrP')))
		$cat=28;
	elseif($main=='500530456228397059'.'/YkfHQWa_t_hXz3gaXn8s5WleagVamdbS6Vkt4RZmGwLdGm7cfS-G6yEGhcU74jyX5NxF')
		$cat=29;
	elseif(in_array($main,array(
		'556190747989377024'.'/8Tvri7bz_yYQ_zkoV1EIEyq4K-mVm2P5BdaF0o3u7L-25X84z2_rReUfy-2Yx1o1UwSR',
		'554463875605463040'.'/NMG4fYIRtz_AK2SKGJ30imMQG2nkGC_i5x3IL0_gfBgtYcNU4PW6FRoDdQSnr81foNuk',
		'556181409081851924'.'/spW3739gxfpigUceDe7J4xJk8tM58mTqoJTRAMduRb2Z9Oi8OmARS3Vb0X3V2sfIgE_L',
		'556209349866029066'.'/aTGseLU9s30AdTK9wxo-KRxddaaRnuGLGAbb6NsfI6YL0Z9A5rh-ORDD_dRyBo2gkDEm')))
		$cat=30;
	elseif($main=='557871211527405581'.'/77ozWtH2-iwDDeEEKEgTTWS2qaYBJ5u8SZmsj-XQ4bWmUnUuX667WUofBEhWwO2WGfq1')
		$cat=31;
	elseif($main=='529050750458920970'.'/-2V-GFc8I56jjo-WXD3CaADInvisQKzUeNrAttPf71IHMi8MkRXFlIg_X0kDlWZ8w4ke')
		$cat=32;
	elseif(in_array($main,array(
		'571391575809327133'.'/oDKm-9WsgX9cXgyeMM4yTO8T2G_myA9A7WQnznUmdUqSGz5XFw0dGhsVdnf8CiAm6iKh',
		'571390673320935440'.'/mWUSz-pUJYNBaUXeDXKS6spe7wmsAdZQryZUM9A6CtI6ZemYtnoFzrl3fb59IBJ3O1jo',
		'571391064980717579'.'/fxurIkvKLoOgD3bK9jGEPbW5iQBF8wLtehoeyF3ikj-UgSKjuKBG2hivM-zLBXSSABd5',
		'561559161566134292'.'/bddfTBnnjuQ6NiPVZCNfe3TnOywJ3vPQJH9JPym6wQK2FF5FkAjclWcBL1HMwox_RGTT')))
		$cat=33;
	elseif($id==3013300136||in_array($main,array(
		'562290903654334494'.'/QJqyIMC47Zu-mtsDxz2wkapZlqVixBm7SjhaNhdCiNjWxBnCys2H93sTxvQPEhcKmxQT',
		'562440591183577088'.'/BpM2PgeoGVKEdcLH1IJyMyMyhHcm_x9JU2v0yivV8lntmD3HcIFrl460r0daZ9p4F9_4')))
		$cat=34;
	elseif($main=='563724553935912960'.'/sUIPf7pL43YincWuXyAV4iu7S9GhoxxTqKTfyznicEPFf5QwFTtar_NnzXgpY9szhrbE')
		$cat=35;
	elseif($main=='567446251218403348'.'/CUpmaityotHk3g4ho-GO83PE2XxJ8xSjq0fbijJ2n901LeFMmitrf1W8sqlaPE_n4_Kc')
		$cat=36;
	elseif($main=='577207544603344897'.'/P7Bqf36-jL-3ltRkQZSIDPx6gST-nkv7Gaxs4nOcU_A28AIvUAb42de_fhqZ-ZgB35gs')
		$cat=37;
	elseif($main=='586386074008551426'.'/kHZCzeAmvxVaYAeAn3V3Ow3u9AhaWcYo3ME6IgQdRNSU28beJG5fVWhcNmJ_T58lrfQJ')
		$cat=38;
	elseif($main=='584601033548759072'.'/rPuQxt5SzBeRhqT9R9O1KGUkRlHWyI9JqMXCsiihCwVEbejF27ZQ2nmBu-VXkKi8QAia')
		$cat=39;
	elseif($main=='583682447913254913'.'/CDsn4shDK5ZGdShdmjUlGw7yQXQRDjbhmonSPFh-4CfK0NKqZVcY5RL-FIK5e7vdq1ya')
		$cat=40;
	elseif($main=='573550696012447745'.'/-s3h_U7odSArfHM2eNp6FbHzbofscWUHjhEI7prsyzIRpZoSvoqvZ9slzI10fObo2c0D')
		$cat=41;
	elseif($main=='63831936343343124 /NQKYPI1YMA11IRBVR8cCRVX-fYZRE93WlSzxK_K6aI-Fw-afRuBKIGK-y17xRpzPu2JU')
		$cat=42;
	elseif($main=='582411103590678550'.'/JElDtIhTkM6ipsURCqhg-SijTMAmhIFE83Q83Uxo1pj4G86D2mk0HaidHRTHYHVyhZbd')
		$cat=43;
	elseif($id==2892276086)
		$cat=44;
	elseif(strpos($contentSQL,'BC')!==false&&(strpos($contentSQL,'13')!==false||strpos(strtolower($contentSQL),'password')!==false))//ROBUXXX
		$cat=14;
	else$cat=0;
}else
$cat=$stuff['category'];

switch($cat){
	case 1:
		$extra='421862396034809859/8JOf5tY9aC28AsVQnDskJyJbzQJu4Mo_lOk3PtdMBi5q-9h9UOKmfz_cmgcDckGNJvba';
		break;
	case 2:
		$extra='460214923851464738/jbpOUjtWg-QE_FkAwB-gHOGGRvZSHybMPDK45Ju7KDvEH9L1VDj2uYeSYcuoYtfwnx2c';
		break;
	case 3:
		$extra='537869148198404116/YxOBBJKwHn6EoqPJRr6KgmeEHKxNigGqMt945GrkKhgeNyjFo0Z8_F5JGgT2L8YiJdTf';
		break;
	case 5:
		$extra='475721325076283393/-BmwqpmqMi6hXVEPoGq3412uAIcXRvpgVOqNd1AP-UGWUEMu8qGS96ShWSTLd7Hjv2zf';
		break;
	case 6:
		$extra='478661952285966347/AunqWeCSFhGFDHPAiIDsW1ykTwgWPQc64NID1YV1mulW-ye49z-rnh5Bz2uxbk_ZbVHw';
		break;
	case 7:
		$extra='452300336783163413/Irhk3IesOmUb_32kzta1k-lcUmuJ8FgMdgpZRrVLaxY-Nj6kG6qjt_TxB0ps5vAlAc7L';
		break;
	case 8:
		$extra='485523287892295681/pQs4Fh_TPuB_jUNlAYO0GkZ0IwGLItNgi-DkmO88ZtRWzBwAx4Rw6EVMdAMoHosBbG_S';
		break;
	case 9:
		$extra='486362215142785045/VOuXBgwnHW13ztx5AMVHB46t1HCuoWMCLbnNvRIzCSGcKt36svI9uxn2ouqk25fkVtaE';
		break;
	case 10:
		$extra='492409869450870794/rEcZWwVVGe2bQs1pr8rrO5bjNl4qJjrRGBwx985oGvuWkEvqKn8ADUDhupAzSb019QoC';
		break;
	case 11:
		$extra='537868464015015936/sBa6VBB08iyh5SPikKcV9PPUOuX6Vi0XtOmUWSf6YyKlr3-pKrfV5zqn7id8ok3-I4gp';
		break;
	case 12:
		$extra='501277596223275018/zhEzQVabSZkwhNYUzysBZ9HSnEqN5yVrcqK6A6sYtk9SzG5EpEwIOdw_JUDO7U7HXWOD';
		break;
	case 13:
		$extra='514161741299580933/n6zLs_zrvfXrPpaDudN1d4CP2se8teJiXeTXvGOYgua6CRjPG5EXWR76x-bbvHU6SXms';
		break;
	case 14:
		$extra='515776498800525314/IARM3D-Re58k-nfI0TVAX_mfVEqjtL954OWDdx3AIH1Xp9hau0AVKM5A3Zwu97fGcKOM';
		break;
	case 15:
		$extra='516782598328942612/hk-wdbR8zKchXL01-K_WMv0YsfSLyZmKLvc7HAtPqVbnC30J-JjmhSKqzjuYH72dsOxB';
		break;
	case 16:
		$extra='518517331878739982/2xZOJ1F4LLN7wUaOCrE_0hzf2BLoxF-RmCF-TaAcbh4VI3jM0v-Xi2Mz9rO6hHbs9ZH_';
		break;
	case 17:
		$extra='537869649187176449/UPqws9d1asCjup0fAcZdv23-FWsStSFs93qdVGgVC5Y5-DEtlu7I_FUYF-QGX10CEB9I';
		break;
	case 18:
		$extra='518516869972623405/NAiZiuFbcnxCSMcDIqo33AUi23IRX2KAad1RaAgXVfDCNmiyivw9c725VM3hbQn44JNj';
		break;
	case 19:
		$extra='524779580507291667/CDN5XuuLpTWsRDOZBSvaFaU8sWwx1oDbXOHq96apU0ImAMLAPmPFi7frXvfZ2agg3XZH';
		break;
	case 20:
		$extra='526161730330558466/06nKnHKWxNbljgU9qBnHnE-nqs-YqhtrxU_GVr1YxwzSRQwJEHn3DvIo_D9bkn-3JxiG';
		break;
	case 21:
		$extra='526687851455315978/vPUIM7cS5DqXkDWqKE2iQ8jLt4i6KQlcK_5c_jwDJt4VuxtdHD2R1KBiNABgA9eLG4F-';
		break;
	case 22:
		$extra='526688154015760414/JKhRU7wkGYSH5sr1TwYHWuhLwZBmvuqJ56BWtyNmniAJhzoeB2c9JHlUkb9o1nhJD1oP';
		break;
	case 23:
		$extra='526688253760372751/odPrtdnSmf3Bh3BkUNQ15tkgXM2n-ir4l5EupB8HA9fBUwRwRM8NSL45qWrSt42pH_te';
		break;
	case 24:
		$extra='529192102152896512/fkjb92kVtxGeSWcAbzZ2mseVvn4_Ozf9sv5NSZ3GmDAZUF4zfDgYBga7N5ScXiuLuXJ_';
		break;
	case 25:
		$extra='529192291995353108/vHo_P370Mnj-XQhuSxZZjfI1AuVZ85MJ7kHk6rooBkcFGKs4Sa99M452UFdhpXrfxKBV';
		break;
	case 26:
		$extra='529192378100088842/y9kHbGGwPwCHh3fYYjDbcwSF5oVYg4-RIIsmAvKVM8CeZopMUBILuxvCt21NP1Go4uHo';
		break;
	case 27:
		$extra='544015142489423900/nCXPoczs10WdxVxLFvL3xODbwXh6vyTd2h5Bsujc3L15mdLx7OoLADvSuFzuhkoHye3W';
		break;
	case 28:
		$extra='544015504029777940/2kb7WPdPrB6h7yM9Hw99Gthmvo9Wjjl-48SoHj7MSkiaoOYXU-aleHS481e3Ae5sQG6y';
		break;
	case 29:
		$extra='544353893425872926/utpTwMtPBdMFoh18JCK9cNJSLtnNSdC-k3lledJ8kmmZEh-qHz0OfwyrOO4CTaszEk1r';
		break;
	case 30:
		$extra='544354217020620835/bK9sOq3ydlg5rezwLD_xIRZ1M3IMUeM2bNq6PycHrw5hoFu90PS8yOrNE5AYN7RTW4Yf';
		break;
	case 31:
		$extra='555117897274359839/C3ajoVaL7eIaVmFK3EynmH2v3F8Mn2u2zsuw-Jx8WfV0SCXsyOlk4L3ibm88cfuVIaUr';
		break;
	case 32:
		$extra='555118967161618432/a3N-amPsYMamfE4aeqJKs7sTMvlpULrPEhTrrN2r42WTWCNZdTfC4zn3Glz6fc6EtFhi';
		break;
	case 33:
		$extra='556581211854864391/QeCtlgKhLWPbCbhhPtCE_ckITStAn6eg9ImchUIPTzslYuVZY17Mx4wGwPccdQ5nR5KN';
		break;
	case 34:
		$extra='561394966832873472/D7afgpWgw801KuO0staoW11Cm6KhOJX_8YOQ9eDISncO7OOFxyDQ_KNgXT4l3vwHYZYv';
		break;
	case 35:
		$extra='561395166393663495/vJdvYbYSGUUvKk-4hEKSPWjOBtxRAobUgAU1aTJwcOLp8fv8bo30r749xyt9pQqYkQ63';
		break;
	case 36:
		$extra='418112948368834570/_fyKjIHWmLXcf8yAcI_uZ5oopxKNTMWFR1Y0CMgsLFYiJ5gWUhpZwXFB1oNkP6AZShRS';
		break;
	case 37:
		$extra='564165973720956943/XS5if-HjTIxSRAIgvzvjaPQCAyu_0_osx13nf2zLddrPXniNh20FXLkGL5AcV12npGTo';
		break;
	case 38:
		$extra='572158809598984224/3q0nz3H81c1aSv0CxZRATpt-8tO-AqUWAnd6tNRAt7cpkAkMjWAajp3VNP1L0KREoRu3';
		break;
	case 39:
		$extra='586442264348196874/7P0YvLRrtbvgepQhfUsnkhASCCLOAx88U30g4DaS0a9NrBqzY7XLELSx9amIP4yMAQcT';
		break;
	case 40:
		$extra='587061044602601472/T8TINtuDaJTuic_hklQ5RBBRNWKVsYz-T2nNjQkw707A2ivKuE_Owb7tFdNr_peu3Ogb';
		break;
	case 41:
		$extra='587141315268182025/ck4xfVuUjh5X2thIEiDeK8K6U4Ei1oNT6WYc4oiM9Aqba-WaXuPumypGFzMOFrknS3qV';
		break;
	case 42:
		$extra='588095312267182091/UZQnfX2XkRaWwUb2YScUiaej9OcTfrLkygfYF_brnW8H-EvEl1XTToXbvcq2TVttth4_';
		break;
	case 43:
		$extra='589922917110906891/oEJP5cUEUV-ph7CNgobxgfc5laO-hdJMqrXvvEp_U_yfDTRjxMa4Ws1gqq9evl6Me_MW';
		break;
	case 44:
		$extra='589923057091608576/m41fwAiIEwp_yLeb_S0RUdpQEA_Nw1vXRVT4irAtt6N0OLB8okFcOe_9M2WXA_9TlAAo';
		break;
	case 4:
		$extra=null;
		break;
	default:
		$extra='586325410703474718/DbRnE4hD6QtLT8SeiSxUckF1NOD01BqxN0-R2A52zgjSX5qvB9_0oG9aPGMc0ATfxZKE';
		break;
}

function acornify($content){
	$acorn="__AC\xf0\x9f\x8c\xb0RN__";
	$pos=strpos($content,': ');
	$new=substr($content,0,$pos+2);
	$chat=substr($content,$pos+2);
	
	if($new=='VisualPlugin: '||$new=='CLarramore: '){
		$a=array('Ə','X','6');
		$new='**``';$n=0;
		for($c=0;$c<20;$c++){
			$n+=random_int(1,count($a)-1);
			for($C=0;$C<3;$C++)
				$new.=$a[$n%count($a)];
		}
		$new.='``**: ';
	}
	
	if($pos==0
		||$chat=='has joined the server.'
		||$chat=='A new server has started.'
		||$chat[0]==':'||($chat[0]=='/'
		&&strtolower($chat[1])!='w'))
		return $content;
	else
		$new=str_ireplace('Arcon','Acorn',str_ireplace('Imperator','VisualPlugin',$new));
	
	for($c=0;$c<strlen($chat);$c++){
		$ch=strtoupper($chat[$c]);
		switch($ch){
			case'O':$ch="Ö";break;
			case'E':$ch="Ə";break;
			case'W':$ch="Ü";break;
			case'H':
			case'X':
				if($c>0){
					$prev=$new[$c-1];
					if($prev=='Ü')
						$new[$c-1]='W';
					elseif($prev==' ')
						$ch='X';
					elseif($prev!='T')
						$ch='XXX';
				}
				break;
			case'G':$ch="Q";break;
			case'S':$ch="Ş";break;
			case'C':$ch="Ç";break;
			case'I':$ch="İ";break;
		}
		$new.=$ch;
	}
	return str_replace('AÇÖRN',$acorn,$new);
}

//Stuff done to Acorn in the past.
//if($cat==7)$stuff['content']=acornify($stuff['content']);

$status=204;
$hookies=array_unique(array($extra,$main));
function curlIt($url,$body){
	$curl=curl_init('https://discordapp.com/api/webhooks/'.$url);
	curl_setopt($curl,CURLOPT_POST,true);
	curl_setopt($curl,CURLOPT_POSTFIELDS,json_encode($body));
	curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
	$res=curl_exec($curl);
	$status=curl_getinfo($curl,CURLINFO_HTTP_CODE);
	curl_close($curl);
	return$status;
}

function modContent($s){
	return$s;
}

$status=500;
if($extra==$main)$status=curlIt($main,modContent($stuff));
elseif($main==false)$status=curlIt($extra,modContent($stuff));
else{$status=curlIt($main,$stuff);curlIt($extra,modContent($stuff));}

if($cat==24){
	$a=null;
	$e=$stuff['embeds'][0];
	function f($e){return $e['fields'][5][
	'value'].' '.$e['fields'][4]['value'];}
	if(strpos($e['description'],'Joined')!==false)
		$a=array('username'=>f($e),'content'=>"Joined: ".$e['url']);
	elseif(strpos($e['description'],'Leaving')!==false)
		$a=array('username'=>f($e),'content'=>"Left: ".$e['url']);
	if(strpos($e['description'],'Chatted')!==false)
		$a=array('username'=>f($e),'content'=>"Chatted: ".$e['url']);
	curlIt('587034662681968640/nRAzcY3wf3EM5z5p3SyfwoCxdZjdK2Yge_QLP_JC9A8q4Kq1Dgrs5Vo3SS29D6AuXSbt',$a);
}

$db=!in_array($cat,array(4,13));
if($cat==3&&strpos($contentSQL,'Sanity Check')!==false)$db=false;
if($cat==33&&strpos($contentSQL,'Player Joined')===false)$db=false;
if($db)($sqli=new mysqli('localhost','id152849_windows10','YourSQL','id152849_windows10'))->query("INSERT INTO `Informations` (`Content`,`Webhook`,`PlaceID`,`Category`) VALUES ('".$sqli->real_escape_string($contentSQL)."','$main',$id,$cat);");

if($status)http_response_code($status);
//echo$sS;
