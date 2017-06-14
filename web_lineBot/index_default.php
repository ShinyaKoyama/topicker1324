<?php
$accessToken = 'gIaXcBjVSAiACT1C8+4Zd3RXN3LJQGUvMEn4SPQSxB3PoSaIjz0H/Fu+IAKGvVGfE/g/ZKxq60d0AUZFF3o4FLIrBmDBvyqvBlW8CTFZ0hy8YXUN3CTsFWF0OhTFdlHQR1cZ+S6tsaB43RTrDjXy9wdB04t89/1O/w1cDnyilFU=';

// ���[�U����̃��b�Z�[�W�擾
$jsonString = file_get_contents('php://input');
$jsonObj = json_decode($jsonString);

$type = $jsonObj->{"events"}[0]->{"message"}->{"type"};
// ���b�Z�[�W�擾
$mesText = $jsonObj->{"events"}[0]->{"message"}->{"text"};
// ReplyToken�擾
$replyToken = $jsonObj->{"events"}[0]->{"replyToken"};

// �g�[�N����̃^�C�v�擾
$sourceType = $jsonObj->{"events"}[0]->{"source"}->{"type"};
$roomId = $jsonObj->{"events"}[0]->{"source"}->{"roomId"};
$groupId = $jsonObj->{"events"}[0]->{"source"}->{"groupId"};


if(isset($roomId)) {
  require("room.php");
  
  $postData = room($replyToken, $type, $mesText);
  
} elseif(isset($groupId)) {
  require("group.php");
  
  $postData = group($replyToken, $type, $mesText);
  
} else {
  // ���b�Z�[�W�ȊO�̎��͉����Ԃ����I��
  if($type !== "text") {
    exit;
  }

  // �ԐM�f�[�^�쐬
  $responseFormatText = [
      "type" => "text",
      "text" => "�u".$mesText."�v����Ȃ���..."
    ];

  $postData = [
      "replyToken" => $replyToken,
      "messages"   => [$responseFormatText]
    ];
}

$ch = curl_init("https://api.line.me/v2/bot/message/reply");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charser=UTF-8',
			'Authorization: Bearer '.$accessToken
		)
	);

$result = curl_exec($ch);
curl_close($ch);
