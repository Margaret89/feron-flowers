<?php
					use Bitrix\Main\Loader;
					require_once ($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
					if(!Loader::includeModule("sotbit.regions"))
					{
						return false;
					}
					$domain = new \Sotbit\Regions\Location\Domain();
					$domainCode = $domain->getProp("CODE");
					?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$domainCode?>/news/floristika_dlya_nachinayushchikh_tsvetochnaya_kompozitsiya_svoimi_rukami/</loc><lastmod>2016-10-05T12:55:53+03:00</lastmod></url><url><loc><?=$domainCode?>/news/otkrytie_novogo_magazina/</loc><lastmod>2016-11-10T12:23:22+03:00</lastmod></url><url><loc><?=$domainCode?>/news/aktsiya_do_31_dekabrya_2016_goda_dostavka_do_transportnoy_kompanii_pek_besplatno_/</loc><lastmod>2016-12-12T13:23:20+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie/</loc><lastmod>2016-12-21T17:04:53+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_keramicheskikh_vaz/</loc><lastmod>2017-01-05T15:34:58+03:00</lastmod></url><url><loc><?=$domainCode?>/news/valentinki/</loc><lastmod>2017-01-16T13:44:46+03:00</lastmod></url><url><loc><?=$domainCode?>/news/tseny_snizheny/</loc><lastmod>2017-01-30T11:03:47+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_setok/</loc><lastmod>2017-01-30T11:43:55+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_tovara_21_09_2017/</loc><lastmod>2017-09-21T10:31:45+03:00</lastmod></url><url><loc><?=$domainCode?>/news/aktsiya/</loc><lastmod>2017-10-06T13:52:09+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_04_04_18/</loc><lastmod>2018-04-04T12:21:48+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_setok__2018/</loc><lastmod>2018-08-30T13:40:17+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_03_10_2017/</loc><lastmod>2018-10-03T14:55:07+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novogodnyaya_produktsiya/</loc><lastmod>2018-10-30T10:58:21+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_plyenki/</loc><lastmod>2018-12-12T14:40:59+03:00</lastmod></url><url><loc><?=$domainCode?>/news/florarium_teper_v_feron_flowers/</loc><lastmod>2018-12-12T14:55:43+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_19_12_18/</loc><lastmod>2018-12-19T10:02:31+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_setok_2019/</loc><lastmod>2019-01-30T12:36:58+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_iskusstvennykh_tsvetov/</loc><lastmod>2019-04-09T11:17:13+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_keramicheskikh_izdeliy/</loc><lastmod>2019-04-09T11:45:47+03:00</lastmod></url><url><loc><?=$domainCode?>/news/aktsiya_na_mulyazhi_fruktov/</loc><lastmod>2019-04-09T12:36:28+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_upakovochnykh_materialov/</loc><lastmod>2019-04-10T16:05:25+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_iskusstvennykh_tsvetov_v_gorshke/</loc><lastmod>2019-04-10T16:45:26+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_keramicheskikh_figurok/</loc><lastmod>2019-12-09T17:03:17+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_iskusstvennykh_tsvetov_2019/</loc><lastmod>2019-12-09T17:00:56+03:00</lastmod></url><url><loc><?=$domainCode?>/news/novoe_postuplenie_upakovochnykh_materialov2019/</loc><lastmod>2019-12-09T17:01:59+03:00</lastmod></url><url><loc><?=$domainCode?>/news/</loc><lastmod>2019-12-09T17:03:17+03:00</lastmod></url></urlset>