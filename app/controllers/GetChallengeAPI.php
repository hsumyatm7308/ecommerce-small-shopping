<?php
class getChallengeAPI extends Controller{
    public function getChallengeAPI()
    {
        // session_start();

        // Generate a random challenge code
        $challenge = bin2hex(random_bytes(16)); // 32-character hex string
        $_SESSION['challenge'] = $challenge;

        // Return JSON only
        header('Content-Type: application/json');
        echo json_encode(['challenge' => $challenge]);
        exit;
    }

}
?>