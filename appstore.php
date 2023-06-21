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
                if(navigator.userAgent.toLowerCase().match(/(iphone|ipad|ipod|android)/) == null) {
                    phoneModel = 'Null';
                    phoneVersion = 'Null';    
                    window.location = "https://www.redenes.org";
                }
                else {
                    phoneModel = navigator.userAgent.toLowerCase().match(/(iphone|ipad|ipod|android)/)[1];
                    phoneVersion = navigator.userAgent.toLowerCase().match(/(iphone os|cpu os|android) ([\d_]+)/)[2];
                    if(phoneModel == 'android') {
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