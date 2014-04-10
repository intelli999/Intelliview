<?php
	session_start()lupin;
	include '../start_include.php';
		logincheck();
	$user_name=$_SESSION['user'];
	//echo "The username is" . $user_name  . "</br>";
	$found_user_level=$_SESSION['user_level'];
	$user_id=$_SESSION['user_id'];
	//echo $user_id . "</br>";
	$company_id=$_SESSION['company_id'];
	//echo $company_id . "</br>";
$full_name=$_SESSION['full_name'];
$year=$_POST['year'];
$person_no=$_POST['person_no'];
//echo "The person_no is " . $person_no;
$mysqli=new mysqli("intelliview2.mysql.domeneshop.no", "intelliview2", "gTg4TNTJ", "intelliview2");
// check connection 
if (mysqli_connect_errno()) {
   printf("Connect failed: %s\n", mysqli_connect_error());
   exit();
}





$query0= "SELECT first_name, last_name FROM person 
	WHERE company_id=$company_id and person_no=$person_no";
if(!$result0 = $mysqli->query($query0))
	{
	    die('There was an error running the query0 [' . $db->error . ']');
	}
	while($row0 = $result0->fetch_assoc())
	{
		$lines0[]=$row0;
	}
$first_name=$lines0[0]['first_name'];
$last_name=$lines0[0]['last_name'];

//echo "The first_name is" . $first_name;

