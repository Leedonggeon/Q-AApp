function deleteaccount(){
	var yesorno = confirm("진심으로 지울거야?");
	if(yesorno == true){
		location.replace("delete_proc.php");
	}
}
