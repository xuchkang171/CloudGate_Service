<?php

# 页面禁止缓存 | UTF-8编码 | 触发下载
header("cache-control:no-cache,must-revalidate");
header("Content-Type:text/html;charset=UTF-8");
header('Content-Disposition: attachment; filename='.'Surge.Conf');

# 默认模块API托管在Github[GithubUserContent] | 模块数组 | 请求模块禁止缓存
$ModuleAPI    = "https://raw.githubusercontent.com/BurpSuite/CloudGate-RuleList/master/Rule/";
$ModuleArray  = array("Advanced","Basic","DIRECT","Default","HostsFix","IPCIDR","KEYWORD","REJECT","Rewrite","YouTube","Other","USERAGENT");
$Cache        = '?Cache='.sha1(mt_rand()).'&TimeStamp='.time();

# 设定参数默认值
$Module       = "https://raw.githubusercontent.com/BurpSuite/CloudGate-RuleList/master/Module/Module";
$AutoGroupURL = "http://www.gstatic.com/generate_204";

# 接收GET请求参数
$Logo      = $_GET['Logo'];//ok
$AutoGroup = $_GET['AutoGroup'];
$Rule      = $_GET['Rule'];//ok
$Apple     = $_GET['Apple'];
$IPV6      = $_GET['IPV6'];//ok
$Group     = $_GET['Group'];//ok
$DNS1      = $_GET['DNS1'];//ok
$DNS2      = $_GET['DNS2'];//ok
$Config1   = $_GET['Config1'];//ok
$Config2   = $_GET['Config2'];//ok
$Config3   = $_GET['Config3'];//ok
$Config4   = $_GET['Config4'];//ok
$Config5   = $_GET['Config5'];//ok
$Flag1     = $_GET['Flag1'];//ok
$Flag2     = $_GET['Flag2'];//ok
$Flag3     = $_GET['Flag3'];//ok
$Flag4     = $_GET['Flag4'];//ok
$Flag5     = $_GET['Flag5'];//ok

# 检测GET接收参数
if(empty($Logo)){$Logo="true";}else{$Logo=$Logo;}
if(empty($AutoGroup)){$AutoGroup="false";}elseif($AutoGroup=="true"){$AutoGroup=="true";}elseif($AutoGroup=="select"){$AutoGroup=="select";}else{$AutoGroup="false";}
if(empty($Rule)){$Rule="false";}elseif($Rule=="true"){$Rule="true";}else{$Rule="false";}
if(empty($Group)){$Group="1";}else{$Group=$Group;}
if(empty($IPV6)){$IPV6="true";}elseif($IPV6=="true"){$IPV6="true";}else{$IPV6="false";}
if(empty($Apple)){$Apple="false";$GETApple="DIRECT";}elseif($Apple=="true"){$GETApple="Proxy";}else{$Apple="false";$GETApple="DIRECT";}
if(empty($DNS1)){$DNS1="8.8.8.8";}else{$DNS1=$DNS1;}
if(empty($DNS2)){$DNS2="8.8.4.4";}else{$DNS2=$DNS2;}
if(empty($Config1)){$Config1="127.0.0.1,80,aes-256-cfb,Password";}else{$Config1=$Config1;}
if(empty($Config2)){$Config2="127.0.0.1,80,aes-256-cfb,Password";}else{$Config2=$Config2;}
if(empty($Config3)){$Config3="127.0.0.1,80,aes-256-cfb,Password";}else{$Config3=$Config3;}
if(empty($Config4)){$Config4="127.0.0.1,80,aes-256-cfb,Password";}else{$Config4=$Config4;}
if(empty($Config5)){$Config5="127.0.0.1,80,aes-256-cfb,Password";}else{$Config5=$Config5;}
if(empty($Flag1)){$Flag1="NONE1";}else{$Flag1=$Flag1;}
if(empty($Flag2)){$Flag2="NONE2";}else{$Flag2=$Flag2;}
if(empty($Flag3)){$Flag3="NONE3";}else{$Flag3=$Flag3;}
if(empty($Flag4)){$Flag4="NONE4";}else{$Flag4=$Flag4;}
if(empty($Flag5)){$Flag5="NONE5";}else{$Flag5=$Flag5;}

