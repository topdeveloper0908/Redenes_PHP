<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <script>
            function getDevice() {
                var phoneModel;
                var phoneVersion;    
                console.log()
                if(navigator.userAgent.toLowerCase().match(/(iphone|ipad|ipod|android)/) == null) {
                    phoneModel = 'Null';
                    phoneVersion = 'Null';    
                    window.location = "https://www.redenes.org";
                }
                else {
                    if(navigator.userAgent.toLowerCase().match(/(android)/) == null) {
                        window.location = "https://www.apple.com";
                    }
                    else {
                        window.location = "https://www.google.com";
                    }
                }
            }
            // Call the getDevice function to start the process
            getDevice();
        </script>
    </body>
</html>