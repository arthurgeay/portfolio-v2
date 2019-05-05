<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	  	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	  	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	  	<link rel="stylesheet" href="css/front.css" />
	  	<link rel="stylesheet" href="css/main.css" />
		<title>Portfolio - Arthur Geay</title>
	</head>
	<body>
		<header class="animation-left">
			<img src="img/profile/profile.jpeg" />
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
							<a href="https://linkedin.com/in/arthur-geay"><i class="fab fa-linkedin-in"></i></a>
						</li>
						<li>
							<a href="https://twitter.com/arthur_geay"><i class="fab fa-twitter"></i></a>
						</li>
						<li>
							<a href="https://github.com/arthurgeay"><i class="fab fa-github"></i></a>
						</li>
					</ul>
				</div>
			</nav>
		</header>

		<main class="animation-top">
			<h1>Arthur Geay</h1>
			<h2>Étudiant &amp; développeur web</h2>

			<section id="about">
				<h2>A propos</h2>
				<hr>

				<p>Passionné d'informatique et de nouvelles technologies, mon projet professionnel s'oriente vers les métiers du web et plus particulièrement celui de développeur web Backend.</p>

				<div>
					<table>
						<tr>
							<th>Nom</th>
							<td>Arthur Geay</td>
						</tr>
						<tr>
							<th>Âge</th>
							<td>21 ans</td>
						</tr>
						<tr>
							<th>Adresse</th>
							<td>Saint Sébastien sur Loire</td>
						</tr>
					</table>

					<table>
						<tr>
							<th>Email</th>
							<td>arthur.geay@ynov.com</td>
						</tr>
						<tr>
							<th>Téléphone</th>
							<td>06 XX XX XX XX</td>
						</tr>
						<tr>
							<th>Hobbies</th>
							<td><i class="fa fa-gamepad"></i> <i class="fa fa-headphones"></i> <i class="fa fa-film"></i></td>
						</tr>
					</table>
				</div>

				<form>
					<button formaction="download/CV.pdf">Télécharger mon CV</button>
				</form>
			</section>

			<section id="resume">
				<h2>Parcours</h2>
				<hr>

				<h3>Expériences professionnelles</h3>
				<div class="timeline">
					<div class="item">
						<h4>Développeur web @ ENVOLiiS</h4>

						<p class="item-date"><i class="far fa-calendar-alt"></i> Juillet 2018 - Août 2018 </p>

						<p><strong>Les missions :</strong></p>
						<ul>
							<li>Développement d'un portail Power BI</li>
							<li>Développement d'un outil d'import de contrat</li>
						</ul>
					</div>

					<div class="item">
						<h4>Développeur web PHP/Symfony @ Freelance</h4>

						<p class="item-date"><i class="far fa-calendar-alt"></i> Mai 2018 - Aujourd'hui </p>

						<p>Création d'une micro entreprise de développement web.</p>

						<p><strong>Les missions :</strong></p>
						<ul>
							<li>Car Manager Mai 2018 : <br /> Développement d'une application web destinée à gérer la flotte de véhicule des sociétés Duotech, Satelix et ARF.</li>
							<li><a href="https://valerie-dauphin.fr">Valérie-dauphin.fr</a> - Juin 2018 : <br />
								Développement d'un portfolio pour l'auteure de littérature jeunesse Valérie Dauphin.</li>
						</ul>
					</div>

					<div class="item">
						<h4>Réparateur de téléphone @ Online Repair</h4>

						<p class="item-date"><i class="far fa-calendar-alt"></i> Septembre 2016 - Avril 2017 </p>

						<p><strong>Les missions :</strong></p>
						<ul>
							<li>Diagnostics et réparations de téléphone</li>
						</ul>
					</div>
				</div>

				<hr>

				<h3>Formation</h3>
				<div class="timeline">
					<div class="item">
						<h4>Bachelor Informatique et Systèmes d'Information @ Ynov Informatique</h4>

						<p class="item-date"><i class="far fa-calendar-alt"></i> Septembre 2018 - Aujourd'hui </p>

						<p>La formation d’Ynov Informatique prépare au titre d’Expert Informatique et Systèmes d’Information, enregistré au Répertoire National de la Certification Professionnelle (RNCP) au niveau I.)</p>
					</div>

					<div class="item">
						<h4>Chef de projet multimédia @ OpenClassrooms / IESA Multimédia</h4>

						<p class="item-date"><i class="far fa-calendar-alt"></i> Janvier 2017 - Janvier 2018 </p>

						<p>Titre professionnel de Chef de projet multimédia enregistré au Répertoire National de la Certification Professionnelle (RNCP) au niveau II.)</p>
					</div>

					<div class="item">
						<h4>L1 Arts du spectacle</h4>

						<p class="item-date"><i class="far fa-calendar-alt"></i> Janvier 2017 - Janvier 2018 </p>
					</div>

					<div class="item">
						<h4>Baccalauréat ES</h4>

						<p class="item-date"><i class="far fa-calendar-alt"></i> 2015</p>
					</div>
				</div>

			</section>

			<section id="skills">
				<h2>Compétences</h2>
				<hr>
				<ul>
					<li>
						<img src="img/skills/html.png" class="slide-fwd-center" />
					</li>
					<li>
		          		<img src="img/skills/css.png" />
		          	</li>
		          	<li>
			        	<img src="img/skills/php.png" />
			    	</li>
			    	<li>
			        	<img src="img/skills/sql.png" />
			        </li>
			        <li>
			        	<img src="img/skills/symfony.png" />
			        </li>
			        <li>
			        	<img src="img/skills/javascript.png" />
			    	</li>
			    	<li>
			        	<img src="img/skills/git.png" />
			    	</li>
		    	</ul>
			</section>

			<section id="project">
				<h2>Projets</h2>
				<hr>
				<ul>
					<li>
						<img src="img/project/moncoutant.jpg" />
						<a href="https://moncoutant.arthurgeay.fr">
							<div class="overlay">
								<p>Réalisation d'un site web pour les activités culturelles de la ville de Moncoutant</p>
								<ul>
									<li>HTML &amp; CSS</li>
									<li>WordPress</li>
								</ul>
							</div>
						</a>
					</li>
					<li>
						<img src="img/project/forteroche.jpg" />
						<a href="https://forteroche.arthurgeay.fr">
							<div class="overlay">
								<p>Réalisation d'un blog pour un écrivain</p>
								<ul>
									<li>Framework Silex</li>
								</ul>
							</div>
						</a>
					</li>
					<li>
						<img src="img/project/louvre.jpg" />
						<a href="https://louvre.arthurgeay.fr">
							<div class="overlay">
								<p>Réalisation d'un système de billeterie pour le musée du Louvre</p>
								<ul>
									<li>Symfony</li>
									<li>Javascript</li>
								</ul>
							</div>
						</a>
					</li>
					<li>
						<img src="img/project/nao.jpg" />
						<a href="nao.arthurgeay.fr">
							<div class="overlay">
								<p>Réalisation d'une application web de saisie d'observation d'espèces d'oiseaux</p>
								<ul>
									<li>Symfony</li>
									<li>Javascript</li>
								</ul>
							</div>
						</a>
					</li>
					<li>
						<img src="img/project/carmanager.png" />
						<div class="overlay">
							<p>Réalisation d'une application web de gestion de parc de véhicule</p>
							<ul>
								<li>Symfony</li>
								<li>Javascript</li>
							</ul>
						</div>
					</li>
					<li>
						<img src="img/project/valerie-dauphin.png" />
						<a href="https://valerie-dauphin.fr">
							<div class="overlay">
								<p>Réalisation d'un portfolio pour une auteure littérature jeunesse</p>
								<ul>
									<li>WordPress</li>
								</ul>
							</div>
						</a>
					</li>
				</ul>
			</section>

			<section id="contact">
				<h2>Contact</h2>
				<hr>

				<form>
					<input type="text" name="firstname" placeholder="Prénom" required />
					<input type="email" name="email" placeholder="Adresse e-mail" required />
					<textarea name="message" rows="10" placeholder="Message" required></textarea>
					<input type="submit" />
				</form>
			</section>
		</main>
		
		<script src="js/app.js"></script>
	</body>
</html>