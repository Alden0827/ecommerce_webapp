
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Page Content -->
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="x_panel">
          
          <!-- Panel Header -->
          <div class="x_title">
            <h2>ITEM #<?= $new_upc ?><small>...</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                  <i class="fa fa-wrench"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Settings 1</a>
                  <a class="dropdown-item" href="#">Settings 2</a>
                </div>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a></li>
            </ul>
            <div class="clearfix"></div>
          </div>

          <!-- Panel Content -->
          <div class="x_content">
            <?php 
              echo form_open('item_listing/products_save', 'enctype="multipart/form-data"'); 
              echo "<input type='hidden' name='upc' id='upc' value='$new_upc'>"; 
            ?>        

            <div class="row">

              <!-- Left Column -->
              <div class="col-md-8 col-sm-8">

                <!-- Item Caption -->
                <div class="form-group">
                  <label for="item_caption">Item Caption</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-product-hunt"></i></span>
                    </div>
                    <input id="item_caption" name="item_caption" type="text" class="form-control" required value="sample_data1">
                  </div>
                </div>

                <!-- Short Description -->
                <div class="form-group">
                  <label for="item_desc">Short Description</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-product-hunt"></i></span>
                    </div>
                    <input id="item_desc" name="item_desc" type="text" class="form-control" required value="sample_data1">
                  </div>
                </div>

                <!-- Specification -->
                <div class="form-group">
                  <label for="item_specs">Specification</label>
                  <textarea id="item_specs" name="item_specs" class="form-control" rows="5" required>adasdad</textarea>
                </div>

                <!-- Brand -->
                <div class="form-group">
                  <label for="brand">Brand</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-audio-description"></i></span>
                    </div>
                    <input id="brand" name="brand" type="text" class="form-control" required value="sample_data2">
                  </div>
                </div>

                <!-- Category -->
                <div class="form-group">
                  <label for="category">Category</label>
                  <select id="category" name="cat_id" class="custom-select" required>
                    <?php foreach ($res_product_category->result() as $row): ?>
                      <option value="<?= $row->cat_id ?>"><?= $row->category ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <!-- Stock -->
                <div class="form-group">
                  <label for="stock">Available Stock</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-scribd"></i></span>
                    </div>
                    <input id="stock" name="stock" type="text" class="form-control" required value="1">
                  </div>
                </div>

                <!-- Price -->
                <div class="form-group">
                  <label for="unit_price">Price</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-dollar"></i></span>
                    </div>
                    <input id="unit_price" name="unit_price" type="number" class="form-control" required value="12">
                    <div class="input-group-append">
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
                </div>

                <!-- Discount -->
                <div class="form-group">
                  <label for="discount">Discount (%)</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-percent"></i></span>
                    </div>
                    <input id="discount" name="discount" type="number" class="form-control" value="0">
                  </div>
                </div>

                <!-- Post Checkbox -->
                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="form-control" id="is_posted" name="status_id">
                    <label for="is_posted">Post this product in your store now!</label>
                  </div>
                </div>

                <!-- Submit Button -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>

              <!-- Right Column - Photo Upload -->
              <div class="col-md-4 col-sm-4">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Cover Photo</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content bs-example-popovers">
                    <div class="alert alert-info alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>Note:</strong> You may upload multiple files. The first image will be the main cover photo.
                    </div>
                    <div class="upload__box">
                      <div class="upload__btn-box">
                        <label class="upload__btn">
                          <p>Upload images</p>
                          <input type="file" id="product_photos" name="product_photos[]" class="form-control" multiple data-max_length="20">
                        </label>
                      </div>
                      <div class="upload__img-wrap"></div>
                    </div>
                  </div>
                </div>
              </div>

            </div> <!-- /.row -->

            </form>
          </div> <!-- /.x_content -->

        </div> <!-- /.x_panel -->
      </div>
    </div>

  </div>
</div>
<!-- /Page Content -->



<script type="text/javascript">

jQuery(document).ready(function () {
  ImgUpload();
});

function ImgUpload() {
  var imgWrap = "";
  var imgArray = [];

  $('#product_photos').each(function () {
    $(this).on('change', function (e) {
      imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
      var maxLength = $(this).attr('data-max_length');

      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      var iterator = 0;
      filesArr.forEach(function (f, index) {

        if (!f.type.match('image.*')) {
          return;
        }

        if (imgArray.length > maxLength) {
          return false
        } else {
          var len = 0;
          for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i] !== undefined) {
              len++;
            }
          }
          if (len > maxLength) {
            return false;
          } else {
            imgArray.push(f);

            var reader = new FileReader();
            reader.onload = function (e) {
              var html = "";
                  html+="<span class='upload__img-box'>";
                  html+="  <span style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'>";
                  html+="    <span class='upload__img-close'></span>";
                  html+="  </span>";
                  html+="</span>";

              imgWrap.append(html);
              iterator++;
            }
            reader.readAsDataURL(f);
          }
        }
      });
    });
  });

  $('body').on('click', ".upload__img-close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
      if (imgArray[i].name === file) {
        imgArray.splice(i, 1);
        break;
      }
    }
    $(this).parent().parent().remove();
  });
}

</script>

<style type="text/css">

html * {
  box-sizing: border-box;
}

p {
  margin: 0;
}

.upload {
  &__box {
    padding: 40px;
  }
  &__inputfile {
    width: .1px;
    height: .1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
  }
  
  &__btn {
    display: inline-block;
    font-weight: 600;
    color: #fff;
    text-align: center;
    min-width: 116px;
    padding: 5px;
    transition: all .3s ease;
    cursor: pointer;
    border: 2px solid;
    background-color: #4045ba;
    border-color: #4045ba;
    border-radius: 10px;
    line-height: 26px;
    font-size: 14px;
    
    &:hover {
      background-color: unset;
      color: #4045ba;
      transition: all .3s ease;
    }
    
    &-box {
      margin-bottom: 10px;
    }
  }
  
  &__img {
    &-wrap {
      display: flex;
      flex-wrap: wrap;
      margin: 0 -10px;
    }
    
    &-box {
      width: 200px;
      padding: 0 10px;
      margin-bottom: 12px;
    }
    
    &-close {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 10px;
        right: 10px;
        text-align: center;
        line-height: 24px;
        z-index: 1;
        cursor: pointer;

        &:after {
          content: '\2716';
          font-size: 14px;
          color: white;
        }
      }
  }
}

.img-bg {
  /*background-repeat: no-repeat;*/
  /*background-position: center;*/
  background-size: cover;
  /*position: relative;*/
  /*padding-bottom: 100%;*/
  border: 5px solid #ddd;
  border-radius: 4px;
  /*padding: 5px;*/
  width: 160px;  
  height: 160px;
  display:block;
  float: left;
}

.img-bg:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}

</style>