//Geting the actual numbers for acount 3001
for($x=1; $x<13; $x++)
{
	//Getting the actual numbers for acount 3001
	$query1 = "SELECT sum(acc_amount) as acc_amount
		from transactions where person_no=$person_no and company_id=$company_id and year=$year and month=$x
		and account_no=3001";

	if(!$result1 = $mysqli->query($query1))
		{
	    	die('There was an error running the query 1 [' . $db->error . ']');
		}
		while($row1 = $result1->fetch_assoc())
		{
		$lines1[]=$row1;
		}
	//Getting the actual numbers for acount 3200
	$query2 = "SELECT sum(acc_amount) as acc_amount
		from transactions where person_no=$person_no and company_id=$company_id and year=$year and month=$x
		and account_no=3200
		OR 
		person_no=$person_no and company_id=$company_id and year=$year and month=$x
		and account_no=3002
		OR 
		person_no=$person_no and company_id=$company_id and year=$year and month=$x
		and account_no=3100";

	if(!$result2 = $mysqli->query($query2))
		{
	    	die('There was an error running the query 2 [' . $db->error . ']');
		}
		while($row2 = $result2->fetch_assoc())
		{
		$lines2[]=$row2;
		}	
//Getting the actual numbers for acount 3003
		$query3 = "SELECT sum(acc_amount) as acc_amount
			from transactions where person_no=$person_no and company_id=$company_id and year=$year and month=$x
			and account_no=3003";

		if(!$result3 = $mysqli->query($query3))
			{
		    	die('There was an error running the query 3 [' . $db->error . ']');
			}
			while($row3 = $result3->fetch_assoc())
			{
			$lines3[]=$row3;
			}
//Getting the totals for accounts 3001, 3003 and 3200, and 3002 and 3100		
		$query4 = "SELECT sum(acc_amount) as acc_amount
		from transactions where person_no=$person_no and company_id=$company_id and year=$year and month=$x
		and account_no=3001
		OR 
		person_no=$person_no and company_id=$company_id and year=$year and month=$x
		and account_no=3003
		OR 
		person_no=$person_no and company_id=$company_id and year=$year and month=$x
		and account_no=3200
		OR 
		person_no=$person_no and company_id=$company_id and year=$year and month=$x
		and account_no=3002
		OR 
		person_no=$person_no and company_id=$company_id and year=$year and month=$x
		and account_no=3100";

	if(!$result4 = $mysqli->query($query4))
		{
	    	die('There was an error running the query 4 [' . $db->error . ']');
		}
		while($row4 = $result4->fetch_assoc())
		{
		$lines4[]=$row4;
		}
		//Now we get the budget numbers
		
		//Getting the actual numbers for acount 3001
		$query5 = "SELECT sum(budget_amount) as budget_amount
			from transactions where person_no=$person_no and company_id=$company_id and year=$year and month=$x
			and account_no=3001";

		if(!$result5 = $mysqli->query($query5))
			{
		    	die('There was an error running the query 1 [' . $db->error . ']');
			}
			while($row5 = $result5->fetch_assoc())
			{
			$lines5[]=$row5;
			}
		//Getting the actual numbers for acount 3200
		$query6 = "SELECT sum(budget_amount) as budget_amount
			from transactions where person_no=$person_no and company_id=$company_id and year=$year and month=$x
			and account_no=3200
			OR 
			person_no=$person_no and company_id=$company_id and year=$year and month=$x
			and account_no=3002
			OR 
			person_no=$person_no and company_id=$company_id and year=$year and month=$x
			and account_no=3100";
		

		if(!$result6 = $mysqli->query($query6))
			{
		    	die('There was an error running the query 6 [' . $db->error . ']');
			}
			while($row6 = $result6->fetch_assoc())
			{
			$lines6[]=$row6;
			}	
	//Getting the actual numbers for acount 3003
			$query7 = "SELECT sum(budget_amount) as budget_amount
				from transactions where person_no=$person_no and company_id=$company_id and year=$year and month=$x
				and account_no=3003";

			if(!$result7 = $mysqli->query($query7))
				{
			    	die('There was an error running the query 7 [' . $db->error . ']');
				}
				while($row7 = $result7->fetch_assoc())
				{
				$lines7[]=$row7;
				}
	//Getting the totals for accounts 3001, 3003 and 3200		
			$query8 = "SELECT sum(budget_amount) as budget_amount
			from transactions where person_no=$person_no and company_id=$company_id and year=$year and month=$x
			and account_no=3001
			OR 
			person_no=$person_no and company_id=$company_id and year=$year and month=$x
			and account_no=3003
			OR 
			person_no=$person_no and company_id=$company_id and year=$year and month=$x
			and account_no=3200
			OR 
			person_no=$person_no and company_id=$company_id and year=$year and month=$x
			and account_no=3002
			OR 
			person_no=$person_no and company_id=$company_id and year=$year and month=$x
			and account_no=3100";

		if(!$result8 = $mysqli->query($query8))
			{
		    	die('There was an error running the query 8 [' . $db->error . ']');
			}
			while($row8 = $result8->fetch_assoc())
			{
			$lines8[]=$row8;
			}



}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SMARTBLIKK - Admin</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
    
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">        
    
    <link href="../assets/css/ui-lightness/jquery-ui-1.10.0.custom.min.css" rel="stylesheet">
    
    <link href="../assets/css/base-admin-3.css" rel="stylesheet">
    <link href="../assets/css/base-admin-3-responsive.css" rel="stylesheet">
    
    <link href="../assets/css/pages/dashboard.css" rel="stylesheet">   
        
    <link href="../assets/js/plugins/faq/faq.css" rel="stylesheet"> 

    <link href="../assets/css/custom.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	


  </head>

<body>

<nav class="navbar navbar-inverse" role="navigation">

	<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <i class="icon-cog"></i>
    </button>
    <a class="navbar-brand" href="../index.html"><img src="../assets/img/logo.png"></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav navbar-right">

		<li class="dropdown">
						
			<a href="javscript:;" class="dropdown-toggle" data-toggle="dropdown">
				<i class="icon-user"></i> 
				<?php echo $full_name ?>
				<b class="caret"></b>
			</a>
			
			<ul class="dropdown-menu">
				<li><a href="../profil.php">Min profil</a></li>
					<?php
					if($_SESSION['multi_co']!=0)
					{
					?>	
					<li><a href="../company_choose.php">Velg selskap</a></li>
					<?php
					}
					?>
				<li class="divider"></li>
				<li><a href="index.html">Logg ut</a></li>
			</ul>
			
		</li>
    </ul>
    
    
  </div><!-- /.navbar-collapse -->
