<?php
					use Bitrix\Main\Loader;
					require_once ($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
					if(!Loader::includeModule("sotbit.regions"))
					{
						return false;
					}
					$domain = new \Sotbit\Regions\Location\Domain();
					$domainCode = $domain->getProp("CODE");
					?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$domainCode?>/news/novoe_postuplenie_setok/</loc><lastmod>2018-02-22T17:41:03+03:00</lastmod></url><url><loc><?=$domainCode?>/news/discount/</loc><lastmod>2018-02-22T18:08:10+03:00</lastmod></url><url><loc><?=$domainCode?>/news/</loc><lastmod>2018-02-22T18:08:10+03:00</lastmod></url></urlset>