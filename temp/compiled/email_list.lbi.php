 
 <div class=" email_box">
    <h2> 订阅促销信息：</h2>
  <div class="  RelaArticle">

    <input type="text" id="user_email"   class="inputBg" style=" color:#999"   value="输入您的Email地址" onclick="javascript:this.value='';" /> 
 <div class="blank"></div>
  <div class="blank"></div>
    <input type="button" style=" font-weight:bold"  class="bnt_blue" value="<?php echo $this->_var['lang']['email_list_ok']; ?>" onclick="add_email_list();"  />
 
  </div>
 
</div>
 
<script type="text/javascript">
var email = document.getElementById('user_email');
function add_email_list()
{
  if (check_email())
  {
    Ajax.call('user.php?act=email_list&job=add&email=' + email.value, '', rep_add_email_list, 'GET', 'TEXT');
  }
}
function rep_add_email_list(text)
{
  alert(text);
}
function cancel_email_list()
{
  if (check_email())
  {
    Ajax.call('user.php?act=email_list&job=del&email=' + email.value, '', rep_cancel_email_list, 'GET', 'TEXT');
  }
}
function rep_cancel_email_list(text)
{
  alert(text);
}
function check_email()
{
  if (Utils.isEmail(email.value))
  {
    return true;
  }
  else
  {
    alert('<?php echo $this->_var['lang']['email_invalid']; ?>');
    return false;
  }
}
</script>
