<?php
 $allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
 $allowedTags.='<li><ol><ul><span><div><br><ins><del>';  

if ($_POST['elm1']<>'')
{
    $sHeader = '<h1>Ah, content is king.</h1>';
    $sContent =strip_tags(stripslashes($_POST['elm1']),$allowedTags);
}
else {
    $sHeader = '<h1>Nothing submitted yet</h1>';
    $sContent = '<p>Start typing...</p>';
    $sContent.= '<p><img width="107" height="108" border="0" src="/mediawiki/images/badge.png"';
    $sContent.= 'alt="TinyMCE button"/>This rover has crossed over</p>';
  }
?>
<html>
<head>
<title>My test editor - with tinyMCE and PHP</title>
<script language="javascript" type="text/javascript" src="/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript">
  tinyMCE.init({
    theme : "advanced",
    mode: "exact",
    elements : "elm1",
    theme_advanced_toolbar_location : "top",
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
    + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
    + "bullist,numlist,outdent,indent",
    theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
    +"undo,redo,cleanup,code,separator,sub,sup,charmap",
    theme_advanced_buttons3 : "",
    height:"350px",
    width:"600px"
});

</script>
</head>
<body>
 <?php echo $sHeader;?>
 <h2>Sample using TinyMCE and PHP</h2>
 <form method="post" action="submit.php">
    <textarea name="editor" id="editor" rows="10" cols="80">
    This is my textarea to be replaced with HTML editor.
    </textarea>
    <input type="submit" name="submit" value="SUBMIT">
</form>
</body>
</html>
