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

<style>
    #unique{
      border: 1px dashed #999;
      display: flex;
      align-items: center; 
      justify-content: center;
      height: 100px; 
      width: 100%; 
      border-radius: 10px; 
      transition: .3s; 
      cursor: pointer;
    }
    #unique:hover{
      color: #1DA1F2;
      border: 1px dashed #1DA1F2;
    }
  </style>

    <div class="go-back"><button onclick="window.history.back();"> <i class="fa-solid fa-arrow-left"></i> Back</button></div>
    <form action="" method="POST" id="formAdd">
      <div class="form-add">
        <div class="form-title">Add new post</div>
        <div class="form-row active">
          <label for="username" ><span>* </span>Username</label>
          <input type="text" name="username" id="username" required value="<?= $_SESSION['username'] ?>">
        </div>
        <div class="form-row-double">
          <div class="form-row-half">
            <label for="postname" ><span>* </span>Postname</label>
            <input type="text" name="postname" id="postname" placeholder="Enter post name" required>
          </div>
          <div class="form-row-half">
             
            <label for="restaurent_id" ><span>* </span>Restaurant</label>
              <select name="restaurent_id" id="restaurent_id" required>
              <?php foreach ($restaurents as $res) {?>
                <option value="<?= $res["ID"] ?>" data-type="<?= $res['Res_type'] ?>" data-location="<?= $res['Location'] ?>">
                  <?= $res["ID"] . " - " . $res["Res_name"] ?>
                </option>
              <?php }?>
              </select>
          </div>
        </div>

        <div class="form-row-double">
          <div class="form-row-half active">
            <label for="res_type" ><span>* </span>Restaurant type</label>
            <input type="text" name="res_type" id="res_type" placeholder="Auto filled with Restaurent" value="" required>
          </div>
          <div class="form-row-half active">
            <label for="location" ><span>* </span>Location</label>
            <input type="text" name="location" id="location" placeholder="Auto filled with Restaurent" value="" required>
          </div>
        </div>

        <div class="form-row-double">
          <div class="form-row-half">
            <label for="rating" ><span>* </span>Rating</label>
            <input type="number" name="rating" id="rating" placeholder="Rating from 1 to 5!" min="1" max="5" required>
          </div>
          <div class="form-row-half">
            <label for="pricing" ><span>* </span>Price</label>
            <input type="text" name="pricing" id="pricing" placeholder="Enter the price" required>
         </div>
        </div>

        <div class="form-row">
          <input type="file" name="image" id="image" style="display: none;" required>
          <label id="unique" for="image" ><span>* </span>Upload Image</label>
        </div>

        <div class="form-row">
          <label for="description" ><span>* </span>Description</label>
           <textarea name="description" id="description" rows="5" cols="30" placeholder="Type your description here..." style="resize: none;" required></textarea>
        </div>
        <div class="form-btn">
          <input type="submit" value="Upload">
        </div>
      </div>
      
    </form>

<script>
  const input = document.getElementById("image");
  const label = document.getElementById("unique");

  input.addEventListener("change", function () {
    if (this.files && this.files[0]) {
      label.textContent = this.files[0].name;
    } else {
      label.textContent = "Upload Image";
    }
  });

  document.getElementById('restaurent_id').addEventListener('change', function() {
    var selectedOption = this.options[this.selectedIndex];  

    var resType = selectedOption.getAttribute('data-type');
    var location = selectedOption.getAttribute('data-location');

    document.getElementById('res_type').value = resType;
    document.getElementById('location').value = location;
  });

  const form = document.querySelector('#formAdd');
  form.addEventListener('submit', async (e) =>{
    e.preventDefault();
    const formData = new FormData(form);
    const response = await fetch(`<?=BASE_URL?>/api.php?page=profile&action=addpost`, {
      method: 'POST',
      body: formData
    })
    const res = await response.json();
    console.log(res);
    if (res.status == 'success'){
      alert("Add new post successfully!");
      window.location.href = "<?=BASE_URL?>/profile";
    } else {
      alert("Add new post failure, please recheck your data!");
    }
  })

</script>

  </main>

