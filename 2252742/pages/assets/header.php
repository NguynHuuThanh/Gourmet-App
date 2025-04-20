<header>
    <nav>
      <div class="navbar">
        <div class="logo">
          <img src="./public/images/output.jpg" alt="" class="logo_img" />
          <a href="<?=BASE_URL?>" style="color: white;">Gourmet</a>
        </div>
        <ul class="links">
          <li><a href="<?=BASE_URL?>" class="">Home</a></li>
          <li><a href="<?=BASE_URL?>/posts" class="">Posts</a></li>
          <li><a href="#" class="">Contact</a></li>
        </ul>
        <?php if (!isset($_SESSION['role'])) {?>
        <a href="<?=BASE_URL?>/signin" class="action_btn">Sign in</a>
        <?php } ?>
        <div class="toggle_btn">
          <i class="fa-solid fa-bars"></i>
        </div>
      </div>
      <div class="dropdown_menu">
          <li><a href="<?=BASE_URL?>" class="">Home</a></li>
          <li><a href="<?=BASE_URL?>/posts" class="">Posts</a></li>
          <li><a href="#" class="">Contact</a></li>
          <?php if (!isset($_SESSION['role'])) {?>
          <li><a href="<?=BASE_URL?>/signin" class="action_btn">Sign in</a></li>
          <?php } ?>
      </div>
    </nav>
  </header>

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
  background: url("./public/images/home7.jpg");
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

<script>
    const toggleBtn = document.querySelector('.toggle_btn');
    const toggleBtnIcon = document.querySelector('.toggle_btn i')
    const dropdownMenu = document.querySelector('.dropdown_menu')

    toggleBtn.onclick = function() {
      dropdownMenu.classList.toggle('open')
      const isOpen = dropdownMenu.classList.contains('open')

      toggleBtnIcon.classList = isOpen ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'
    }
  </script>