<?php  function ReplaceSpecialChar($in)
{
$what = array(
"\175","»" ,


//E
"\350", "\351", "\352", "\353",
"\310", "\311", "\312", "\313",
"é" , "è" ,
//A
"\340", "\341", "\342", "\343",
"\344", "\345", "\346", 
"à","á","â","ã","ä","å","æ",

//C
"\347",
//U
"\371", "\372", "\373", "\374",
);
$to = array(
"&raquo;","&raquo;",

//E
"&egrave;", "&eacute;", "&ecirc;", "&euml;",
"&Egrave;", "&Eacute;", "&Ecirc;", "&Euml;",
"&eacute;" ,"&egrave;",
//A
"&agrave;", "&aacute;", "&acirc;", "&atilde;", 
"&auml;", "&aring;", "&aelig;",
"&agrave;", "&aacute;", "&acirc;", "&atilde;", 
"&auml;", "&aring;", "&aelig;",
//C
"&ccedil;",
//U
"&ugrave;", "&uacute;", "&ucirc;", "&uuml;"
);
$out = str_replace($what, $to, $in);
return $out;
}
?>