</div> <!-- /.container -->
</nav>
    



    
<div class="subnavbar">

	<div class="subnavbar-inner">
	
		<div class="container">
			
			<a href="javascript:;" class="subnav-toggle" data-toggle="collapse" data-target=".subnav-collapse">
		      <span class="sr-only">Toggle navigation</span>
		      <i class="icon-reorder"></i>
		      
		    </a>

			<div class="collapse subnav-collapse">
				<ul class="mainnav">
				
					<li class="active"><a href="../report_menu.php"><i class="icon-home"></i><span>Start</span></a></li>
								
                                
                                
<!--                                <li class="dropdown">					
<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
<i class="icon-edit"></i><span>Vedlikeholde</span><b class="caret"></b></a>	 
   
<ul class="dropdown-menu">
<li><a href="brukeroversikt.html">Brukeroversikt</a></li>
<li><a href="login.html">Logg inn på nytt</a></li>
</ul> 				
</li>
					
					
					<li class="dropdown">					
<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
<i class="icon-file"></i><span>Opprette</span><b class="caret"></b></a>	 
   
<ul class="dropdown-menu">
<li><a href="./ny_bruker.html">Ny bruker</a></li>
<li><a href="./ny_selskap.html">Nytt selskap</a></li>

</ul> 				
</li>



<li class="dropdown">					
<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
<i class="icon-unlink"></i><span>Slette</span><b class="caret"></b></a>	 
   
<ul class="dropdown-menu">
<li><a href="slette_bruker.html">Slette bruker</a></li>
<li><a href="slette_session.html">Slette session</a></li>
<li><a href="slette_ib.html">Slette IB</a></li>
<li><a href="slette_tall.html">Slette månedstall</a></li>
</ul> 				
</li>
-->				
				</ul>
			</div> <!-- /.subnav-collapse -->

		</div> <!-- /container -->
	
	</div> <!-- /subnavbar-inner -->

</div> <!-- /subnavbar -->
    
    
<div class="main">

    <div class="container">

       	<div class="row">
 		
			<div class="col-md-12">

				<div class="widget-content">
      
 <a href="rep120param.php"><button type="button" class="btn btn-info">Tilbake</button></a>     
      
