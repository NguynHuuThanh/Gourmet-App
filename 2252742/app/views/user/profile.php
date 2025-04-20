<?php 
  session_start();
?>
<style>
  .pagination {
    display: flex;
    flex-direction: row;
    column-gap: 2%;
    gap: 28px;
    padding-bottom: 1rem;
  }
  .page-link {
    padding: 10px;
    text-decoration: none;
    background: #ddd;
    border-radius: 5px;
    transition: background 0.3s;
  }
  .page-link.active {
    background: #4CAF50;
    color: white;
    font-weight: bold;
  }
  .page-link:hover {
    background: #aaa;
  }
</style>

<style>
  .cards{
  /* max-width: 1100px; */
  /* max-width: 2000px; */
  max-width: 100rem;
  margin: 0 auto;
  text-align: center;
  padding: 30px;
}

.cards h1{
  font-size: 40px;
  margin: 0 0 30px 0;
  text-transform: uppercase;
  letter-spacing: 1px;
}

/* .services{
  display: flex;
  align-items: center;
} */

.services {
  display: flex;
  flex-wrap: wrap; /* Allows items to wrap onto the next line */
  justify-content: center; /* Center items to prevent alignment issues */
  gap: 20px; /* Adds spacing between items */

  /* align-items: center;
  flex-direction: column; */
  display: grid;
  grid-template-columns: repeat(4,1fr);
  gap: 20px;
}

.content{
  display: flex;
  flex-wrap: wrap;
  flex: 1;
  /* flex: 1 1 calc(25% - 20px);
  max-width: calc(25% - 20px);
  box-sizing: border-box; */
  /*  */
  margin: 20px;
  padding: 20px;
  border: 2px solid black;
  border-radius: 4px;
  transition: all .3s ease;

  height: 35rem;
    /* height: 800px;
  width: 600px; */

  /* column-gap: 20rem; */

}

.content-1{
  gap: 5px;
}

.content .fa-solid{
  font-size: 70px;
  margin: 16px 0;
}

.content .fa-solid img{
  width: auto;
  height: 15rem;
  max-width: 16rem;
  min-width: 10rem;
}

.content > * {
  flex: 1 1 100%;
}

.content:hover {
  color: white;
}

.content:hover a{
  border-radius: white;
  background: white;
}

.content-1:hover{
  border-color: #1DA1F2;
  background: #1DA1F2;
}

.content-1:hover a{
  color: #1DA1F2;
}

.content-2:hover{
  border-color: #E1306C;
  background: #E1306C;
}

.content-2:hover a{
  color: #E1306C;
}

.content-3:hover{
  border-color: #ff0000;
  background: #ff0000;
}

.content-3:hover a{
  color: #ff0000;
}

content h2{
  font-size: 30px;
  margin: 16px 0;
  letter-spacing: 1px;
  text-transform: uppercase;
}

.content p{
  font-size: 17px;
  font-family: 'Poppins' ,sans-serif;
}

.content a{
  /* Pushes it to the bottom */
  /* margin-top: auto; 
  text-align: center;
  padding: 10px;
  width: 100%; */
  margin: 22px 0;
  background: black;
  color: white;
  text-align: none;
  text-transform: uppercase;
  border: 1px solid black;
  padding: 15px 0;
  border-radius: 25px;
  transition: .3s ease;
}

.content a:hover{
  border-radius: 4px;
}

#brief {
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
  overflow: hidden;
  text-overflow: ellipsis; 
  max-height: 60px;
}


/* @media (max-width: 1160px) { */
@media (max-width: 1400px) {
  .services {
    display: grid;
    grid-template-columns: repeat(3,1fr);
  }
}

@media (max-width: 1050px) {
  .services {
    display: grid;
    grid-template-columns: repeat(2,1fr);
  }
}

@media (max-width: 800px) {
  .services {
    display: flex;
    flex-direction: column;
  }
  .content .fa-solid img{
    max-width: 34rem;
    width: auto;
    height: auto;
  }

}
</style>

<style>
  .filter {
  display: flex;
  /* justify-content: flex-end;  */
  justify-content: space-between; 
  padding-right: 3rem; 
  padding-left: 3rem;
}

.filter-options{
  padding: 15px 20px;
  font-size: 1.5rem;
}

