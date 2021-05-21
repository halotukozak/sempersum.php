<!DOCTYPE html>
<html class="custom-scrollbar-css">
<?php include 'head_nav.php'; ?>
<div class="container">
	<div class="text-center bg-image d-flex justify-content-center background-1">
		<div class="mask w-100" style="background-color: rgba(0, 0, 0, 0.6)">
			<div class="d-flex justify-content-center align-items-center h-100">
				<div class="text-white p-5">
					<h1 class="mb-3">Śpiewnik zawsze pod ręką</h1>
					<h5 class="mb-4">Ogromna baza chrześcijańskich tekstów z&nbsp;akordami.</h5>
				</div>
			</div>
		</div>
	</div>
	<div class="row" id="numbers">
		<div class="four col-6 col-md-3 bg-dark">
			<div class="counter-box bg-dark"> <i class="bi bi-file-earmark"></i> <span class="counter">900</span>
				<p>Stron</p>
			</div>
		</div>
		<div class="four col-6 col-md-3 bg-dark">
			<div class="counter-box bg-dark"> <i class="bi bi-music-note-list"></i> <span class="counter">300</span>
				<p>Autorów piosenek</p>
			</div>
		</div>
		<div class="four col-6 col-md-3 bg-dark">
			<div class="counter-box bg-dark"> <i class="bi bi-download"></i> <span class="counter">200</span>
				<p>Pobrań</p>
			</div>
		</div>
		<div class="four col-6 col-md-3 bg-dark">
			<div class="counter-box bg-dark"> <i class="bi bi-tag"></i> <span class="counter">0</span>
				<p>Cena</p>
			</div>
		</div>
	</div>
	<div class="" id="download">
		<div class="col-12">
			<h1 class="h1 p-3 bg-dark text-light my-5">Pobieranie</h1>
		</div>
		<div class="text-center bg-image d-flex justify-content-center background-2">
			<div class="mask w-100" style="background-color: rgba(0, 0, 0, 0.6)">
				<div class="d-flex justify-content-center align-items-center h-100">
					<div class="text-white p-5">
						<h1 class="mb-3">Wybierz wersję dla siebie</h1>
						<h5 class="mb-4"></h5>
						<a class="btn btn-outline-light btn-lg m-2" href="../files/sempersum21-01-b.pdf" role="button">BIAŁA</a>
						<a class="btn btn-outline-light btn-lg m-2" href="../files/sempersum21-01-c.pdf" role="button">CZARNA</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row align-middle" id="faq">
		<h1 class="h1 p-3 bg-dark text-light my-5">FAQ</h1>
	 <div class="col-12 col-md-6" id="guitar">
		<?php include 'guitar.php'; ?>