<a href="rep119axl2.php?company_id=<?php echo $company_id ?>&company_name=<?php echo $company_name ?>&year=<?php echo $year ?>&person_no=<?php echo $person_no?>">
	<button type="button" class="btn btn-success">Eksport til Excel</button></a>
    </div>

     </div>
      	
      	
     
      	    <div class="widget stacked">
              <div class="widget-header"> <i class="icon-user"></i><H3>Salgsrapport for rådgiver: <?php echo utf8_encode($first_name) . " " . utf8_encode($last_name) . "  (alle tall i kr 000)"?></H3></div>
      	      <!-- /widget-header -->
              <div class="widget-content">
              
                            
               
                <section id="tables">
                  
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Kontonummer/navn</th>
                          <th>Januar</th>
                          <th>Februar</th>
                          <th>Mars</th>
                          <th>April</th>
                        <th>Mai</th>
  						<th>Juni</th>
  						<th>Juli</th>
	  					<th>August</th>
		  				<th>September</th>
			  			<th>Oktober</th>
				  		<th>November</th>
					  	<th>Desember</th>
						<th>Sum</th>	 
						</tr>
                      </thead>
                      <tbody>
                        
                       <tr>
						<td>Trinninntekter</td>
	   					<?php
						$actual_3001_total=0;
						$actual_3200_total=0;
						$actual_3003_total=0;
						$actual_income_total=0;
						$acc_income=0;
						foreach($lines1 as $display1)
						{
						$actual_3001=$display1['acc_amount']*-1/1000;
						$actual_3001_total=$actual_3001_total+$actual_3001;
						$view_actual_3001[]=$actual_3001_total;
						?>
						
						<td><?php echo thousand_no_dec($actual_3001)?></td>
						<?php	
						}
						?>
						<td><?php echo thousand_no_dec($actual_3001_total)?></td>
						</tr>			
						
						<tr>
						<td>Verdivurdering</td>
	   					<?php
					
						$actual_3003_total=0;
						foreach($lines3 as $display3)
						{
						$actual_3003=$display3['acc_amount']*-1/1000;
						$actual_3003_total=$actual_3003_total+$actual_3003;
						$view_actual_3003[]=$actual_3003_total;
						?>

						<td><?php echo thousand_no_dec($actual_3003)?></td>
						<?php	
						}
						?>
						<td><?php echo thousand_no_dec($actual_3003_total)?></td>
						</tr>
						
						
						<tr>
						<td>Bonus/Earnout</td>
	   					<?php
						foreach($lines2 as $display2)
						{
						$actual_3200=$display2['acc_amount']*-1/1000;
						$actual_3200_total=$actual_3200_total+$actual_3200;
						$view_actual_3200[]=$actual_3200_total;
						?>
						<td><?php echo thousand_no_dec($actual_3200)?></td>
						<?php	
						}
						?>
						<td><?php echo thousand_no_dec($actual_3200_total)?></td>
						</tr>
						
						
						<tr>
						<td><b>Sum salgsinntekter</b></td>
	   					<?php
						foreach($lines4 as $display4)
						{
						$actual_income=$display4['acc_amount']*-1/1000;
						$actual_income_total=$actual_income_total+$actual_income;
						?>
						<td><b><?php echo thousand_no_dec($actual_income)?></b></td>
						<?php	
						}
						?>
						<td><b><?php echo thousand_no_dec($actual_income_total)?></b></td>
						</tr>
						<tr>
						<td><b>Akkumulerte salgsinntekter</b></td>
	   					<?php
						foreach($lines4 as $display4)
						{
						$actual_income=$display4['acc_amount']*-1/1000;
						$acc_income=$acc_income+$actual_income;
						$view_acc_income[]=$acc_income;
						//echo $acc_income . "</br>";
						?>
						<td><b><?php echo thousand_no_dec($acc_income)?></b></td>
						<?php	
						}
						?>
						</tr>
						<tr><td><b>Resultatbudsjett</b></td></tr>
						<tr>
							<td>Trinninntekter</td>
		   					<?php
							$budget_3001_total=0;
							$budget_3200_total=0;
							$budget_3003_total=0;
							$budget_income_total=0;
							$acc_budget=0;
							foreach($lines5 as $display5)
							{
							$budget_3001=$display5['budget_amount']*-1/1000;
							$budget_3001_total=$budget_3001_total+$budget_3001;
							?>

							<td><?php echo thousand_no_dec($budget_3001)?></td>
							<?php	
							}
							?>
							<td><?php echo thousand_no_dec($budget_3001_total)?></td>
							</tr>			

							<tr>
							<td>Verdivurdering</td>
		   					<?php

							$budget_3003_total=0;
							foreach($lines7 as $display7)
							{
							$budget_3003=$display7['budget_amount']*-1/1000;
							$budget_3003_total=$budget_3003_total+$budget_3003;
							?>

							<td><?php echo thousand_no_dec($budget_3003)?></td>
							<?php	
							}
							?>
							<td><?php echo thousand_no_dec($budget_3003_total)?></td>
							</tr>


							<tr>
							<td>Bonus/Earnout</td>
		   					<?php
							foreach($lines6 as $display6)
							{
							$budget_3200=$display6['budget_amount']*-1/1000;
								$budget_3200_total=$budget_3200_total+$budget_3200;
							?>
							<td><?php echo thousand_no_dec($budget_3200)?></td>
							<?php	
							}
							?>
							<td><?php echo thousand_no_dec($budget_3200_total)?></td>
							</tr>


							<tr>
							<td><b>Sum salgsinntekter</b></td>
		   					<?php
							foreach($lines8 as $display8)
							{
							$budget_income=$display8['budget_amount']*-1/1000;
							$budget_income_total=$budget_income_total+$budget_income;
							
							?>
							<td><b><?php echo thousand_no_dec($budget_income)?></b></td>
							<?php	
							}
							?>
							<td><b><?php echo thousand_no_dec($budget_income_total)?></b></td>
							</tr>
							<tr>
							<td><b>Akkumulerte salgsinntekter</b></td>
		   					<?php
							foreach($lines8 as $display8)
							{
							$budget_income=$display8['budget_amount']*-1/1000;
							$acc_budget=$acc_budget+$budget_income;
							$view_bud_income[]=$acc_budget;
							?>
							<td><b><?php echo thousand_no_dec($acc_budget)?></b></td>
							<?php	
							}
							?>
							</tr>
							<tr>
							<td><b>Akk. avvik mot budsjett</b></td>
		   					<?php
							for($z=1; $z<13; $z++)
							{
								$query14 = "SELECT sum(acc_amount) as acc_amount
								from transactions where person_no=$person_no and company_id=$company_id and year=$year and month=$z
								and account_no=3001
								OR 
								person_no=$person_no and company_id=$company_id and year=$year and month=$z
								and account_no=3003
								OR 
								person_no=$person_no and company_id=$company_id and year=$year and month=$z
								and account_no=3200
								OR 
								person_no=$person_no and company_id=$company_id and year=$year and month=$z
								and account_no=3002
								OR 
								person_no=$person_no and company_id=$company_id and year=$year and month=$z
								and account_no=3100";
								
								
								
								
								
								
								$lines14=array();
							if(!$result14 = $mysqli->query($query14))
								{
							    	die('There was an error running the query 14 [' . $db->error . ']');
								}
								while($row14 = $result14->fetch_assoc())
								{
								$lines14[]=$row14;
								}
							$month_actual=$lines14[0]['acc_amount']*-1/1000;
							
							$query18 = "SELECT sum(budget_amount) as budget_amount
							from transactions where person_no=$person_no and company_id=$company_id and year=$year and month=$z
							and account_no=3001
							OR 
							person_no=$person_no and company_id=$company_id and year=$year and month=$z
							and account_no=3003
							OR 
							person_no=$person_no and company_id=$company_id and year=$year and month=$z
							and account_no=3200
							OR 
							person_no=$person_no and company_id=$company_id and year=$year and month=$z
							and account_no=3002
							OR 
							person_no=$person_no and company_id=$company_id and year=$year and month=$z
							and account_no=3100";
							
								$lines18=array();
						if(!$result18 = $mysqli->query($query18))
							{
						    	die('There was an error running the query 18 [' . $db->error . ']');
							}
							while($row18 = $result18->fetch_assoc())
							{
							$lines18[]=$row18;
							}
							$month_budget=$lines18[0]['budget_amount']*-1/1000;
							$diff=$diff+($month_actual-$month_budget);
							if($diff<0)
							{
							?>
							<td><b><font color="red"><?php echo thousand_no_dec($diff)?></font></b></td>
							<?php
							}
							else
							{
							?>
							<td><b><font color="green"><?php echo thousand_no_dec($diff)?></font></b></td>	
							<?php
							}
						}	
							mysqli_close($mysqli);
							?>
							</tr>
						
						
						
						
						</tbody>
                    </table>
                    </div>
                  <!-- /.table-responsive -->
                </section>
              </div>
      	      <!-- /widget-content -->
            </div>
      
      	  <!-- /widget -->					
			
	    
     	<div class="col-md-14">

				<div class="widget stacked">

					<div class="widget-header">
						<i class="icon-bar-chart"></i>
						<h3>Resultat hittil i år</h3>  
					</div> <!-- /widget-header -->

					<div class="widget-content">

						<?php
						$fruit=array(10,20,30,40, 50, 60, 70, 80, 90, 100, 90, 80);

						?>			
						<div id="lupin"  style="width:100%; height:400px; "></div> <!-- /bar-chart -->
					</div>
					</div> <!-- /widget-content -->

				</div> <!-- /widget -->		

		</div> <!-- /.span6 --> 	
      	
      </div>
      
	  
      

    </div> <!-- /container -->
    
