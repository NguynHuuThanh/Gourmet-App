<style>
    .wrapper{
  background: #f8e3b9;
  background: transparent;

  border: 2px solid rgba(255,255,255,.2);
  backdrop-filter: blur(20px);
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
  height: auto;
  width: 420px;
  margin-top: calc((95vh - 60px)/7);

  border-radius: 10px;
  padding: 30px 40px;
  z-index: 10;
}

.wrapper h1{
  font-size: 36px;
  text-align: center;
}

.wrapper .input-box{
  position: relative;
  width: 100%;
  height: 50px;
  /* background: salmon; */
  margin: 30px 0;
}

.input-box input{
  font-family: "Poppins", serif;
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  border: 2px solid rgba(255,255,255,.2);
  border-radius: 40px;
  font-size: 16px;
  color: #fff;
  padding: 20px 45px 20px 20px; 
}

.input-box input::placeholder{
  color: #fff;
}

.input-box i{
  position: absolute;
  right: 20px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 20px;
}

.wrapper .remember-forgot{
  display: flex;
  justify-content: space-between;
  font-size: 14.5px;
  margin: -15px 0 15px;
}

.remember-forgot label input{
  accent-color: #fff;
  margin-right: 3px;
}

.remember-forgot a{
  color: #fff;
  text-decoration: none;
}

.remember-forgot a:hover{
  text-decoration: underline;
}

.wrapper .btn{
  width: 100%;
  height: 45px;
  background: #fff;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0,0,0,.1);
  cursor: pointer;
  font-size: 16px;
  color: #333;
  font-weight: 600;
}

.wrapper .register-link{
  font-size: 14.5px;
  text-align: center;
  margin: 20px 0 15px;
}

.register-link p a{
  color: #fff;
  text-decoration: none;
  font-weight: 600;
}

.register-link p a:hover{
  text-decoration: underline;
}
  </style>

<style>
  *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  /* font-family: "Bangers", serif; */
  font-family: "Poppins";
}

body{
  height: 100vh;
  background-color: #000;
  background: url("../public/images/home7.jpg");
  background-size: cover;
  background-position: center;
}

li{
  text-decoration: none;
  color: #fff;
  font-size: 1rem;
}

a{
  text-decoration: none;
  color: #fff;
  font-size: 1rem;
}

a:hover{
  color: orange;
}

header{
  position: relative;
  padding: 0 2rem;
}

/* remember to minus 60px as the navbar is 60px */
.navbar{
  width: 100%;
  height: 60px; 
  max-width: 1200px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
}

.navbar .logo {
  display: flex;
  align-items: center;
  justify-content: center;
  /* gap: 10px; */
}

/* Add new size */
.links li a{
  font-size: 1.3rem;
}

.logo_img{
  width: 8rem;
  height: auto;
  transition: 0.2s;

}

.logo_img{
  margin-top: 3rem;
}

.navbar .logo a{
  /* font-size: 1.5rem; */
  font-size: 2rem;
  font-weight: bold;
  align-items: center;
  color: rgb(0, 0, 0);
  margin-top: 3rem;
  transition: 0.2s;
}

.navbar .logo a:hover{
  color: #4f4747;
}

.navbar .links {
  display: flex;
  gap: 2rem;
  /* add new for balance */
  margin-right: 9rem;
}

.navbar .toggle_btn{
  color: #fff;
  font-size: 1.5rem;
  cursor: pointer;
  display: none;
}

.action_btn {
  background-color: orange;
  color: #fff;
  padding: 0.5rem 1rem;
  border: none;
  outline: none;
  border-radius: 20px;
  /* font-size: 0.8rem; */
  font-size: 1.2rem;
  font-weight: bold;
  cursor: pointer;
}

.action_btn:hover{
  scale: 1.05;
  color: #fff;
}

.action_btn:active{
  scale: 0.95;
}

.dropdown_menu {
  display: none;
  z-index: 100;
  position: absolute;
  right: 2rem;
  top: 60px;
  height: 0;
  width: 300px;
  background: rgba(255,255,255,0.1);
  backdrop-filter: blur(15px);
  overflow: hidden;
  transition: height 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
} 

.dropdown_menu.open{
  height: 215px;
  width: 50%;
}