# 参数组合一起就是完整的模块地址
$AdvancedFile  = $ModuleAPI.$ModuleArray[0].$Cache;
$BasicFile     = $ModuleAPI.$ModuleArray[1].$Cache;
$DIRECTFile    = $ModuleAPI.$ModuleArray[2].$Cache;
$DefaultFile   = $ModuleAPI.$ModuleArray[3].$Cache;
$HostsFixFile  = $ModuleAPI.$ModuleArray[4].$Cache;
$IPCIDRFile    = $ModuleAPI.$ModuleArray[5].$Cache;
$KEYWORDFile   = $ModuleAPI.$ModuleArray[6].$Cache;
$REJECTFile    = $ModuleAPI.$ModuleArray[7].$Cache;
$RewriteFile   = $ModuleAPI.$ModuleArray[8].$Cache;
$YouTubeFile   = $ModuleAPI.$ModuleArray[9].$Cache;
$OtherFile     = $ModuleAPI.$ModuleArray[10].$Cache;
$USERAGENTFile = $ModuleAPI.$ModuleArray[11].$Cache;

# 现在暂时还是单线程,后续可能会改成循环请求或多线程请求
$DefaultModuleCURL  = curl_init();
curl_setopt($DefaultModuleCURL,CURLOPT_URL,"$DefaultFile");
curl_setopt($DefaultModuleCURL,CURLOPT_RETURNTRANSFER,true);
$DefaultCURLF       = curl_exec($DefaultModuleCURL);
curl_close($DefaultModuleCURL);
$AdvancedModuleCURL = curl_init();
if($Rule=="true"){curl_setopt($AdvancedModuleCURL,CURLOPT_URL,"$BasicFile");}
elseif($Rule=="false"){curl_setopt($AdvancedModuleCURL,CURLOPT_URL,"$AdvancedFile");}
curl_setopt($AdvancedModuleCURL,CURLOPT_RETURNTRANSFER,true);
$AdvancedCURLF      = curl_exec($AdvancedModuleCURL);
curl_close($AdvancedModuleCURL);
$DIRECTModuleCURL   = curl_init();
curl_setopt($DIRECTModuleCURL,CURLOPT_URL,"$DIRECTFile");
curl_setopt($DIRECTModuleCURL,CURLOPT_RETURNTRANSFER,true);
$DIRECTCURLF        = curl_exec($DIRECTModuleCURL);
curl_close($DIRECTModuleCURL);
$REJECTModuleCURL   = curl_init();
curl_setopt($REJECTModuleCURL,CURLOPT_URL,"$REJECTFile");
curl_setopt($REJECTModuleCURL,CURLOPT_RETURNTRANSFER,true);
$REJECTCURLF        = curl_exec($REJECTModuleCURL);
curl_close($REJECTModuleCURL);
$KEYWORDModuleCURL  = curl_init();
curl_setopt($KEYWORDModuleCURL,CURLOPT_URL,"$KEYWORDFile");
curl_setopt($KEYWORDModuleCURL,CURLOPT_RETURNTRANSFER,true);
$KEYWORDCURLF       = curl_exec($KEYWORDModuleCURL);
curl_close($KEYWORDModuleCURL);
$IPCIDRModuleCURL   = curl_init();
curl_setopt($IPCIDRModuleCURL,CURLOPT_URL,"$IPCIDRFile");
curl_setopt($IPCIDRModuleCURL,CURLOPT_RETURNTRANSFER,true);
$IPCIDRCURLF        = curl_exec($IPCIDRModuleCURL);
curl_close($IPCIDRModuleCURL);
$RewriteModuleCURL  = curl_init();
curl_setopt($RewriteModuleCURL,CURLOPT_URL,"$RewriteFile");
curl_setopt($RewriteModuleCURL,CURLOPT_RETURNTRANSFER,true);
$RewriteCURLF       = curl_exec($RewriteModuleCURL);
curl_close($RewriteModuleCURL);
$OtherModuleCURL    = curl_init();
curl_setopt($OtherModuleCURL,CURLOPT_URL,"$OtherFile");
curl_setopt($OtherModuleCURL,CURLOPT_RETURNTRANSFER,true);
$OtherCURLF         = curl_exec($OtherModuleCURL);
curl_close($OtherModuleCURL);

