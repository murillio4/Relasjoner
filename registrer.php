<?php
	require_once 'connect.php';

	$fornavn = $_GET['fornavn'];
	$etternavn = $_GET['etternavn'];
	$adresse = $_GET['adresse'];
	$post_nr = $_GET['post_nr'];
	$telefon_nr = $_GET['telefon_nr'];

	DB::insert('personer',
			array(
					'fornavn' => $fornavn,
					'etternavn' => $etternavn,
					'adresse' => $adresse,
					'post_nr' => $post_nr
				)
		);

	$resultat = DB::queryFirstRow('SELECT id FROM personer WHERE fornavn LIKE %ss AND etternavn LIKE %ss AND adresse LIKE %ss',
								   $fornavn, $etternavn, $adresse);

	DB::insert('telefon_nr',
			array(
					'telefon_nr' => $telefon_nr,
					'person_id' => $resultat['id']
				)
		);
?>