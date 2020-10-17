<!DOCTYPE html>
<html>
<head>
<title>CV</title>

<meta name="viewport" content="width=device-width"/>
<meta name="description" content="The Curriculum Vitae of Joe Bloggs."/>
<meta charset="UTF-8"> 

<link type="text/css" rel="stylesheet" href="{{asset('pdf/style.css')}}"> 

</head>
<body id="top" style="background:#ffff" style="font-size: 14px">
<div id="cv" class="instaFade" style="bakground:#ffff !important">
	<div class="mainDetails">	
	
		
		<div id="name">
			<img src="https://www.amarshebaltd.com.bd/nurse/1054236175_1599739606_baelen.jpg"  height="150" width="150"/>
		</div>
		
		 
		<div class="clear"></div>
	</div>
	
	<div id="mainArea" class="quickFade" style="height: 838px;bakground:#ffff
    margin-top: 41px;">
		<section>
			<article>
				<h1>Personal Profile</h1>
				<div class="sectionTitle">
				 
				</div> <br>
				
				<div class="sectionContent" style="font-size: 14px">
					<p>Name:{{ $info['name'] }}</p>
					<p>Father's Name: {{ $info['father_name']??'' }}  &nbsp; &nbsp;&nbsp;  Mother's Name: {{ $info['mother_name']??"" }} </p>
					 
					<p>Date of Birth: {{ $info['dob']??'' }} &nbsp; &nbsp;&nbsp; Maritual Status: {{ $info['maritual_status']??'' }} </p>					
					<p>Nationality: {{ $info['nationality']??"" }} &nbsp; &nbsp;&nbsp; Religion: {{ $info['religion']??"" }}&nbsp; &nbsp;&nbsp; Mobile: {{ $info['mother_name']??"" }}</p>
					<p></p>
					<p>Permanent Address: {{ $info['permanent_address']??"" }}</p>
					<p>Present Address: {{ $info['present_address']??"" }}</p>
					 
				</div>
			</article>
			<div class="clear"></div>
		</section>
		

		@if (count($education_info)>0)
		<section>
			<article>
				<h4> <b>Education Qualification </b></h4> <br>
			<div class="sectionTitle">
				
			</div>			
			 
					 	<table>
								  <tr>
								    <th>Exam Nursing</th>
								    <th>Group/Subject</th>
								    <th>Year</th>
								    <th>Grade</th>
									<th>Borad/University</th>
									@if ($education_info)

									@foreach($education_info as $item)
								  </tr>

									  <tr style="font-size: 10px">
									    <td>{{ $item->exam_name }}</td>
									    <td>{{ $item ->group}}</td>
									    <td>{{ $item->year }}</td>
									    <td>{{ $item->grade }}</td>
									    <td>{{ $item->board }}</td>
									</tr>
									@endforeach
									@endif
									 
						</table>

			 </article>
			<div class="clear"></div>
		</section>
		@endif


		@if(count($exp_info)>0)
		<section>
			<article>
				<h4> <b>Work Experience </b></h4> <br>
			<div class="sectionTitle">
				
				 
			</div>
			
			 
				 	
					 	<table>
								  <tr>
								    <th>Organization Name</th>
								    <th>Year</th>
								    <th>Started Date</th>
								    <th>End Date</th>
								  </tr>
								  @if($exp_info)
								  	@foreach($exp_info as $item)
								  
									  <tr  style="font-size: 10px">
									    <td>{{ $item->org_name }}</td>
									    <td>{{ $item->total_exp }}</td>
									    <td>{{ $item->starting_date }}</td>
									    <td>{{ $item->ending_date }}</td>
									  </tr>
									  @endforeach
								@endif
									 
						</table>
					</article>
			 
			<div class="clear"></div>
		</section>
		@endif
		
	 
		
		
		<section>
			<article>
					<h4> <b>Reference </b></h4>
			<div class="sectionTitle">
				
 
				 
			</div>
			
					<table>
								  <tr>
								    <th>Name</th>
								    <th>Address</th>
								    <th>Mobile</th>
								    <th>Relation</th>
								  </tr>
								  @if($reference_info)
										@foreach($reference_info as $item)
											<tr  style="font-size: 10px">
												<td>{{ $item->referral_user_name }} </td>
												<td>{{ $item->referral_user_address }}</td>
												<td>{{ $item->referral_user_mobile_no }}</td>
												<td>{{ $item->referral_user_relation }}</td>
											</tr>
										@endforeach 								
									@endif									 
						</table>
			</article>

			<div class="clear"></div>
		</section>

		<section>
			<div class="sectionTitle" style="margin-top: 5px">
					<h4> <b>Signature </b></h4> 

				 
			</div>
			
				 


			<div class="clear"></div>
		</section>

		
	</div>
</div>
 
</body>
</html>