</div>
		<div class="col-12 col-md-6 accordion accordion-flush align-self-center" id="questions">
			<div class="accordion-item">
				<h2 class="accordion-header" id="question1">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer1" aria-expanded="false" aria-controls="answer1">
						Jak wyszukiwać piosenki?
					</button>
				</h2>
			</div>
			<div id="answer1" class="accordion-collapse collapse" aria-labelledby="question1" data-bs-parent="#questions">
				<div class="accordion-body">
					<p>
						<ul>
							<li>Na początku śpiewnika znajduje się alfabetyczny spis treści.</li>
							<li>Po kliknięciu ctrl+F i wpisaniu dowolnej frazy Twój program wyszuka ją w śpiewniku.</li>
						</ul>
					</p>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="question2">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer2" aria-expanded="false" aria-controls="answer2">
						Dlaczego PDF?
					</button>
				</h2>
				<div id="answer2" class="accordion-collapse collapse" aria-labelledby="question2" data-bs-parent="#questions">
					<div class="accordion-body">
						<p>
							Plik z takim rozszerzeniem możesz otworzyć praktycznie wszędzie: na telefonie, tablecie, komputerze, czytniku e-booków, nie martwiąc się, że coś pójdzie nie tak. Również spis treści działa aktywnie, tzn. po naciśnięciu na nazwę piosenki przenosi do strony z nią.
						</p>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="question3">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer3" aria-expanded="false" aria-controls="answer3">
						Czy mogę zamówić wersję papierową?
					</button>
				</h2>
			</div>
			<div id="answer3" class="accordion-collapse collapse" aria-labelledby="question3" data-bs-parent="#questions">
				<div class="accordion-body">
					<p>
						Niestety, (na razie) nie ma takiej opcji, ale możesz sam wydrukować śpiewnik. Najwygodniejszą opcją będzie segregator (zwróć uwagę na liczbę stron, grubość papieru i&nbsp;pojemność segregatora). Dodatkowym plusem tego rozwiązania jest możliwość robienia własnych notatek.
					</p>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="question4">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer4" aria-expanded="false" aria-controls="answer4">
						Widzę błąd, co mogę zrobić?
					</button>
				</h2>
			</div>
			<div id="answer4" class="accordion-collapse collapse" aria-labelledby="question4" data-bs-parent="#questions">
				<div class="accordion-body">
					<p>
						Za pomocą tego formularza możesz zgłosić dowolny błąd w śpiewniku.
					</p>
					<p class="text-center">
						<a class="btn btn-outline-light btn-lg m-2" href="https://forms.office.com/Pages/ResponsePage.aspx?id=DQSIkWdsW0yxEjajBLZtrQAAAAAAAAAAAAMAADDjd45UMDdDU0s5TVBKRVdXSjZNOVdJSEtVNDZQWS4u" role="button" target="_blank">FORMULARZ</a>
					</p>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="question5">
					<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer5" aria-expanded="false" aria-controls="answer5">
						Czy to ostateczna wersja śpiewnika?
					</button>
				</h2>
			</div>
			<div id="answer5" class="accordion-collapse collapse" aria-labelledby="question5" data-bs-parent="#questions">
				<div class="accordion-body">
					<p>
						Jasne, że nie! Co jakiś czas będę wprowadzane poprawki, usuwane błędy i dodawane nowe piosenki. Swoje propozycje możesz zgłosić za pomocą tego formularza.
						<p class="text-center">
							<a class="btn btn-outline-light btn-lg m-2" href="https://forms.office.com/Pages/ResponsePage.aspx?id=DQSIkWdsW0yxEjajBLZtrQAAAAAAAAAAAAMAADDjd45UMDdDU0s5TVBKRVdXSjZNOVdJSEtVNDZQWS4u" role="button" target="_blank">FORMULARZ</a>
						</p>
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-center" id="playlists">
		<h1 class="h1 p-3 bg-dark text-light  my-5">PLAYLISTY</h1>
		<div class="text-center bg-image d-flex p-0 justify-content-center background-3">
			<div class="mask w-100" style="background-color: rgba(0, 0, 0, 0.6)">
				<div class="d-flex justify-content-center align-items-center h-100">
					<div class="text-white p-5">
						<h1 class="mb-3">Posłuchaj</h1>
						<h5 class="mb-4">i daj Mu się usłyszeć</h5>
						<button class="btn btn-outline-light btn-lg m-2" type="button" data-bs-toggle="collapse" data-toggle="collapse" data-bs-target="#niebianska" aria-expanded="false" aria-controls="niebianska">Niebiańska Kolekcja</button>
						<button class="btn btn-outline-light btn-lg m-2" type="button" data-bs-toggle="collapse" data-toggle="collapse" data-bs-target="#swiateczna" aria-expanded="false" aria-controls="swiateczna">Świąteczna Playlista</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 collapse" id="niebianska">
			<h2 class="h2 p-3 bg-dark text-light my-5">Niebiańska kolekcja</h2>
			<div class="btn-group-vertical w-100">
				<a class="btn btn-outline-light btn-lg m-1 px-3 w-100 d-flex justify-content-around align-items-center spotify" href="https://open.spotify.com/playlist/1HVcsj4sLtXd2YFCf1UMLu?si=DAqBx97xTV-KC2Bk6mUlRA" role="button" target="_blank">
					<i class="d-block icon icon-spotify"></i>
					<span class="d-block">Spotify</span>
				</a>
				<a class="btn btn-outline-light btn-lg m-1 px-3 w-100 d-flex justify-content-around align-items-center deezer" href="https://deezer.page.link/usmjEBnLnWdByGUc6" role="button" target="_blank">
					<i class="d-block icon icon-deezer"></i>
					<span class="d-block">Deezer</span>
				</a>
				<a class="btn btn-outline-light btn-lg m-1 px-3 w-100 d-flex justify-content-around align-items-center youtube" href="https://music.youtube.com/playlist?list=PLdwHy1IwxSScJFsFFoZJgOsECkQ-n6ZNR" role="button" target="_blank">
					<i class="d-block icon icon-ytmusic"></i>
					<span class="d-block">YT Music</span>
				</a>
				<a class="btn btn-outline-light btn-lg m-1 px-3 w-100 d-flex justify-content-around align-items-center youtube" href="https://www.youtube.com/playlist?list=PLdwHy1IwxSScJFsFFoZJgOsECkQ-n6ZNR" role="button" target="_blank">
					<i class="d-block icon icon-youtube"></i>
					<span class="d-block">YouTube</span>
				</a>
				<a class="btn btn-outline-light btn-lg m-1 px-3 w-100 d-flex justify-content-around align-items-center soundcloud" href="https://soundcloud.com/user-58849150/sets/niebia-ska-playlista" role="button" target="_blank">
					<i class="d-inline-block icon icon-soundcloud"></i>
					<span class="d-inline-block">SoundCloud</span>
				</a>
			</div>
		</div>
		<div class="col-md-6 collapse" id="swiateczna" data-bs-toggle="collapse">
			<h2 class="h2 p-3 bg-dark text-light my-5">Świąteczna playlista</h2>
			<div class="btn-group-vertical w-100">
				<a class="btn btn-outline-light btn-lg m-1 px-3 w-100 d-flex justify-content-around align-items-center spotify" href="https://open.spotify.com/playlist/4u4LF090Z33ZKYUUVFlreW?si=C0ZmcjvRTkW61dG6mxkUKQ" role="button" target="_blank">
					<i class="d-block icon icon-spotify"></i>
					<span class="d-block">Spotify</span>
				</a>
				<a class="btn btn-outline-light btn-lg m-1 px-3 w-100 d-flex justify-content-around align-items-center deezer" href="https://deezer.page.link/toSZfKh6iK8anCt37" role="button" target="_blank">
					<i class="d-block icon icon-deezer"></i>
					<span class="d-block">Deezer</span>
				</a>
				<a class="btn btn-outline-light btn-lg m-1 px-3 w-100 d-flex justify-content-around align-items-center youtube" href="https://music.youtube.com/playlist?list=PLdwHy1IwxSSc3AiSiT088C06OmQB6P0he" role="button" target="_blank">
					<i class="d-block icon icon-ytmusic"></i>
					<span class="d-block">YT Music</span>
				</a>
				<a class="btn btn-outline-light btn-lg m-1 px-3 w-100 d-flex justify-content-around align-items-center youtube" href="https://www.youtube.com/playlist?list=PLdwHy1IwxSSdP_lDSe4GqmsYmmxxnGg_B" role="button" target="_blank">
					<i class="d-block icon icon-youtube"></i>
					<span class="d-block">YouTube</span>
				</a>
				<a class="btn btn-outline-light btn-lg m-1 px-3 w-100 d-flex justify-content-around align-items-center soundcloud" href="https://soundcloud.com/user-58849150/sets/wi-teczna-playlista" role="button" target="_blank">
					<i class="d-inline-block icon icon-soundcloud"></i>
					<span class="d-inline-block">SoundCloud</span>
				</a>
			</div>
		</div>
	</div>

	<?php include 'footer_scripts.php'; ?>
</body>
</html>
