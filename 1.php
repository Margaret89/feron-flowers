<?php
COption::SetOptionString("main", "agents_use_crontab", "Y");
echo COption::GetOptionString("main", "agents_use_crontab", "N");