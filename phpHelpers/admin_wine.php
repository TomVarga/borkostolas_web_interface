<?php
echo '<h2>Borok kezelése</h2>';
echo "<div class='topScrollingBlockWrapperForInupt'>
                <div class='topScroll'><br /></div>
            </div>
            <div class='tableContainer'>
                <div class='leftTableContainerForInputAdmin'>
                    <table class='leftTableForInput'>
                        <thead>
                        <tr>
                            <th>Sorszám</th>
                            <th>Bor</th>
                            <th>Pincészet</th>
                            <th>Hely</th>
                            <th>Évjárat</th>
                            <th>Összetétel</th>
                            <th>Ár (HUF)</th>
                        </tr>
                        </thead>
                        <tbody>";
				$wineCount = getWineCount()+1;
				for($i=1; $i < $wineCount; $i++){
					$sth = $db_connection->prepare("SELECT * FROM wines where wine_id = $i");
					$sth->execute();
					$wine = $sth->fetch(PDO::FETCH_ASSOC);
					if (!empty($wine['wine_name'])){
						echo "<tr>" .
							"<td>" . $wine["wine_id"] . "</td>" .
							"<td><input id='wine_name_$i' type='text' name='wine_name_$i' class='columnInputAdmin' value='$wine[wine_name]'></td>" .
							"<td><input id='wine_winery_$i' type='text' name='wine_winery_$i' class='columnInputAdmin' value='$wine[wine_winery]'></td>" .
							"<td><input id='wine_location_$i' type='text' name='wine_location_$i' class='columnInputAdmin' value='$wine[wine_location]'></td>" .
							"<td><input id='wine_year_$i' type='text' name='wine_year_$i' class='columnInputAdmin' value='$wine[wine_year]'></td>" .
							"<td><input id='wine_composition_$i' type='text' name='wine_composition_$i' class='columnInputAdmin' value='$wine[wine_composition]'></td>" .
							"<td><input id='wine_price_$i' type='text' name='wine_price_$i' class='columnInputAdmin' value='$wine[wine_price]'></td>" .
							"</tr>";
					}
				}
				echo "<tr>".
					"<td>Új</td>".
					"<td><input id='wine_name_0' type='text' name='wine_name_0' class='columnInputAdmin'></td>".
					"<td><input id='wine_winery_0' type='text' name='wine_winery_0' class='columnInputAdmin'></td>".
					"<td><input id='wine_location_0' type='text' name='wine_location_0' class='columnInputAdmin'></td>".
					"<td><input id='wine_year_0' type='text' name='wine_year_0' class='columnInputAdmin'></td>".
					"<td><input id='wine_composition_0' type='text' name='wine_composition_0' class='columnInputAdmin'></td>".
					"<td><input id='wine_price_0' type='text' name='wine_price_0' class='columnInputAdmin'></td>".
					"</tr>";
				echo "
                        </tbody>
                    </table>
                </div>
                <div class='rightTableContainerForInput'>
                    <table class='rightTableWithInputAdmin'>
                        <thead>
                        <tr>
                            <th>‌‌ </th>
                            <th>‌‌ </th>
                        </tr>
                        </thead>
                        <tbody>";

				$user_id = $_SESSION['user_id'];

				for($i=1; $i < $wineCount; $i++) {
					$sth = $db_connection->prepare("SELECT * FROM wines where wine_id = $i");
					$sth->execute();
					$wine = $sth->fetch(PDO::FETCH_ASSOC);
					if (!empty($wine['wine_name'])) {
						echo "<tr>" .
							"<td><a href='#' id='save' onclick='editWine(\"$i\")'>Mentés</a></td>" .
							"<td><a href='#' id='delete' onclick='deleteWine(\"$i\")'>Törlés</a></td>" .
							"</tr>";
					}
				}
					echo "<tr>" .
						"<td colspan=2><a href='#' id='add' onclick='addWine()'>Hozzáad</a></td>" .
						"</tr>";

				$db_connection = null;
				echo "
                        </tbody>
                    </table>
                </div>
            </div>";

