<header>
    <nav class="nav">
      <i class="fa-solid fa-bars navOpenBtn"></i>
      <a href="<?= BASE_URL ?>" class="logo" id="logo-img"> <img src="<?= BASE_URL ?>/public/images/output.jpg" alt=""> Gourmet</a>
      <ul class="nav-links">
        <i class="fa-solid fa-circle-xmark navCloseBtn"></i>
        <li><a href="<?= BASE_URL ?>">Home</a></li>
        <li><a href="<?= BASE_URL ?>/posts">Posts</a></li>
        <!-- <li><a href="#">Favorites</a></li>
        <li><a href="#">Suggests</a></li> -->
        <!-- <li><a href="<?= BASE_URL ?>index.php?page=profile">Profile</a></li> -->
         <?php if (isset($_SESSION['role'])) { ?>
            <li><a href="<?= BASE_URL ?>/profile">Profile</a></li>
            <li><a href="<?= API ?>auth?action=logout">Sign out</a></li>
          <?php } else {?>
            <li><a href="<?= BASE_URL ?>/signin">Sign in</a></li>
            <?php }?>
      </ul>
      <i class="fa-solid fa-magnifying-glass search-icon" id="searchIcon"></i>
      <div class="search-box">
        <i class="fa-solid fa-magnifying-glass search-icon"></i>
        <input type="text" placeholder="Search here..." id="searchInput">
        <div class="dropdown-search">
          <ul id="searchResults" class="dropdown-results"></ul>
        </div>
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
  background: #f0faff;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  /* height: 100vh; */
}

main{
  flex: 1;
  font-family: "Poppins";
}

header{
  top: 0;
}

.nav{
  position: fixed;
  top:0;
  left: 0;
  width: 100%;
  padding: 0 200px;
  /* background: #4a98f7; */
  background: #ecb26f;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

nav a img {
  width: 6rem;
  height: auto;
}

#logo-img{
  display: flex;
  align-items: center;
  justify-content: center;
}

.nav ,
.nav .nav-links {
  display: flex;
  align-items: center;
}

.nav {
  justify-content: space-between;
}

a{
  text-decoration: none;
  color: #fff;
}

.nav .logo {
  font-family: 22px;
  font-weight: 500;
}

.nav.openSearch .nav-links a{
  opacity: 0;
  pointer-events: none;
}

.nav .nav-links {
  column-gap: 50px;
  list-style: none;
}

.nav .nav-links a{
  transition: all 0.2s linear;
  /* font-size: 1.5rem; */
}

.nav .search-icon{
  color: #fff;
  font-size: 20px;
  cursor: pointer;
}

.nav .search-box{
  position: absolute;
  right: 250px;
  height: 45px;
  max-width: 555px;
  width: 100%;
  opacity: 0;
  pointer-events: none;
  transition: all 0.2s linear;
}

.nav.openSearch .search-box{
  opacity: 1;
  pointer-events: auto;
}

.search-box .search-icon {
  position: absolute;
  left: 15px;
  top:50%;
  left: 15px;
  /* color: #4a98f7; */
  color: #ecb26f;
  transform: translateY(-50%);
}

.search-box input{
  height: 100%;
  width: 100%;
  border: none;
  outline: none;
  border-radius: 6px;
  background-color: #fff;
  padding: 0 15px 0 45px;
}

.nav .navOpenBtn ,
.nav .navCloseBtn{
  display: none;
}

footer {
  background-color: #ecb26f;
  color: white;
  text-align: center;
  justify-content: center;
  padding: 0.8rem;
  /* position: absolute; */
  /* position: inherit; */
  width: 100%;
  bottom: 0;
  height: 5vh;
}

main{
  /* This is between the content and navbar */
  margin-top: 8.5rem;
}


@media (max-width: 1160px){
  .nav{
    /* padding: 15px 50px; */
    padding: 0px 50px;
  }
  .nav .search-box{
    right: 100px;
    max-width: 400px;
  }
}

@media (max-width: 768px){
  main{
    /* This is between the content and navbar */
    margin-top: 12.5rem;
  }

  .nav .navOpenBtn ,
  .nav .navCloseBtn{
    display: block;
  }
  .nav {
    /* padding: 15px 20px; */
    padding: 0px 20px;
  }
  .nav .nav-links{
    position: fixed;
    top: 0;
    left: -100%;
    height: 100%;
    max-width: 280px;
    width: 100%;
    padding-top: 100px;
    row-gap: 30px;
    flex-direction: column;
    background-color: #11101d;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    z-index: 100;
  }

  .nav.openNav .nav-links {
    left: 0;
  }

  .nav .navOpenBtn{
    color: #fff;
    font-size: 20px;
    cursor: pointer;
  }

  .nav .navCloseBtn{
    position: absolute;
    top: 20px;
    right: 20px;
    color: #fff;
    font-size: 20px;
    cursor: pointer;
  }
  .nav .search-box{
    top: calc(100% + 10px);
    max-width: calc(100% - 20px);
    right: 50%;
    transform: translateX(50%);
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  }
}


  </style>

  <script>
const nav = document.querySelector(".nav"),
  searchIcon = document.querySelector("#searchIcon"),
  navOpenBtn = document.querySelector(".navOpenBtn"),
  navCloseBtn = document.querySelector(".navCloseBtn")

searchIcon.addEventListener("click",() =>{
  nav.classList.toggle("openSearch");
  nav.classList.remove("openNav");
  if (nav.classList.contains("openSearch")) {
    return searchIcon.classList.replace("fa-magnifying-glass", "fa-circle-xmark");
  }
  searchIcon.classList.replace("fa-circle-xmark", "fa-magnifying-glass");
});

navOpenBtn.addEventListener("click", () =>{
  nav.classList.add("openNav");
  nav.classList.remove("openSearch");
  searchIcon.classList.replace("fa-circle-xmark", "fa-magnifying-glass");
});

navCloseBtn.addEventListener("click", () =>{
  nav.classList.remove("openNav");
});
  </script>