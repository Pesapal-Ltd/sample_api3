<?php include('top.php'); ?>
<script>
				function referenceShuffle(val){
					if (document.getElementById('ref').checked){
						document.getElementById("refholder").style.visibility = "visible";
					}else{
						document.getElementById("refholder").style.visibility = "hidden";
					}
				}
			</script>
<br />
<div class="row-fluid">
	<div class="span7">

                        <ol type="1">
                        	<li>Read our online documentation. Follow it step by step. <a target="_blank" href="https://developer.pesapal.com/">Read Now</a> </li>
                        	<li>Use ISO currency codes. Get them <a target="_blank" href="http://en.wikipedia.org/wiki/ISO_4217">here</a> </li>
                         <li>
                         	Find the difference below between an IPN URL and an IPN_Id :-)
                            <ul type="circle">
                            	<li>IPN URL - The notification url Pesapal with send a status alert to. </li>
                            	<li>IPN_Id(Notification_id) - Uniquely identifies the endpoint Pesapal will send alerts to whenever a payment status changes for each transaction processed via API 3.0. In other word the IPN Id represents the IPN URL,</li>
                                <b>PLease Note</b> An IPN_id is a mandatory field when submitting an order request to Pesapal API 3.0
                            </ul>
                            
                            </li>
                            <li>It's advicable to use unique reference numbers for all transaction.</li>
                            <li>Is there an API that returns the amount paid? Currently this is unavailable. You are advised to store the payment details before submitting the data to PesaPal.</li>
                            <li>Where can i get the secret code mentioned in the documentation? <br /> - Open business account at: <a href="https://www.pesapal.com">https://www.pesapal.com</a> (for Live system)<br /> or <a href="https://developer.pesapal.com/api3-demo-keys.txt">https://developer.pesapal.com/api3-demo-keys.txt</a>(For demo credentials).<br /><br />The sandbox is a demo/test credentials are sample keys that you can use to test your system during development. With the sandbox, you need not to transfer real money. Dummy codes will be generated for you.</li>
                            <li>How do i test using the dummy codes? <br />For card options use the values below the input fields and for mobile payments, there is some text below the payment options, click link within the text to generate dummy codes.</li>
                            <li>Am done testing, i need to go live. How do i do that? <a href="https://developer.pesapal.com/how-to-integrate/api-30-json/api-reference">Solution</a></li>
                            <li>I noticed there is a "DESCRIPTION" on the form, whats that for? <br />Description is a short text giving details about the payment, Eg, Donations to XYZ Organization/ payment for Tv set bought from ABC ltd </li>
                            <li>My submit button on the payments page is hidden, what could be the issue? This is a styling issue. Open the iframe code and increase the size of the iframe loaded.</iframe></li>
                            
                        </ol>
        
        
        
    </div>
    <div class="span5">
        <form id="rightcol" action="iframe.php" method="post" class="rounded5">
            <table>
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name="first_name" value="" /></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name="last_name" value="" /></td>
                </tr>
                <tr>
                    <td>Email Address:</td>
                    <td><input type="text" name="email" value="" /></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><input type="text" name="phone_number" value="" /></td>
                </tr>
                <tr>
                    <td>Amount:</td>
                    <td>
                        <select name="currency" id="currency">
                            <option value="KES">Kenya shillings</option>  
                            <option value="UGX">Ugandan Shillings</option> 
                            <option value="TZS">Tanzanian shillings</option>  
                            <option value="USD">US Dollars</option>  
                        </select>
                        <input type="text" name="amount" value="" />
                    </td>
                </tr>
                <tr id="refholder" style="visibility: hidden">
                    <td>Reference:</td>
                    <td><input type="text" name="reference" value="" /></td>
                </tr>
                    <tr>
                <td colspan="2"><input type="checkbox" name="ref" id="ref" onClick="return referenceShuffle()" />System allows my clients to input a predefined reference code issued to the client before they make the payment</td>
                </tr>
                <td colspan="2"><input type="checkbox" name="keys" id="keys"/><b>ENSURE TO CHECK THIS FIELD</b> The consumer key and consumer secret i have used used in this sample PHP code are <a href="https://developer.pesapal.com/api3-demo-keys.txt"><b>DEMO Credentials</b></a>.</td>
                </tr>
                <tr><td colspan="2"><hr /></td></tr>
                <tr>
                    <td>Description:</td>
                    <td><input type="text" name="description" value="Payments to XYZ Company" /></td>
                </tr>
                <tr><td colspan="2"><hr /></td></tr>
                <tr>
                    <td colspan="2"><input type="submit" value="Make Payment" class="btn" /></td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('bottom.php'); ?>