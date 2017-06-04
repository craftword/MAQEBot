<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MAQE Template and Styling</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="main.css" rel="stylesheet">
    

</head>


<body>
	<div id="wrapper">
		<h1>MAQE Forums</h1>
		</h3>Subtitle </h3>
		<h4>Posts </h4>
		<?php 
				$post = file_get_contents("post.json");
				$author = file_get_contents("author.json");
				$getPosts = json_decode($post);
				$getAuthors = json_decode($author);

				for ($i=0; $i < sizeof($getPosts); $i++) {
					$html = '<div class="row">';
					$html .= '<div class="col-md-10 post">';
					$html .= '<img src="'.$getPosts[$i]->image_url.'" width="240" height="180">';
					$html .= "<h4><strong>".$getPosts[$i]->title."</strong></h4>";
					$html .= "<p>".$getPosts[$i]->body."</p>";
					$html .= '<span><i class="fa fa-clock-o" aria-hidden="true"></i> '.$getPosts[$i]->created_at.'</span>';
					$html .= '</div><div class="col-md-2 author">';
					foreach($getAuthors as $item){
							if($item->id == $getPosts[$i]->author_id)    {
									$html .= '<img src="'.$item->avatar_url.'" class="img-circle" alt="avatar" width="100" ><br />';
									$html .= "<p>".$item->name."</p>";
									$html .= "<span>".$item->role."</span><br /><br />";
									$html .= '<i class="fa fa-map-marker" aria-hidden="true"></i> '.$item->place;
							}
						}
					$html .= '</div></div>';
				
					echo $html;
				}
				
				
		?>
		<div class="row">
			<div class="col-md-offset-4 col-md-6">
				<div class="pagination">
					  <a href="#">Previous</a>
					  <a class="active" href="#">1</a>
					  <a href="#">2</a>
					  <a href="#">3</a>
					  <a href="#">4</a>
					  <a href="#">5</a>
					  <a href="#">6</a>
					  <a href="#">Next</a>
				</div>
			</div>
		</div>
	</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>

</html>