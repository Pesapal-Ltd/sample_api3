<h2>Payment form</h2>
<div class="row-fluid">
    <div class="span4">
        <ol type="1">
        <li>At this point, its best you store the payment details inyour DB. Set the transaction status as PLACED</li>
        <li>The iframe with the payment options is a page from our PesaPal server. Its secured and is available over a secure https link</li>
        <li>It's not Mandatory to purchase the SSL certificate for your site</li>
        </ol>
    </div>
    
    <div id="rightcol2" class="span8">
        <iframe src="<?php echo $iframe_src;?>" width="100%" height="900px"  scrolling="yes" frameBorder="0">
        	<p>Browser unable to load iFrame</p>
        </iframe>
    </div>
</div>