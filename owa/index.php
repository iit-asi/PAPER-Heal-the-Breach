<?php
$q=$_SERVER['REQUEST_URI'];

?>


<!-- Copyright (c) 2006 Microsoft Corporation.  All rights reserved. -->
<!-- OwaPage = ASP.auth_error_aspx -->

<!-- {698798E9-889B-4145-ACFC-474C378C7B4F} -->
<html dir="ltr">



<head>
	<meta http-equiv="Content-Type" content="text/html; CHARSET=utf-8">
	<title>Error</title>
	<link type="text/css" rel="stylesheet" href="8.3.83.4/themes/base/premium.css">
	<link type="text/css" rel="stylesheet" href="8.3.83.4/themes/base/owafont.css">
	
	
</head>
<body class="err">

<table id="tblErr" cellspacing=0 cellpadding=0>
	<tr>
		<td>
			<table cellpadding=0 cellspacing=0>
				<tr>
					<td align="center" valign="middle"><img src="8.3.83.4/themes/base/logob.gif"></td>
					<td class="w100"></td>
					 
						<td nowrap id="tdErrLgf"><a href="logoff.owa?canary=10b3d7cfe0e92615475486facb8d293a">Log Off</a></td>
					
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table class="w100" cellpadding=0 cellspacing=0>
				<tr>
					<td><img src="8.3.83.4/themes/base/crvtplt.gif"></td>
					<td id="tdErrHdTp"><img src="8.3.83.4/themes/base/clear1x1.gif"></td>
					<td><img src="8.3.83.4/themes/base/crvtprt.gif"></td>
				</tr>
				<tr>
					<td colspan=3 id="tdErrHdCt">
						<div class="errHd" id="errMsg"><b>The item that you attempted to access appears to be corrupted and cannot be accessed.</b></div>
					
						<div class="errHd"><a href="?ae=StartPage">Click here to continue working.</a></div>
					
					</td>
				</tr>
				<tr>
					<td colspan=3 class="errHk"><img src="8.3.83.4/themes/base/clear1x1.gif"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td id="tdErrDbg">


	<div class=act onclick="document.getElementById('divDtls').style.display='';this.style.display='none';"><img src="8.3.83.4/themes/base/expnd.gif"> Show details</div>
	<br>
	<div id=divDtls style="display:none"><br><b>Request</b><br>Url: <span id=requestUrl><?php print $q; ?></span><br>User host address: <span id=userHostAddress>130.206.71.143</span><br>User: <span id=userName>Rafael Palacios</span><br>EX Address: <span id=exAddress>/o=Malbot Corporation/ou=Exchange Administrative Group (FYDIBOHF23SPDLT)/cn=Recipients/cn=rafael</span><br>SMTP Address: <span id=smtpAddress>rafael@icai.evil-hacker.com</span><br>OWA version: <span id=owaVersion>8.3.83.4</span><br>Mailbox server: <span id=mailboxServer>breach-europe.icai.evil-hacker.com</span><br><br><b>Exception</b><br>Exception type: <span id=exceptionType>Microsoft.Exchange.Data.Storage.CorruptDataException</span><br>Exception message: <span id=exceptionMessage>System.FormatException: Invalid character in a Base-64 string.
   at System.Convert.FromBase64String(String s)
   at Microsoft.Exchange.Data.Storage.StoreId.Base64ToByteArray(String base64String)</span><br><br><b>Call stack</b><br><div id=exceptionCallStack><div nowrap>Microsoft.Exchange.Data.Storage.StoreId.Base64ToByteArray(String base64String)
  </div><div nowrap>Microsoft.Exchange.Data.Storage.StoreObjectId.Deserialize(String base64Id)
  </div><div nowrap>Microsoft.Exchange.Clients.Owa.Core.Utilities.CreateStoreObjectId(String storeObjectIdString)
  </div><div nowrap>Microsoft.Exchange.Clients.Owa.Basic.QueryStringUtilities.CreateFolderStoreObjectId(MailboxSession mailboxSession, HttpRequest httpRequest, Boolean required)
  </div><div nowrap>Microsoft.Exchange.Clients.Owa.Basic.ListViewPage.OnLoad(EventArgs e)
  </div><div nowrap>Microsoft.Exchange.Clients.Owa.Basic.MessageView.OnLoad(EventArgs e)
  </div><div nowrap>System.Web.UI.Control.LoadRecursive()
  </div>System.Web.UI.Page.ProcessRequestMain(Boolean includeStagesBeforeAsyncPoint, Boolean includeStagesAfterAsyncPoint)</div><br><b>Inner Exception</b><br>Exception type: <span id=exceptionType>System.FormatException</span><br>Exception message: <span id=exceptionMessage>Invalid character in a Base-64 string.</span><br><br><b>Call stack</b><br><div id=exceptionCallStack><div nowrap>System.Convert.FromBase64String(String s)
  </div>Microsoft.Exchange.Data.Storage.StoreId.Base64ToByteArray(String base64String)</div></div>

		</td>
	</tr>
	<tr>
		<td>
			<table class="w100" cellpadding=0 cellspacing=0>
				<tr>
					<td colspan=3 class="errHk"><img src="8.3.83.4/themes/base/clear1x1.gif"></td>
				</tr>
				<tr>
					<td colspan=3 id="tdErrFtCt"><img src="8.3.83.4/themes/base/clear1x1.gif"></td>
				</tr>
				<tr>
					<td><img src="8.3.83.4/themes/base/crvbtmlt.gif"></td>
					<td id="tdErrFtBt"><img src="8.3.83.4/themes/base/clear1x1.gif"></td>
					<td><img src="8.3.83.4/themes/base/crvbtmrt.gif"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

</body>
</html>
