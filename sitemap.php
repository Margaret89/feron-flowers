<?php
					use Bitrix\Main\Loader;
					require_once ($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
					if(!Loader::includeModule("sotbit.regions"))
					{
						return false;
					}
					$domain = new \Sotbit\Regions\Location\Domain();
					$domainCode = $domain->getProp("CODE");
					?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$domainCode?>/sitemap-files.php</loc><lastmod>2022-02-06T22:42:34+03:00</lastmod></url><url><loc><?=$domainCode?>/sitemap-iblock-1.php</loc><lastmod>2022-02-06T22:42:34+03:00</lastmod></url><url><loc><?=$domainCode?>/sitemap-iblock-5.php</loc><lastmod>2022-02-06T22:42:36+03:00</lastmod></url><url><loc><?=$domainCode?>/sitemap-iblock-30.php</loc><lastmod>2022-02-06T22:42:37+03:00</lastmod></url><url><loc><?=$domainCode?>/sitemap-iblock-31.php</loc><lastmod>2022-02-06T22:42:37+03:00</lastmod></url></urlset>