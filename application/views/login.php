<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <meta charset="utf-8">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        *, *::after, *::before {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            user-select: none;
            }

            /* Generic */
            body {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Montserrat", sans-serif;
            font-size: 12px;
            background-color: #ecf0f3;
            color: #a0a5a8;
            }

            /**/
            .main {
            position: relative;
            width: 1000px;
            min-width: 1000px;
            min-height: 600px;
            height: 600px;
            padding: 25px;
            background-color: #ecf0f3;
            box-shadow: 10px 10px 10px #d1d9e6, -10px -10px 10px #f9f9f9;
            border-radius: 12px;
            overflow: hidden;
            }
            @media (max-width: 1200px) {
            .main {
                transform: scale(0.7);
            }
            }
            @media (max-width: 1000px) {
            .main {
                transform: scale(0.6);
            }
            }
            @media (max-width: 800px) {
            .main {
                transform: scale(0.5);
            }
            }
            @media (max-width: 600px) {
            .main {
                transform: scale(0.4);
            }
            }

            .container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            width: 600px;
            height: 100%;
            padding: 25px;
            background-color: #ecf0f3;
            transition: 1.25s;
            }

            .form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
            height: 100%;
            }
            .form__icon {
            object-fit: contain;
            width: 30px;
            margin: 0 5px;
            opacity: 0.5;
            transition: 0.15s;
            }
            .form__icon:hover {
            opacity: 1;
            transition: 0.15s;
            cursor: pointer;
            }
            .form__input {
            width: 350px;
            height: 40px;
            margin: 4px 0;
            padding-left: 25px;
            font-size: 13px;
            letter-spacing: 0.15px;
            border: none;
            outline: none;
            font-family: "Montserrat", sans-serif;
            background-color: #ecf0f3;
            transition: 0.25s ease;
            border-radius: 8px;
            box-shadow: inset 2px 2px 4px #d1d9e6, inset -2px -2px 4px #f9f9f9;
            }
            .form__input:focus {
            box-shadow: inset 4px 4px 4px #d1d9e6, inset -4px -4px 4px #f9f9f9;
            }
            .form__span {
            margin-top: 30px;
            margin-bottom: 12px;
            }
            .form__link {
            color: #181818;
            font-size: 15px;
            margin-top: 25px;
            border-bottom: 1px solid #a0a5a8;
            line-height: 2;
            }

            .title {
            font-size: 34px;
            font-weight: 700;
            line-height: 3;
            color: #181818;
            }

            .description {
            font-size: 14px;
            letter-spacing: 0.25px;
            text-align: center;
            line-height: 1.6;
            }

            .button {
            width: 180px;
            height: 50px;
            border-radius: 25px;
            margin-top: 50px;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 1.15px;
            background-color: #4B70E2;
            color: #f9f9f9;
            box-shadow: 8px 8px 16px #d1d9e6, -8px -8px 16px #f9f9f9;
            border: none;
            outline: none;
            }

            /**/
            .a-container {
            z-index: 100;
            left: calc(100% - 600px );
            }

            .b-container {
            left: calc(100% - 600px );
            z-index: 0;
            }

            .switch {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 400px;
            padding: 50px;
            z-index: 200;
            transition: 1.25s;
            background-color: #ecf0f3;
            overflow: hidden;
            box-shadow: 4px 4px 10px #d1d9e6, -4px -4px 10px #f9f9f9;
            }
            .switch__circle {
            position: absolute;
            width: 500px;
            height: 500px;
            border-radius: 50%;
            background-color: #ecf0f3;
            box-shadow: inset 8px 8px 12px #d1d9e6, inset -8px -8px 12px #f9f9f9;
            bottom: -60%;
            left: -60%;
            transition: 1.25s;
            }
            .switch__circle--t {
            top: -30%;
            left: 60%;
            width: 300px;
            height: 300px;
            }
            .switch__container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            position: absolute;
            width: 400px;
            padding: 50px 55px;
            transition: 1.25s;
            }
            .switch__button {
            cursor: pointer;
            }
            .switch__button:hover {
            box-shadow: 6px 6px 10px #d1d9e6, -6px -6px 10px #f9f9f9;
            transform: scale(0.985);
            transition: 0.25s;
            }
            .switch__button:active, .switch__button:focus {
            box-shadow: 2px 2px 6px #d1d9e6, -2px -2px 6px #f9f9f9;
            transform: scale(0.97);
            transition: 0.25s;
            }

            /**/
            .is-txr {
            left: calc(100% - 400px );
            transition: 1.25s;
            transform-origin: left;
            }

            .is-txl {
            left: 0;
            transition: 1.25s;
            transform-origin: right;
            }

            .is-z200 {
            z-index: 200;
            transition: 1.25s;
            }

            .is-hidden {
            visibility: hidden;
            opacity: 0;
            position: absolute;
            transition: 1.25s;
            }

            .is-gx {
            animation: is-gx 1.25s;
            }

            @keyframes is-gx {
            0%, 10%, 100% {
                width: 400px;
            }
            30%, 50% {
                width: 500px;
            }
            }
    </style>
  </head>
  <body>
    <div class="main">
      <div class="container a-container" id="a-container">
        <form class="form" id="a-form" method="" action="">
        <img style="margin-bottom:20px" src="<?= base_url('assets/img/logos/logo_lemas.png') ?>" width="350px">
        <hr>
          <input id="email_siswa" class="form__input" type="text" placeholder="Email">
          <input id="password_siswa" class="form__input" type="password" placeholder="Password">
          <button id="btn_login_siswa" class="form__button button submit">Masuk</button>
        </form>
      </div>
      <div class="container b-container" id="b-container">
        <div class="form" id="b-form" method="" action="">
        <img style="margin-bottom:20px" src="<?= base_url('assets/img/logos/logo_lemas.png') ?>" width="350px">
        <hr>
          <input id="email_guru" class="form__input" type="text" placeholder="Masukan Email Terdaftar">
          <input id="password_guru" class="form__input" type="password" placeholder="Masukan Password"><a class="form__link">Lupa Password?</a>
          <button id="btn_login" class="form__button button" type="button">MASUK</button>
        </div>
      </div>
      <div class="switch" id="switch-cnt">
        <div class="switch__circle"></div>
        <div class="switch__circle switch__circle--t"></div>
        <div class="switch__container" id="switch-c1">
          <h2 class="switch__title title">Login Guru</h2>
          <p class="switch__description description">Masuk Sebagai Staff Pengajar</p>
          <button class="switch__button button switch-btn">Masuk</button>
        </div>
        <div class="switch__container is-hidden" id="switch-c2">
          <h2 class="switch__title title">Login Siswa</h2>
          <p class="switch__description description">Apakah Anda Petugas Sekolah?</p>
          <button class="switch__button button switch-btn">Masuk disini</button>
        </div>
      </div>
    </div>
    <script>
        var base_url = "<?= base_url() ?>";
    </script>
    <script src="<?= base_url('assets/vendor/jquery/dist/jquery.min.js')?>"></script>
    <script src="<?= base_url('assets/vendor/sweetalert1/sweetalert.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/plugins/sweetalert/sweetalert.min.js')?>"></script>
    <script type="text/javascript" src="<?= base_url('pages/login.js')?>"></script>
    <script>
        /*
		Designed by: SELECTO
		Original image: https://dribbble.com/shots/5311359-Diprella-Login
        */

        let switchCtn = document.querySelector("#switch-cnt");
        let switchC1 = document.querySelector("#switch-c1");
        let switchC2 = document.querySelector("#switch-c2");
        let switchCircle = document.querySelectorAll(".switch__circle");
        let switchBtn = document.querySelectorAll(".switch-btn");
        let aContainer = document.querySelector("#a-container");
        let bContainer = document.querySelector("#b-container");
        let allButtons = document.querySelectorAll(".submit");

        let getButtons = (e) => e.preventDefault()

        let changeForm = (e) => {

            switchCtn.classList.add("is-gx");
            setTimeout(function(){
                switchCtn.classList.remove("is-gx");
            }, 1500)

            switchCtn.classList.toggle("is-txr");
            switchCircle[0].classList.toggle("is-txr");
            switchCircle[1].classList.toggle("is-txr");

            switchC1.classList.toggle("is-hidden");
            switchC2.classList.toggle("is-hidden");
            aContainer.classList.toggle("is-txl");
            bContainer.classList.toggle("is-txl");
            bContainer.classList.toggle("is-z200");
        }

        let mainF = (e) => {
            for (var i = 0; i < allButtons.length; i++)
                allButtons[i].addEventListener("click", getButtons );
            for (var i = 0; i < switchBtn.length; i++)
                switchBtn[i].addEventListener("click", changeForm)
        }

        window.addEventListener("load", mainF);

    </script>
  </body>
</html>