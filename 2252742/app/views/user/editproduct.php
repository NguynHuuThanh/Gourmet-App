<main>

<style>
  *{
  font-family:Arial, Helvetica, sans-serif;
}

.form-add{
  font-family:Arial, Helvetica, sans-serif;
  display: flex;
  flex: 1;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  row-gap: 1rem;
  margin: 0 0 3% 0;
}      
.form-add label {
  font-size: 1.3rem;
  margin: 1% 0;

}
.form-add label span{
  color: red;
}
.form-title{
  font-size: 300%;
}
.form-row-double{
  width: 65%;
  /* display: flex;
  justify-content: space-between; */
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  column-gap: 10%;
}
.form-row-double .form-row-half{
  display: flex;
  flex: 1;
  flex-direction: column;
  /* width: 120%; */
  /* justify-content: space-between; */
}

.form-row{
  display: flex;
  flex-direction: column;
  flex: 1;
  width: 65%;
}

.form-row input, 
.form-row-half select,
.form-row-half input,
.form-row textarea{
  width: 100%;
  height: 3.2rem;
  padding: 1.5% 2%;
  margin: 1% 0;
  border-radius: 10px;
  border-width: 1.3px;
  outline: none;
  font-size: 1.3rem
}

.form-row-half input{
  padding-left: 4.5%;
}

.form-row textarea{
  height: 400%;
}

.form-row-half select,
.form-row-half input{
  /* width: 70%; */
}

.form-add .form-btn{
  width: 65%;            
  display: flex;
  justify-content: flex-end;  
}

.form-add .form-btn input{
  height: 3rem;
  width: 20%;
  font-size: 1.4rem;
  border-radius: 10px;
  border-width: 1px;
  /* border-color: #0c78d0; */
  box-sizing: border-box;
  outline: none;
  background:  #ecb26f;
  transition: .3s;
  cursor: pointer;
}

.form-row.active,
.form-row-half.active {
  pointer-events: none; 
  cursor: pointer;
  /* opacity: .65; */
}

.form-add .form-btn input:hover{
  /* scale: 1.1; */
  box-shadow: 0 0 0 4px #fff,
  0 0 0 8px #ecb26f;
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

@media (max-width: 768px){
  .form-row-double{
    display: flex;
    flex-direction: column;
    row-gap: 1rem
  }
  .form-add .form-btn input{
    width: 30%;
  }
}
@media (max-width: 430px){
  .form-add .form-btn input{
    width: 40%;
  }
}
</style>

<div class="go-back"><button onclick="window.history.back();"> <i class="fa-solid fa-arrow-left"></i> Back</button></div>
<form action="" method="POST" id="form-edit">
  <div class="form-add">
    <div class="form-title">Edit post</div>
    <div>Note: You can not change the Restaurent name, Restaurent type and Restaurent Location!</div>
    <div class="form-row active">
      <label for="username" ><span>* </span>Username</label>
      <input type="text" name="username" id="username" required value="<?= $post[0]["Username"] ?>">
    </div>
    <div class="form-row-double">
      <div class="form-row-half">
        <label for="postname" ><span>* </span>Postname</label>
        <input type="text" name="postname" id="postname" placeholder="Enter post name" required value="<?= $post[0]["Postname"]?>">
      </div>
      <div class="form-row-half active">
         
        <label for="restaurent_id" ><span>* </span>Restaurant</label>
          <select name="restaurent_id" id="restaurent_id" required>

          <option value="<?= $post[0]["Restaurent_ID"] ?>"><?= $post[0]["Res_name"] ?></option>

          </select>
      </div>
    </div>

    <div class="form-row-double">
      <div class="form-row-half active">
        <label for="res_type" ><span>* </span>Restaurant type</label>
        <input type="text" name="res_type" id="res_type" placeholder="Auto filled with Restaurent" required value="<?= $post[0]["Res_type"]?>">
      </div>
      <div class="form-row-half active">
        <label for="location" ><span>* </span>Location</label>
        <input type="text" name="location" id="location" placeholder="Auto filled with Restaurent" required value="<?= $post[0]["Location"]?>">
      </div>
    </div>

    <div class="form-row-double">
      <div class="form-row-half">
        <label for="rating" ><span>* </span>Rating</label>
        <input type="number" name="rating" id="rating" placeholder="Rating from 1 to 5!" min="1" max="5" required value="<?= $post[0]["Rating"]?>">
      </div>
      <div class="form-row-half">
        <label for="pricing" ><span>* </span>Price</label>
        <input type="text" name="pricing" id="pricing" placeholder="Enter the price" required value="<?= $post[0]["Price"]?>">
     </div>
    </div>

    <!-- <div class="form-row">
      <label for="image" ><span>* </span>Image</label>
      <input type="file" name="image" id="image" placeholder="Enter the path of image" required value="<?= $post[0]["Image"]?>">
    </div> -->

    <div class="form-row">
      <label for="image"><span>* </span>Image</label>
      
      <!-- File input -->
      <input type="file" name="image" id="image" accept="image/*">

      <!-- Show current image if it exists -->
      <?php if (!empty($post[0]["Image"])): ?>
        <p>Current image:</p>
        <img src="<?= BASE_URL . "/public/images/" . $post[0]["Image"] ?>" alt="Uploaded image" style="width: 100%; height: 100%;border-width: 1px; border-style:solid; margin: 2% 0 2% 0;">
      <?php endif; ?>
    </div>

    <div class="form-row">
      <label for="description" ><span>* </span>Description</label>
       <textarea name="description" id="description" rows="5" cols="30" placeholder="Type your description here..." style="resize: none;" required><?= $post[0]["Description"]?></textarea>
    </div>
    <div class="form-btn">
      <input type="submit" value="Save changes" style="width: 10rem;">
    </div>
  </div>
  
</form>


<script>
  const form =document.querySelector('#form-edit');
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(form);
    formData.append('existing_image', "<?=$post[0]["Image"]?>");
    // const id = parseInt(<?=$_GET['id']?>);
    const id = <?=$_GET['id']?>;

    const response = await fetch(`<?=BASE_URL?>/api.php?page=post&id=${id}&action=edit`, {
      method: 'POST',
      body: formData
    })

    const res = await response.json();
    console.log(res);
    if (res.status == 'success'){
      alert("Save changes success!");
      window.location.href = "<?=BASE_URL?>/posts";
    } else{
      alert("Can not save changes!");
      console.log(res.error);
    }
  })
</script>

</main>