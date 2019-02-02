<div>
<form action="{$smarty.server.REQUEST_URI|escape:'htmlall':'UTF-8'}" method="post">
	<fieldset>
		<legend>Configure your Paycertify Gateway Options</legend> 
                <div class="form-group">
                    <label class="control-label">API Key</label>
                    <input type="text" name="paycertify_api_key" value="{$PAYCERTIFY_API_KEY}" class="form-control"/>
                </div>
				
		<br />
		<center>
			<input type="submit" name="submitConfigPaycertify" value="Update settings" class="button" />
		</center>
		
	</fieldset>
</form>
</div>
