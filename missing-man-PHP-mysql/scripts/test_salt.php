<?php
$input = "secret_string";
$first_output = crypt($input);
$second_output = crypt($input);

echo "First output is {$first_output}\n\n";
echo "Second output is {$second_output}\n\n";

?>