</div> <!-- /main -->
 


<div class="extra">

	<div class="container">

		<div class="row">
			
			<div class="col-md-3">
				
				<h4><!--SmartBlikk--></h4>
				
				<ul>
					<li><a href="smartblikk.html"><!--Om SmartBlikk--></a></li>
					<li><a href="#"><!--Facebook--></a></li>
					<li><a href="#"><!--LinkedIn--></a></li>
				</ul>
				
			</div> <!-- /span3 -->
			
			<div class="col-md-3">
				
				<h4><!--Support</h4-->
				
				<ul>
					<li><a href="faq.html"><!--Frequently Asked Questions--></a></li>
								<li><a href="kontakt.html"><!--Kontakt support--></a></li>
				</ul>
				
			</div> <!-- /span3 -->
			
			<div class="col-md-3">
				
				<h4><!--Legal--></h4>
				
				<ul>
					<li><a href="#"><!--Lisens--></a></li>
					<li><a href="#"><!--Vilkår for bruk--></a></li>
					<li><a href="#"><!--Personvern--></a></li>
					<li><a href="#"><!--Sikkerhet--></a></li>
				</ul>
				
			</div> <!-- /span3 -->
		  <!-- /span3 -->
	  </div>
		<!-- /row -->

	</div> <!-- /container -->

