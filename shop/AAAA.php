<?php


ob_start();


echo 'Additional content.';

$bufferedContent = ob_get_clean();


echo 'This is some content.';

echo "This is new";


echo $bufferedContent; // Output the content captured in the buffer

?>