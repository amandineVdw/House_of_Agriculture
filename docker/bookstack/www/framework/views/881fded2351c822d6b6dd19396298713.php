<?php

if (! empty($greeting)) {
    echo $greeting, "\n\n";
}

if (! empty($introLines)) {
    echo implode("\n", $introLines), "\n\n";
}

if (isset($actionText)) {
    echo "{$actionText}: {$actionUrl}", "\n\n";
}

if (! empty($outroLines)) {
    echo implode("\n", $outroLines), "\n\n";
}

echo "\n";
echo setting('app-name'), "\n";
 ?><?php /**PATH /app/www/resources/views/vendor/notifications/email-plain.blade.php ENDPATH**/ ?>