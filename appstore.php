<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <script>
            function getDevice() {
                console.log(navigator.userAgent.toLowerCase());
                if(navigator.userAgent.toLowerCase().match(/(iphone|ipad|ipod|android)/) == null) {
                    window.location = "https://www.redenes.org";
                }
                else {
                    if(navigator.userAgent.toLowerCase().match(/(iphone|ipad|ipod)/) == null) {
                        window.location = "https://www.google.com";
                    }
                    else {
                        window.location = "https://www.apple.com";
                    }
                }
            }
            // Call the getDevice function to start the process
            getDevice();
        </script>
    </body>
</html>