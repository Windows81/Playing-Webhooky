<?php
if($_SERVER['REQUEST_METHOD']!='POST'){
	$links=array(
		'https://www.youtube.com/channel/UCKdiEhba7eAdFWCr4eZLDTQ?sub_confirmation=1',
		'https://roblox.com/games/1189083537/OV',
		'http://le-blog.webutu.com/D%C9%99t%C9%99b%C3%A4se.php?le=WHERE%20Category=0%20ORDER%20BY%20Timestamp%20DESC%20LIMIT%200,%20666',
		'http://twitter.com/windows8point1',
		'https://www.youtube.com/watch?v=TiHbWtI8ShA',
		'https://www.youtube.com/watch?v=X8ZuIrq3190',
		'https://soundcloud.com/aaaroh-abo-shadi',
		'https://www.youtube.com/watch?v=6n3pFFPSlW4', // how dare you comment out this you broke webhooky!
		'https://www.youtube.com/watch?v=mXnxYdagrgU', // no remove
		'https://www.youtube.com/watch?v=L4_hUsOtCgA', // no remove
		'https://www.youtube.com/watch?v=IE4R8-bux9Q', // no remove
		'https://github.com/Windows81/Playing-Webhooky/blob/master/webhook.php',
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
$ip=$_SERVER['REMOTE_ADDR'];
$ua=$_SERVER['HTTP_USER_AGENT'];
$is=$ua==='Roblox/WinInet'?1:0;

if(isset($stuff['embeds']))
	$contentSQL=json_encode($stuff['embeds']);//'Embedded';
else
	$contentSQL=$stuff['content'];

$main=convert(
	$stuff['url']??
	$stuff['webhook']??
	array_values($_GET)[0]??'');

if(!isset($stuff['category'])){
	if(in_array($id,array(//Do-not-track list.
		1542355302,
		1464784256,
		2099117697,
		2066546286,
		2175590126,
		2205275185,
		610172644,
		934477751,
		452778997,
	        2625675627,
		2800976893)))
		$cat=4;
	elseif($main=='421862396034809859/8JOf5tY9aC28AsVQnDskJyJbzQJu4Mo_lOk3PtdMBi5q-9h9UOKmfz_cmgcDckGNJvba')
		$cat=1;
	elseif($id==1234584644)
		$cat=2;
	elseif(in_array($main,array(
		'532316432193814548/ORyumOFm2kSBbnUx0N493hNfnuxOmH670KxhXygfC9jDlblZ-Wn3qJ90EnXAKFEdzS8D',
		'531882662345048066/knSKOgwkQokcvBAeITe5xGau98rh01uGrOqek2mYPZTGVrpue3VgM6PVgSRdfpVmrNeK',
		'508532197179916288/iuBs1Lj1-0mX8md9EXbSMtybo5mchs7gLs-WOZ_sUbxkasO8tlFu1MtO0PvA0lhZtUTL',
		'504070645655797793/ZG7J0MSAWngBaQX_0T92gCheAtRIDt252TavtCXOM3iEJw3ZvV06jlTW7VLe79Vd2Xl-',
		'483039416445566976/s8uZH98AdM8IKSHR_HhIgT4gFkgL3E3z-pVcHHKpU6BjJWgc21D2ZViP5-do2gAysyxW',
		'479064464881090590/T_aztaap7ZCv-0CJoEEG7HTCoWM7YVqaXZano2Q5VB4eNeftPcIAdh9a2-O7jn-uWzV6',
		'476503432212250645/UCgRNPAjYhL2qHKw12nIbsciKyXKaFLos2MU2G_BLpyTCtR8eAhAInbDyIxNWKpnuSXu')))
		$cat=3;
	elseif($main=='474894006308962324/i3Wnw6Jdf7Y9kGkkf2ObKFu1xIcPcam1scBQvGXMrvEt_iSgdkepqJOFyyOFkvBy9XTY')
		$cat=5;
	elseif($main=='482683846962184192/CcMmSrGgfNa-8MY_xSGHbVjl0eZZNCT30ygIhk5vHIr4D436JuXCoQINieXmsYj1pIPZ')
		$cat=6;
	elseif(in_array($id,array(//FOR ACORN!!
		2218413953,
		740850537,
		935155844,
		868168745,
		1273905566,
		966491132,
		1535941322,
		974678668,
		897829699,
		1291343520,
		84663096,
		127390556,
		733603264,
		629983698,
		614317995,
		629945407,
		1974055377,
		2069176703,
		993650571)))
		$cat=7;
	elseif(in_array($id,array(
		2446896283,
		2173356585)))
		$cat=8;
	elseif(in_array($id,array(
		2301333872,
		2301378331)))
		$cat=9;
	elseif($main=='488335820747702292/KoEFDRogbfJJnjWTsESPhJAjeDQEu6qx7dyNcfGR6PbmD8NVT5gEsDaOdaXqShbHA_cB')
		$cat=10;
	elseif(in_array($main,array(
		'505710000610476043/rGlrZr_ORgiFytMJU3ZKYjUBKzxxdtno4ACt4D6jWEknq9N21S4zO0iMd3ohk9emyjI4',
		'526006051737174027/Dq8PmfJnq2zScydMsQR_aB089cCa7KP0DaFxO8rkGsbSgsPUPPkzp0lyZYOKFvLfXAL-',
		'549929550545420299/f0IzbcTe3-4VpPn_zUfX89jns8a2XbwoDpWUnXRHhxGKqkBgujpCLFRzt0r6tsZmotxi',
		'508242073967656960/FFvyY4QJUjWOGoKz_EXTX4XFpCUMOivfofCpzhrLkZLDeck_x81tawM7wb1piuw8rwiL')))
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
		'515988329205071895/SIboaalKFezHXkv5zuQ3zoDycwSFRS9sdmVg9_v5BsDZ_hTBWZKS0tOfiYCtF7IXrMaD',
		'515993888347914313/PD30gKbD7fcPdyWxsBWZJ_uV2d96ZLBko08_QiDPVfoxACzAfcjfn21QBom3UQA29bVK')))
		$cat=15;
	elseif($main=='480390992315416596/qrL3T8YrXzyI7wRxYk_yK5LR2KWBzHNhQjTjhNfNu8tWWpIqOk5Om482Yqd4fCbaP00c')
		$cat=16;
	elseif(in_array($main,array(
		'500847448478973982/0_K53L5AsUwRN4FwIf7H-a9xJx4olH2-plqOG3_aPC4CB1HyskBN5rGHUB0RsjvcfX5d',
		'520279931360641035/d6GjrCRrmWkbpTBxnnsF5xnWI-qpnchOmthhmb-8lvtVMwJ5Wz1Em7enyQ2rq1Vht5Ba',
		'525795062135652362/gdxF4s0k9DFiuwfN66kq2I4N11Hq74w6411tkPNiw8z0GD6B8UXQ43W2gKVeNKFr2RiZ')))
		$cat=17;
	elseif(in_array($main,array(
		'521025782995222528/OD82Upoh2PdtACtn1oqeQlz1CQU3IM8EBx-QxNJY4XWQIBoLUhXQ-RdTzlO7kJvfraQr',
		'526943422636883968/ci0Z6quJH__sdc4vRU6eJRSu6DAFjeZWTQooHxO5-bABRyXwjhxcCg7_2E0zaantER9O',
		'526966685845028876/YobEvigMQ5v5mrwa3lmwoGHDkLpcSsB3AA6bsmwzIQvflviKRQWaRAjDQ7aibmhWcQff',
		'531286190901428225/mhajkDII8dYr7HuND0eflXgdiXOYVKNx3gK3lMChLfeLI2NNvLzRGyG3gRSHE3TCuqCi',
		'547996363552587798/46lrqwhZlRY7shcDqFmzvS6RjAh5C0Y-FB3o0yR81r98_ZhDdolhrQXBxU6ZlM-BqH9u',
		'549764095096782858/07tWhIsCDrRqQglsXsvRA4ciVmznlhRdCuMmlHKFt4a19VmCYehIssAsdhpU-FJJUP-S',
		'549765976065835028/1vXLez81jhckCN2gOGnD0M5-S0STKfRhU9WOUnLuOq9ysF0Br34a775GfhTqnebKEHUJ',
		'521025782995222528/OD82Upoh2PdtACtn1oqeQlz1CQU3IM8EBx-QxNJY4XWQIBoLUhXQ-RdTzlO7kJvfraQr',
		'526935904724582411/43PyRfb3Usu7BtZu6y253OSaKp6tK0kpYsB9UKivSEwkNlKo97_meclr9BAHlyXE8g-5')))
		$cat=18;
	elseif($id==2616551764)
		$cat=19;
	elseif($main=='526502370809479188/yMMmAT39fWppCGO4U0XzK51tBDhSg4s_98863WzWrJeKEDcgr6pdrpcxlF_6cfgjtnOf')
		$cat=20;
	elseif($main=='505163825809457163/qX5_hDHK_LYt6gV2e50kGcmlNHiTGknP7rdjP6a1SikQdqRxUHgkcTarbz-V-QfAC1cR')
		$cat=21;
	elseif(in_array($main,array(
		'518619982637039637/jC74B0TPOpDvdV2x0gPVGUuyKT9nZxRrNQPnuubS1WVnyjCNIK3bCd_bFI_2mImbVLSE',
		'555527425275068423/5k4uxHt6Al69HhRcHBzgvyyFeyRxJxjCKrGL7cRQROoG5ipf2ISzMUi80584-YqvNQE_',
		'525703404660457482/dPoXGcIta5F9mPtkiWYv45tlzgoLpGRsIo_g4vkzA1ciNMK49iLB6vFMvBBrV5T6j6gY',
		'543844714458382358/LlYjmOd7O0gWjO5M5OEnSwji_xubltUwJCUYkrq1sIYqF9AGAl-iE6ZXiQ0DFR9o8zW7',
		'543878708285538314/VIlEad6L7tFMe_KLOcRTE4XuFo3Ks_Qo4akGVelE9Ewv0uV4k3DHPz1Au9UT6W0avamy',
		'543944474540113920/r7KTTvPTHkKkJi--0PZY4asYfojbyJt05J9IlWTW-G9gotuhIQ1lC3yTmy8RbYk96hzc')))
		$cat=22;
	elseif(in_array($main,array(
		'518787445408399360/MOxlrTehdBnYcQ7TxA9X8jMJ3fQPcU3GEJTJTTPgyNlkQduuYjfXaAOl2f6omCLNJy2z',
		'509863178717495316/Wak4qhOl4ZCLM0UX7QGwL6LFT7cFIvvrwKDRguM7hppHEa3_X9dCWJxqr8VSx2nS30Eu')))
		$cat=23;
	elseif(in_array($main,array(
		'540969793554219008/ndDL-iqrVoVsdlKqAyvwxZKAATERp0U51qXU9OoIDCrh5g8qCFvc8q6R0oxiU3TAoD8W',
		'540960951902535680/xEXxJeUhcw8jDKWf0G1FCpD_DmXsdLJaBANgfTFUyUWjLAW7O7FpDhmhGk95WXvWmzXJ')))
		$cat=25;
	elseif($main=='529325631264129034/mx3bYyJkzLOXgEWRxA_acfzFGZrUeHS6ImPRVoKGgr4JHdf6_7o78Y9iZfVQtgXEMTTX')
		$cat=26;
	elseif($main=='544836282212155412/X7iA9Z4BcRPSLgJ6W8erMBeAm5yXtbsKE7w4eqnMxBSDVnaFp5gLzfxF-bosW-5JKo7S')
		$cat=27;
	elseif($main=='552558096170614800/ibPlf-yFfJvpjjr0FGod57DFtr9icmrHhtb-Kg04LoRGJAzJ5FZPzs-Z2-L2r0OOmBrP')
		$cat=28;
	elseif($main=='500530456228397059/YkfHQWa_t_hXz3gaXn8s5WleagVamdbS6Vkt4RZmGwLdGm7cfS-G6yEGhcU74jyX5NxF')
		$cat=29;
	elseif(in_array($main,array(
		'556190747989377024/8Tvri7bz_yYQ_zkoV1EIEyq4K-mVm2P5BdaF0o3u7L-25X84z2_rReUfy-2Yx1o1UwSR',
		'554463875605463040/NMG4fYIRtz_AK2SKGJ30imMQG2nkGC_i5x3IL0_gfBgtYcNU4PW6FRoDdQSnr81foNuk',
		'556209349866029066/aTGseLU9s30AdTK9wxo-KRxddaaRnuGLGAbb6NsfI6YL0Z9A5rh-ORDD_dRyBo2gkDEm')))
		$cat=30;
	elseif($main=='557871211527405581/77ozWtH2-iwDDeEEKEgTTWS2qaYBJ5u8SZmsj-XQ4bWmUnUuX667WUofBEhWwO2WGfq1')
		$cat=31;
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
	case 4:
		$extra=null;
		break;
	default:
		$extra='418112948368834570/_fyKjIHWmLXcf8yAcI_uZ5oopxKNTMWFR1Y0CMgsLFYiJ5gWUhpZwXFB1oNkP6AZShRS';
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

foreach($hookies as $i=>$url)$status=curlIt($url,$stuff);
if(!in_array($cat,array(
	//3,
	4,
	13)))
	(new mysqli('localhost','id152849_windows10','YourSQL','id152849_windows10'))->query("INSERT INTO `Informations` (`Content`,`Webhook`,`PlaceID`,`Category`,`IP`,`IsServer`) VALUES ('$contentSQL','$main',$id,$cat,'$ip',$is);");

if($status)http_response_code($status);
//echo$sS;