</div> <!-- /extra -->


    
    
<div class="footer">
		
	<div class="container">
		
		<div class="row">
			
			<div id="footer-copyright" class="col-md-6">
				&copy; Intelliview AS
			</div> <!-- /span6 -->
			
			<div id="footer-terms" class="col-md-6">
				 <a href="http://wwww.smartblikk.no" target="_blank">SmartBlikk</a>
			</div> <!-- /.span6 -->
			
		</div> <!-- /row -->
		
	</div> <!-- /container -->
	
</div> <!-- /footer -->



    

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../assets/js/libs/jquery-1.9.1.min.js"></script>
<script src="../assets/js/libs/jquery-ui-1.10.0.custom.min.js"></script>
<script src="../assets/js/libs/bootstrap.min.js"></script>

<script src="../assets/js/plugins/flot/jquery.flot.js"></script>
<script src="../assets/js/plugins/flot/jquery.flot.pie.js"></script>
<script src="../assets/js/plugins/flot/jquery.flot.resize.js"></script>

<script src="../assets/js/Application.js"></script>

<script src="../assets/js/charts/area.js"></script>
<script src="../assets/js/charts/donut.js"></script>
<script src="../assets/js/libs/jquery-1.9.1.min.js"></script>
<script src="../lib/Highcharts/js/highcharts.js"></script>

	<script>
	$(function () { 
	    $('#lupin').highcharts({
	        chart: {
	            type: 'line'
	        },
	        title: {
	            text: 'Salg mot budsjett'
	        },
	        xAxis: {
	            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Des']
	        },
	        yAxis: {
	            title: {
	                text: 'Kr i hele tusen'
	            }
	        },
	        series: [{
	            name: 'Akkumulert salg',
	            data: [<?php echo join($view_acc_income,',')?>]
	        }, {
	            name: 'Akkumulert budsjett',
	            data: [<?php echo join($view_bud_income,',')?>]
	        }, {
		        name: 'Trinninntekter',
		        data: [<?php echo join($view_actual_3001,',')?>]
			}, {
			    name: 'Verdivurdering',
			   data: [<?php echo join($view_actual_3003,',')?>]
			}, {
			    name: 'Bonus/earnout',
			   data: [<?php echo join($view_actual_3200,',')?>]
			}]
	    });
	});
	</script>

<?php
foreach($display4 as $view4)
{
	echo $view8 . "</br>";
}
?>


  </body>
</html>
