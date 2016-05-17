@section("header")
	<div class="utsc-header">
		<?php
		use App\Http\Controllers\Auth\Login;
		$utscHeader = file_get_contents("https://www.utsc.utoronto.ca/_includes/application/_header.html");

		if (Login::isLoggedIn()) {
			$name = Login::getUser()->givennames . " " . Login::getUser()->familyname;
			$position = "";
			$logoutUrl = URL::to('/') . "/logout";
			$logoutText = "Log Out";
            $utscHeader = str_replace("[--NAME--]", $name, $utscHeader);
            $utscHeader = str_replace("[--POSITION--]", $position, $utscHeader);
            $utscHeader = str_replace("[--LOGOUT_URL--]", $logoutUrl, $utscHeader);
            $utscHeader = str_replace("[--LOGOUT_TEXT--]", $logoutText, $utscHeader);
            //$utscHeader = str_replace("[--APP_TITLE--]", $title, $utscHeader);
            $utscHeader = str_replace("[--DROPDOWN--]", "", $utscHeader);
            echo $utscHeader;

        }
        else{
            $result = preg_replace("#<div class='profile'>(.*?)</div>#","",$utscHeader);
            echo $result;?>
            <style type="text/css">
                .profile {display: None; }
            </style>
<?php

        }

		$title = "TCard Plus";


		?>

	</div>
<?php 	if (App::environment(LOCAL,BETA)) { ?>
    <p id="demoinfo">
        [Demo Version] <br> For testing purposes only
    </p>

<?php } ?>

	<h1 class="title">{{ $title }}</h1>
@show
