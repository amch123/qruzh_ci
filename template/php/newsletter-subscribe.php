<?php
/*
Name: 			Newsletter Subscribe
Written by: 	Okler Themes - (http://www.okler.net)
Version: 		4.3.1
*/

require_once 'mailchimp/mailchimp.php';

// Step 1 - Set the apiKey - How get your Mailchimp API KEY - http://kb.mailchimp.com/article/where-can-i-find-my-api-key
$apiKey = '11111111111111111111111111111111-us4';

// Step 2 - Set the listId - How to get your Mailchimp LIST ID - http://kb.mailchimp.com/article/how-can-i-find-my-list-id
$listId = '1111111111';

$MailChimp = new \Drewm\MailChimp($apiKey);

$result = $MailChimp->call('lists/subscribe', [
                'id'                => $listId,
                'email'             => ['email' => $_POST['email']],
                'merge_vars'        => ['FNAME' => '', 'LNAME' => ''], // Step 3 (Optional) - Vars - More Information - http://kb.mailchimp.com/merge-tags/using/getting-started-with-merge-tags
                'double_optin'      => false,
                'update_existing'   => false,
                'replace_interests' => false,
                'send_welcome'      => false,
            ]);

if (in_array('error', $result)) {
    $arrResult = ['response' => 'error', 'message' => $result['error']];
} else {
    $arrResult = ['response' => 'success'];
}

echo json_encode($arrResult);
