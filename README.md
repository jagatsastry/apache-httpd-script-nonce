-------------
Instructions
-------------
This project implements a mod_perl filter that enables script nonce support on apache httpd.

How to reproduce

1. Install Chrome version > 28
2. Go to chrome://flags
3. Enable "Experimental webkit features" and "Experimental javascript features"
4. Install apache httpd version 2.2 from source (Get it from http://httpd.apache.org/)
5. Install php5 and libapache2-mod-php5 (sudo apt-get install php5 libapache2-mod-php5 on ubuntu)
6. Verify if libphp5.so is present under apache2/modules. If not, copy it from /usr/lib/php5/apach2 to modules.
7. Clone this repository  under apache2 (if that's your apache home directory) 
    Back up your configuration files before that (under conf dir).
8. Restart httpd (sudo apachectl stop; sudo  apachectl start)
9. Open the browser and goto localhost/nonce_test.php
10. It should show two popups saying 'Pass' if script-nonce verification works. Else it should pop up three "Fails"

You might have to do the following between step 4 and 5

1. Install mod_perl . http://perl.apache.org/docs/2.0/user/install/install.html#Installing_mod_perl_from_Source

2. Make sure mod_perl.so is present under "apache2/modules" and make sure the following is done:

You will need to add the following to httpd.conf:

LoadModule perl_module modules/mod_perl.so
depending on your build, mod_perl might not live in the modules/ directory.
Check the results of

$ /usr/bin/apxs2 -q LIBEXECDIR

This will tell you where mod_perl.so is installed. Copy it to apache2/modules.
The installation of mod_perl also gives you the above information while installing.
