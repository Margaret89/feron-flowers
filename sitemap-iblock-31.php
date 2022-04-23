<?php
					use Bitrix\Main\Loader;
					require_once ($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
					if(!Loader::includeModule("sotbit.regions"))
					{
						return false;
					}
					$domain = new \Sotbit\Regions\Location\Domain();
					$domainCode = $domain->getProp("CODE");
					?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"><url><loc><?=$domainCode?>/news/index.php?ID=31</loc><lastmod>2018-10-03T14:12:57+03:00</lastmod></url></urlset>