# 正则表达式替换规则格式
if($AutoGroup=="true"){$Default = preg_replace('/([^])([ \s]+)/','$1,AutoGroup$2',$DefaultCURLF."\r\n");}
elseif($AutoGroup=="select"){$Default = preg_replace('/([^])([ \s]+)/','$1,Auto$2',$DefaultCURLF."\r\n");}
elseif($AutoGroup=="false"){if($Apple=="true"){$Default = preg_replace('/([^])([ \s]+)/','$1,Proxy$2',$DefaultCURLF."\r\n");}
elseif($Apple=="false"){$Default = preg_replace('/([^])([ \s]+)/','$1,DIRECT$2',$DefaultCURLF."\r\n");}
else{$Default = preg_replace('/([^])([ \s]+)/','$1,DIRECT$2',$DefaultCURLF."\r\n");}}
if($AutoGroup=="true"){$Advanced = preg_replace('/([^])([ \s]+)/','$1,AutoGroup$2',$AdvancedCURLF."\r\n");}
elseif($AutoGroup=="select"){$Advanced = preg_replace('/([^])([ \s]+)/','$1,Auto$2',$AdvancedCURLF."\r\n");}
else{$Advanced = preg_replace('/([^])([ \s]+)/','$1,Proxy$2',$AdvancedCURLF."\r\n");}        
$DIRECT = preg_replace('/([^])([ \s]+)/','$1,DIRECT$2',$DIRECTCURLF."\r\n");
$REJECT = preg_replace('/([^])([ \s]+)/','$1,REJECT$2',$REJECTCURLF."\r\n");
$KEYWORDF = preg_replace('/([^])([ \s]+)/','DOMAIN-KEYWORD,$1$2,force-remote-dns',$KEYWORDCURLF."\r\n");
if($AutoGroup=="true"){$KEYWORD = preg_replace('/Proxy/','AutoGroup',$KEYWORDF."\r\n");}
elseif($AutoGroup=="select"){$KEYWORD = preg_replace('/Proxy/','Auto',$KEYWORDF."\r\n");}
else{$KEYWORD = preg_replace('/Proxy/','Proxy',$KEYWORDF."\r\n");}                                         
$IPCIDRF = preg_replace('/([^])([ \s]+)/','IP-CIDR,$1$2,no-resolve',$IPCIDRCURLF."\r\n");
if($AutoGroup=="true"){$IPCIDR = preg_replace('/Proxy/','AutoGroup',$IPCIDRF."\r\n");}
elseif($AutoGroup=="select"){$IPCIDR = preg_replace('/Proxy/','Auto',$IPCIDRF."\r\n");}
else{$IPCIDR = preg_replace('/Proxy/','Proxy',$IPCIDRF."\r\n");}
$Rewrite = preg_replace('/([^])([ \s]+)/','$1$2',$RewriteCURLF."\r\n");
$OtherF = preg_replace('/([^])([ \s]+)/','$1$2',$OtherCURLF."\r\n");   
if($AutoGroup=="true"){$Other = preg_replace('/Proxy/','AutoGroup',$OtherF."\r\n");}
elseif($AutoGroup=="select"){$Other= preg_replace('/Proxy/','Auto',$OtherF."\r\n");}
else{$Other = preg_replace('/Proxy/','Proxy',$OtherF."\r\n");}

