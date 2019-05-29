<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  	<meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="title" content="Portfolio - Arthur Geay">
        <meta name="description" content="Etudiant à Ynov Nantes & développeur web. Venez découvrir mon parcours et les différents projets que j'ai réalisé. " />
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	  	<link rel="stylesheet" href="public/css/front.css" />
	  	<link rel="stylesheet" href="public/css/main.css" />
		<title>Portfolio - Arthur Geay</title>
	</head>
	<body>
		<header class="animation-left">
			<img src="public/<?= $headerInfo['img_path_header_info']; ?>" />
			<nav>
				<ul>
					<li>
						<a href="#about"><i class="fas fa-user"></i> <span>A propos</span></a>
					</li>
					<li>
						<a href="#resume"><i class="fas fa-briefcase"></i> <span>Parcours</span></a>
					</li>
					<li>
						<a href="#skills"><i class="fas fa-code"></i> <span>Compétences</span></a>
					</li>
					<li>
						<a href="#project"><i class="fas fa-rocket"></i> <span>Projets</span></a>
					</li>
					<li>
						<a href="#contact"><i class="fas fa-at"></i> <span>Contact</span></a>
					</li>
				</ul>

				<div id="social-icons">
					<ul>
						<li>
							<a href="<?= $headerInfo['url_linkedin_header_info']; ?>"><i class="fab fa-linkedin-in"></i></a>
						</li>
						<li>
							<a href="<?= $headerInfo['url_twitter_header_info']; ?>"><i class="fab fa-twitter"></i></a>
						</li>
						<li>
							<a href="<?= $headerInfo['url_github_header_info']; ?>"><i class="fab fa-github"></i></a>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<main class="animation-top">
			<h1><?= $about['fullname_about']; ?></h1>
			<h2><?= $about['current_job_about']; ?></h2>

			<section id="about">
				<h2>A propos</h2>
				<hr>

				<p><?= $about['description_about']; ?></p>

				<div>
					<table>
						<tr>
							<th>Nom</th>
							<td><?= $about['fullname_about']; ?></td>
						</tr>
						<tr>
							<th>Âge</th>
							<td><?= $about['age']; ?> ans</td>
						</tr>
						<tr>
							<th>Adresse</th>
							<td><?= $about['city_about']; ?></td>
						</tr>
					</table>

					<table>
						<tr>
							<th>Email</th>
							<td><?= $about['email_about']; ?></td>
						</tr>
						<tr>
							<th>Téléphone</th>
							<td>06 XX XX XX XX</td>
						</tr>
						<tr>
							<th>Hobbies</th>
							<td><?= $about['hobbies_about']; ?></td>
						</tr>
					</table>
				</div>

				<form>
					<button formaction="public/<?= $about['cv_path_about']; ?>">Télécharger mon CV</button>
				</form>
			</section>

			<section id="resume">
				<h2>Parcours</h2>
				<hr>

				<h3>Expériences professionnelles</h3>
				<div class="timeline">
                    <?php foreach($experiencesPro as $experiencePro): ?>
					<div class="item">
						<h4><?= $experiencePro['title_experience']; ?></h4>

						<p class="item-date"><i class="far fa-calendar-alt"></i> <?= $experiencePro['date_start']; ?> - <?= (isset($experiencePro['date_end'])) ? $experiencePro['date_end']: "Aujourd'hui" ; ?> </p>

						<?= $experiencePro['content_experience']; ?>
					</div>
                    <?php endforeach; ?>
				</div>

				<hr>

				<h3>Formation</h3>
				<div class="timeline">
                    <?php foreach($formations as $formation): ?>
					<div class="item">
                        <h4><?= $formation['title_experience']; ?></h4>

                        <p class="item-date"><i class="far fa-calendar-alt"></i> <?= $formation['date_start']; ?> <?= (!empty($formation['date_end']) && $formation['date_end'] != $formation['date_start']) ? ' - ' .$formation['date_end'] : '' ; ?> </p>

                        <?= $formation['content_experience']; ?>
					</div>
                    <?php endforeach; ?>
				</div>

			</section>

			<section id="skills">
				<h2>Compétences</h2>
				<hr>
				<ul>
                    <?php foreach($skills as $skill): ?>
					<li>
						<img src="public/<?= $skill['img_skills']?>" alt="<?= $skill['alt_img_skills']; ?>" />
					</li>
                    <?php endforeach; ?>
		    	</ul>
			</section>

			<section id="project">
				<h2>Projets</h2>
				<hr>
				<ul>
                    <?php foreach($projects as $project): ?>
					<li>
						<img src="public/<?= $project['img_path_project']; ?>" alt="<?= $project['alt_img_project']; ?>" />
						<a href="<?= $project['url_project']; ?>">
							<div class="overlay">
                                <p><?= $project['content_project']; ?></p>
								<ul>
                                    <?php foreach($project['title_label_type'] as $techno): ?>
                                        <li><?= $techno; ?></li>
                                    <?php endforeach; ?>
								</ul>
							</div>
						</a>
					</li>
                    <?php endforeach; ?>
				</ul>
			</section>

			<section id="contact">
				<h2>Contact</h2>
				<hr>

                <p><?= $contactMessage['content_contact']; ?></p>

                <?php if(isset($_SESSION['error'])): ?>
                    <p class="error"><?= $_SESSION['error']; ?></p>
                <?php
                unset($_SESSION['error']);
                endif;
                ?>

				<form method="post">
					<input type="text" name="firstname" placeholder="Prénom"   />
					<input type="email" name="email" placeholder="Adresse e-mail"  />
					<textarea name="message" rows="10" placeholder="Message" ></textarea>
					<input type="submit" name="contact-form"/>
				</form>
			</section>
		</main>
		
		<script src="public/js/transition.js"></script>
	</body>
</html>
