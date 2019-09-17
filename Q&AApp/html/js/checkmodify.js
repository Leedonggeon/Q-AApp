function checkmodify(){

		if(document.register.pw1.value==""){
			alert("비밀번호를 입력하세요");
			document.register.pw1.focus();
			exit;
		}else if(document.register.pw2.value==""){
			alert("비밀번호확인을 입력하세요");
			document.register.pw2.focus();
			exit;
    }else if(document.register.name.value==""){
			alert("이름을 입력하세요");
			document.register.name.focus();
			exit;
    }else if(document.register.addr.value==""){
			alert("주소를 입력하세요");
			document.register.addr.focus();
			exit;
    }

		//비밀번호와 비밀번호확인값 체크
		if(document.register.pw1.value!=document.register.pw2.value){
			alert("입력한 2개의 비밀번호가 일치하지 않습니다.");
			document.register.pw1.focus();
			exit;
		}


		//pw 유효성 체크
		var pwtext = /([a-zA-Z].*[0-9])|([0-9].*[a-zA-Z])$/;
		if(pwtext.test(document.register.pw1.value)==false){
			alert("비밀번호를 문자와 숫자의 조합으로 만들어주세요!");
			document.resgister.pw1.focus();
			exit;
		}

		document.register.submit();
	}
