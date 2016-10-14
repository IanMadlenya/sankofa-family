<!DOCTYPE html>    
<html>
<head>
<title>Sankofa 家族办公室</title>
<?php
    $TradeDate = date("Ymdhis");
    $TransID =  date("Ymdhis");
    $current_user = wp_get_current_user();
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/w3.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/style.css">
<script src="/js/jquery.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
</head>
<body>
    
<!-- Navbar (sit on top) -->
<div class="w3-top">
  <ul class="w3-navbar" id="myNavbar">
    <li><a href="/index.html" class="w3-padding-large w3-text-dark-grey">首页</a></li>
      <li><a href="/services" class="w3-padding-large w3-text-dark-grey">产品信息</a></li>
      <li><a href="#" class="w3-padding-large w3-text-dark-grey">什么是家族办公室</a></li>
      <li><a href="/index.html#our-team" class="w3-padding-large w3-text-dark-grey">团队介绍</a></li>
      <li><a href="/index.html#sankofa-contact" class="w3-padding-large w3-text-dark-grey">联系我们</a></li>
    <li class="w3-hide-small w3-right">
      <?php if ( is_user_logged_in() ): ?>
        <a href="#" class="w3-padding-large w3-black w3-hover-green w3-text-light-grey"><?php echo $current_user->user_login ?></a>
        <?php else: ?>
      <a href="/wp-admin" class="w3-padding-large w3-black w3-hover-green w3-text-light-grey">登录</a>
        <?php endif; ?>
    </li>
  </ul>
</div>

<!-- Slideshow -->
  <div class="w3-display-container w3-wide sankofa-product-preview w3-opacity">
    <img src="http://www.smfos.com.au/images/oceanroad.jpg">
    <div class="w3-display-bottomleft w3-text-white w3-container w3-padding-32 w3-hide-small">
      <span class="w3-black w3-padding-large w3-animate-bottom w3-xlarge w3-text-light-grey">AsiaSwift 支付</span>
    </div>
  </div>

<div class="w3-content w3-container w3-text-dark-grey sankofa-product-box" style="max-width:1100px;margin-top:80px;margin-bottom:80px">
    
<!-- Content -->
    
<form method="post" name="form1" id="form1"  action="post.php">
<table>
<tr>
<td>选择支付方式:</td>
<td><select name="PayID" id="PayID" ><!--充值方式，神州行101 联通102 电信103 盛大111 完美112 征途114 骏网一卡通115 网易 116-->
			<option value="">        </option>
			<option value="101">神州行</option>
			<option value="1022">联通卡</option>
			<option value="1033">电信卡</option>
			<option value="111">盛大卡</option>
			<option value="112">完美卡</option>
			<option value="114">征途卡</option>
			<option value="115">骏网一卡通</option>
			<option value="116">网易卡</option>
			
			<option value="1001">招商银行</option>
			<option value="1002">工商银行</option>
			<option value="1003">建设银行</option>
			<option value="1004">浦发银行</option>
			<option value="1005">农业银行</option>
			<option value="1006">民生银行</option>
			<option value="1009">兴业银行</option>
			<option value="1020">交通银行</option>
			<option value="1022">光大银行</option>
			<option value="1026">中国银行</option>
			<option value="1032">北京银行</option>		
			<option value="1035">平安银行</option>
			<option value="1036">广发银行</option>
			<option value="1039">中信银行</option>
			<option value="1080">银联在线</option>
			
			<option value="3001">招商银行(借)</option>
			<option value="3002">工商银行(借)</option>
			<option value="3003">建设银行(借)</option>
			<option value="3004">浦发银行(借)</option>
			<option value="3005">农业银行(借)</option>
			<option value="3006">民生银行(借)</option>
			<option value="3009">兴业银行(借)</option>
			<option value="3020">交通银行(借)</option>
			<option value="3022">光大银行(借)</option>
			<option value="3026">中国银行(借)</option>
			<option value="3032">北京银行(借)</option>		
			<option value="3035">平安银行(借)</option>
			<option value="3036">广发银行(借)</option>
			<option value="3039">中信银行(借)</option>

			<option value="4001">招商银行(贷)</option>
			<option value="4002">工商银行(贷)</option>
			<option value="4003">建设银行(贷)</option>
			<option value="4004">浦发银行(贷)</option>
			<option value="4005">农业银行(贷)</option>
			<option value="4006">民生银行(贷)</option>
			<option value="4009">兴业银行(贷)</option>
			<option value="4020">交通银行(贷)</option>
			<option value="4022">光大银行(贷)</option>
			<option value="4026">中国银行(贷)</option>
			<option value="4032">北京银行(贷)</option>		
			<option value="4035">平安银行(贷)</option>
			<option value="4036">广发银行(贷)</option>
			<option value="4039">中信银行(贷)</option>
      </select></td>
</tr>
<tr>
<td>商户号:</td>
<td><input  name="MemberID" value="300446" /></td>
</tr>
<tr>
<td>交易流水号:</td>
<td><input type="text" name="TransID" value="<?php echo $TransID;?>" /></td>
</tr>
<tr>
<td>交易时间:</td>
<td><input type="text" name="TradeDate" value="<?php echo $TradeDate;?>" /></td><!--获取当前交易时间-->
</tr>
<tr>
<td>订单金额:</td>
<td><input name="OrderMoney"  value="0.01" /><span>建议1分钱支付</span> </td>
</tr>
<tr>
<td>商品名称:</td>
<td><input type="text" name="ProductName" /></td>
</tr>
<tr>
<td>商品数量:</td>
<td><input type="text" name="Amount" value="1" /></td>
</tr>
<tr>
<td>支付用户名:</td>
<td><input type="text" name="Username" /></td>
</tr>
<tr>
<td>订单附加消息:</td>
<td><input type="text" name="AdditionalInfo" /></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" id="btnpost" value="提交"  /></td>
</tr>

</table>
</form>

</div>
<!-- Footer -->
<div class="footer-text w3-round-large w3-hover-black">
  <p><img src="/images/warning.png"> Disclaimer: Any general advice in this material does not take into account you or your client‘s personal objectives, financial situation and needs. Please seek advice from a financial adviser or broker and read the relevant IM before making a decision in relation to any investment. In the event of any inconsistency or misinterpretation between the marketing material and SMFOs Pty Ltd.</p>
</div>

<footer class="w3-padding-12">
    <a href="http://www.sankofafund.com.au"><img src="/images/logo_black.png"></a>
    <p class="w3-left-align">© 2016 <strong>SMFOs Pty Ltd</strong> (ACN 613532835), All rights reserved.</p>
</footer>
<script src="/js/back.to.top.js"></script>
<a href="#0" class="cd-top">Top</a>
    
</body>
</html>
