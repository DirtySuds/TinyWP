<?php
$w='wordpress';$z='.zip';$c=$w.$z;$n=basename($_SERVER["SCRIPT_NAME"]);$h='http://';unlink($n);copy($h.$w.'.org/latest'.$z,$c);$b = new ZipArchive;$b->open($c);for($i=0;$i<$b->numFiles;$i++) {$f=$b->getNameIndex($i);$b->renameName($f,str_replace($w.'/','',$f));}$b->close();$b=new ZipArchive;$b->open($c);$b->extractTo('./');$b->close();unlink($c);header('Location: '.$h.$_SERVER["HTTP_HOST"].str_replace($n,'wp-admin/setup-config.php',$_SERVER['REQUEST_URI']));