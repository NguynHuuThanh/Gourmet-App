<main>
<style>
  *{
  /* font-family:Arial, Helvetica, sans-serif; */
  font-family: "Poppins";
}
html, body {
  height: 100%;
  display: flex;
  flex-direction: column;
}
main {
  flex: 1;
}

.go-back{
  margin: 0 8%;
}
.go-back > button{
  font-size: 1.5rem;
  background: rgb(240, 250,255);
  border: none;
  cursor: pointer;
}

.container-view-details{
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
}

.container-details{
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  column-gap: 2%;
}

.container-details .container-details-l {
  display: flex;
  /* flex: 1; */
  padding: 5% 2% 5% 10%;
  width: 100%;
  /* height: 100%; */
  justify-content: center;
  align-items: start;
}

.container-details .container-details-l img{
  object-fit: contain;
  width: 100%;
  height: auto;
  border-width: 2.2px;
  border-style: solid;
  border-radius: 10px;
  
}

.details-title{
  font-size: 130%;
}

.container-details .container-details-r{
  /* display: flex; */
  /* flex: 1; */
  /* flex-direction: column; */
  /* justify-content: flex-start; */
  padding: 5% 2%;
  width: 100%;
  /* height: 100%; */
  row-gap: 5%;
}

.container-details .container-details-r .details-row{
  display: flex;
  /* flex: 1; */
  align-items: end;
  font-size: 120%;
  flex-direction: row;
  row-gap: 10%;
  padding: 1.5% 0;
}

.rating{
  display: flex;
  align-items: center;
}


.container-details .container-details-r .details-row span,
.container-details .container-details-r .details-row h2,
.container-details .container-details-r .details-row i{
  margin: 0;
  padding: 0 2% 0 0;
}

.container-details .container-details-r .details-row span{
  font-size: 130%;
  margin: 2% 0 0 0;
}

.container-details .container-details-r .details-row.description{
  display: flex;
  /* flex: 1; */
  align-items: flex-start;
}

.container-details .container-details-r .details-row.description span{
  margin: 1% 0 0 0;
}

.container-crud{
  margin: 1% 0 5% 0;
  display: flex;
  flex-direction: row;
  justify-content: flex-end;
  width: 100%;
  gap: 5%;
  padding: 1% 5% 0 0;
}

.container-crud .container-edit button,
.container-crud .container-delete button{
  font-size: 1.5rem;
  width: 8rem;
  height: 170%;
  border-radius: 10px;
  border-width: 1.4px;
  cursor: pointer;
  background: #0c78d0;
  color: white;
  transition: .3s;
}

.container-crud .container-edit.disable,
.container-crud .container-delete.disable{
  display: none;
}

.container-crud .container-edit button:hover,
.container-crud .container-delete button:hover{
  box-shadow: 0 0 0 4px #fff, 0 0 0 8px #0c78d0;
}

@media (max-width: 768px){
  /* main{
    flex: 1;
  } */
  .container-details{
    display: flex;
    flex-direction: column;
  }
  .container-details .container-details-l{
    padding: 5%;
  }
  .container-details .container-details-r{
    row-gap: 1rem;
  }
}
</style>

<?php
  // var_dump($_SESSION);

  $can_edit = false;
  $can_delete = false;

  if (isset($_SESSION['username'])){
    $user_current = $_SESSION['username'];
    $user_role_current = $_SESSION['role'];
    $user_post = $post[0]['Username'];
    if ($user_current === $user_post || $user_role_current === 'admin') {
      $can_edit = true;
      $can_delete = true;
    }
  }
?>

<div class="go-back"><button onclick="window.history.back();"><i class="fa-solid fa-arrow-left"></i> Back</button></div>
<div class="container-view-details">
  <div class="container-details">
    <div class="container-details-l">
      <img src="<?= BASE_URL . "/public/images/" . $post[0]["Image"]; ?>" alt="">
    </div>
    <div class="container-details-r">
      <div class="details-title"><h1><?= $post[0]["Postname"]; ?></h1></div>
      <div class="details-row">
        <h2>Username: </h2>
        <span><?= $post[0]["Username"]; ?></span>
      </div>
      <div class="details-row">
        <h2>Restaurent name: </h2>
        <span><?= $post[0]["Res_name"]; ?></span>
      </div>
      <div class="details-row">
        <h2>Restaurent type: </h2>
        <span><?= $post[0]["Res_type"]; ?></span>
      </div>
      <div class="details-row">
        <h2>Location: </h2>
        <span><?= $post[0]["Location"]; ?> </span>
      </div>
      <div class="details-row">
        <h2>Price: </h2>
        <span>
          <?= $post[0]["Price"]; ?> USD
        </span>
      </div>
      <div class="details-row">
        <h2>Rating: </h2>
        <div class="rating">
          <span><?= $post[0]["Rating"]; ?> </span>
          <i class="fa-solid fa-star"></i>
        </div>
      </div>
      <div class="details-row description">
        <h2>Description: </h2>
        <span>
          <?= $post[0]["Description"]; ?>  
        </span>
      </div>

      <div class="container-crud">
        <div class="container-edit <?= $can_edit ? '' : 'disable' ?>">
            <button class="edit"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
        </div>
        <div class="container-delete <?= $can_delete ? '' : 'disable' ?>">
          <button class="delete"><i class="fa-solid fa-trash"></i> Delete</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  const editBtn =document.querySelector(".edit");
  editBtn.addEventListener('click', (e) => {
    e.preventDefault();
    const id = parseInt(<?=$_GET['id']?>) ;
    window.location.href = `<?=BASE_URL?>/post/edit/${id}`;
  })

  const deleteBtn = document.querySelector(".delete");
  deleteBtn.addEventListener('click', async (e) => {
    const id =parseInt(<?= $_GET['id'] ?>);
    const response = await fetch(`<?=BASE_URL?>/api.php?page=post&id=${id}&action=delete`);
    const res = await response.json();
    console.log(res);
    if (res.status === 'success'){
      alert("Delete success");
      window.location.href="<?=BASE_URL?>/posts";
    } else {
      alert("Delete unsuccessfully!");
      console.log(res.error);
    }
  })

</script>

</main>