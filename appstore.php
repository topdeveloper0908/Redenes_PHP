<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <script>
            function getUserLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition((position) => {

                        var phoneModel;
                        var phoneVersion;    
                        if(navigator.userAgent.toLowerCase().match(/(iphone|ipad|ipod|android)/) == null) {
                            phoneModel = 'Null';
                            phoneVersion = 'Null';    
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


                        var url = new URL(window.location.href);
                        var params = url.searchParams;


                    })
                } else {
                    console.error('Geolocation is not supported by this browser.');
                }
            }
            // Call the getUserLocation function to start the process
            getUserLocation();
        </script>
    </body>
</html>