# Surge[General]规则模板
echo "#!MANAGED-CONFIG http://".$_SERVER['SERVER_NAME']."/Rule/Advanced/Surge.php?AutoGroup=$AutoGroup&Rule=$Rule&Apple=$Apple&IPV6=$IPV6&Group=$Group&Config1=$Config1&Config2=$Config2&Config3=$Config3&Config4=$Config4&Config5=$Config5&Flag1=$ENFlag1&Flag2=$ENFlag2&Flag3=$ENFlag3&Flag4=$ENFlag4&Flag5=$ENFlag5&Protocol=$Protocol&Logo=$Logo interval=86400\r\n";
echo "[General]\r\n";
echo "bypass-system = true\r\n";
echo "skip-proxy = 10.0.0.0/8, 17.0.0.0/8, 172.16.0.0/12, 192.168.0.0/16, localhost, *.local, ::ffff:0:0:0:0/1, ::ffff:128:0:0:0/1, *.crashlytics.com\r\n";
if($Logo=="true"){echo "bypass-tun = 10.0.0.0/8,127.0.0.0/24,172.0.0.0/8,192.168.0.0/16\r\n";}
elseif($Logo=="false"){echo "bypass-tun = 0.0.0.0/8,10.0.0.0/8,127.0.0.0/24,172.0.0.0/8,192.168.0.0/16\r\n";}
if($DNS1&&$DNS2){echo "dns-server = $DNS1,$DNS2\r\n";}
elseif($DNS1!=NULL&&$DNS2!=NULL){echo "dns-server = 8.8.8.8,8.8.4.4\r\n";}
else{echo "dns-server = 8.8.8.8,8.8.4.4\r\n";}
echo "loglevel = notify\r\n";
echo "replica = false\r\n";
if($IPV6=="true"){echo "ipv6 = false\r\n";}
elseif($IPV6=="false"){echo "ipv6 = false\r\n";}
echo "#  \r\n";
echo "# Surge Config File [CloudGate]\r\n";
echo "# Download Time: " . date("Y-m-d H:i:s") . "\r\n";
echo "# \r\n";
echo "[Proxy]\r\n";
if ($Group<"2"){echo "$Flag1 = custom,$Config1,$Module\r\n";}
elseif ($Group<"3"){
echo "$Flag1 = custom,$Config1,$Module\r\n";
echo "$Flag2 = custom,$Config2,$Module\r\n";}
elseif ($Group<"4"){
echo "$Flag1 = custom,$Config1,$Module\r\n";
echo "$Flag2 = custom,$Config2,$Module\r\n";
echo "$Flag3 = custom,$Config3,$Module\r\n";}
elseif ($Group<"5"){
echo "$Flag1 = custom,$Config1,$Module\r\n";
echo "$Flag2 = custom,$Config2,$Module\r\n";
echo "$Flag3 = custom,$Config3,$Module\r\n";
echo "$Flag4 = custom,$Config4,$Module\r\n";}
elseif ($Group<"6"){
echo "$Flag1 = custom,$Config1,$Module\r\n";
echo "$Flag2 = custom,$Config2,$Module\r\n";
echo "$Flag3 = custom,$Config3,$Module\r\n";
echo "$Flag4 = custom,$Config4,$Module\r\n";
echo "$Flag5 = custom,$Config5,$Module\r\n";}
elseif ($Group>"6"){echo "$Flag1 = custom,$Config1,$Module\r\n";}
else {echo "$Flag1 = custom,$Config1,$Module\r\n";}
echo "[Proxy Group]\r\n";
if ($AutoGroup=="true"){}
elseif($AutoGroup=="false"){
if ($Group<"2"){echo "Proxy = select, $Flag1\r\n";}
elseif ($Group<"3"){echo "Proxy = select, $Flag1, $Flag2\r\n";}
elseif ($Group<"4"){echo "Proxy = select, $Flag1, $Flag2, $Flag3\r\n";}
elseif ($Group<"5"){echo "Proxy = select, $Flag1, $Flag2, $Flag3, $Flag4\r\n";}
elseif ($Group<"6"){echo "Proxy = select, $Flag1, $Flag2, $Flag3, $Flag4, $Flag5\r\n";}
elseif ($Group>"6"){echo "Proxy = select, $Flag1\r\n";}}
elseif($AutoGroup=="select"){
if ($Group<"2"){echo "Auto = select, AutoGroup, $Flag1\r\n";}
elseif ($Group<"3"){echo "Auto = select, AutoGroup, $Flag1, $Flag2\r\n";}
elseif ($Group<"4"){echo "Auto = select, AutoGroup, $Flag1, $Flag2, $Flag3\r\n";}
elseif ($Group<"5"){echo "Auto = select, AutoGroup, $Flag1, $Flag2, $Flag3, $Flag4\r\n";}
elseif ($Group<"6"){echo "Auto = select, AutoGroup, $Flag1, $Flag2, $Flag3, $Flag4, $Flag5\r\n";}
elseif ($Group>"6"){echo "Auto = select, $Flag1\r\n";}}
else {echo "Proxy = select, $Flag1\r\n";}
if ($AutoGroup=="true"){
if ($Group<"2"){echo "AutoGroup = url-test, $Flag1, url = $AutoGroupURL, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"3"){echo "AutoGroup = url-test, $Flag1, $Flag2, url = $AutoGroupURL, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"4"){echo "AutoGroup = url-test, $Flag1, $Flag2, $Flag3, url = $AutoGroupURL, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"5"){echo "AutoGroup = url-test, $Flag1, $Flag2, $Flag3, $Flag4, url = $AutoGroupURL, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"6"){echo "AutoGroup = url-test, $Flag1, $Flag2, $Flag3, $Flag4, $Flag5, url = $AutoGroupURL, interval = 600, tolerance = 200, timeout = 5\r\n";}}
if ($AutoGroup=="select"){
if ($Group<"2"){echo "AutoGroup = url-test, $Flag1, url = $AutoGroupURL, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"3"){echo "AutoGroup = url-test, $Flag1, $Flag2, url = $AutoGroupURL, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"4"){echo "AutoGroup = url-test, $Flag1, $Flag2, $Flag3, url = $AutoGroupURL, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"5"){echo "AutoGroup = url-test, $Flag1, $Flag2, $Flag3, $Flag4, url = $AutoGroupURL, interval = 600, tolerance = 200, timeout = 5\r\n";}
elseif ($Group<"6"){echo "AutoGroup = url-test, $Flag1, $Flag2, $Flag3, $Flag4, $Flag5, url = $AutoGroupURL, interval = 600, tolerance = 200, timeout = 5\r\n";}}
elseif ($AutoGroup=="false"){}

# 最后模块内容输出
echo "[Rule]\r\n";
echo "# Default\r\n".$Default;
echo "# PROXY\r\n".$Advanced;
echo "# DIRECT\r\n".$DIRECT;
echo "# REJECT\r\n".$REJECT;
echo "# KEYWORD\r\n".$KEYWORD;
echo "# IP-CIDR\r\n".$IPCIDR;
echo "# Other\r\n".$Other;
echo "[URL Rewrite]\r\n";
echo "# Rewrite\r\n".$Rewrite;