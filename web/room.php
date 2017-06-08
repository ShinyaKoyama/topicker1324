<?php
function room($replyToken, $type, $message) {
	// メッセージ以外の時は何も返さず終了
	if($type !== "text") {
		exit;
	}

	// 返信データ作成
	$responseFormatText = [
			"type" => "text",
			"text" => "「".$mesText."」じゃ...いや、意外と良いな..."
		];

	$postData = [
			"replyToken" => $replyToken,
			"messages"   => [$responseFormatText]
		];
	
	return $postData;
}
