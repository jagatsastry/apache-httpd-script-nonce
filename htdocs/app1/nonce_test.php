<!--Authors: Jagat Sastry P, Vivek Kulkarni and Karthiek C (Stony Brook university)-->
<!--License: Apache license-->
<?php
header("Content-Security-Policy: script-nonce JustAnotherNonce");
header("Cache-Control: no-cache, must-revalidate");
/*Note that this script-nonce and the one in the meta header have to be in agreement.
If not, the browser will report a violation for all nonces*/
?>
<!--Test modified from Mike West's(mkwest@google.com) test for Chrome-->
<html>
    <head>
        <body>
            <pre>
            <font size=5>
   This tests the effect of a valid script-nonce value. 
   It passes if three console warnings are visible, and the two PASS alerts are executed.
   If it alerts "FAIL", it means that the inline script executed even though it had an invalid script nonce.
            </font>
            </pre>
        </body>
        <script nonce="JustAnotherNonce">
        alert('PASS (1. Valid script nonce)');
        </script>
        <script nonce="   JustAnotherNonce    ">
        alert('PASS (2. Valid script nonce with spaces.)');
        </script>
        <script nonce="JustAnotherNonce JustAnotherNonce">
            alert('FAIL (1. Not supposed to run. Multiple script nonce.)');
        </script>
        <script>
            alert('FAIL (2. Not supposed to run. Script nonce absent.)');
        </script>
        <script nonce="JustAnotherNonceno?">
            alert('FAIL (3. Not supposed to run. Wrong script nonce.)');
        </script>
    </head>
</html>
