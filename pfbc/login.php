<link type="text/css" rel="stylesheet" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css"/><style type="text/css">label span.required { color: #B94A48; }span.help-inline, span.help-block { color: #888; font-size: .9em; font-style: italic; }</style><form action="gen.php" id="login" method="post" class="form-horizontal"><fieldset><legend>Login</legend><input type="hidden" name="form" value="login" id="login-element-1"/><div class="control-group"><label class="control-label" for="login-element-2"><span class="required">* </span>Email Address:</label><div class="controls"><input type="email" name="Email" required id="login-element-2"/></div></div><div class="control-group"><label class="control-label" for="login-element-3"><span class="required">* </span>Password:</label><div class="controls"><input type="password" name="Password" required id="login-element-3"/></div></div><div class="control-group"><div class="controls"><label class="checkbox"> <input id="login-element-4-0" type="checkbox" name="Remember[]" value="1"/> Remember me </label> </div></div><div class="form-actions"><input type="submit" value="Login" name class="btn btn-primary" id="login-element-5"/> <input type="button" value="Cancel" name onclick="history.go(-1);" class="btn" id="login-element-6"/></div></fieldset></form><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script><script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script><script type="text/javascript">jQuery(document).ready(function() {		jQuery("#login").bind("submit", function() { 
			jQuery(this).find("input[type=submit]").attr("disabled", "disabled"); 
		});jQuery("#login :input:visible:enabled:first").focus();}); </script>