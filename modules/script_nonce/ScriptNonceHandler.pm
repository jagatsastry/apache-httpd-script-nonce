  #file:modules/script_nonce/ScriptNonceHandler.pm
  #--------------------------------
  package modules::script_nonce::ScriptNonceHandler;
  
  use strict;
  use warnings;
  
  use Apache2::Filter ();
  use bignum;
  use Apache2::RequestRec ();
  use APR::Table ();
  use File::Spec;
  
  use Apache2::Const -compile => qw(OK);
  
  use constant BUFF_LEN => 1024;
  my $DEBUG = 0;
  my $range = 2**32;
  my $SECRET_KEY;

  sub replaceHeader {
      my $f = shift;
      my $cspHeader = $f->r->headers_out->get("Content-Security-Policy");
      if($cspHeader) {
          my $randNonce = $f->ctx->{nonce};
          $cspHeader =~ s/$SECRET_KEY/$randNonce/g;
          $f->r->headers_out->set("Content-Security-Policy", $cspHeader);
      }
  }

  sub getDomain {
      my $uri = shift;
      my @x = File::Spec->splitdir($uri);
      #print $x[1];
      if("$x[2]" eq "") {
          return "";
      } else {
          return $x[1];
      }
  }

  sub handler {
      my $f = shift;


      my $dom = getDomain($f->r->uri());
      if("$dom" eq "") {
          $dom =  "default";
      }
      open(FILE, "/usr/local/apache2/modules/script_nonce/secret/$dom") or die "Can't read file 'filename' [secret/$dom: $!]\n";  
      $SECRET_KEY = <FILE>; 
      close (FILE);  

      unless ($f->ctx) {
          $f->r->headers_out->unset('Content-Length');
          $f->ctx({nonce=>int(rand($range))});
          replaceHeader($f);
      }

  
      while ($f->read(my $buffer, BUFF_LEN)) {
          my $randNonce = $f->ctx->{nonce};
          $buffer =~ s/$SECRET_KEY/$randNonce/g;
          $f->print($buffer);
      }
  
      return Apache2::Const::OK;
  }
  1;
