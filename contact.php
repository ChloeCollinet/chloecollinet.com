<? php  session_start ();
if ( isset ( $ _POST [ 'soumettre' ])) {
$ youremail = 'webdesign@chloecollinet.com' ;
$ fromsubject = 'Formulaire de contact' ;
$ name = $ _POST [ 'nom' ];
$ mail = $ _POST [ 'email' ];
$ subject = $ _POST [ 'subject' ];
$ message = $ _POST [ 'message' ];
$ to = $ youremail ;
$ headers . = "De:" . $ _POST [ 'nom' ]. "<" . $ _POST [ 'email' ]. "> \ r \ n" ;
$ headers . = "Répondre à:" . $ _POST [ "email" ]. "\ r \ n" ;
$ mailsubject = 'Message reçu pour' . $ fromsubject . «Page de contact» ;
$ body = $ fromsubject . '
	
	La personne qui vous a contacté est ' . $ nom . '
	 E-mail: ' . $ mail . '
	 Objet: ' . $ sujet . '
	
	 Un message: 
	 » . $ message . '	
	| --------- FIN DU MESSAGE ---------- | ' ;
echo  "Merci pour vos commentaires. Je vous contacterai sous peu si nécessaire. <br/> Aller à la <a href='/index.html'> page d'accueil </a>" ;
								mail ( $ to , $ subject , $ body , $ headers );
} else {
echo  "Vous devez rédiger un message. </br> Veuillez vous rendre sur la <a href='/index.html'> Page d'accueil </a>" ;
}
?> 
