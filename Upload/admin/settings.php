<?
$site = mysql_fetch_object(mysql_query("SELECT * FROM `settings`"));
if(isset($_POST['submit'])){
mysql_query("UPDATE `settings` SET `site_name`='{$_POST['name']}', `site_description`='{$_POST['description']}', `site_url`='{$_POST['url']}', `zarinpal`='{$_POST['zarinpal']}', `site_email`='{$_POST['email']}'");
$mesaj = "<div class=\"message success\"><h3>Success!</h3><p>Settings successfully changed</p></div>";
}
if(isset($_POST['status'])){
mysql_query("UPDATE `settings` SET `maintenance`='{$_POST['mode']}', `m_progress`='{$_POST['progress']}'");
$mesaj = "<div class=\"message success\"><h3>Success!</h3><p>Mode successfully changed</p></div>";
}
?>
<script> 
$(document).ready(function(){
    // Regular Expression to test whether the value is valid
    $.tools.validator.fn("[type=time]", "Please supply a valid time", function(input, value) { 
    	return /^\d\d:\d\d$/.test(value);
    });
     
    $.tools.validator.fn("[data-equals]", "Value not equal with the $1 field", function(input) {
    	var name = input.attr("data-equals"),
    		 field = this.getInputs().filter("[name=" + name + "]"); 
    	return input.val() == field.val() ? true : [name]; 
    });
     
    $.tools.validator.fn("[minlength]", function(input, value) {
    	var min = input.attr("minlength");
    	
    	return value.length >= min ? true : {     
    		en: "Please provide at least " +min+ " character" + (min > 1 ? "s" : "")
    	};
    });
     
    $.tools.validator.localizeFn("[type=time]", {
    	en: 'Please supply a valid time'
    });
     
    $("#form").validator({ 
    	position: 'left', 
    	offset: [25, 10],
    	messageClass:'form-error',
    	message: '<div><em/></div>' // em element is the arrow
    }).attr('novalidate', 'novalidate');

});
</script>
<body>
    <div id="wrapper">
        <header id="page-header">
            <div class="wrapper">
                <div id="util-nav">
                </div>
                <h1>Admin Panel</h1>
                <nav id="main-nav">
                    <ul class="clearfix">
                        <li><a href="index.php">Dashboard</a></li>
                        <li><a href="index.php?x=users">Users</a></li>
						<li><a href="index.php?x=sites">Sites</a></li>
						<li><a href="index.php?x=packs">Points</a></li>
						<li><a href="index.php?x=coupons">Coupons</a></li>
                        <li class="active"><a href="index.php?x=settings">Settings</a></li>
                        <li id="quick-links" class="fr">
                            <li id="upgrade" class="fr"><a href="logout.php">Log Out</a></li>
                        </li>               
                    </ul>
                </nav>
            </div>
            <div id="page-subheader">
                <div class="wrapper clearfix">

                    <nav id="sub-nav">

                    </nav>
                </div>
            </div>
        </header>
        
        <section id="content">
            <div class="wrapper">

                <!-- Main Section -->

                <section class="grid_6 first"><? echo $mesaj;?>
                    <div class="columns top">
                        <div class="grid_6 first">
                            <form id="form" method="post" class="form widget">
                                <header><h2>General Settings</h2></header>

                                <section>                 
                                    <fieldset>
                                         <dl>
                                             <dt></dt><dd><label>Site Title</label><input type="text" name="name" value="<? if(isset($_POST['name'])){ echo $_POST['name'];}else{echo $site->site_name;}?>" required="required" /></dd>
											 <dt></dt><dd><label>Site Description</label><input type="text" name="description" value="<? if(isset($_POST['description'])){ echo $_POST['description'];}else{echo $site->site_description;}?>" required="required" /></dd>
                                             <dt></dt><dd><label>Site URL</label><input type="text" name="url" value="<? if(isset($_POST['url'])){ echo $_POST['url'];}else{echo $site->site_url;}?>" required="required" /></dd>
											 <dt></dt><dd><label>Contact Email</label><input type="email" name="email" value="<? if(isset($_POST['email'])){ echo $_POST['email'];}else{echo $site->site_email;}?>" required="required" /></dd>
                                             <dt></dt><dd><label>Zarinpal Merchent</label><input type="text" name="zarinpal" value="<? if(isset($_POST['zarinpal'])){ echo $_POST['zarinpal'];}else{echo $site->zarinpal;}?>" required="required" /></dd>
                                     	</dl>    
                                     </fieldset>

                                     <hr />
                                     <button class="button button-green" type="submit" name="submit">Submit</button>
                                     <button class="button button-gray" type="reset">Reset</button>
                                </section>
                            </form>
                        </div>

                    </div>

                    <div class="clear">&nbsp;</div>

                </section>

                <!-- Main Section End -->

                <!-- Sidebar -->

                <aside class="grid_2 top">

                    <div class="accordion">

                        <header class="current"><h2>Maintenance Mode</h2></header>
                        <section style="display:block"><form id="form" method="post">
                            <dl>
							<dt><label>Status</label></dt><dd><select name="mode"><? if($site->maintenance == 0){?><option value="0">Inactive</option><option value="1">Active</option><?}else{?><option value="1">Active</option><option value="0">Inactive</option><?}?></select></dd>
							<dt><label>Progress</label></dt><dd><input type="text" name="progress" value="<? echo $site->m_progress;?>" required="required" />%</dd>
							<hr />
                            <button class="button button-green" type="submit" name="status">Submit</button>
                            </dl></form>

                        </section>

                    </div>

                </aside>

                <!-- Sidebar End -->
                
                <div class="clear"></div>

            </div>
            <div id="push"></div>
        </section>

    </div>
    
    <footer id="page-footer">
        <div id="footer-inner">
            <p class="wrapper">All rights reserved &copy; <a href="http://faradadeh.com" target="_blank">Faradadeh</a></p>

        </div>
    </footer>

<script>
$(function () {
    var d1 = [];
    for (var i = 0; i < 14; i += 0.5)
        d1.push([i, Math.sin(i)]);
 
    var d2 = [[0, 3], [4, 8], [8, 5], [9, 13]];
 
    var d3 = [];
    for (var i = 0; i < 14; i += 0.5)
        d3.push([i, Math.cos(i)]);
 
    var d4 = [];
    for (var i = 0; i < 14; i += 0.1)
        d4.push([i, Math.sqrt(i * 10)]);
    
    var d5 = [];
    for (var i = 0; i < 14; i += 0.5)
        d5.push([i, Math.sqrt(i)]);
 
    var d6 = [];
    for (var i = 0; i < 14; i += 0.5 + Math.random())
        d6.push([i, Math.sqrt(2*i + Math.sin(i) + 5)]);
                        
    $.plot($("#placeholder"), [
        {
            data: d1,
            lines: { show: true, fill: true }
        },
        {
            data: d2,
            bars: { show: true }
        },
        {
            data: d3,
            points: { show: true }
        },
        {
            data: d4,
            lines: { show: true }
        },
        {
            data: d5,
            lines: { show: true },
            points: { show: true }
        },
        {
            data: d6,
            lines: { show: true, steps: true }
        }
    ]);
});
</script>

</body>