.dropdown_menu li{
  padding: 0.7rem;
  display: flex;
  align-items: center;
  justify-content: center;
}

.dropdown_menu .action_btn{
  width: 100%;
  display: flex;
  justify-content: center;
}

section#hero{
  height: 100vh - 60px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  color: #fff;
}

main .content{
  height: 100vh;
}

#hero h1 {
  /* font-size: 3rem; */
  font-size: 6rem;
  margin-bottom: 1rem;
}

.text-content{
  /* box-sizing: border-box; */
  /* backdrop-filter: blur(10px);
  width: 90%;
  height: 50vh; */
}

footer {
  background-color: #ecb26f;
  color: white;
  text-align: center;
  justify-content: center;
  padding: 0.8rem;
  /* position: absolute; */
  /* position:sticky; */
  position: inherit;
  width: 100%;
  bottom: 0;
  height: 5vh;
}

@media (max-width: 992px){
  .navbar .links ,
  .navbar .action_btn{
    display: none;
  }
  
  .navbar .toggle_btn{
    display: block;
  }

  .dropdown_menu {
    display: block;
  }

  .logo_img{
    width: 6rem;
  }

  .navbar .logo a{
    font-size: 1.6rem;
    color: #fff;
  }

  #hero h1 {
    font-size: 4.5rem;
  }
}

@media (max-width: 576px){
  .dropdown_menu{
    /* left: 2rem; */
    width: unset;
  }

  #hero h1 {
    font-size: 3.5rem;
  }

  .navbar .logo a{
    font-size: 1.5rem;
    color: #fff;
  }

  .logo_img {
    /* display: none; */
    width: 4rem;
  }
}
</style>
<main>
<div class="content" style = "height: calc(95vh - 60px);">
      <section id="hero">

        <div class="wrapper">
          <form action="<?= BASE_URL ?>index.php?page=login" method="POST" id="signin-form">
            <h1>Login</h1>
            <div class="input-box">
              <input type="text" name="username" id="username" placeholder="Username" required>
              <i class="fa-solid fa-user-astronaut"></i>
            </div>
            <div class="input-box">
              <input type="password" name="password" id="password" placeholder="Password" required>
              <i class="fa-solid fa-lock"></i>
            </div>
            <div class="remember-forgot">
              <label for="show-password">
                <input type="checkbox" name="" id="show-password" onclick = "showPassword()">Show password
              </label>
              <a href="#">Forgot password?</a>
            </div>
            <div id="error-message" style="color: rgb(0, 0, 0); text-align: center; font-weight: bold; margin-bottom: 4%; display: none;">Username or Password are wrong!</div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
               <p>Don't have an account? <a href="<?=BASE_URL?>/signup">Register</a></p>
            </div>
            <div class="register-link">
               <p style="font-size: 1.5rem;">-------- or --------</p>
            </div>
            <button type="button" class="btn" style="display: flex; align-items: center; height: 3.4rem;padding: 0 14%; justify-content:space-around;">
              <img src="<?= BASE_URL?>/public/images/google.svg" alt="">
              <span>Continue with Google</span>
            </button>
          </form>
        </div>

      </section>
    </div>
</main>

  <script>
    function showPassword(){
      let x = document.getElementById("password");
      if (x.type == "password"){
        x.type = "text";
      } else {
        x.type = "password";
      }
    };

    const form =document.querySelector('#signin-form');
    form.addEventListener('submit', async (e) => {
      e.preventDefault();
      const username = form.querySelector('#username').value;
      const password = form.querySelector('#password').value;
      const url = "<?=API?>auth?action=validate";
      console.log(url);
      const response = await fetch("<?=API?>auth?action=validate", {
        method : 'POST',
        headers: {
          'Content-Type' : 'application/json'
        },
        body: JSON.stringify({
          'username' : username,
          'password': password
        })
      })
      // console.log("check var");
      const res = await response.json();
      console.log(res);
      if (res.status == 'success'){
        window.location.href = "<?=BASE_URL?>/posts";
      } else {
        const errorDiv = document.getElementById("error-message");
        errorDiv.style.display = "block";
        console.log("Username or Password are wrong!");
      }
    })

  </script>
