<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="hu">
<head>
	<link href="favicon.ico" rel="icon" type="image/x-icon" />
	<title>Borkóstolás</title>
	<meta http-equiv="content-type" content="application/xhtml; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="screen, print, projection" />
</head>


<body>
	<div id="wrapper">
		<!--HEADER/LOGO-->
		<div id="header">
			<div id="logo">
				<img src="resources/images/header_image.jpg" alt="Fejléc kép" class="headerImage" />
				<h1>Borkóstolás</h1>
			</div>

			<!--TAB NAVIGATION-->
			<div id="topnav">
				<a href="index.php" class="active">Főoldal</a>
				<a href="borkostolasEredmenyek.php">Eredmények</a>
				<a href="demo.php">Demó</a>
				<a href="modszerek.php">Módszerek</a>
				<a href="kapcsolat.php">Kapcsolat</a>
			</div>
		</div>

		<div id="contentWrapper">
			<!--SIDE BAR CONTENT-->
			<div id="sidebar">
				<div id="container2">
					<div class="blocklinks">
						<?php include("login3/views/sideBarProfile.php"); ?>
						<h3>Legfrisseb információk &rsaquo;</h3>
						<a href="http://bor.tvarga.hu/borkostolas.apk" class="link" target="_blank">Android alkalmazás</a>
						<h3>Linkek &rsaquo;</h3>
						<a href="http://www.inf.u-szeged.hu/~london/" class="link">London András honlapja</a>
						<a href="http://www.inf.u-szeged.hu/~csendes/" class="link">Csendes Tibor honlapja</a>
					</div>
				</div>
			</div>

			<!--MAIN CONTENT-->
			<div id="content">
				<h2>A matematika megmondja, melyik a jó bor &rsaquo;</h2>
				<p>
					<b>
						Egy idő után nagyjából mindegy, de az elején, az első poharaknál még fontos, hogy
						milyen bort iszik az ember. Na, de milyet iszik? Létezik objektív mérőszám, eljárás, ami
						egyértelműen megmondja, hogy melyik a kiváló bor és melyik a lőre? Eldönthető, hogy a
						jó borok között melyik a legjobb? És melyik borszakértő ízlésében, döntésében bízzunk a
						választásnál?
					</b>
					<br/>
				</p>
				<br />
				<p>
					A borok minőségét ugyan sokan, sokféle objektív, vagy éppen szubjektív módon igyekeztek
					eddig is meghatározni, de széles körben elfogadott, meggyőző módon mérő eljárás nincs.
					Sőt, a divatot, a trendeket és a fejlődést figyelembe véve nem is várható, hogy egyszer s
					mindenkorra meghatározható lesz a jó bor valamennyi kritériuma.
				</p>
				<br />

				<div id="image">
					<img src="resources/images/fooldal_cikk_kep.jpg" alt="Cikk kép" style="width: 80%;" />
					<br />
					Ki a hiteles bortesztelő? – megmondja a matematikusok eljárása
					<br />
					Móricz-Sabján Simon / Népszabadság
				</div>

				<br />
				<p>
					Ennek fényében legalábbis érdekes és meglepő, hogy a szegedi matematikusok a borkóstolók megítélésére vállalkoztak. A Szegedi Tudományegyetem néhány matematikusával egy olyan algoritmust dolgoztunk ki, amellyel belőhető a bortesztelők szakértelme. Véleményünk szerint ezen a területen is fellelhetők olyan egzakt mutatók, melyek alapján a tesztelők tudását megmutaó reális sorrend állítható fel. És ha találunk egy számunkra hiteles tesztelőt, az általa ajánlott borban nyugodtan megbízhatunk.
				</p>
				<br />
				<p>
					A kidolgozott eljárás a borok értékelői által az adott borokra adott pontok összhangját méri. A mérés abból indul ki, hogy az igazán jó szakértők egymáshoz viszonyítva közelebbi pontszámokat adnak egy-egy bornak, mint a kevésbé hozzáértők. Csendes Tibor, a Szegedi Tudományegyetem számítógépes optimalizálás tanszékének tanszékvezető egyetemi tanára példája szerint ha két tesztelő rendszeresen, azaz a véletlen lehetőségét szinte kizárva egymáshoz nagyon közeli értékeket ad meg, akkor az algoritmus úgy veszi, hogy ők a szakértők, és hozzájuk fogja viszonyítani a többiek teljesítményét az általuk adott pontok alapján.
				</p>
				<br />
				<p>
					Úgy gondoljuk, hogy két tesztelő (szakértő), egymással összhangban hasonló, ám helytelen véleményt ad, de az eljárás azzal a feltevéssel él, hogy ez kis valószínűségű. „Voltaképp az az egyetlen feltevésünk, hogy a valódi szakértők következetesen ugyanazokat a vizsgált eseteket tartják jónak. Az algoritmus épp azokat keresi meg, akikre ez a kitétel érvényes" (CsT). Az algoritmus járulékos hasznaként, ha a rangsorban magasabban jegyzett tesztelő ad magas pontszámot egy adott bornak, az nagyobb súllyal esik a latba, mintha egy kevésbé megbízható kóstoló adja ugyanazt az értéket. Vagyis a megbízhatóbb tesztelő magas pontszáma a bor megítélését is javítja – és lássuk be, minden ínyencnek az a fontos, hogy tudja, melyik bort ajánlja a számára hitelesnek tűnő ítész.
				</p>
				<br />
				<p>
					A módszert már két teljes (mintegy 500 tételt tartalmazó) borteszt adatbázisával teszteltük: mindkét alkalommal azok végeztek a legjobb eredménnyel, akikről köztudott volt, hogy megbízható, tapasztalt kóstolók. A tesztelés és az eljárás változatok finomítása napjainkban is folyik, sajnos lassabban, mint ahogy rendes finanszírozás mellett haladhatnának. Jelenleg (egy kisebb összegű ¬TÁMOP kutatási támogatástól eltekintve) kedvtelésből fejlesztjük a rendszert.
				</p>
				<br />
				<p>
					A tervek között egy honlap üzemeltetése is szerepel, amelyen bárki láthatja majd a bortesztelők rangsorolását. Ez a honlap még várat magára, ennek leginkább az az oka, hogy van még fejlesztenivaló, illetve hogy rengeteg bor és borász adatai nincsenek összeszedve és feldolgozva. Csendes Tibor szerint akár a laikus borkedvelő közönség körében is népszerű lehet a módszer, hiszen egy-egy kóstoló adatait fel lehet vinni egy egyszerű internetes felületre, és az eredményeket össze lehet vetni a szakértők pontjaival – ami minden kóstolás után módosulhat, így a műkedvelők teljesítményének változása is folyamatosan nyomon követhető.
				</p>
				<br />
				<p>
					A cél természetesen továbbra is az, hogy akár a profik, akár a műkedvelők felállíthassanak egy rangsort maguk között. Viszont ahhoz, hogy ez pontos, hiteles, megbízható és elfogadott legyen, rengeteg teszt és adatbázis szükséges, illetve egy kritikus, hozzáértő közösség, amely felhívja a fejlesztők figyelmét a hibákra, és ezzel segít azokat kijavítani. „A borászszakma és a borszakértők felől komoly érdeklődést tapasztalunk. Mivel ez egy objektív (még ha nem is mindig pontos) kiértékelést adó eljárás, ezért, aki a borok gyártásában és forgalmazásában részt vesz, alapból kíváncsi az értékelésünkre. Messzire még nem jutottunk a módszerünkkel: igazi előrelépést egy hazai borverseny, vagy egy fesztivál rangsorainak értékelése jelentene" (CsT).
				</p>
				<br />
				<p>
					Hogy milyen kifutása lehet ennek a programnak? Csendes Tibor szerint az algoritmus semmilyen módon sem kötődik a hazai borászatokhoz, nincs akadálya a módszertan nemzetközi megmérettetésének. Globális bormérce születhet matematikai alapon.
				</p>
				<br />
				<div id="forras">
					<p>
						(A Népszabadságban megjelent írásunk nyomán
						<a href="http://nol.hu/tud-tech/egzakt-modszer-a-jo-borra-1467027" class="link">link</a>
						)
					</p>
				</div>
			</div>
		</div>

		<!--THE FOOTER-->
		<div id="footer">
			<div id="footerText">
				<p>Készítette - 2014 Varga Tamás</p>
				&nbsp;
			</div>
		</div>
	</div>
</body>
</html>