#sort {
  border: 2px solid #444;
  border-radius: 8px;
  background-color: #fff;
  outline: none;
  font-size: 1rem; 
  min-width: 8rem; 
  width: 10rem;
  height: max-content; 
  padding: 0.5rem 0rem; 
  text-align: center;
  margin-left: 1rem;
}

</style>

<style>
      .container-profile{
        font-family: "Poppins", sans-serif;
        margin-top: 7%;

        height: 15%;

        display: grid;
        grid-template-columns: 20vw 80vw;
        width: fit-content;
        height: fit-content;
      }
      .container-img{
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .container-img img{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 65%;
        height: 90%;
        border-radius: 50%;
        margin: 2% 2% 2% 2%;
        object-fit: cover;
        border-width: 1px;
        border-style: solid;
        border-color: black;
        box-shadow: 0 0 0 4px white,
         0 0 0 8px #ecb26f;
      }
      .container-information{
        align-items: center;
        justify-content: center;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(3, auto);
        gap: 10px; 
        padding: 1% 1%;
        box-sizing: border-box;
        box-shadow: 1px 1px 10px rgba(.1,.1,.1,.4);
        margin-right: 5%;
        border-radius: 20px;
      }
      .container-information1{
        display: grid;
        grid-template-columns: 1fr 2fr;
        border-style: solid;
        border-width: 0;
        border-bottom-width: 0px;
        padding-bottom: 10px;
        padding-left: 10px;
        border-color:rgb(216, 108, 108);
        outline: none;
      }

</style>

<style>
  .addnew{
  display: flex;
  align-items: center;
  justify-content: center;
  height: 3rem !important;
  width: 10rem !important;
  border-width:2px !important;
  border-radius: 10px !important; 
  border-color: #1DA1F2;
  border-style: solid;
  cursor: pointer;
  transition: .3s;
}

.addnew:hover{
  box-shadow: 0 0 0 4px white, 0 0 0 8px #1DA1F2;
}

</style>

    <div class="container-profile">
      <div class="container-img">

        <img src="<?= BASE_URL ?>/public/images/profile.jpg" alt="">
      </div>

      <div class="container-information" >
        <div class="container-information1">
          <span class="title">Full Name:</span>
          <span class="title-value"><?= $information[0]["family_name"] . " " . $information[0]["last_name"] ?></span>
        </div>

        <div class="container-information1">
          <span class="title">Username</span>
          <span class="title-value"><?= $information[0]["username"] ?></span>
        </div>

        <div class="container-information1">
          <span class="title">Date of birth: </span>
          <span class="title-value"><?= $information[0]["dob"] ?></span>
        </div>

        <div class="container-information1">
          <span class="title">Email: </span>
          <span class="title-value"><?= $information[0]["email"] ?></span>
        </div>

        <div class="container-information1">
          <span class="title">Number of posts: </span>
          <span class="title-value"><?= $information[0]["num_post"] ?></span>
        </div>

        <div class="container-information1">
          <span class="title">Registered date: </span>
          <span class="title-value"><?= $information[0]["created_at"] ?></span>
        </div>
      </div>
      
    </div>

<main>
    <div class="filter">
    <div class="addnew"><a href="" style="color: black;">Add new post</a></div>
    <div class="filter-columns" >
        <label for="sort">Sort by: </label>
          <!-- <select id="sort" onchange="applySort()" style="width: 10rem;" > -->
          <select id="sort" style="width: 10rem;" >
            <option value="Post_datetime DESC" selected>Latest</option>
            <option value="Post_datetime ASC">Oldest</option>
            <option value="Postname ASC" >A to Z</option>
            <option value="Postname DESC">Z to A</option>
            <option value="Price ASC">Price: Low - High</option>
            <option value="Price DESC">Price: High - Low</option>
            <option value="Rating ASC">Rating: Low - High</option>
            <option value="Rating DESC">Rating: High - Low</option>
          </select>
      </div>
    </div>
  
  <div class="cards">
    <div class="services">
      
    </div>
  </div>

  <div style="display: flex; justify-content: center; align-items: center;">
  <div class="pagination">

  </div>
  </div>

<script>
  const file_src = "<?= BASE_URL . "/public/images/" ?>";
  // console.log(file_src);

  const addnewBtn = document.querySelector(".addnew");
  addnewBtn.addEventListener('click', (e) =>{
    e.preventDefault();
    window.location.href = `<?=BASE_URL?>/profile/addpost`;
  })

  function getViewPost(){
    const postCards = document.querySelectorAll(".read-more");
    // console.log(postCards);
    postCards.forEach((card) => {
      const id = card.dataset.id;
      card.addEventListener('click', (e) => {
        e.preventDefault();
        window.location.href = `<?= BASE_URL?>/post/view/${id}`;
      })
    })
  }

  

  function seoUrl(str) {
    return str
      .toLowerCase()
      .trim()
      .replace(/[^a-z0-9\s-]/g, '') 
      .replace(/[\s-]+/g, '-')      
      .replace(/^-+|-+$/g, '');     
  }


  function debounce(func, delay){
    let timer;
    return function(...args){
      clearTimeout(timer);
      timer= setTimeout(() => {
        func.apply(this, args);
      }, delay);
    };
  }

  // const user_name = String(<?=$_SESSION['username']?>);
  let user_name = "";
  user_name = '<?=$_SESSION['username']?>';

  let sort = "Post_datetime DESC";
  let filter = {
    'search' : "",
    'username' : user_name
  };
  let current_page = 1;

  reloadPage(sort, filter, current_page);

  const sortBy = document.querySelector('#sort');
  sortBy.addEventListener('input', () => {
    sort = sortBy.value;
    reloadPage(sort, filter, 1);
  })

  const searchBox = document.querySelector("#searchInput");
  searchBox.addEventListener('input', debounce(() => {
    filter['search'] = searchBox.value;
    // console.log(searchBox.value);
    reloadPage(sort, filter, 1);
  }, 100));

  async function reloadPage(sort, filter, page_num){
    const response = await fetch("<?= API ?>posts", {
      method : 'POST',
      headers:{
        'Content-Type' : 'application/json'
      },
      body: JSON.stringify({
        sort, filter, page_num
      })
    });

    

    const res = await response.json();
    if (res.status === 'success'){
      let html = "";
      if (res.data.length > 0) {
        res.data.forEach((post) => {
          const nameURL = seoUrl(post.Postname);
          html += `<div class="content content-1">
          <div class="fa-solid">
          <img src="${file_src}${post.Image}" 
          alt="No picture" />
          </div>
          <h2>${post.Postname}</h2>
          <p id="type_res">Type: ${post.Res_type}</p>
          <p id="price">Price: $${post.Price}</p>
          <p id="location_res">Location: ${post.Location}</p>
          <p id="rating">Rating: ${post.Rating}</p>
          <p id="brief">Description: ${post.Description}</p>
          <a href="" class="read-more" data-id = "${post.postID}" data-name="${nameURL}">Read More</a>
        </div>`
        })
      } else {
        html = 'There is no post!';
      }
      document.querySelector(".services").innerHTML = html;
      
      reloadPagination(page_num, res.total);
      getPagination();
      getViewPost();
    }
  }

  function reloadPagination(current, total){
    let html = "";
    if (total > 1){
      if (current > 1){
        html += `<a href="" class="page-link" id = "Previous">Previous</a>
        <a href="" class="page-link num_pre">${current - 1}</a>`;
      }

      html += `<a href="" class="page-link active">${current}</a>`;
      
      if (current < total){
        html += `<a href="" class="page-link num_next">${current + 1}</a>
                <a href="" class="page-link" id = "Next">Next</a>`;
      }
    }
    current_page = current;
    document.querySelector(".pagination").innerHTML = html;
  }

  function getPagination() {
    const prevBtn = document.querySelector('#Previous');
    const nextBtn = document.querySelector('#Next');
    const prevPage = document.querySelector('.page-link.num_pre');
    const nextPage = document.querySelector('.page-link.num_next');

    if (prevBtn) {
      prevBtn.addEventListener('click', (e) => {
        e.preventDefault();
        reloadPage(sort, filter, current_page - 1);
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener('click', (e) => {
        e.preventDefault();
        reloadPage(sort, filter, current_page + 1);
      });
    }

    if (prevPage) {
      prevPage.addEventListener('click', (e) => {
        e.preventDefault();
        reloadPage(sort, filter, current_page - 1);
      });
    }

    if (nextPage) {
      nextPage.addEventListener('click', (e) => {
        e.preventDefault();
        reloadPage(sort, filter, current_page + 1);
      });
    }
  }
  getPagination();

</script>

  </main>
