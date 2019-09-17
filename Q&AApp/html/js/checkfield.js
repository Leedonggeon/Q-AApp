var checkidnum = 0;

function checkfield(){


		if(document.register.id.value==""){ //id값이 없을 경우
			alert("아이디를 입력하세요");         //메세지 경고창을 띄운 후
			document.register.id.focus();     // id 텍스트박스에 커서를 위치
			exit;
    }else if(checkidnum != 0){
			alert("id 중복확인을 하세요");
			document.register.id.focus();
			exit;
		}else if(document.register.pw1.value==""){
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
		}else if (document.register.gender.checked== false) {
      alert("성별을 체크하세요");
      exit;
    }else if(document.register.addr.value==""){
			alert("주소를 입력하세요");
			document.register.addr.focus();
			exit;
    }else if(document.register.birth.value==""){
			alert("생년월일를 입력하세요");
			document.register.birth.focus();
			exit;
    }else if (document.register.classification.checked== false) {
      alert("직업을 체크하세요");
      exit;
    }

		//비밀번호와 비밀번호확인값 체크
		if(document.register.pw1.value!=document.register.pw2.value){
			alert("입력한 2개의 비밀번호가 일치하지 않습니다.");
			document.register.pw1.focus();
			exit;
		}

		//id 유효성 체크
		var idtext = /^([a-zA-Z0-9]{6,12})$/;
		if(idtext.test(document.register.id.value)==false){
			alert("아이디 형식이 올바르지 않습니다!");
			document.resgister.id.focus();
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
